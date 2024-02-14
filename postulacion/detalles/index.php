<?php 
include '../../clases/class.conexion.php';
include '../../clases/class.postulacion.php';
include '../../clases/class.ofertalaboral.php';
include '../../clases/class.usuariopostulante.php';
$postu = new postulacion($_GET['id'],null,null,null,null,null,null,null);
$postulacion = $postu->read()->fetch_array();
 ?>

 <center>
    <h1>Seguimiento de la postulacion <?php echo $postulacion['VACANTE'] . '/' . $postulacion['USUARIO'] . '/' . $postulacion['ID']; ?></h1>
 </center>