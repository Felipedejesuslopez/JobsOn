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
    protected $imagen;

    public function __construct($id, $titulo, $descripcion, $ubicacion, $salario, $requisitos, $fechaPublicacion, $fechaExpiracion, $empresa, $tipoContrato, $nivelExperiencia, $beneficios, $imagen)
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
        $this->imagen = $imagen;
    }

    public function create()
    {
        $bd = new Conexion();

        $carpetaImagenes = 'img/vacantes';
        if (!is_dir($carpetaImagenes)) {
            mkdir($carpetaImagenes, 0755, true);
        }

        $titulo = $bd->real_escape_string($this->titulo);
        $descripcion = $bd->real_escape_string($this->descripcion);
        $ubicacion = $bd->real_escape_string($this->ubicacion);
        $salario = $bd->real_escape_string($this->salario);
        $requisitos = $bd->real_escape_string($this->requisitos);
        $fechaPublicacion = $bd->real_escape_string($this->fechaPublicacion);
        $fechaExpiracion = $bd->real_escape_string($this->fechaExpiracion);
        $empresa = $bd->real_escape_string($this->empresa);
        $tipoContrato = $bd->real_escape_string($this->tipoContrato);
        $nivelExperiencia = $bd->real_escape_string($this->nivelExperiencia);
        $beneficios = $bd->real_escape_string($this->beneficios);
        $imagenNombre = $this->procesarImagen();

        $sql = "INSERT INTO ofertas_laborales (TITULO, DESCRIPCION, UBICACION, SALARIO, REQUISITOS, FECHA_PUBLICACION, FECHA_EXPIRACION, EMPRESA, TIPO_CONTRATO, NIVEL_EXPERIENCIA, BENEFICIOS, IMAGEN) 
                VALUES ('$titulo','$descripcion','$ubicacion','$salario','$requisitos','$fechaPublicacion','$fechaExpiracion','$empresa','$tipoContrato','$nivelExperiencia','$beneficios', '$imagenNombre')";

        $consultaExistencia = "SHOW TABLES LIKE 'ofertas_laborales'";
        $resultado = $bd->query($consultaExistencia);

        if ($resultado->num_rows < 1) {
            $crearTabla = "CREATE TABLE ofertas_laborales (
                ID INT AUTO_INCREMENT PRIMARY KEY,
                TITULO VARCHAR(255) NOT NULL,
                DESCRIPCION TEXT,
                UBICACION VARCHAR(255),
                SALARIO VARCHAR(255),
                REQUISITOS TEXT,
                FECHA_PUBLICACION DATE,
                FECHA_EXPIRACION DATE,
                EMPRESA VARCHAR(255),
                TIPO_CONTRATO VARCHAR(255),
                NIVEL_EXPERIENCIA VARCHAR(255),
                BENEFICIOS TEXT,
                IMAGEN VARCHAR(255)
            )";

            $bd->query($crearTabla);
        }

        return $bd->query($sql);
    }

    public static function procesarFormulario()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $titulo = $_POST['titulo'];
            $descripcion = $_POST['descripcion'];
            $ubicacion = $_POST['ubicacion'];
            $salario = $_POST['salario'];
            $requisitos = $_POST['requisitos'];
            $fechaPublicacion = $_POST['fechaPublicacion'];
            $fechaExpiracion = $_POST['fechaExpiracion'];
            $empresa = $_POST['empresa'];
            $tipoContrato = $_POST['tipoContrato'];
            $nivelExperiencia = $_POST['nivelExperiencia'];
            $beneficios = $_POST['beneficios'];
            $imagen = $_FILES['imagen'];


            if (!empty($titulo) && !empty($descripcion) && !empty($ubicacion) && !empty($salario) && !empty($requisitos) && !empty($fechaPublicacion) && !empty($fechaExpiracion) && !empty($empresa) && !empty($tipoContrato) && !empty($nivelExperiencia) && !empty($beneficios) && !empty($imagen['name'])) {
                
                $ofertaLaboral = new OfertaLaboral(null, $titulo, $descripcion, $ubicacion, $salario, $requisitos, $fechaPublicacion, $fechaExpiracion, $empresa, $tipoContrato, $nivelExperiencia, $beneficios, $imagen);

                $registroExitoso = $ofertaLaboral->create();

                if ($registroExitoso) {
                    echo "<p style='color: green;'>Oferta registrada con éxito.</p>";
                } else {
                    echo "<p style='color: red;'>Error al registrar la oferta.</p>";
                }
            } else {
                echo "<p style='color: red;'>Todos los campos son obligatorios, incluyendo la imagen.</p>";
            }
        }
    }


    private function procesarImagen()
    {
        $directorioImagenes = 'img/vacantes/';
        $nombreImagen = $this->id . '_' . uniqid() . '.' . pathinfo($this->imagen['name'], PATHINFO_EXTENSION);
        $rutaImagen = $directorioImagenes . $nombreImagen;
    
        move_uploaded_file($this->imagen['tmp_name'], $rutaImagen);
    
        return $rutaImagen;
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
        $titulo = $bd->real_escape_string($this->titulo);
        $descripcion = $bd->real_escape_string($this->descripcion);
        $ubicacion = $bd->real_escape_string($this->ubicacion);
        $salario = $bd->real_escape_string($this->salario);
        $requisitos = $bd->real_escape_string($this->requisitos);
        $fechaPublicacion = $bd->real_escape_string($this->fechaPublicacion);
        $fechaExpiracion = $bd->real_escape_string($this->fechaExpiracion);
        $empresa = $bd->real_escape_string($this->empresa);
        $tipoContrato = $bd->real_escape_string($this->tipoContrato);
        $nivelExperiencia = $bd->real_escape_string($this->nivelExperiencia);
        $beneficios = $bd->real_escape_string($this->beneficios);

        if (!empty($this->imagen['name'])) {
            $imagenNombre = $this->procesarImagen();
            $sql = "UPDATE ofertas_laborales SET TITULO = '$titulo', DESCRIPCION = '$descripcion', UBICACION = '$ubicacion', SALARIO = '$salario', REQUISITOS = '$requisitos', FECHA_PUBLICACION = '$fechaPublicacion', FECHA_EXPIRACION = '$fechaExpiracion', EMPRESA = '$empresa', TIPO_CONTRATO = '$tipoContrato', NIVEL_EXPERIENCIA = '$nivelExperiencia', BENEFICIOS = '$beneficios', IMAGEN = '$imagenNombre' WHERE ID = '{$this->id}'";
        } else {
            $sql = "UPDATE ofertas_laborales SET TITULO = '$titulo', DESCRIPCION = '$descripcion', UBICACION = '$ubicacion', SALARIO = '$salario', REQUISITOS = '$requisitos', FECHA_PUBLICACION = '$fechaPublicacion', FECHA_EXPIRACION = '$fechaExpiracion', EMPRESA = '$empresa', TIPO_CONTRATO = '$tipoContrato', NIVEL_EXPERIENCIA = '$nivelExperiencia', BENEFICIOS = '$beneficios' WHERE ID = '{$this->id}'";
        }
        if ($bd->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function eliminarVacante()
    {
        $bd = new Conexion();

        $sql = "DELETE FROM ofertas_laborales WHERE id = '$this->id'";

        if ($bd->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

}

?>
