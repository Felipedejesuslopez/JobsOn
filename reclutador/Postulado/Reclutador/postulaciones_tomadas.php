<?php
session_start();
include '../../clases/class.conexion.php';
include '../../clases/class.ofertalaboral.php';
include '../../clases/class.reclutador.php';
include '../../clases/class.seguimiento.php';
ini_set('display_errors', 1);
error_reporting(E_ALL);

$reclutador = new reclutador($_SESSION['ID'], $_SESSION['USER'], $_SESSION['EMAIL'], '', '', '', '', '', '', '', '');
$reclutador = $reclutador->read()->fetch_array();

$ofertas = new OfertaLaboral('', '', '', '', '', '', '', '', '', '', '', '');
$vac = $ofertas->read();
?>

<div class="container">
    <center>
        <h1>Vacantes Disponibles para el Reclutador <?php echo $reclutador['NAME']; ?></h1>
    </center>
    <form id="formTomarPostulaciones">
        <?php
        while ($vacante = $vac->fetch_array()) {
            $seg = new seguimiento(null, $vacante['ID'], $_SESSION['ID'], null, null, null);
            $si = $seg->read();
            //vamos a ocultar si aparece porque significa que ya está en seguimiento
            if ($si->num_rows >= 1) {
                $oc = "display: block;";
            } else {
                $oc = "display: none;";
            }
        ?>
            <div class="card zoom-on-hover" style="width:100%; <?php echo $oc; ?> margin-bottom:3%;">
                <a href="seguimiento/?id=<?php $vacante['ID']; ?>">

                    <div class="card-body">
                        <div class="row">
                            <div class="col-2">
                                <?php
                                echo $vacante['ID'];
                                if (is_dir('../../imagenes_vacantes/' . $vacante['ID'] . '/')) {
                                    $archivos = scandir('../../imagenes_vacantes/' . $vacante['ID'] . '/');
                                } else if (is_dir('../imagenes_vacantes/' . $vacante['ID'] . '/')) {
                                    $archivos = scandir('../imagenes_vacantes/' . $vacante['ID'] . '/');
                                } else {
                                    $archivos = [];
                                }

                                $archivos = array_diff($archivos, array('..', '.'));
                                foreach ($archivos as $archivo) {
                                    $img = $archivo;
                                }
                                ?>
                                <img src="imagenes_vacantes/<?php echo $vacante['ID']; ?>/<?php echo $img; ?>" style="width:75%;">
                            </div>
                            <div class="col-7">
                                <h5><?php echo $vacante['TITULO']; ?></h5>
                            </div>
                            <div class="col-2">

                            </div>
                            <div class="col-1">

                            </div>
                        </div>
                    </div>
                </a>
            </div>
        <?php } ?>
    </form>
</div>