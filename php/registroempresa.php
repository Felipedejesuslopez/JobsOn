<?php
ini_set("display_errors", 1);
error_reporting(E_ALL);
require_once '../clases/class.conexion.php';
require_once '../clases/class.empresa.php';

function mostrarMensaje($mensaje, $tipo = 'success')
{
    echo "<div style='color: " . ($tipo === 'success' ? 'green' : 'red') . "; margin-bottom: 10px;'>{$mensaje}</div>";
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $empresa = new Empresa(
        $_POST['id'],
        $_POST['nombre'],
        $_POST['direccion'],
        $_POST['telefono'],
        $_POST['descripcion'],
        $_POST['sector'],
        $_POST['contactoNombre'],
        $_POST['contactoCorreo'],
        $_POST['sitioWeb'],
        $_POST['correo'],
        $_POST['psw']
    );

    $empresa->create();
    mostrarMensaje("Empresa creada con éxito.");
}
