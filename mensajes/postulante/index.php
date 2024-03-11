<?php
session_start();
include '../../clases/class.conexion.php';
include '../../clases/class.mensaje.php';
include '../../clases/class.usuariopostulante.php';
include '../../clases/class.reclutador.php';
include '../../clases/class.empresa.php';

$mensaje = new mensaje(null, $_SESSION['ID'], $_SESSION['ID'], 'postulante', 'postulante', null, null, null);
$cha = $mensaje->chats();
?>
<div class="container">
    <center>
        <h1>Conversaciones</h1>
        <div class="list-group">
            <?php while ($chat = $cha->fetch_array()) {

                if ($chat['ID_EMISOR'] == $_SESSION['ID'] && $chat['ROL_EMISOR'] == 'postulante') {

                    // Resto del código omitido por brevedad...
                    if ($chat['ROL_RECEPTOR'] == 'reclutador') {

                        $usuario = new reclutador($chat['ID_RECEPTOR'], null, null, null, null, null, null, null, null, null, null);
                        $iemisor = $chat['ID_EMISOR'];
                        $rolemisor = $chat['ROL_EMISOR'];
                        $ireceptor = $chat['ID_RECEPTOR'];
                        $rolreceptor = $chat['ROL_RECEPTOR'];

                        $postulante = $usuario->read()->fetch_array();
                        $foto = 'imagenes_reclutador/' . $postulante['FOTO'];
                        $nombre = $postulante['NAME'];
                    } else if ($chat['ROL_RECEPTOR'] == 'empresa') {

                        $usuario = new Empresa($chat['ID_RECEPTOR'], null, null, null, null, null, null, null, null, null, null);
                        $iemisor = $chat['ID_EMISOR'];
                        $rolemisor = $chat['ROL_EMISOR'];
                        $ireceptor = $chat['ID_RECEPTOR'];
                        $rolreceptor = $chat['ROL_RECEPTOR'];
                        $empresa = $usuario->read()->fetch_array();

                        $foto = 'img/empresas/' . $empresa['ID'] . '.jpg';
                        $nombre = $empresa['NOMBRE'];
                    }
                } else {
                    if ($chat['ROL_EMISOR'] == 'reclutador') {

                        $usuario = new reclutador($chat['ID_EMISOR'], null, null, null, null, null, null, null, null, null, null);
                        $iemisor = $chat['ID_EMISOR'];
                        $rolemisor = $chat['ROL_EMISOR'];
                        $ireceptor = $chat['ID_RECEPTOR'];
                        $rolreceptor = $chat['ROL_RECEPTOR'];

                        $postulante = $usuario->read()->fetch_array();
                        $foto = 'imagenes_reclutador/' . $postulante['FOTO'];
                        $nombre = $postulante['NAME'];
                    } else if ($chat['ROL_EMISOR'] == 'empresa') {

                        $usuario = new Empresa($chat['ID_EMISOR'], null, null, null, null, null, null, null, null, null, null);
                        $iemisor = $chat['ID_EMISOR'];
                        $rolemisor = $chat['ROL_EMISOR'];
                        $ireceptor = $chat['ID_RECEPTOR'];
                        $rolreceptor = $chat['ROL_RECEPTOR'];
                        $empresa = $usuario->read()->fetch_array();

                        $foto = 'img/empresas/' . $empresa['ID'] . '.jpg';
                        $nombre = $empresa['NOMBRE'];
                    }
                }


            ?> <a href="mensajes/postulante/chat/?ie=<?php echo $iemisor; ?>&ir=<?php echo $ireceptor; ?>&re=<?php echo $rolemisor;  ?>&rr=<?php echo $rolreceptor; ?>" class="list-group-item list-group-item-action">
                    <div class="d-flex w-100 justify-content-between">
                        <img src="<?php echo $foto; ?>" id="profile" class="img-fluid rounded-circle d-none d-lg-block" style="width:100px; height:100px;">
                        <img src="<?php echo $foto; ?>" id="profile" class="img-fluid rounded-circle d-lg-none" style="width:50px; height:50px;">
                        <h5 class="mb-1"><?php echo $nombre; ?></h5>
                    </div>
                    <small>Ver Chat</small>
                </a>
            <?php } ?>
            <hr>
        </div>
    </center>
</div>