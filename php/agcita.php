<?php
ini_set('display_errors',1);
error_reporting(E_ALL);

include '../clases/class.conexion.php';
include '../clases/class.postulacion.php';
include '../clases/class.citas.php';
include '../clases/class.usuariopostulante.php';
include '../clases/class.ofertalaboral.php';
include '../clases/class.vacantes.php';
include '../clases/class.empresa.php';
include '../resources/const.php';
if ($_POST['observaciones'] != '') {
    $observaciones = $_POST['observaciones'];
} else {
    $observaciones = $l['noobservaciones'];
}

$fecha = $_POST['date'];
$hora = $_POST['hour'];
$fechora = $fecha . ' ' . $hora;
$agendador = $_POST['agendador'];
$rol = $_POST['rol'];

$postulacion = new postulacion($_POST['postulacion'], null, null, null, 'CITA', null, null, null);
$postulacion->avanzar();
$dapos = $postulacion->read()->fetch_array();

$vacante = new OfertaLaboral($dapos['VACANTE'], null, null, null, null, null, null, null, null, null, null, null);
$vacante = $vacante->read()->fetch_array();

$cita = new cita(null, $_POST['postulacion'], $fechora, $vacante['EMPRESA'], 'PENDIENTE');
$cita->create();

$detallesvac = new vacantes($dapos['VACANTE'], null, null, null, null, null, null, null, null, null, null, null);
$detallesvacantes = $detallesvacantes->read()->fetch_array();

$usuario = new usuariopostulante($dapos['USUARIO'], null, null, null, null, null, null, null, null, null, null, null, null, null, null);
$postulante = $usuario->read()->fetch_array();

$empresa = new Empresa($vacante['EMPRESA'], null, null, null, null, null, null, null, null, null, null);
$empresa = $empresa->read()->fetch_array();

$viaje = new viaje(null, $dapos['USUARIOS'], null, date('Y-m-d', strtotime($fecha)), date('H:i:s', strtotime($hora)), null, null, $postulante['DIRECCION'], $empresa['DIRECCION'] . ' ' . $detallesvacantes['PLANTA'], 'PENDIENTE', null, null, null);
$viaje->create();
