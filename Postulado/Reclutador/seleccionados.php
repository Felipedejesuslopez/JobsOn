<?php 
error_reporting(0);
session_start();
?>
<center>
    <h1>Vacantes de empresas seleccionadas</h1>
</center>

<div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-KyZXEAg3QhqLMpG8r+Knujsl5+z0I5t9z3zUphh+9uMHvtT5it9uLk7UwUpJ4ZU6Cg4PxhtyVBjQhp2KO6JuFw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<?php
include '../../clases/class.conexion.php';
include '../../clases/class.empresa.php';
include '../../clases/class.OfertaLaboral.php'; // Incluir la clase OfertaLaboral

try {
    $empresa = new Empresa(null, '', '', '', '', '', '', '', '', '', ''); 

    $resultados = $empresa->read();

    if ($resultados->num_rows > 0) {
        echo '<div class="empresas-container">';
    
        while ($row = $resultados->fetch_assoc()) {
            // Obtener el número de ofertas laborales por empresa
            $ofertaLaboral = new OfertaLaboral(null, null, null, null, null, null, null, null, $row['ID'], null, null, null);
            $numOfertas = $ofertaLaboral->countByEmpresa();

            echo '<div class="card zoom-on-hover empresa" style="margin-bottom: 10px" data-id="' . $row['ID'] . '">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title empresa-nombre">' . $row['NOMBRE'] . '</h5>';
            echo '<p class="card-text"><strong>Vacantes: ' . $numOfertas . '</strong></p>';
            echo '<div class="empresa-contenido" style="display:none;"></div>';
            echo '</div>';
            echo '</div>';
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
$(document).ready(function() {
    $('.empresa').on('click', function() {
        var empresaId = $(this).data('id');
        var contenido = $(this).find('.empresa-contenido');

        // Verificar si el contenido está visible o no
        if (contenido.is(":visible")) {
            contenido.slideUp(); // Si está visible, ocultarlo
        } else {
            $.ajax({
                url: 'Postulado/Reclutador/obtener_ofertas.php',
                method: 'POST',
                data: { empresa_id: empresaId },
                success: function(response) {
                    contenido.html(response);
                    contenido.slideDown(); // Mostrar el contenido
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        }
    });
});
</script>


<br>
<br>
</div>

