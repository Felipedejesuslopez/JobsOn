<?php 
error_reporting(0);
session_start();
?>
<div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-KyZXEAg3QhqLMpG8r+Knujsl5+z0I5t9z3zUphh+9uMHvtT5it9uLk7UwUpJ4ZU6Cg4PxhtyVBjQhp2KO6JuFw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <center>
        <h1>Reclutadores Activos</h1>
    </center>
    <?php
    require_once '../clases/class.conexion.php';
    require_once '../clases/class.reclutador.php';

    $reclutador = new Reclutador(0, '', '', '', '', '', '', '', '', '', '');
    
    function mostrarMensaje($mensaje, $tipo = 'success')
    {
        return "<div style='color: " . ($tipo === 'success' ? 'green' : 'red') . "; margin-bottom: 10px;'>{$mensaje}</div>";
    }

    try {
        $resultados = $reclutador->read();

        if ($resultados->num_rows > 0) {
            echo '<div class="reclutadores-container">';
    
            while ($row = $resultados->fetch_assoc()) {
?>
              <div class="card zoom-on-hover" style="margin-bottom: 10px">
    <div class="card-body">
        <div class="row">
            <div class="col-2">
                <?php
                if (is_dir('../../imagenes_reclutador/' . $row['ID'] . '/')) {
                    $archivos = scandir('../../imagenes_reclutador/' . $row['ID'] . '/');
                } else if (is_dir('../imagenes_reclutador/' . $row['ID'] . '/')) {
                    $archivos = scandir('../imagenes_reclutador/' . $row['ID'] . '/');
                } else {
                    $archivos = [];
                }

                $archivos = array_diff($archivos, array('..', '.'));
                foreach ($archivos as $archivo) {
                    $img = $archivo;
                }
                ?>
                <img src="imagenes_reclutador/<?php echo $row['ID']; ?>/<?php echo $img; ?>" style="width:75%;">
            </div>
            <div class="col">
                <h5 class="card-title reclutador-nombre"><?= $row['NAME'] ?></h5>
                <div class="reclutador-contenido" style="display:none;">
                    <div class="reclutador-detalles">
                    <table class="table">
   
    <tr>
        <td><i class="fas fa-envelope"></i> Email:<?= $row['EMAIL'] ?></td>
    </tr>
    <tr>
        <td><i class="fas fa-address-card"></i> Cédula:<?= $row['CEDULA'] ?></td>
    </tr>
    <tr>
        <td><i class="fas fa-map-marker-alt"></i> Dirección:<?= $row['DIRECCION'] ?></td>
    </tr>
    <tr>
        <td><i class="fas fa-clock"></i> Nacimiento:<?= $row['NACIMIENTO'] ?></td>
    </tr>
    <tr>
        <td><i class="fas fa-phone"></i> Teléfono:<?= $row['TELEFONO'] ?></td>
    </tr>
    <tr>
        <td><i class="fas fa-calendar-alt"></i> Ingreso:<?= $row['INGRESO'] ?></td>
    </tr>
    <tr>
        <td><i class="fas fa-circle"></i> Estatus:<?= $row['ESTATUS'] ?></td>
    </tr>
</table>
                    </div>
                    <br>
                    <a href="#" class="btn btn-primary" data-id="<?= $row['ID'] ?>"><i class="fas fa-edit"></i></a>
                    <a href="#" class="btn btn-danger eliminar-reclutador" data-id="<?= $row['ID'] ?>"><i class="fas fa-trash-alt"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
            }

            echo '</div>';
        } else {
            echo mostrarMensaje("No hay datos de reclutadores para mostrar.");
        }
    } catch (Exception $e) {
        echo mostrarMensaje("Error al recuperar datos de reclutadores: " . $e->getMessage(), 'error');
    }
    ?>

    <script>
        $(document).ready(function(){
            $(".reclutador-nombre").click(function(){
                $(this).next(".reclutador-contenido").slideToggle();
            });
        });
    </script>

    <br>
    

    <br>
    
    <button onclick="cargarFormulario()" class="btn btn-success" style="width:100%;">Agregar Reclutador</button>
    <br>
    <br>
    
<div id="formularioContainer"></div>

<script>
function cargarFormulario() {
  $.ajax({
    url: 'reclutador/registro/',
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