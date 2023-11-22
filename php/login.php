<?php
include '../clases/class.conexion.php';
include '../clases/class.usuariopostulante.php';

$user = $_POST['user'];
$psw = md5($_POST['psw']);

$usuario = new usuariopostulante('', $user, $user, $psw, '', '', '', '', '', '', '', '', '', '', '');
$login = $usuario->login();

if ($login == true) {

    echo 1;

    //Aqui iremos agregando los otros tipos de usuario
} else {
    echo 0;
}
