<?php
include 'class.conexion.php';

class OfertaLaboral {

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

    public function __construct($id, $titulo, $descripcion, $ubicacion, $salario, $requisitos, $fechaPublicacion, $fechaExpiracion, $empresa, $tipoContrato, $nivelExperiencia, $beneficios) {
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

}

public function crearTablaSiNoExiste($conexion) {
    $nombreTabla = 'ofertas_laborales';

  
    $consultaExistencia = "SHOW TABLES LIKE '$nombreTabla'";
    $resultado = $conexion->query($consultaExistencia);

    if ($resultado->num_rows == 0) {
      
        $crearTabla = "CREATE TABLE $nombreTabla (
            id INT AUTO_INCREMENT PRIMARY KEY,
            titulo VARCHAR(255) NOT NULL,
            descripcion TEXT,
            ubicacion VARCHAR(100),
            salario DECIMAL(10, 2),
            requisitos TEXT,
            fecha_publicacion DATE,
            fecha_expiracion DATE,
            empresa VARCHAR(255),
            tipo_contrato VARCHAR(50),
            nivel_experiencia VARCHAR(50),
            beneficios TEXT
        )";

        if ($conexion->query($crearTabla)) {
            echo "Tabla creada con éxito.<br>";
        } else {
            echo "Error al crear la tabla: " . $conexion->error . "<br>";
        }
    } else {
        echo "La tabla ya existe.<br>";
    }
}


?>

