<?php
session_start();
include '../../clases/class.conexion.php';
include '../../clases/class.postulacion.php';
include '../../clases/class.ofertalaboral.php';
include '../../clases/class.usuariopostulante.php';
include '../../clases/class.entrevista.php';
include '../../clases/class.empresa.php';
include '../../resources/const.php';

$postu = new postulacion($_GET['id'], null, null, null, null, null, null, null);
$postulacion = $postu->read()->fetch_array();

$usuario = new usuariopostulante($postulacion['USUARIO'], null, null, null, null, null, null, null, null, null, null, null, null, null, null);
$postulante = $usuario->read()->fetch_array();

$vac = new OfertaLaboral($postulacion['VACANTE'], null, null, null, null, null, null, null, null, null, null, null);
$vacante = $vac->read()->fetch_array();

$emp = new Empresa($vacante['EMPRESA'], null, null, null, null, null, null, null, null, null, null);
$empresa = $emp->read()->fetch_array();

ini_set('display_errors', 1);
error_reporting(E_ALL);

include 'modals.php';
switch ($postulacion['ESTATUS']) {
   case 'POSTULADO':
      $post = true;
      $ent = false;
      $cit = false;
      $exa = false;
      $con = false;
      break;

   case 'ENTREVISTA':
      $post = true;
      $ent = true;
      $cit = false;
      $exa = false;
      $con = false;
      break;

   case 'CITA':
      $post = true;
      $ent = true;
      $cit = true;
      $exa = false;
      $con = false;
      break;

   case 'EXAMENES':
      $post = true;
      $ent = true;
      $cit = true;
      $exa = true;
      $con = false;
      break;

   case 'CONTRATADO':
      $post = true;
      $ent = true;
      $cit = true;
      $exa = true;
      $contr = true;
      break;

   default:
      $post = false;
      $ent = false;
      $cit = false;
      $exa = false;
      $con = false;
      break;
}
?>

<center>
   <h1>Seguimiento de la postulacion <?php echo $postulacion['VACANTE'] . '/' . $postulacion['USUARIO'] . '/' . $postulacion['ID']; ?></h1>
</center>
<div class="">
   <center>
      <img src="img/profile/<?php echo $postulante['ID']; ?>.png" style="width:20%; border-radius:100px; border:3px solid #efb810;"><br>
      <h3><?php echo $postulante['NOMBRE'] . ' ' . $postulante['APELLIDOS']; ?></h3>
   </center>
   <div class="row">
      <div class="col-sm-3"></div>
      <div class="col-sm-6">
         <?php if ($post == true) {
         ?>
            <div class="progress1 progress-line">
               <br><br>
               <div class="row">
                  <div class="col-4">POSTULACIÓN</div>
                  <div class="col-4"></div>
                  <div class="col-3">
                     <p class="fecha">
                        <?php echo date('d/m/Y', strtotime($postulacion['FECHA'])); ?>
                     </p>
                  </div>
               </div>
               <br>
            </div>
         <?php
         } else {
         ?>
            <div class="alert alert-danger">
               ¡No hay ningún progreso ni información referente a esta vacante, probablemente ha terminado o existió un error!
            </div>
            <?php
         }

         if ($ent == true) {
            $entrevista = new Entrevista(null, $postulacion['ID'], null, null, null, null, null, null, null, null);
            $entrevistas = $entrevista->read();
            while ($interviews = $entrevistas->fetch_array()) {
            ?>
               <div class="progress2 progress-line">
                  <br><br>
                  <div class="row">
                     <div class="col-3">
                        <p class="fecha">
                           <?php echo date('d/m/Y', strtotime($interviews['FECHA'])); ?>
                        </p>
                     </div>
                     <div class="col-4"></div>
                     <div class="col-4"><?php echo $l['interview']; ?></div>
                  </div>
                  <br>
               </div>
         <?php
            }
         }
         ?>
      </div>
      <div class="col-sm-1"></div>
      <div class="col-sm-1">
         <div style="position: sticky; top:100px;">
            <center>
               <button class="btn btn-outline-primary" style="border-radius:50%; padding:15px; margin:5%;" onclick="$('#agendar').modal('show')" title="Agedar Entrevista">
                  <i class="fas fa-clipboard-list"></i>
               </button>
               <button class="btn btn-outline-warning" style="border-radius:50%; padding:15px; margin:5%;" title="Programar a examenes médicos">
                  <i class="fas fa-flask"></i>
               </button>
               <button class="btn btn-outline-success" style="border-radius:50%; padding:15px; margin:5%;" onclick="$('#cita').modal('show')" title="Citar a presentarse">
                  <i class="fas fa-city"></i>
               </button>
               <button class="btn btn-outline-danger" style="border-radius:50%; padding:15px; margin:5%;" title="Rechazar">
                  <i class="fas fa-user-times"></i>
               </button>
            </center>
         </div>
      </div>
   </div>
</div>