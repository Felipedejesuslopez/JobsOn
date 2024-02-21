<?php
session_start();
include '../clases/class.conexion.php';
include '../clases/class.reclutador.php';
include '../clases/class.entrevista.php';
include '../clases/class.postulacion.php';
include '../clases/class.ofertalaboral.php';
include '../clases/class.usuariopostulante.php';
include '../resources/const.php';

$reclutador = new reclutador($_SESSION['ID'], null, null, null, null, null, null, null, null, null, null);
$reclutador = $reclutador->read()->fetch_array();

$entrevista = new Entrevista(null, null, 'RECLUTADOR', $reclutador['ID'], null, null, null, null, null, null);
$entrevistas = $entrevista->read();
?>
<center>
    <h1>Entrevistad agendadas de <?php echo $reclutador['NAME']; ?></h1>
</center>
<div class="container">
    <div class="row">
        <?php while ($interview = $entrevistas->fetch_array()) {
            $postulacion = new postulacion($interview['POSTULACION'], null, null, null, null, null, null, null);
            $postulacion = $postulacion->read()->fetch_array();
            $vacante = new OfertaLaboral($postulacion['VACANTE'], null, null, null, null, null, null, null, null, null, null, null);
            $vacante = $vacante->read()->fetch_array();
            $postulante = new usuariopostulante($postulacion['USUARIO'], null, null, null, null, null, null, null, null, null, null, null, null, null, null);
            $postulante = $postulante->read()->fetch_array();

            if (is_dir('../imagenes_vacantes/' . $vacante['ID'] . '/')) {
                $archivos = scandir('../imagenes_vacantes/' . $vacante['ID'] . '/');
            } else if (is_dir('imagenes_vacantes/' . $vacante['ID'] . '/')) {
                $archivos = scandir('imagenes_vacantes/' . $vacante['ID'] . '/');
            } else {
                $archivos = [];
            }

            // Filtrar los archivos y directorios especiales (., ..)
            $archivos = array_diff($archivos, array('..', '.'));
            foreach ($archivos as $archivo) {
                $img = $archivo;
            }
        ?>

            <div class="col-sm-4">
                <div class="card zoom-on-hover" style="margin:2%;">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-4">
                                <img src="img/profile/<?php echo $postulante['ID']; ?>.png" alt="">
                            </div>
                            <div class="col-8">
                                <?php echo $vacante['TITULO']; ?> - <?php echo $postulante['NOMBRE']; ?>
                            </div>
                        </div>
                    </div>
                    <div class="card-body" style="background-image:url('imagenes_vacantes/<?php echo $vacante['ID'] ?>/<?php echo $img ?>'); background-size: cover;">
                        <div style="background: linear-gradient(rgba(255, 255, 255, 0.5), rgba(255, 255, 255, 0.5)); width: 100%; height: 100%;">

                            <?php echo date('d/m/Y', strtotime($interview['FECHA'])) . $l['at'] . date('H:i', strtotime($interview['HORA'])); ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        } ?>
    </div>
</div>