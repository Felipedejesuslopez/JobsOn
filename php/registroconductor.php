<?php
ini_set("display_errors",1);
error_reporting (E_ALL);

include '../clases/class.conexion.php';
include '../clases/class.conductor.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $directorioImagenes = "../imagenes_conductor/{$conductorID}/";

    if (!is_dir($directorioImagenes)) {
    mkdir($directorioImagenes, 0777, true);
    }

    $conductor = new conductor(
        isset($_POST['id']) ? $_POST['id'] : null,
        $_POST['user'],
        $_POST['email'],
        $_POST['password'],
        $_POST['name'],
        $_POST['licencia'],
        $_POST['ine'],
        $_POST['foto']['name'],
        $_POST['nacimiento'],
        $_POST['ingreso'],
        $_POST['completados'],
        $_POST['cancelados'],
        $_POST['estatus'],
        $_POST['T1'],
        $_POST['T2']
    );

    $action = isset($_POST['action']) ? $_POST['action'] : '';

    if ($action === 'create') {

        $conductorID = $conductor->create();

        // Almacena la imagen en una carpeta con el ID del reclutador
        $directorioImagenes = "../imagenes_conductor/{$conductorID}/";

        if (!file_exists($directorioImagenes)) {
            mkdir($directorioImagenes, 0777, true);
        }

        $imagenTmp = $_FILES['foto']['tmp_name'];
        $nombreFoto = $_FILES['foto']['name'];

        move_uploaded_file($imagenTmp, $directorioImagenes . $nombreFoto);

        echo "Conductor creado correctamente.";



    } elseif ($action === 'read') {
        $id = !empty($_POST['id']) ? $_POST['id'] : null;
        $result = $conductor->read($id);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                return "Conductor encontrado.". print_r($row, true);
            }
        } else {
            return "No se encontraron coincidencias.";
        }

    } 
}
?>