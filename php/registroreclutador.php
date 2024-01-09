<?php
ini_set("display_errors", 1);
error_reporting(E_ALL);

require_once '../clases/class.conexion.php';
require_once '../clases/class.reclutador.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $directorioImagenes = "../imagenes_reclutador/{$reclutadorID}/";

    if (!is_dir($directorioImagenes)) {
    mkdir($directorioImagenes, 0777, true);
    }

    $reclutador = new reclutador(
        isset($_POST['id']) ? $_POST['id'] : null,
        $_POST['user'],
        $_POST['email'],
        $_POST['password'],
        $_POST['cedula'],
        $_POST['name'],
        $_POST['telefono'],
        $_FILES['foto']['name'], // Nombre del archivo, no la ruta completa
        $_POST['nacimiento'],
        $_POST['ingreso'],
        $_POST['estatus']
    );
    

    $action = isset($_POST['action']) ? $_POST['action'] : '';

    if ($action === 'create') {
        $reclutadorID = $reclutador->create();

        // Almacena la imagen en una carpeta con el ID del reclutador
        $directorioImagenes = "../imagenes_reclutador/{$reclutadorID}/";

        if (!file_exists($directorioImagenes)) {
            mkdir($directorioImagenes, 0777, true);
        }

        $imagenTmp = $_FILES['foto']['tmp_name'];
        $nombreFoto = $_FILES['foto']['name'];

        move_uploaded_file($imagenTmp, $directorioImagenes . $nombreFoto);

        echo "Reclutador creado correctamente.";
    }
}
?>
