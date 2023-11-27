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
        $consultaExistencia = "SHOW TABLES LIKE 'ofertas_laborales'";
        $resultado = $bd->query($consultaExistencia);
        $sql = "INSERT INTO ofertas_laborales (TITULO, DESCRIPCION, UBICACION, SALARIO, REQUISITOS, FECHA_PUBLICACION, FECHA_EXPIRACION, EMPRESA, TIPO_CONTRATO, NIVEL_EXPERIENCIA, BENEFICIOS) VALUES ('{$this->titulo}','{$this->descripcion}','{$this->ubicacion}','{$this->salario}','{$this->requisitos}','{$this->fechaPublicacion}','{$this->fechaExpiracion}','{$this->empresa}','{$this->tipoContrato}','{$this->nivelExperiencia}','{$this->beneficios}')";

        if ($resultado->num_rows < 1) {
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

            $bd->query($crearTabla);
        }

        return $bd->query($sql);
    }

    public function read()
    {
        $bd = new Conexion();
        if (isset($this->id) && $this->id != "") {
            $sql = "SELECT * FROM ofertas_laborales ORDER BY TITULO ASC";
        } else {
            $sql = "SELECT * FROM ofertas_laborales WHERE ID = '{$this->id}'";
        }

        return $bd->query($sql);
    }

    public function update()
    {
        $bd = new Conexion();
        $sql = "UPDATE ofertas_laborales SET TITULO = '{$this->titulo}', DESCRIPCION = '{$this->descripcion}', UBICACION = '{$this->ubicacion}', SALARIO = '{$this->salario}', REQUISITOS = '{$this->requisitos}', FECHA_PUBLICACION = '{$this->fechaPublicacion}', FECHA_EXPIRACION = '{$this->fechaExpiracion}', EMPRESA = '{$this->empresa}', TIPO_CONTRATO = '{$this->tipoContrato}', NIVEL_EXPERIENCIA = '{$this->nivelExperiencia}', BENEFICIOS = '{$this->beneficios}' WHERE ID = '{$this->id}'";
        return $bd->query($sql);
    }
}
?>