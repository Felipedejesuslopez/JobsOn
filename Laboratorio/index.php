
    <center>
        <h1>Laboratorios Activos</h1>
    </center>
    <?php
require_once '../clases/class.conexion.php';
require_once '../clases/class.laboratorio.php';


$laboratorio = new Laboratorio(0, '', '', '', '', '', '', '', '', '', '', '');
function mostrarMensaje($mensaje, $tipo = 'success')
{
    return "<div style='color: " . ($tipo === 'success' ? 'green' : 'red') . "; margin-bottom: 10px;'>{$mensaje}</div>";
}

try {
    $resultados = $laboratorio->read();

    if ($resultados->num_rows > 0) {
        echo '<div class="laboratorios-container">';
    
        while ($row = $resultados->fetch_assoc()) {
?>
            <div class="card" style="margin-bottom: 10px">
                <div class="card-body">
                    <h5 class="card-title laboratorio-nombre"><?= $row['NAME'] ?></h5>
                    <div class="laboratorio-contenido" style="display:none;">
                        <div class="laboratorio-detalles">
                            <ul class="list-group">
                                <li class="list-group-item"><i class="fas fa-id-badge"></i> ID: <?= $row['ID'] ?></li>
                                <li class="list-group-item"><i class="fas fa-database"></i> Usuario: <?= $row['USER'] ?></li>
                                <li class="list-group-item"><i class="fas fa-envelope"></i> Email: <?= $row['EMAIL'] ?></li>
                                <li class="list-group-item"><i class="fas fa-map-marker-alt"></i> Dirección: <?= $row['DIRECCION'] ?></li>
                                <li class="list-group-item"><i class="fas fa-clock"></i> Horario: <?= $row['HORARIO'] ?></li>
                                <li class="list-group-item"><i class="fas fa-phone"></i> Teléfono: <?= $row['TELEFONO'] ?></li>
                                <!-- Add more details as needed -->
                            </ul>
                        </div>
                        <br>
                        <a href="#" class="btn btn-primary" data-id="<?= $row['ID'] ?>"><i class="fas fa-edit"></i></a>
                        <a href="#" class="btn btn-danger eliminar-laboratorio" data-id="<?= $row['ID'] ?>"><i class="fas fa-trash-alt"></i></a>
                    </div>
                </div>
            </div>
<?php
        }

        echo '</div>';
    } else {
        echo mostrarMensaje("No hay datos de laboratorios para mostrar.");
    }
} catch (Exception $e) {
    echo mostrarMensaje("Error al recuperar datos de laboratorios: " . $e->getMessage(), 'error');
}
?>

<script>
$(document).ready(function(){
    $(".laboratorio-nombre").click(function(){
        $(this).next(".laboratorio-contenido").slideToggle();
    });
});
</script>

    <br>
    

    <button onclick="cargarFormulario()" class="btn btn-success" style="width:100%;">Agregar Laboratorio</button>

<div id="formularioContainer"></div>

<script>
function cargarFormulario() {
  $.ajax({
    url: 'laboratorio/registro/',
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