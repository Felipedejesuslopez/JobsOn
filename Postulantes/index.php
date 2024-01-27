<?php
session_start();
include '../clases/class.conexion.php';
include '../clases/class.usuariopostulante.php';
$usuarios = new usuariopostulante('', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
$postul = $usuarios->read();
?>
<div>
    <center>
        <h1>Postulantes Registrados</h1>
    </center>
    <?php
    while ($postulante = $postul->fetch_array()) {
    ?>
        <div class="card zoom-on-hover">
            <div class="row">
                <div class="col-2">
                    <img src="img/profile/<?php echo $postulante['ID']; ?>.png" alt="" style="width:100%;">
                </div>
                <div class="col-sm-4 col-5">
                    <?php echo $postulante['NOMBRE'] . ' ' . $postulante['APELLIDOS']; ?>
                </div>
            </div>
        </div><br>
    <?php
    }
    ?>
</div>