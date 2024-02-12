<?php
include '../clases/class.conexion.php';  
include '../clases/class.laboratorio.php';


// Recibir los datos del formulario
$user = $_POST['user'];
$email = $_POST['email'];
$password = $_POST['password'];
$name = $_POST['name'];
$direccion = $_POST['direccion'];
$horario = $_POST['horario'];
$telefono = $_POST['telefono'];
$estatus = $_POST['estatus'];
$op1 = $_POST['op1'];
$op2 = $_POST['op2'];
$op3 = $_POST['op3'];

// Crear un nuevo objeto Laboratorio
$laboratorio = new Laboratorio(null, $user, $email, $password, $name, $direccion, $horario, $telefono, $estatus, $op1, $op2, $op3);

// Verificar si el correo electrónico o usuario ya están en uso
if ($laboratorio->checkemail()) {
    echo "El usuario o correo electrónico ya están registrados.";
} else {
    // Insertar el laboratorio
    $laboratorio->create();
    echo "Laboratorio insertado correctamente.";
}
?>