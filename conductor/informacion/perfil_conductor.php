<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil del Conductor</title>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="container">
        <h1  class="mt-5 mb-4">Informacion del Conductor</h1>
        <?php
        // Incluir la clase conductor
        include '../../clases/class.conductor.php';
        include '../../clases/class.conexion.php';

        session_start();
        if (!isset($_SESSION['ID'])) {
            header("Location: login.php");
            exit();
        }

        $id_conductor = $_SESSION['ID'];
        $conductor = new conductor($id_conductor, '', '', '', '', '', '', '', '', '', '', '', '', '', '');
        $resultado = $conductor->read($id_conductor);
        $conductor_info = $resultado->fetch_assoc();
        ?>

        <form id="perfilForm">
            <div class="form-group">
                <label for="user">Usuario:</label>
                <input type="text" class="form-control" name="user" id="user" value="<?php echo $conductor_info['USER']; ?>">
            </div>
            <div class="form-group">
                <label for="email">Correo electrónico:</label>
                <input type="email" class="form-control" name="email" id="email" value="<?php echo $conductor_info['EMAIL']; ?>">
            </div>
            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" class="form-control" name="password" id="password" value="<?php echo $conductor_info['PASSWORD']; ?>">
            </div>
            <div class="form-group">
                <label for="name">Nombre:</label>
                <input type="text" class="form-control" name="name" id="name" value="<?php echo $conductor_info['NAME']; ?>">
            </div>
            <div class="form-group">
                <label for="licencia">Licencia:</label>
                <input type="text" class="form-control" name="licencia" id="licencia" value="<?php echo $conductor_info['LICENCIA']; ?>">
            </div>
            <div class="form-group">
                <label for="ine">INE:</label>
                <input type="text" class="form-control" name="ine" id="ine" value="<?php echo $conductor_info['INE']; ?>">
            </div>
            <div class="form-group">
                <label for="telefono">Teléfono:</label>
                <input type="text" class="form-control" name="telefono" id="telefono" value="<?php echo $conductor_info['TELEFONO']; ?>">
            </div>
            <div class="form-group">
                <label for="opt2">Opción 2:</label>
                <input type="text" class="form-control" name="opt2" id="opt2" value="<?php echo $conductor_info['OPT2']; ?>">
            </div>
            <center>
            <button type="button" class="btn btn-primary" id="actualizarBtn">Actualizar información</button>
            </center>
        </form>
    </div>

    <script>
    $(document).ready(function() {
        $('#actualizarBtn').click(function() {
            var formData = $('#perfilForm').serialize();

            $.ajax({
                type: 'POST',
                url: '../../jobsOn7/php/cambios_conductor.php',
                data: formData,
                success: function(response) {

                    alert(response); 
                },
                error: function(xhr, status, error) {

                    console.error(xhr.responseText);
                }
            });
        });
    });
    </script>

</body>
</html>

