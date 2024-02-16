<?php
include '../clases/class.conexion.php';
include '../clases/class.ofertalaboral.php';
include '../clases/class.postulacion.php';
include '../clases/class.usuariopostulante.php';
session_start();
$idoferta = $_GET['id'];
$oferta = new OfertaLaboral($idoferta, null, null, null, null, null, null, null, null, null, null, null);
$vac = $oferta->read()->fetch_array();;

$postulacion = new postulacion(null, $vac['ID'], null, null, null, null, null, null);
$dapo = $postulacion->read();
?>
<center>
    <h1>Seguimiento de la vacante <?php echo $vac['TITULO']; ?></h1>
</center>
<center>
    <h5>Postualantes que se han registrado a esta vacante</h5>
</center>
<?php
while ($datospo = $dapo->fetch_array()) {
    $post = new usuariopostulante($datospo['USUARIO'], null, null, null, null, null, null, null, null, null, null, null, null, null, null);
    $postulante = $post->read()->fetch_array();
?>
    <div class="row zoom-on-hover">
        <div class="col-8">

            <a href="postulacion/detalles/?id=<?php echo $datospo['ID']; ?>" class="card zoom-on-hover">
                <div class="card zoom-on-hover">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-3">
                                <img src="img/profile/<?php echo $postulante['ID']; ?>.png" style="width:75%;">
                            </div>
                            <div class="col-7"><br>
                                <h5><?php echo $postulante['NOMBRE'] . ' ' . $postulante['APELLIDOS']; ?></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-2">
            <a href="url_al_cv" class="btn btn-outline-danger" style="height:100%; width:100%;">

                <br>
                Ver CV
                <br>
                <i class="far fa-file-alt fa-2x"></i>
            </a>
        </div>
        <div class="col-2">
            <a href="mensajes/?re=reclutador&rr=postulante&ie=<?php echo $_SESSION['ID']; ?>&ir=<?php echo $postulante['ID']; ?>" class="btn btn-outline-dark" style="height:100%; width:100%; vertical-align:center; text-align:center;">
                <br>
                Enviar Mensaje
                <br>
                <i class="far fa-comment fa-2x"></i>
            </a>
        </div>
    </div>
<?php
}
?>