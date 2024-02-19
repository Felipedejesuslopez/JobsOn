<?php 
error_reporting(0);
session_start();
?>
<div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-KyZXEAg3QhqLMpG8r+Knujsl5+z0I5t9z3zUphh+9uMHvtT5it9uLk7UwUpJ4ZU6Cg4PxhtyVBjQhp2KO6JuFw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <center>
        <h1>Usuarios Activos</h1>
    </center>
    <?php

require_once '../clases/class.conexion.php';
require_once '../clases/class.usuariopostulante.php';


try {
  
  $usuario = new usuariopostulante(null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);

  
  $resultado = $usuario->read();

  
  if ($resultado->num_rows > 0) {
      
      while ($fila = $resultado->fetch_assoc()) {
?>

          <div class="card" style="margin-bottom: 10px">
              <div class="card-body">
                  <div class="row">
                      <div class="col-2">
                          <img src="<?php echo $fila['FOTO']; ?>" style="width:75%;">
                      </div>
                      <div class="col">
                          <h5 class="card-title usuario-nombre"><?php echo $fila['NOMBRE'] . ' ' . $fila['APELLIDOS']; ?></h5>
                          <div class="usuario-contenido" style="display:none;">
                              <div class="usuario-detalles">
                                  <table class="table">
                                      <tr>
                                          <td><i class="fas fa-map-marker-alt"></i> Dirección:<?php echo $fila['DIRECCION']; ?></td>
                                      </tr>
                                      <tr>
                                          <td><i class="fas fa-phone"></i> Teléfono:<?php echo $fila['TELEFONO']; ?></td>
                                      </tr>
                                     
                                  </table>
                              </div>
                              <br>
                              <a href="#" class="btn btn-primary" data-id="<?php echo $fila['id']; ?>"><i class="fas fa-edit"></i></a>
                              <a href="#" class="btn btn-danger eliminar-empresa" data-id="<?php echo $fila['id']; ?>"><i class="fas fa-trash-alt"></i></a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
<?php
      }
  } else {
      echo mostrarMensaje("No hay datos de usuarios para mostrar.");
  }
} catch (Exception $e) {
  echo mostrarMensaje("Error al recuperar datos de usuarios: " . $e->getMessage(), 'error');
}
?>



    <br>

    <br>
    
    <button onclick="cargarFormulario()" class="btn btn-success" style="width:100%;">Agregar Usuario</button>

<div id="formularioContainer"></div>

<script>
function cargarFormulario() {
  $.ajax({
    url: 'Usuarios/registro/',
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