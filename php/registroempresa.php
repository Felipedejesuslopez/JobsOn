<?php
include '../clases/class.empresa.php';
include '../clases/class.conexion.php';

// Recopilar datos del formulario
$nombre = $_POST['nombre'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$descripcion = $_POST['descripcion'];
$sector = $_POST['sector'];
$contactoNombre = $_POST['contactoNombre'];
$contactoCorreo = $_POST['contactoCorreo'];
$sitioWeb = $_POST['sitioWeb'];
$correo = $_POST['correo'];
$psw = $_POST['psw'];

// Crear una instancia de la clase Empresa
$empresa = new Empresa(null, $nombre, $direccion, $telefono, $descripcion, $sector, $contactoNombre, $contactoCorreo, $sitioWeb, $correo, $psw);

// Insertar la empresa en la base de datos
$empresa->create();


?>
