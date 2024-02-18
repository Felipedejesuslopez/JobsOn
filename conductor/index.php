<?php 
error_reporting(0);
session_start();
?>
<div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-KyZXEAg3QhqLMpG8r+Knujsl5+z0I5t9z3zUphh+9uMHvtT5it9uLk7UwUpJ4ZU6Cg4PxhtyVBjQhp2KO6JuFw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <center>
        <h1>Conductores Activos</h1>
    </center>
    <?php
    require_once '../clases/class.conexion.php';
    require_once '../clases/class.conductor.php';

    $conductor = new Conductor(0, '', '', '', '', '', '', '', '', '', '', '', '', '', '');

    function mostrarMensaje($mensaje, $tipo = 'success')
    {
        return "<div style='color: " . ($tipo === 'success' ? 'green' : 'red') . "; margin-bottom: 10px;'>{$mensaje}</div>";
    }

    try {
        $resultados = $conductor->read();

        if ($resultados->num_rows > 0) {
            echo '<div class="conductores-container">';
    
            while ($row = $resultados->fetch_assoc()) {
?>
                <div class="card" style="margin-bottom: 10px">
                    <div class="card-body">
                    <div class="row">
            <div class="col-2">
                <?php
                if (is_dir('../../imagenes_conductor/' . $row['ID'] . '/')) {
                    $archivos = scandir('../../imagenes_conductor/' . $row['ID'] . '/');
                } else if (is_dir('../imagenes_conductor/' . $row['ID'] . '/')) {
                    $archivos = scandir('../imagenes_conductor/' . $row['ID'] . '/');
                } else {
                    $archivos = [];
                }

                $archivos = array_diff($archivos, array('..', '.'));
                foreach ($archivos as $archivo) {
                    $img = $archivo;
                }
                ?>
                <img src="imagenes_conductor/<?php echo $row['ID']; ?>/<?php echo $img; ?>" style="width:75%;">
            </div>

            <div class="col">
                <h5 class="card-title conductor-nombre"><?= $row['NAME'] ?></h5>
                <div class="conductor-contenido" style="display:none;">
                    <div class="conductor-detalles">

                    <table class="table">
        <tr>
            <td><i class="fas fa-database"></i> Usuario:<?= $row['USER'] ?></td>
        </tr>
        <tr>
            <td><i class="fas fa-envelope"></i> Email:<?= $row['EMAIL'] ?></td>
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
            <td><i class="fas fa-id-card"></i> Licencia:<?= $row['LICENCIA'] ?></td>
        </tr>
        <tr>
            <td><i class="fas fa-address-card"></i> INE:<?= $row['INE'] ?></td>
        </tr>
        <tr>
            <td><i class="fas fa-calendar-alt"></i> Ingreso:<?= $row['INGRESO'] ?></td>
        </tr>
        <tr>
            <td><i class="fas fa-check"></i> Completados:<?= $row['COMPLETADOS'] ?></td>
        </tr>
        <tr>
            <td><i class="fas fa-times"></i> Cancelados:<?= $row['CANCELADOS'] ?></td>
        </tr>
        <tr>
            <td><i class="fas fa-heartbeat"></i> Estatus:<?= $row['ESTATUS'] ?></td>
        </tr>

</table>
</div>
                    <br>
                            <a href="#" class="btn btn-primary" data-id="<?= $row['ID'] ?>"><i class="fas fa-edit"></i></a>
                            <a href="#" class="btn btn-danger eliminar-conductor" data-id="<?= $row['ID'] ?>"><i class="fas fa-trash-alt"></i></a>
                            </div>
            </div>
        </div>
    </div>
</div>
<?php
            }

            echo '</div>';
        } else {
            echo mostrarMensaje("No hay datos de conductores para mostrar.");
        }
    } catch (Exception $e) {
        echo mostrarMensaje("Error al recuperar datos de conductores: " . $e->getMessage(), 'error');
    }
    ?>

    <script>
        $(document).ready(function(){
            $(".conductor-nombre").click(function(){
                $(this).next(".conductor-contenido").slideToggle();
            });
        });
    </script>













    <br>
    
    <button onclick="cargarFormulario()" class="btn btn-success" style="width:100%;">Agregar Conductor</button>

<div id="formularioContainer"></div>

<script>
function cargarFormulario() {
  $.ajax({
    url: 'conductor/registro/',
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