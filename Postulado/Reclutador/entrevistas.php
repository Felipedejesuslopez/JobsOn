<?php
session_start();
include '../../clases/class.conexion.php';
include '../../clases/class.cita.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrevistas Pendientes</title>
</head>
<body>
    <div class="container">
        <h1>Entrevistas Pendientes</h1>
        <table class="table">
            <thead>
                <tr align="center">
                    <th>Fecha de Cita</th>
                    <th>Lugar</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $citasPendientes = cita::getCitasPendientes($_SESSION['ID']);

                while ($cita = $citasPendientes->fetch_assoc()) :
                ?>
                    <tr>
                        <td><?php echo $cita['FECHA_HORA']; ?></td>
                        <td><?php echo $cita['LUGAR']; ?></td>
                        <td>
                            <button onclick="eliminarCita(<?php echo $cita['ID']; ?>)">Eliminar Cita</button>
                            <button onclick="accionCita(<?php echo $cita['ID']; ?>, 'aceptar')">Aceptar Postulación</button>
                            <button onclick="accionCita(<?php echo $cita['ID']; ?>, 'rechazar')">Rechazar Postulación</button>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    function eliminarCita(citaId) {
        $.ajax({
            type: 'POST',
            url: '../../jobsOn7/php/accionescitas.php',
            data: {
                citaId: citaId,
                accion: 'eliminar'
            },
            success: function(response) {
                location.reload();
            },
            error: function(xhr, status, error) {
                console.error(error);
                alert('Error al eliminar la cita. Por favor, inténtalo de nuevo más tarde.');
            }
        });
    }

    function accionCita(citaId, accion) {
        $.ajax({
            type: 'POST',
            url: '../../jobsOn7/php/accionescitas.php',
            data: {
                citaId: citaId,
                accion: accion
            },
            success: function(response) {
                alert(response);
                location.reload();
            },
            error: function(xhr, status, error) {
                console.error(error);
                alert('Error al procesar la acción. Por favor, inténtalo de nuevo más tarde.');
            }
        });
    }
    </script>
</body>
</html>