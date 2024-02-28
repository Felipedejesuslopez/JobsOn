<?php 
error_reporting(0);
session_start();
?>
<center>
    <h1> SEGUIMIENTO SELECCIONADO</h1>
</center>
 
<?php
// seguimiento2.php

include '../../clases/class.conexion.php';
include '../../clases/class.usuariopostulante.php'; // Incluir la clase usuariopostulante

// Verificar si se proporcionó un ID de usuario en la URL
if (isset($_GET['usuario'])) {
    $usuario = $_GET['usuario'];

    // Crear una instancia de UsuarioPostulante
    $usuariopostulante = new usuariopostulante(null, $usuario, null, null, null, null, null, null, null, null, null, null, null, null, null);

    // Obtener los datos del usuario postulante por su usuario
    $resultados = $usuariopostulante->read();

    // Verificar si hay resultados
    if ($resultados->num_rows > 0) {
        $usuarioInfo = $resultados->fetch_assoc();

        // Mostrar la información del usuario postulante
        echo '<div class="card" style="margin-bottom: 20px;">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">Información del Postulante</h5>';
        echo '<p><strong>Nombre:</strong> ' . $usuarioInfo['NOMBRE'] . ' ' . $usuarioInfo['APELLIDOS'] . '</p>';
        echo '<p><strong>Correo Electrónico:</strong> ' . $usuarioInfo['CORREO'] . '</p>';
        echo '<p><strong>Teléfono:</strong> ' . $usuarioInfo['TELEFONO'] . '</p>';

        // Agregar botones para ver el CV y enviar mensajes
        echo '<div class="row justify-content-end">';
        echo '<div class="col-2">';
        echo '<a href="url_al_cv" class="btn btn-outline-danger" style="height:100%; width:100%;">';
        echo '<br>Ver CV<br>';
        echo '<i class="far fa-file-alt fa-2x"></i>';
        echo '</a>';
        echo '</div>';
        echo '<div class="col-2">';
        echo '<a href="mensajes/?re=reclutador&rr=postulante&ie=' . $_SESSION['ID'] . '&ir=' . $usuarioInfo['ID'] . '" class="btn btn-outline-dark" style="height:100%; width:100%; vertical-align:center; text-align:center;">';
        echo '<br>Enviar Mensaje<br>';
        echo '<i class="far fa-comment fa-2x"></i>';
        echo '</a>';
        echo '</div>';
        echo '</div>'; // Cerrar row

        echo '</div>'; // Cerrar card-body
        echo '</div>'; // Cerrar card
    } else {
        echo 'No se encontraron detalles para este usuario.';
    }
} else {
    echo 'No se proporcionó un ID de usuario.';
}
?>




