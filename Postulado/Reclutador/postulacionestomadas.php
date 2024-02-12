<?php
session_start();
include '../../clases/class.conexion.php';
include '../../clases/class.postulacion.php';
include '../../clases/class.ofertalaboral.php';
include '../../clases/class.reclutador.php';

$reclutador = new Reclutador($_SESSION['ID'], $_SESSION['USER'], $_SESSION['EMAIL'], '', '', '', '', '', '', '', '');
$postulacion = new Postulacion('', '', '', '', '', '');
$postulacionesTomadas = $postulacion->readTomadasByReclutador($reclutador);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Postulaciones Tomadas por el Reclutador</title>
</head>
<body>
    <div class="container">
        <center>
            <h1>Postulaciones Tomadas por el Reclutador <?php echo $reclutador->getUser(); ?></h1>
        </center>
        <?php
        while ($postulacionTomada = $postulacionesTomadas->fetch_array()) {
            $vacante = new OfertaLaboral($postulacionTomada['VACANTE'], null, null, null, null, null, null, null, null, null, null, null);
        ?>
            <div class="card zoom-on-hover" style="width:100%;">
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            <p>Vacante: <?php echo $vacante->getTitulo(); ?></p>
                        </div>
                        <div class="col-3">
                            <p>Usuario: <?php echo $postulacionTomada['USUARIO']; ?></p>
                        </div>
                        <div class="col-3">
                            <p>Estatus: <?php echo $postulacionTomada['ESTATUS']; ?></p>
                        </div>
                        <div class="col-3">
                            <form id="formAgendarCita_<?php echo $postulacionTomada['ID']; ?>" method="post">
                                <input type="hidden" name="postulacionId" value="<?php echo $postulacionTomada['ID']; ?>">
                                <label for="fechaCita">Fecha de la Cita:</label>
                                <input type="date" id="fechaCita_<?php echo $postulacionTomada['ID']; ?>" name="fechaCita" required>
                                <button type="button" onclick="agendarCita(<?php echo $postulacionTomada['ID']; ?>)">Agendar Cita</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    function agendarCita(postulacionId) {
        var fechaCita = $('#fechaCita_' + postulacionId).val();

        $.ajax({
            type: 'POST',
            url: '../../jobsOn7/php/entrevista_guardar.php',
            data: {
                postulacionId: postulacionId,
                fechaCita: fechaCita
            },
            success: function(response) {

                alert('La cita se genero correctamente');
            },
            error: function(xhr, status, error) {

                console.error(error);
                alert('Error al agendar la cita. Por favor, inténtalo de nuevo más tarde.');
            }
        });
    }
    </script>
</body>
</html>