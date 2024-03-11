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

    .reclutador-img {
        max-width: 100%;
        max-height: 60%;
    }

    .empresa-img {
        max-width: 50%;
        max-height: 40%;
    }

    .reclutador-name {
        font-size: 1.2em;
    }

    .empresa-name {
        font-size: 1em;
    }

    @media (min-width: 768px) {
        .img-profile {
            max-width: 100%;
            max-height: 60%;
        }
    }
</style>
<?php
session_start();
include '../../../clases/class.conexion.php';
include '../../../clases/class.usuariopostulante.php';
include '../../../clases/class.mensaje.php';
if ($_GET['re'] == 'postulante') {
    $emisor = 'postulante';
    $iemisor = $_GET['ie'];
    $receptor = $_GET['rr'];
    $ireceptor = $_GET['ir'];
} else if ($_GET['rr'] == 'postulante') {
    $emisor = 'postulante';
    $iemisor = $_GET['ir'];
    $receptor = $_GET['re'];
    $ireceptor = $_GET['ie'];
}

//ini_set('display_errors', 1);
error_reporting(E_ALL);
if ($_GET['rr'] == 'reclutador' || $_GET['re'] == 'reclutador') {
    include '../../../clases/class.reclutador.php';
    $postu = new reclutador($_GET['ir'], null, null, null, null, null, null, null, null, null, null);
    $usuario = $postu->read()->fetch_array();
    $nombre = $usuario['NAME'];
    $foto = 'imagenes_reclutador/' . $usuario['FOTO'];
} else if ($_GET['rr'] == 'empresa' || $_GET['re'] == 'empresa') {
    include '../../../clases/class.empresa.php';
    $postu = new Empresa($_GET['ir'], null, null, null, null, null, null, null, null, null, null);
    $usuario = $postu->read()->fetch_array();
    $nombre = $usuario['NOMBRE'];
    $foto = 'img/empresas/' . $usuario['ID'] . '.jpg';
} else if ($_GET['rr'] == 'laboratorio' || $_get['re'] == 'laboratorio') {
}

$mensaje = new mensaje(null, $_GET['ie'], $_GET['ir'], $_GET['re'], $_GET['rr'], null, null, null);
$msjs = $mensaje->chat();
?>
<div class="row">
    <div class="col-2"></div>
    <div class="col-10">
        <div class="encabezado">
            <div class="row">
                <div class="col-4 col-md-2">
                    <img src="<?php echo $foto; ?>" class="img-fluid rounded-circle img-profile" alt="">
                </div>
                <div class="col-8 col-md-10">
                    <?php echo $nombre; ?>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="chat" id="chat-container">
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
        <input type="text" id="ID_EMISOR" name="ID_EMISOR" value="<?php echo $iemisor; ?>" style="display: none;">
        <input type="text" id="ID_RECEPTOR" name="ID_RECEPTOR" value="<?php echo $ireceptor; ?>" style="display: none;">
        <input type="text" id="ROL_EMISOR" name="ROL_EMISOR" value="<?php echo $emisor; ?>" style="display: none;">
        <input type="text" id="ROL_RECEPTOR" name="ROL_RECEPTOR" value="<?php echo $receptor; ?>" style="display: none;">
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