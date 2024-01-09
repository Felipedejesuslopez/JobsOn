<?php
ini_set("display_errors", 1);
error_reporting(E_ALL);

require_once '../clases/class.conexion.php';
require_once '../clases/class.ofertalaboral.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fechaPublicacion = date('Y-m-d');
    $usuarioID = obtenerUsuarioID();

    $directorioImagenes = "../imagenes_vacantes/{$usuarioID}/";

    if (!file_exists($directorioImagenes)) {
        mkdir($directorioImagenes, 0777, true);
    }

    $imagen1Tmp = $_FILES['imagen1']['tmp_name'];
    $imagen2Tmp = $_FILES['imagen2']['tmp_name'];
    $imagen3Tmp = $_FILES['imagen3']['tmp_name'];

    $nombreImagen1 = $_FILES['imagen1']['name'];
    $nombreImagen2 = $_FILES['imagen2']['name'];
    $nombreImagen3 = $_FILES['imagen3']['name'];

    move_uploaded_file($imagen1Tmp, $directorioImagenes . $nombreImagen1);
    move_uploaded_file($imagen2Tmp, $directorioImagenes . $nombreImagen2);
    move_uploaded_file($imagen3Tmp, $directorioImagenes . $nombreImagen3);

    $rutaImagen1 = $directorioImagenes . $nombreImagen1;
    $rutaImagen2 = $directorioImagenes . $nombreImagen2;
    $rutaImagen3 = $directorioImagenes . $nombreImagen3;

    $oferta = new OfertaLaboral(
        null,
        $_POST['titulo'],
        $_POST['descripcion'],
        $_POST['ubicacion'],
        $_POST['salario'],
        $_POST['requisitos'],
        $fechaPublicacion,
        $_POST['fechaExpiracion'],
        $_POST['empresa'],
        $_POST['tipoContrato'],
        $_POST['nivelExperiencia'],
        $_POST['beneficios']);
    

    $resultado = $oferta->create();

    if ($resultado) {
        echo "<p style='color: green;'>Oferta registrada con éxito.</p>";
    } else {
        echo "<p style='color: red;'>Error al registrar la oferta.</p>";
    }
}

function obtenerUsuarioID() {
    session_start();

    if (isset($_SESSION['usuario_id'])) {
        return $_SESSION['usuario_id'];
    } else {
        return 1;
    }
}
?>