<style>
    body {
        overflow-y: hidden;
        padding-top: 5;
        margin: 0;
    }

    #content {
        width: 100%;
        /* Por ejemplo, ajusta el ancho según tus necesidades */
        margin: 0 auto;
        /* Para centrar el contenido horizontalmente */
        overflow-y: auto;
        /* Agrega scroll vertical si es necesario */
        height: 100vh;
        /* Establece la altura máxima */
    }
</style>
<?php
session_start();
include '../../../clases/class.conexion.php';
include '../../../clases/class.usuariopostulante.php';
include '../../../clases/class.mensaje.php';
include '../../../clases/class.reclutador.php';
ini_set('display_errprs', 1);
error_reporting(E_ALL);
$postu = new reclutador($_GET['ir'], null, null, null, null, null, null, null, null, null, null);
$usuario = $postu->read()->fetch_array();

$mensaje = new mensaje(null, $_GET['ie'], $_GET['ir'], $_GET['re'], $_GET['rr'], null, null, null);
$msjs = $mensaje->chat();
?>
<div class="row">
    <div class="col-2"></div>
    <div class="col-10">
        <div class="encabezado">
            <div class="row">
                <div class="col-2">
                    <img src="img/profile/<?php echo $usuario['ID']; ?>.png" style="width:80%; border-radius:20px;" alt="">
                </div>
                <div class="col-10">
                    <?php echo $usuario['NAME']; ?>
                </div> 
            </div>
        </div>
    </div>
</div>
<div class="chat">
    <?php
    while ($msj = $msjs->fetch_array()) {
        if ($_SESSION['ID'] == $msj['ID_EMISOR'] && $msj['ROL_EMISOR'] == 'postulante') {
            $clase = "message-sent";
        } else {
            $clase = "message-received";
        }
    ?>
        <div class="burbuja-shat <?php echo $clase; ?>">
            <?php echo $msj['MENSAJE']; ?>
            <p><?php echo $msj['HORA']; ?></p>
        </div>
    <?php
    }
    ?>
</div>
<div class="mensaje">
    <form id="mensaje">
        <input type="text" id="ID_EMISOR" name="ID_EMISOR" value="<?php echo $_GET['ie']; ?>" style="display: none;">
        <input type="text" id="ID_RECEPTOR" name="ID_RECEPTOR" value="<?php echo $_GET['ir']; ?>" style="display: none;">
        <input type="text" id="ROL_EMISOR" name="ROL_EMISOR" value="<?php echo $_GET['re']; ?>" style="display: none;">
        <input type="text" id="ROL_RECEPTOR" name="ROL_RECEPTOR" value="<?php echo $_GET['rr']; ?>" style="display: none;">
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Escribe tu mensaje aquí" name="mensaje" id="message" autofocus>
            <div class="input-group-append">
                <button type="button" onclick="sendmessage()" class="btn btn-outline-primary">
                    <i class="fas fa-paper-plane"></i>
                </button>
            </div>
        </div>
    </form>
</div>