<?php
include '../../../clases/class.conexion.php';
include '../../../clases/class.examenmedico.php';
include '../../../clases/class.postulacion.php';
include '../../../clases/class.ofertalaboral.php';
include '../../../clases/class.usuariopostulante.php';
include '../../../clases/class.empresa.php';
include '../../../resources/const.php';
session_start();
$examenmedico = new ExamenMedico($_GET['id'], null, null, null, null, null, null, null, null . null, null);
$examen = $examenmedico->read()->fetch_array();

$postulacion = new postulacion($examen['POSTULACION'], null, null, null, null, null, null, null);
$postulacion = $postulacion->read()->fetch_array();

$vacante = new OfertaLaboral($postulacion['VACANTE'], null, null, null, null, null, null, null, null, null, null, null);
$vacant = $vacante->read()->fetch_array();

$empresa = new Empresa($vacant['EMPRESA'], null, null, null, null, null, null, null, null, null, null);
$empresa = $empresa->read()->fetch_array();

$postulante = new usuariopostulante($postulacion['USUARIO'], null, null, null, null, null, null, null, null, null, null, null, null, null, null);
$postulante  = $postulante->read()->fetch_array();

if (isset($_GET['act'])) {
    if ($_GET['act'] == 'agg') {
?>
        <center>
            <h1><?php echo $l['agex'] . $postulante['NOMBRE'] . ' ' . $postulante['APELLIDOS']; ?></h1>
        </center>
        <div class="container">
            <form action="php/agendarexam.php" method="post">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="date"><?php echo $l['fecha'] ?></label>
                            <input type="date" name="date" class="form-control" reqiuired>
                            <input type="text" name="examen" value="<?php echo $examen['ID']; ?>" style="display: none;">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="hour"><?php echo $l['hour']; ?></label>
                            <input type="time" name="hour" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="direccion"><?php echo $l['ubication'] . '(' . $l['details'] . ')'; ?></label>
                            <textarea name="direccion" id="direccion" cols="30" rows="3" class="form-control" reqiuired><?php
                                                                                                                echo $_SESSION['DIRECCION'] . ' ' . $_SESSION['NAME'] . ', ' . $_SESSION['OP1'] . ', ' . $_SESSION['OP2'];
                                                                                                                ?></textarea>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="observaciones">Redactar Observaciones (requsitos)</label>
                            <textarea name="observaciones" id="observaciones" cols="30" rows="3" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                <button type="submit" style="width:100%;" class="btn btn-outline-primary"><?php echo $l['agend']; ?></button>
            </form>
        </div>
<?php
    }
} else {
    echo "No deberías estar aquí <a href='Lab/Calendar/'>Regresar</a>";
}
