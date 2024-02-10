<?php
session_start();
include '../clases/class.conexion.php';
include '../clases/class.cita.php';

if (!isset($_SESSION['ID']) || !isset($_SESSION['USER'])) {
    header('Location: ../../login.php');
    exit();
}

if (isset($_POST['citaId']) && isset($_POST['accion'])) {

    $citaId = $_POST['citaId'];
    $accion = $_POST['accion'];
    $cita = new cita($citaId, '', '', '', '');

    switch ($accion) {
        case 'eliminar':
           
            if ($cita->eliminar()) {
                echo "Cita eliminada correctamente.";
            } else {
                echo "Error al eliminar la cita. Por favor, inténtalo de nuevo más tarde.";
            }
            break;
        case 'aceptar':
            
            if ($cita->aceptarPostulacion()) {
                echo "Postulación aceptada correctamente.";
            } else {
                echo "Error al aceptar la postulación. Por favor, inténtalo de nuevo más tarde.";
            }
            break;
        case 'rechazar':
            
            if ($cita->rechazarPostulacion()) {
                echo "Postulación rechazada correctamente.";
            } else {
                echo "Error al rechazar la postulación. Por favor, inténtalo de nuevo más tarde.";
            }
            break;
        default:
            echo "Acción no válida.";
            break;
    }
} else {

    echo "ID de cita o acción no válidos.";
}


?>
