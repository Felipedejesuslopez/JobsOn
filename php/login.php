<?php
include '../clases/class.conexion.php';
include '../clases/class.usuariopostulante.php';

$user = $_POST['user'];
$psw = $_POST['psw'];

$usuario = new usuariopostulante('', $user, $user, $psw, '', '', '', '', '', '', '', '', '', '', '');
$tusuario = $usuario->login();


if($tusuario == 0){

}else if()
