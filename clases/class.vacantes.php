<?php

class Vacantes
{
    protected $id;
    protected $nombre;
    protected $tipo;
    protected $descripcion;
    protected $imagen;

    public function __construct($id, $nombre, $tipo, $descripcion, $imagen)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->tipo = $tipo;
        $this->descripcion = $descripcion;
        $this->imagen = $imagen;
    }

    public function registrarVacante()
    {
        $conexion = new Conexion();
        $ct = "SHOW TABLES LIKE 'vacantes'";
        $h = $conexion->query($ct);

        $nombre = $conexion->real_escape_string($this->nombre);
        $tipo = $conexion->real_escape_string($this->tipo);
        $descripcion = $conexion->real_escape_string($this->descripcion);
        $imagenNombre = $this->procesarImagen();

        $sql = "INSERT INTO vacantes (nombre, tipo, descripcion, imagen) 
                VALUES ('$nombre', '$tipo', '$descripcion', '$imagenNombre')";

        if ($h->num_rows < 1) {

            $sqlCreateTable = "CREATE TABLE vacantes (
                                ID INT AUTO_INCREMENT PRIMARY KEY,
                                NOMBRE VARCHAR(255),
                                TIPO VARCHAR(255),
                                DESCRIPCION TEXT,
                                IMAGEN VARCHAR(255)
                            )";

            $conexion->query($sqlCreateTable);
        }

        if ($conexion->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    private function procesarImagen()
    {
        $directorioImagenes = 'img/vacantes/';
        $nombreImagen = $this->id . '_' . uniqid() . '.' . pathinfo($this->imagen['name'], PATHINFO_EXTENSION);
        $rutaImagen = $directorioImagenes . $nombreImagen;

        move_uploaded_file($this->imagen['tmp_name'], $rutaImagen);

        return $nombreImagen;
    }

    public function editarVacante()
{
    $conexion = new Conexion();
    $nombre = $conexion->real_escape_string($this->nombre);
    $tipo = $conexion->real_escape_string($this->tipo);
    $descripcion = $conexion->real_escape_string($this->descripcion);

    $sql = "UPDATE vacantes SET 
            nombre = '$nombre', 
            tipo = '$tipo', 
            descripcion = '$descripcion' 
            WHERE id = '$this->id'";

    if ($conexion->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}
    public function eliminarVacante()
    {
        $bd = new Conexion();

        $sql = "DELETE FROM vacantes WHERE id = '$this->id'";

        if ($bd->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }
}

?>
