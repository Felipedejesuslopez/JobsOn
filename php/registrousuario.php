<?php
ini_set('display_errors',1);
error_reporting(E_ALL);
include '../clases/class.conexion.php';
include '../clases/class.usuariopostulante.php';
$datos = $_POST;

$usuario = new usuariopostulante('',$datos['user'],$datos['email'], $datos['psw'],$datos['nombre'],$datos['paterno'] . ' ' . $datos['materno'], strval($datos['nacimiento']), $datos['direccion'], $datos['telefono'],$datos['email'],'1','1','1','1','1');
$usuario->create();
echo 1;
?>