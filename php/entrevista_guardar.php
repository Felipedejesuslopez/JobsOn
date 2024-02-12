<?php
session_start();
include '../clases/class.conexion.php';
include '../clases/class.cita.php';

if (!isset($_SESSION['ID']) || !isset($_SESSION['USER'])) {
    header('Location: ../../login.php');
    exit();
}

if (isset($_POST['postulacionId']) && isset($_POST['fechaCita'])) {

    $postulacionId = $_POST['postulacionId'];
    $fechaCita = $_POST['fechaCita'];
    $cita = new Cita(null, $postulacionId, $fechaCita, '');
    $cita->create();

    header('Location: ../../jobson7/postulado/reclutador/entrevistas.php');
    exit();
} else {
    echo 'Error: No se han recibido todos los datos necesarios para agendar la cita.';
}
?>