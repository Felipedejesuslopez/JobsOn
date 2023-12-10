<?php
ini_set("display_errors", 1);
error_reporting(E_ALL);
require_once '../clases/class.conexion.php';
require_once '../clases/class.ofertalaboral.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $oferta = new OfertaLaboral(
        null,
        $_POST['titulo'],
        $_POST['descripcion'],
        $_POST['ubicacion'],
        $_POST['salario'],
        $_POST['requisitos'],
        $_POST['fechaPublicacion'],
        $_POST['fechaExpiracion'],
        $_POST['empresa'],
        $_POST['tipoContrato'],
        $_POST['nivelExperiencia'],
        $_POST['beneficios']
    );

    $resultado = $oferta->create();

    if ($resultado) {
        echo "<p style='color: green;'>Oferta registrada con éxito.</p>";
    } else {
        echo "<p style='color: red;'>Error al registrar la oferta.</p>";
    }
}
?>