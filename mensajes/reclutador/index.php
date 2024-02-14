<?php
session_start();
include '../../clases/class.conexion.php';
include '../../clases/class.mensaje.php';
include '../../clases/class.usuariopostulante.php';

$mensaje = new mensaje(null, $_SESSION['ID'], $_SESSION['ID'], 'reclutador', 'reclutador', null, null, null);
$cha = $mensaje->chats();
?>
<div class="container">
    <center>
        <h1>Conversaciones</h1>
        <?php while ($chat = $cha->fetch_array()) {

            if ($chat['ID_EMISOR'] == $_SESSION['ID']) {
                $usuario = new usuariopostulante($chat['ID_RECEPTOR'], null, null, null, null, null, null, null, null, null, null, null, null, null, null);
                $iemisor = $chat['ID_EMISOR'];
                $rolemisor = $chat['ROL_EMISOR'];
                $ireceptor = $chat['ID_RECEPTOR'];
                $rolreceptor = $chat['ROL_RECEPTOR'];
            } else {
                $usuario = new usuariopostulante($chat['ID_EMISOR'], null, null, null, null, null, null, null, null, null, null, null, null, null, null);
                $iemisor = $chat['ID_RECEPTOR'];
                $rolemisor = $chat['ROL_RECEPTOR'];
                $ireceptor = $chat['ID_EMISOR'];
                $rolreceptor = $chat['ROL_EMISOR'];
            }
            $postulante = $usuario->read()->fetch_array();

        ?>
            <a href="mensajes/reclutador/chat/?ie=<?php echo $iemisor; ?>&ir=<?php echo $ireceptor; ?>&re=<?php echo $rolemisor;  ?>&rr=<?php echo $rolreceptor; ?>">
                <div class="row zoom-on-hover">
                    <div class="col-2">
                        <img src="img/profile/<?php echo $postulante['ID']; ?>.png" id="profile" style="width:80%; border-radius:50%;">
                    </div>
                    <div class="col-6">
                        <br>
                        <?php echo $postulante['NOMBRE'] . ' ' . $postulante['APELLIDOS']; ?>
                        <br>
                        <p>Ver Chat</p>
                    </div>
                </div>
                <hr>
            </a>
        <?php } ?>
        <hr>
    </center>
</div>