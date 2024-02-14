<?php 
date_default_timezone_set('America/Mexico_City');
ini_set('display_errors',1);
error_reporting(E_ALL);
include '../clases/class.conexion.php';
include '../clases/class.mensaje.php';
//print_r($_POST);
$mensaje = new mensaje(null,intval($_POST['ID_EMISOR']),intval($_POST['ID_RECEPTOR']),$_POST['ROL_EMISOR'],$_POST['ROL_RECEPTOR'],$_POST['mensaje'],date('Y-m-d'), date('H:i:s'));
$mensaje->create();
echo 1;