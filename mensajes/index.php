<?php
include '../clases/class.conexion.php';
include '../clases/class.usuariopostulante.php';
$postulante = new usuariopostulante($_GET['ir'], null, null, null, null, null, null, null, null, null, null, null, null, null, null);
$dapo = $postulante->read()->fetch_array();
?>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>
                Enviar Mensaje a <?php echo $dapo['NOMBRE'] ?>:
            </h1>
        </div>
        <div class="card-body">
            <form id="mensaje">
                <input type="text" id="ID_EMISOR" name="ID_EMISOR" value="<?php echo $_GET['ie']; ?>" style="display: none;">
                <input type="text" id="ID_RECEPTOR" name="ID_RECEPTOR" value="<?php echo $_GET['ir']; ?>" style="display: none;">
                <input type="text" id="ROL_EMISOR" name="ROL_EMISOR" value="<?php echo $_GET['re']; ?>" style="display: none;">
                <input type="text" id="ROL_RECEPTOR" name="ROL_RECEPTOR" value="<?php echo $_GET['rr']; ?>" style="display: none;">
                <label for="mensaje">Redactar mensaje:</label>
                <textarea class="form-control" name="mensaje" id="message" cols="30" rows="5"><?php echo "Hola, " . $dapo['NOMBRE'] . ' te escribo por lo referente a tu postulación a la vacante...'; ?></textarea>
                <br>
                <button type="button" onclick="sendmessage()" style="width:100%;" class="btn btn-outline-primary">
                    Enviar mensaje
                </button>
            </form>
        </div>
    </div>
</div>