<?php
session_start();
include '../clases/class.conexion.php';
include '../clases/class.postulacion.php';
include '../clases/class.ofertalaboral.php';
$postulacion = new postulacion('', '', $_SESSION['ID'], '', '', '');
$posts = $postulacion->read();
?>
<div class="container">
    <center>
        <h1>Vacantes a las que te has postulado</h1>
    </center>
    <?php
    while ($postus = $posts->fetch_array()) {
        $vacante = new OfertaLaboral($postus['VACANTE'], '', '', '', '', '', '', '', '', '', '', '');
        $vac = $vacante->read()->fetch_array();
    ?>

        <div class="card" style="width:100%;">
            <div class="col-6">
                <h3><?php echo $vac['TITULO']; ?></h3>
            </div>
            <div class="col-6"></div>
        </div>
    <?php

    }
    ?>
</div>