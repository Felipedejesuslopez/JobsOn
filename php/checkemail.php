<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
include '../clases/class.conexion.php';
include '../clases/class.usuariopostulante.php';
include '../clases/class.admin.php';
include '../clases/class.conductor.php';
include '../clases/class.empresa.php';
include '../clases/class.reclutador.php';
include '../clases/class.laboratorio.php';

$user = $_POST['username'];

$postulante = new usuariopostulante('', $user, $user, '', '', '', '', '', '', '', '', '', '', '', '');
$exist = $postulante->checkuser();
if ($exist == 1) {
    echo 1;
} else {
    $admin = new admin('', $user, '', $user, '', '', '', '', '');
    $ea = $admin->checkuser();
    if ($ea == 1) {
        echo 1;
    } else {
        $conductor = new conductor('', $user, $user, '', '', '', '', '', '', '', '', '', '', '', '');
        $ec = $conductor->checkemail();
        if ($ec == 1) {
            echo 1;
        } else {
            $empresa = new Empresa('', $user, '', '', '', '', '', '', '', $user, '');
            $ee = $empresa->checkemail();
            if ($ee == 1) {
                echo 1;
            } else {
                $reclutador = new reclutador('', $user, $user, '', '', '', '', '', '', '', '');
                $er = $reclutador->checkemail();
                if ($er == 1) {
                    echo 1;
                } else {
                    $laboratorio = new Laboratorio('', $user, $user, '', '', '', '', '', '', '', '', '');
                    $el = $laboratorio->checkemail();
                    if ($el == 1) {
                        echo 1;
                    } else {
                        echo 0;
                    }
                }
            }
        }
    }
}
