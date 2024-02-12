<?php
session_start();

include '../../clases/class.conexion.php';
include '../../clases/class.postulacion.php';
include '../../clases/class.ofertalaboral.php';
include '../../clases/class.reclutador.php';

$reclutador = new reclutador($_SESSION['ID'], $_SESSION['USER'], $_SESSION['EMAIL'], '', '', '', '', '', '', '', '');
$postulacion = new postulacion('', '', '', '', '', '');
$postulacionesDisponibles = $postulacion->readNoTomadas();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Postulaciones Disponibles</title>
</head>
<body>
    <div class="container">
        <center>
            <h1>Postulaciones Disponibles para el Reclutador <?php echo $reclutador->getUser(); ?></h1>
        </center>
        <form id="formTomarPostulaciones">
            <?php
            while ($postulacionDisponible = $postulacionesDisponibles->fetch_array()) {
                $vacante = new OfertaLaboral($postulacionDisponible['VACANTE'], '', '', '', '', '', '', '', '', '', '', '');
                $vac = $vacante->read()->fetch_array();
            ?>
            <div class="card zoom-on-hover" style="width:100%;">
                <div class="card-body">
                    <div class="row">
                        <div class="col-2">
                            <?php
                            if (is_dir('../../imagenes_vacantes/' . $vac['ID'] . '/')) {
                                $archivos = scandir('../../imagenes_vacantes/' . $vac['ID'] . '/');
                            } else {
                                $archivos = scandir('../imagenes_vacantes/' . $vac['ID'] . '/');
                            }

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
                        <div class="col-2">
                            <p>
                                <?php echo $postulacionDisponible['ESTATUS']; ?>
                            </p>
                        </div>
                        <div class="col-1">
                            <input type="checkbox" name="postulacionesSeleccionadas[]" value="<?php echo $postulacionDisponible['ID']; ?>">
                        </div>
                    </div>
                </div>
            </div>
            <?php
            }
            ?>
            <button type="button" id="btnTomarPostulaciones">Tomar Postulaciones</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#btnTomarPostulaciones').click(function() {
                var postulacionesSeleccionadas = [];
                $('input[name="postulacionesSeleccionadas[]"]:checked').each(function() {
                    postulacionesSeleccionadas.push($(this).val());
                });

                $.ajax({
                    type: 'POST',
                    url: '../../JobsOn7/php/seguimiento.php',
                    data: {
                        tomarPostulaciones: true,
                        postulacionesSeleccionadas: postulacionesSeleccionadas
                    },
                    success: function(response) {
                        alert('¡Las postulaciones han sido tomadas correctamente!');
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        alert('Error al tomar las postulaciones. Por favor, inténtalo de nuevo más tarde.');
                    }
                });
            });
        });
    </script>
</body>
</html>