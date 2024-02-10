<?php
session_start();
include '../clases/class.conexion.php';
include '../clases/class.postulacion.php';
include '../clases/class.reclutador.php';

if (!isset($_SESSION['ID']) || !isset($_SESSION['USER'])) {
    header('Location: ../../index.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['tomarPostulaciones'])) {
        if (isset($_POST['postulacionesSeleccionadas'])) {
            $reclutador = new reclutador($_SESSION['ID'], $_SESSION['USER'], $_SESSION['EMAIL'], '', '', '', '', '', '', '', '');
            $postulacionesSeleccionadas = $_POST['postulacionesSeleccionadas'];

            foreach ($postulacionesSeleccionadas as $idPostulacion) {
                $postulacion = new postulacion($idPostulacion);
                $postulacion->setTomada(true);
                $postulacion->setIdReclutador($reclutador->getId());
                $postulacion->updateTomadaByReclutador();
            }

            header('Location: ../../jobson7/postulado/reclutador/postulaciones_tomadas.php');
            exit();
        }
    }
}
?>
