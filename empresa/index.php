<?php 
error_reporting(0);
session_start();
?>
<div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-KyZXEAg3QhqLMpG8r+Knujsl5+z0I5t9z3zUphh+9uMHvtT5it9uLk7UwUpJ4ZU6Cg4PxhtyVBjQhp2KO6JuFw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <center>
        <h1>Empresas Activas</h1>
    </center>
    <?php
require_once '../clases/class.conexion.php';
require_once '../clases/class.empresa.php';


try {
    $empresa = new Empresa(null, '', '', '', '', '', '', '', '', '', ''); 

    $resultados = $empresa->read();

    if ($resultados->num_rows > 0) {
        echo '<div class="empresas-container">';
    
        while ($row = $resultados->fetch_assoc()) {
?>
            <div class="card" style="margin-bottom: 10px">
                <div class="card-body">
                    <h5 class="card-title empresa-nombre"><?= $row['NOMBRE'] ?></h5>
                    <div class="empresa-contenido" style="display:none;">
                    <div class="empresa-detalles">
   
        <li class="list-group-item"><i class="fas fa-id-badge"></i> ID: <?= $row['ID'] ?></li>
        <li class="list-group-item"><i class="fas fa-map-marker-alt"></i> Dirección: <?= $row['DIRECCION'] ?></li>
        <li class="list-group-item"><i class="fas fa-phone"></i> Teléfono: <?= $row['TELEFONO'] ?></li>
        <li class="list-group-item"><i class="fas fa-info-circle"></i> Descripción: <?= $row['DESCRIPCION'] ?></li>
        <li class="list-group-item"><i class="fas fa-industry"></i> Sector: <?= $row['SECTOR'] ?></li>
        <li class="list-group-item"><i class="fas fa-user"></i> Contacto Nombre: <?= $row['CONTACTO_NOMBRE'] ?></li>
        <li class="list-group-item"><i class="fas fa-envelope"></i> Contacto Correo: <?= $row['CONTACTO_CORREO'] ?></li>
        <li class="list-group-item"><i class="fas fa-globe"></i> Sitio Web: <?= $row['SITIO_WEB'] ?></li>
        <li class="list-group-item"><i class="fas fa-at"></i> Correo: <?= $row['CORREO'] ?></li>
    </ul>
</div>
      <br>
      <a href="#" class="btn btn-primary" data-id="<?= $row['ID'] ?>"><i class="fas fa-edit"></i></a>
      <a href="#" class="btn btn-danger eliminar-empresa" data-id="<?= $row['ID'] ?>"><i class="fas fa-trash-alt"></i></a>

                    </div>
                </div>
            </div>
<?php
        }

        echo '</div>';
    } else {
        echo mostrarMensaje("No hay datos de empresas para mostrar.");
    }
} catch (Exception $e) {
    echo mostrarMensaje("Error al recuperar datos de empresas: " . $e->getMessage(), 'error');
}
?>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
$(document).ready(function(){
    $(".empresa-nombre").click(function(){
        $(this).next(".empresa-contenido").slideToggle();
    });

});
</script>




    <br>

    <br>
    
    <button onclick="cargarFormulario()" class="btn btn-success" style="width:100%;">Agregar Empresa</button>

<div id="formularioContainer"></div>

<script>
function cargarFormulario() {
  $.ajax({
    url: 'empresa/registro/',
    type: 'GET',
    success: function(data) {
      $('#formularioContainer').html(data);
    },
    error: function() {
      alert('Error al cargar el formulario.');
    }
  });
}
</script>
</div>