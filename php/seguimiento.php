<?php
session_start();
include '../clases/class.conexion.php';
include '../clases/class.seguimiento.php';
ini_set('display_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['tomarPostulaciones'])) {
        if (isset($_POST['postulacionesSeleccionadas'])) {
            $postulacionesSeleccionadas = $_POST['postulacionesSeleccionadas'];

            foreach ($postulacionesSeleccionadas as $idPostulacion) {
                $seguimiento = new seguimiento(null,$idPostulacion,$_SESSION['ID'],date('Y-m-d'),null,null);
                $seguimiento->create();
            }
        }
    }
}
