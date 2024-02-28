<?php
// obtener_ofertas.php

include '../../clases/class.conexion.php';
include '../../clases/class.ofertalaboral.php';
include '../../clases/class.postulacion.php'; // Incluir la clase postulacion

if (isset($_POST['empresa_id'])) {
    $empresaId = $_POST['empresa_id'];

    // Crear una instancia de OfertaLaboral
    $ofertaLaboral = new OfertaLaboral(null, null, null, null, null, null, null, null, $empresaId, null, null, null);

    // Obtener las ofertas laborales por empresa
    $resultados = $ofertaLaboral->readByEmpresa();

    // Verificar si hay resultados
    if ($resultados->num_rows > 0) {
        echo '<div class="empresas-container">';
    
        while ($row = $resultados->fetch_assoc()) {
            echo '<div class="card" style="margin-bottom: 10px">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">' . $row['TITULO'] . '</h5>';
            echo '<p class="card-text">' . $row['DESCRIPCION'] . '</p>';
            echo '<p><em>Ubicación: ' . $row['UBICACION'] . '</em></p>';
            echo '<p><strong>Salario: ' . $row['SALARIO'] . '</strong></p>';
            echo '<p><strong>Requisitos: ' . $row['REQUISITOS'] . '</strong></p>';
            echo '<p><strong>Tipo de Contrato: ' . $row['TIPO_CONTRATO'] . '</strong></p>';
            echo '<p><strong>Nivel de Experiencia: ' . $row['NIVEL_EXPERIENCIA'] . '</strong></p>';

            // Obtener los nombres de los postulantes para esta oferta
            $postulacion = new postulacion(null, $row['ID'], null, null, null, null, null, null); // Cambiar según la estructura de tu clase
            $postulantes = $postulacion->getPostulantesByVacante(); // Debe ser un método que obtenga los postulantes por vacante

            echo '<p><strong>Postulantes:</strong></p>';
            echo '<ul>';
            foreach ($postulantes as $postulante) {
                echo '<li><a href="postulado/reclutador/seguimiento2.php?usuario=' . $postulante['USUARIO'] . '">' . $postulante['USUARIO'] . '</a></li>';
            }
            echo '</ul>';

            echo '</div>';
            echo '</div>';
        }

        echo '</div>'; // Cerrar empresas-container
    } else {
        echo 'No hay ofertas laborales para esta empresa.';
    }
} else {
    echo 'No se proporcionó un ID de empresa.';
}
?>




