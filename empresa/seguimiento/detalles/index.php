<?php
session_start();
include '../../../clases/class.conexion.php';
include '../../../clases/class.usuariopostulante.php';
include '../../../clases/class.ofertalaboral.php';
include '../../../clases/class.postulacion.php';
$of = new OfertaLaboral($_GET['id'], null, null, null, null, null, null, null, null, null, null, null);
$oferta = $of->read()->fetch_array();

$post = new postulacion(null, $oferta['ID'], null, null, null, null);
$posts = $post->read();
?>
<center>
    <h1>Postulaciones a <?php echo $oferta['TITULO'] ?></h1>
</center>
<?php
while ($postulacion = $posts->fetch_array()) {
    $us = new usuariopostulante($postulacion['USUARIO'], null, null, null, null, null, null, null, null, null, null, null, null, null, null);
    $usuario = $us->read()->fetch_array();
?>
    <a href="postulacion/detalles/?id=<?php echo $postulacion['ID']; ?>">
        <div class="card zoom-on-hover">
            <div class="row">
                <div class="col-2">

                    <img src="img/profile/<?php echo $usuario['ID']; ?>.png" alt="" style="width:75%; cursor:pointer;" onclick="window.open('curriculum/pdf/?id=<?php echo $usuario['ID']; ?>','_blank')">

                </div>
                <div class="col-4">
                    <br>
                    <h6 onclick="window.open('curriculum/pdf/?id=<?php echo $usuario['ID']; ?>','_blank')"><?php echo $usuario['NOMBRE'] . ' ' . $usuario['APELLIDOS']; ?></h6>
                </div>
                <div class="col-3">
                    <br>
                    <p><?php echo date('d-m-Y', strtotime($postulacion['FECHA'])); ?></p>
                </div>
                <div class="col-3">
                    <br>
                    <?php echo $postulacion['ESTATUS']; ?>
                </div>
            </div>
        </div>
    </a>
    <br>
<?php
}
?>