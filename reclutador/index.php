<?php 
include '../clases/class.conexion.php';
include '../clases/class.reclutador.php';
$rec = new reclutador('','','','','','','','','','','');
$reclu = $rec->read();
?>
<div>
    <center>
        <h1>Reclutadores Activos</h1>
    </center>
    <?php
    while($reclutador = $reclu->fetch_array()){
        ?>
        <div class="card zoom-on-hover">
            <div class="card-body">
                
            </div>
        </div>
        <?php
    }
     ?>
</div>