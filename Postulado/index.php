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
        <a href="Postulado/Detalles/?id=<?php echo $postus['ID']; ?>">
            <div class="card zoom-on-hover" style="width:100%;">
                <div class="card-body">
                    <div class="row">
                        <div class="col-2">
                            <?php
                            if (is_dir('../imagenes_vacantes/' . $vac['ID'] . '/')) {
                                $archivos = scandir('../imagenes_vacantes/' . $vac['ID'] . '/');
                            } else {
                                $archivos = scandir('imagenes_vacantes/' . $vac['ID'] . '/');
                            }

                            // Filtrar los archivos y directorios especiales (., ..)
                            $archivos = array_diff($archivos, array('..', '.'));
                            foreach ($archivos as $archivo) {
                                $img = $archivo;
                            }
                            ?>
                            <img src="imagenes_vacantes/<?php echo $vac['ID']; ?>/<?php echo $img; ?>" style="width:75%;">
                        </div>
                        <div class="col-7">
                            <h5><?php echo $vac['TITULO']; ?></h5>
                        </div>
                        <div class="col-3">
                            <p>
                                <?php echo $postus['ESTATUS']; ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </a>

    <?php

    }
    ?>
</div>