<?php
include '../../clases/class.conexion.php';
include '../../clases/class.examenmedico.php';
include '../../clases/class.ofertalaboral.php';
include '../../clases/class.empresa.php';
include '../../clases/class.usuariopostulante.php';
include '../../clases/class.postulacion.php';
include '../../resources/const.php';
//ini_set('display_errors',1);
//error_reporting(E_ALL);

session_start();
$ci = $_SESSION['OP1'];
$ent = $_SESSION['OP2'];
$examen = new ExamenMedico(null, null, null, null, null, null, null, null, null, $ci);
$libres = $examen->libres();
include 'modals.php';
?>
<center>
    <h1>Solicitudes de Exámenes</h1>
</center>
<div class="container">
    <?php
    while ($pend = $libres->fetch_array()) {
        $postulacion = new postulacion($pend['POSTULACION'], null, null, null, null, null, null, null);
        $postu = $postulacion->read()->fetch_array();

        $vacabte = new OfertaLaboral($postu['VACANTE'], null, null, null, null, null, null, null, null, null, null, null);
        $oferta = $vacabte->read()->fetch_array();

        $empresa = new empresa($oferta['EMPRESA'], null, null, null, null, null, null, null, null, null, null);
        $emp = $empresa->read()->fetch_array();
    ?>
        <div class="card" id="<?php echo  $pend['ID']; ?>">
            <div class="card-header zoom-on-hover">
                <div class="row">
                    <div class="col-sm-1">
                        <img src="img/empresas/<?php echo $emp['ID']; ?>.jpg" alt="" class="img-fluid rounded-circle" style="width: 50px;">
                    </div>
                    <div class="col-sm-7">
                        <b>
                            <?php echo $oferta['TITULO']; ?>
                        </b>
                        <p style="color:gray; font-size:9pt;"><?php echo $pend['DESCRIPCION']; ?></p>
                        <div style="text-align: right;">
                            <?php echo $emp['NOMBRE']; ?>
                        </div>
                    </div>
                    <div class="col-sm-4 text-center text-sm-right mt-3 mt-sm-0">
                        <a href="Lab/Solicitudes/Agendar/?id=<?php echo $pend['ID']; ?>&act=agg" class="btn btn-outline-primary"><?php echo $l['agend'] ?></a>
                        <button onclick="$('#<?php echo $pend['ID']; ?>').hide()" class="btn btn-outline-danger ml-2 mt-2 mt-sm-0"><?php echo $l['rejecte'] ?></button>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
</div>