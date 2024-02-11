<?php
ini_set('display_errors',1);
error_reporting(E_ALL);

include '../clases/class.conexion.php';
include '../clases/class.usuariopostulante.php';

$user = $_POST['user'];
$psw = $_POST['psw'];

$usuario = new usuariopostulante('', $user, $user, $psw, '', '', '', '', $user, '', '', '', '', '','');
$tusuario = $usuario->login();


if ($tusuario == 1) {
    $_SESSION['tipo'] = 1;
    echo 1;
} else {
    include '../clases/class.admin.php';
    $admin = new admin('', $user, $psw, $user, '', '', '', $user, '');
    $tadmin = $admin->login();
    if ($tadmin == 1) {
        $_SESSION['tipo'] = 2;
        echo 1;
    } else {
        include '../clases/class.empresa.php';
        $empresa = new empresa('', $user, '', $user, '', '', '', '', $user, $user, $psw);
        $tempresa = $empresa->login();
        if ($tempresa == 1) {
            $_SESSION['tipo'] = 3;
            echo 1;
        } else {
            include '../clases/class.laboratorio.php';
            $laboratorio = new Laboratorio('', $user, $user, $psw, '', '', '', $user, '', '', '', '');
            $tlaboratorio = $laboratorio->login();
            if ($tlaboratorio == 1) {
                $_SESSION['tipo'] = 4;
                echo 1;
            } else {
                include '../clases/class.conductor.php';
                $conductor = new Conductor('', $user, $user,$psw,'','','','','','','','','',$user,'');
                $tconductor = $conductor->login();
                if($tconductor == 1){
                    $_SESSION['tipo'] = 5;
                    echo 1;
                }else{
                    include '../clases/class.reclutador.php';
                    $reclutador = new Reclutador('',$user,$user, $psw,'','',$user,'','','','');
                    $treclutador = $reclutador->login();
                    if($treclutador == 1){
                        $_SESSION['tipo'] = 6;
                        echo 1;
                    }else{
                        echo 0;
                    }
                }
            }
        }
    }
}
?>
