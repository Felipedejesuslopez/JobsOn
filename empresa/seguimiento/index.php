<center>
    <h1>Seguimiento de Vacantes</h1>
</center>
<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
include '../../clases/class.conexion.php';
include '../../clases/class.ofertalaboral.php';
include '../../clases/class.postulacion.php';
session_start();

$oferta = new OfertaLaboral(null, null, null, null, null, null, null, null, $_SESSION['ID'], null, null, null);
$ol = $oferta->read();
while ($oflaboral = $ol->fetch_array()) {
    
    if (is_dir('../../imagenes_vacantes/' . $oflaboral['ID'] . '/')) {
        $archivos = scandir('../../imagenes_vacantes/' . $oflaboral['ID'] . '/');
    } else if (is_dir('../imagenes_vacantes/' . $oflaboral['ID'] . '/')) {
        $archivos = scandir('../imagenes_vacantes/' . $oflaboral['ID'] . '/');
    } else {
        $archivos = [];
    }

    $archivos = array_diff($archivos, array('..', '.'));
    foreach ($archivos as $archivo) {
        $img = $archivo;
    }

    $postu = new postulacion(null, $oflaboral['ID'], null, null, null, null);
    $postulacion = $postu->read();
    if ($postulacion = $postulacion->fetch_array()) {
        $noshow = "";
    } else {
        $noshow = "display: none;";
    }

?>
    <a href="empresa/seguimiento/detalles/?id=<?php echo $oflaboral['ID']; ?>">
        <div class="card zoom-on-hover" style="<?php echo $noshow; ?>">
            <div class="card-body">
                <div class="row">
                    <div class="col-2">
                        <img src="<?php echo 'imagenes_vacantes/' . $oflaboral['ID'] . '/' . $img ?>" alt="" style="width:85%;">
                    </div>
                    <div class="col-4">
                        <?php echo $oflaboral['TITULO']; ?>
                        <br>
                        <p><?php echo date('d-m-Y', strtotime($oflaboral['FECHA_PUBLICACION'])); ?></p>
                    </div>
                    <div class="col-2"></div>
                    <div class="col-4" style="text-align:right;"><p><?php echo $postulacion['ESTATUS']; ?></p></div>
                </div>
            </div>
        </div>
    </a>
    <br>
<?php
}
