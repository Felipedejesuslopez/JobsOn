<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
include '../clases/class.conexion.php';
include '../clases/class.usuariopostulante.php';
include '../clases/class.ofertalaboral.php';
include '../clases/class.postulacion.php';

$postulacion = new postulacion('', $_POST['usuario'], $_POST['vacante'], date('Y-m-d'), 'POSTULADO', '');
$postulacion->create();
?>
<div style="background-image: url('img/Alertas/register.png'); background-repeat:no-repeat; background-size:100% 100%;">
    <div class="row">
        <div class="col-4"></div>
        <div class="col-8">
            <div class="testo" style="text-align: center; color:black;">
                <h5>
                    ¡Genial!
                </h5>
                <p id="animatedText" style="font-size: 8pt; color: black;">
                    Tu postulación ha sido registrada, en breve uno de nuestros reclutadores te contactará para decirte los pasos a seguir
                </p>
                <br>
            </div>
        </div>
    </div>
</div>