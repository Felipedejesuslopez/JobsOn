<?php
include 'class.conexion.php';

class CategoriaOferta {

    protected $id;
    protected $titulo;
    protected $descripcion;
    protected $ubicacion;

    public function __construct($id, $titulo, $descripcion, $ubicacion) {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->descripcion = $descripcion;
        $this->ubicacion = $ubicacion;
    }

    public static function crearTablaSiNoExiste($conexion) {
        $nombreTabla = 'categoria_oferta';

        $consultaExistencia = "SHOW TABLES LIKE '$nombreTabla'";
        $resultado = $conexion->query($consultaExistencia);

        if ($resultado->num_rows == 0) {
            $crearTabla = "CREATE TABLE $nombreTabla (
                id INT AUTO_INCREMENT PRIMARY KEY,
                titulo VARCHAR(255) NOT NULL,
                descripcion TEXT,
                ubicacion VARCHAR(100)
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