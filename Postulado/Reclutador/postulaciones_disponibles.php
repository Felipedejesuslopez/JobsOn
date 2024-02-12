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
            <h1>Vacantes Disponibles para el Reclutador <?php echo $reclutador['NAME']; ?></h1>
        </center>
        <form id="formTomarPostulaciones">
            <?php
            while ($vacante = $vac->fetch_array()) {
                $seg = new seguimiento(null, $vacante['ID'], null, null, null, null);
                $si = $seg->read();
                //vamos a ocultar si aparece porque significa que ya está en seguimiento
                if ($si->num_rows >= 1) {
                    $oc = "display: none;";
                } else {
                    $oc = "display: block;";
                }
            ?>
                <div class="card zoom-on-hover" style="width:100%; <?php echo $oc; ?>">
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
                                <input type="checkbox" name="postulacionesSeleccionadas[]" value="<?php echo $vacante['ID']; ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <br>
            <?php } ?>
            <button type="button" id="btnTomarPostulaciones">Tomar Postulaciones</button>
        </form>
    </div>

    <script>
        $(document).ready(function() {
            $('#btnTomarPostulaciones').click(function() {
                var postulacionesSeleccionadas = [];
                $('input[name="postulacionesSeleccionadas[]"]:checked').each(function() {
                    postulacionesSeleccionadas.push($(this).val());
                });

                $.ajax({
                    method: 'POST',
                    url: 'php/seguimiento.php',
                    data: {
                        tomarPostulaciones: true,
                        postulacionesSeleccionadas: postulacionesSeleccionadas
                    }
                }).done(function(msg) {
                    console.log(msg);
                    $('#aviso').html('<div class="alert alert-success">¡Vacante tomada para dar seguimiento!</div>');
                    $('#modalavisos').modal('show');
                }).fail(function(e) {
                    console.log(e);
                });
            });
        });
    </script>
</body>

</html>