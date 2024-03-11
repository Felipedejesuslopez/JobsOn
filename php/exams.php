<?php
include '../clases/class.conexion.php';
include '../clases/class.examenmedico.php';
include '../clases/class.usuariopostulante.php';
//ini_set('display_errors',1);
//error_reporting(E_ALL);
$postulante = $_POST['postulante'];
$usuario = new usuariopostulante($postulante,null,null,null,null,null,null,null,null,null,null,null,null,null,null);
$post = $usuario->read()->fetch_array();
$postulacion = $_POST['postulacion'];
$details = $_POST['observaciones'];
$examen = new ExamenMedico(null,null,null,null,null,$postulacion,null,$details,'PENDIENTE',null);
$examen->create();
echo "<div class='alert alert-success'>Examenes médicos solicitados, a la espera de la respuesta del laboratorio</div>";