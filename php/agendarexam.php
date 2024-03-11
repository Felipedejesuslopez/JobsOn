<?php
include '../clases/class.conexion.php';
include '../clases/class.postulacion.php';
include '../clases/class.viaje.php';
include '../clases/class.examenmedico.php';
include '../clases/class.mensaje.php';
include '../clases/class.usuariopostulante.php';
include '../resources/const.php';
ini_set('display_errors', 1);
error_reporting(0);
session_start();
$hour = date('H:i:s', strtotime($_POST['hour']));
$fecha = date('Y-m-d', strtotime($_POST['date']));
$direccion = $_POST['direccion'];
$examen = $_POST['examen'];
if (isset($_POST['observaciones'])) {
    $observaciones = $_POST['observaciones'];
} else {
    $observaciones = null;
}
$emedico = new ExamenMedico($examen, null, null, null, null, null, null, null, null, null);
$examenmedico = $emedico->read()->fetch_array();

$es = new ExamenMedico($examen, $fecha, $hour, $_SESSION['ID'], intval($examenmedico['ID_USUARIO']), intval($examenmedico['POSTULACION']), null, $examenmedico['DESCRIPCION'], 'AGENDADO', $observaciones);
$es->update();

$postulacion = new postulacion($examenmedico['POSTULACION'], null, null, null, 'EXAMENES', null, null, null);
$postulacion->avanzar();
$postu = $postulacion->read()->fetch_array();

$postulante = new usuariopostulante($postu['USUARIO'], null, null, null, null, null, null, null, null, null, null, null, null, null, null);
$postulante = $postulante->read()->fetch_array();


$viaje = new viaje(null, $postu['USUARIO'], null, $fecha, $hour, null, null, $postulante['DIRECCION'], $direccion, 'PENDIENTE', null, null, null);
$viaje->create();

$message = $l['exag'] . ' ' . date('d/m/Y', strtotime($fecha)) . $l['eatag'] . date('H:i', strtotime($hour)) .  $l['exin'] . $direccion . $l['addagex'] . $examenmedico['O2'];;

$mensaje = new mensaje(null, $_SESSION['ID'], $postulante['ID'], 'laboratorio', 'postulante', $message, date('Y-m-d'), date('H:i:s'));
$mensaje->create();