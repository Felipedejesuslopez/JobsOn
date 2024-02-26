<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Vehículo</title>

</head>
<body>
    <div class="container">
        <h1 class="mt-5 mb-4">Registro de Vehículo</h1>
        <form id="registroVehiculoForm" enctype="multipart/form-data">
            <div class="form-group">
                <label for="marca">Marca:</label>
                <input type="text" class="form-control" name="marca" id="marca" required>
            </div>
            <div class="form-group">
                <label for="modelo">Modelo:</label>
                <input type="text" class="form-control" name="modelo" id="modelo" required>
            </div>
            <div class="form-group">
                <label for="placa">Placa:</label>
                <input type="text" class="form-control" name="placa" id="placa" required>
            </div>
            <div class="form-group">
                <label for="foto">Foto del Vehículo:</label>
                <input type="file" class="form-control-file" name="foto" id="foto" required>
            </div>
            <div class="form-group">
                <label for="placa_frontal">Foto de la Placa Frontal:</label>
                <input type="file" class="form-control-file" name="placa_delantera" id="placa_delantera" required>
            </div>
            <div class="form-group">
                <label for="placa_trasera">Foto de la Placa Trasera:</label>
                <input type="file" class="form-control-file" name="placa_trasera" id="placa_trasera" required>
            </div>
            <center>
                <br>
                <button type="submit" class="btn btn-primary">Registrar Vehículo</button>
            </center>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#registroVehiculoForm').submit(function(event) {
                event.preventDefault(); 

                var formData = new FormData($(this)[0]); 

                $.ajax({
                    url: '../../jobsOn7/php/procesar_registro_vehiculo.php',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
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
