<?php

class OfertaLaboral
{

    protected $id;
    protected $titulo;
    protected $descripcion;
    protected $ubicacion;
    protected $salario;
    protected $requisitos;
    protected $fechaPublicacion;
    protected $fechaExpiracion;
    protected $empresa;
    protected $tipoContrato;
    protected $nivelExperiencia;
    protected $beneficios;

    public function __construct($id, $titulo, $descripcion, $ubicacion, $salario, $requisitos, $fechaPublicacion, $fechaExpiracion, $empresa, $tipoContrato, $nivelExperiencia, $beneficios)
    {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->descripcion = $descripcion;
        $this->ubicacion = $ubicacion;
        $this->salario = $salario;
        $this->requisitos = $requisitos;
        $this->fechaPublicacion = $fechaPublicacion;
        $this->fechaExpiracion = $fechaExpiracion;
        $this->empresa = $empresa;
        $this->tipoContrato = $tipoContrato;
        $this->nivelExperiencia = $nivelExperiencia;
        $this->beneficios = $beneficios;
    }

    public function create()
    {
        $bd = new Conexion();

        // Verificar la existencia de la tabla
        $consultaExistencia = "SHOW TABLES LIKE 'ofertas_laborales'";
        $resultadoExistencia = $bd->query($consultaExistencia);

        // Manejar errores en la consulta de existencia
        if (!$resultadoExistencia) {
            echo "Error al verificar la existencia de la tabla: " . $bd->error;
            $bd->close();
            return false;
        }

        // Si la tabla no existe, crearla
        if ($resultadoExistencia->num_rows < 1) {
            $crearTabla = "CREATE TABLE ofertas_laborales (
                ID INT AUTO_INCREMENT PRIMARY KEY,
                TITULO VARCHAR(255) NOT NULL,
                DESCRIPCION TEXT,
                UBICACION VARCHAR(100),
                SALARIO DECIMAL(10, 2),
                REQUISITOS TEXT,
                FECHA_PUBLICACION DATE,
                FECHA_EXPIRACION DATE,
                EMPRESA VARCHAR(255),
                TIPO_CONTRATO VARCHAR(50),
                NIVEL_EXPERIENCIA VARCHAR(50),
                BENEFICIOS TEXT
            )";

            // Manejar errores en la creación de la tabla
            if (!$bd->query($crearTabla)) {
                echo "Error al crear la tabla: " . $bd->error;
                $bd->close();
                return false;
            }
        }

        // Consulta de inserción
        $sql = "INSERT INTO ofertas_laborales (TITULO, DESCRIPCION, UBICACION, SALARIO, REQUISITOS, FECHA_PUBLICACION, FECHA_EXPIRACION, EMPRESA, TIPO_CONTRATO, NIVEL_EXPERIENCIA, BENEFICIOS) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        // Preparar la consulta
        $statement = $bd->prepare($sql);

        // Manejar errores en la preparación de la consulta
        if (!$statement) {
            echo "Error al preparar la consulta: " . $bd->error;
            $bd->close();
            return false;
        }

        // Asignar valores a los parámetros
        $statement->bind_param('sssssssssss', $this->titulo, $this->descripcion, $this->ubicacion, $this->salario, $this->requisitos, $this->fechaPublicacion, $this->fechaExpiracion, $this->empresa, $this->tipoContrato, $this->nivelExperiencia, $this->beneficios);

        // Ejecutar la consulta INSERT
        $resultInsert = $statement->execute();

        // Manejar errores en la ejecución de la consulta
        if (!$resultInsert) {
            echo "Error al insertar datos: " . $bd->error;
            $statement->close();
            $bd->close();
            return false;
        }

        // Obtener el último ID insertado
        $ultimoId = $bd->insert_id;

        // Cerrar la conexión y el statement
        $statement->close();
        $bd->close();

        // Devolver el último ID insertado
        return $ultimoId;
    }


    public function read()
    {
        $bd = new Conexion();
        if (isset($this->id) && $this->id != "") {
            $sql = "SELECT * FROM ofertas_laborales WHERE ID = '{$this->id}'";
        } else if (isset($this->empresa) && $this->empresa != '') {
            $sql = "SELECT * FROM ofertas_laborales WHERE EMPRESA = '{$this->empresa}' ORDER BY SALARIO DESC";
        } else {
            $sql = "SELECT * FROM ofertas_laborales ORDER BY TITULO ASC";
        }
        $res = $bd->query($sql);
        return $res;
    }

    public function update()
    {
        $bd = new Conexion();
        $sql = "UPDATE ofertas_laborales SET TITULO = '{$this->titulo}', DESCRIPCION = '{$this->descripcion}', UBICACION = '{$this->ubicacion}', SALARIO = '{$this->salario}', REQUISITOS = '{$this->requisitos}', FECHA_PUBLICACION = '{$this->fechaPublicacion}', FECHA_EXPIRACION = '{$this->fechaExpiracion}', EMPRESA = '{$this->empresa}', TIPO_CONTRATO = '{$this->tipoContrato}', NIVEL_EXPERIENCIA = '{$this->nivelExperiencia}', BENEFICIOS = '{$this->beneficios}' WHERE ID = '{$this->id}'";
        return $bd->query($sql);
    }

    public function lastid()
    {
        $bd = new Conexion();
        $query = "SELECT * FROM ofertas_laborales ORDER BY ID DESC LIMIT 1";
        $r = $bd->query($query);
        $res = $r->fetch_array();
        return $res['ID'];
    }

        public function buscarOfertasSimilares(usuariopostulante $usuario, Curriculum $curriculum)
    {
        $bd = new Conexion();
        $prioridades = array('ubicacion', 'experiencia', 'estudios', 'trabajoPrevio', 'titulo');
    
        $campoMapeoUsuario = array(
            'ubicacion' => 'UBICACION',
        );
    
        $campoMapeoCurriculum = array(
            'estudios' => 'ESTUDIOS',
        );
    
        $campoMapeoOfertaLaboral = array(
            'titulo' => 'TITULO',
        );
    
        $sql = "SELECT * FROM ofertas_laborales WHERE 1=1";
    
        foreach ($prioridades as $campo) {
            if (property_exists($usuario, $campo) && !empty($usuario->$campo) && isset($campoMapeoUsuario[$campo])) {
                $valorUsuario = $usuario->$campo;
                $sql .= " AND {$campoMapeoUsuario[$campo]} = '{$valorUsuario}'";
            }

            if (property_exists($curriculum, $campo) && !empty($curriculum->$campo) && isset($campoMapeoCurriculum[$campo])) {
                $valorCurriculum = $curriculum->$campo;
                $sql .= " AND {$campoMapeoCurriculum[$campo]} = '{$valorCurriculum}'";
            }

            if (property_exists($this, $campo) && !empty($this->$campo) && isset($campoMapeoOfertaLaboral[$campo])) {
                $valorOfertaLaboral = $this->$campo;
                $sql .= " AND {$campoMapeoOfertaLaboral[$campo]} = '{$valorOfertaLaboral}'";
            }
        }

        $sql .= " ORDER BY UBICACION DESC, TITULO DESC";
        $res = $bd->query($sql);
    
        return $res;
    }

    public function getTitulo()
    {
        return $this->titulo;
    }

    public function readByEmpresa()
    {
        $bd = new Conexion();
        $sql = "SELECT * FROM ofertas_laborales WHERE EMPRESA = '{$this->empresa}'";
        $res = $bd->query($sql);
        return $res;
    }
    public function countByEmpresa()
{
    $bd = new Conexion();
    $sql = "SELECT COUNT(*) AS total FROM ofertas_laborales WHERE EMPRESA = '{$this->empresa}'";
    $res = $bd->query($sql);
    $row = $res->fetch_assoc();
    return $row['total'];
}


}