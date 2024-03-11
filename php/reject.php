<?php
include '../clases/class.conexion.php';
include '../clases/class.postulacion.php';
include '../clases/class.rechazos.php';
include '../clases/class.mensaje.php';
include '../clases/class.ofertalaboral.php';
include '../clases/class.rejects.php';
include '../resources/const.php';
ini_set('display_errors', 1);
error_reporting(E_ALL);

$agendador = $_POST['agendador'];
$postulacionid = intval($_POST['postulacion']);
$rol = $_POST['rol'];
$observaciones = $_POST['observaciones'];
$postulacion = new postulacion($postulacionid, null, null, null, 'RECHAZADO', date('Y-m-d'), null, null);
$postulacion->avanzar();
$postulacion = $postulacion->read()->fetch_array();

$rechazo = new rejects(null, $postulacionid, $observaciones, date('Y-m-d'));
$rechazo->create();

$vacante = new OfertaLaboral($postulacion['VACANTE'], null, null, null, null, null, null, null, null, null, null, null);
$vacante = $vacante->read()->fetch_array();

$mensaje = '<div class="alert alert-danger">' . $l['rechazopt1'] .  ' ' . $vacante['TITULO'] . $l['rechazopt2'] . '</div><br><br>' . $observaciones;
$mensaje = new mensaje(null, $agendador, $postulacion['USUARIO'], $rol, 'postulante', $mensaje, date('Y-m-d'), date('H:i:s'));
$mensaje->create();
