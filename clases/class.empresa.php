<?php
include 'class.conexion.php';

class Empresa {

    protected $id;
    protected $nombre;
    protected $direccion;
    protected $telefono;
    protected $descripcion;
    protected $sector;
    protected $contactoNombre;
    protected $contactoCorreo;
    protected $sitioWeb;

    public function __construct($id, $nombre, $direccion, $telefono, $descripcion, $sector, $contactoNombre, $contactoCorreo, $sitioWeb) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->direccion = $direccion;
        $this->telefono = $telefono;
        $this->descripcion = $descripcion;
        $this->sector = $sector;
        $this->contactoNombre = $contactoNombre;
        $this->contactoCorreo = $contactoCorreo;
        $this->sitioWeb = $sitioWeb;
    }

    public static function crearTablaSiNoExiste($conexion) {
        $nombreTabla = 'empresa';

        $consultaExistencia = "SHOW TABLES LIKE '$nombreTabla'";
        $resultado = $conexion->query($consultaExistencia);

        if ($resultado->num_rows == 0) {
            $crearTabla = "CREATE TABLE $nombreTabla (
                id INT AUTO_INCREMENT PRIMARY KEY,
                nombre VARCHAR(255) NOT NULL,
                direccion VARCHAR(255),
                telefono VARCHAR(20),
                descripcion TEXT,
                sector VARCHAR(100),
                contacto_nombre VARCHAR(255),
                contacto_correo VARCHAR(255),
                sitio_web VARCHAR(255)
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
}


?>
