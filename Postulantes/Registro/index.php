<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include '../../css/bts.php'; ?>
    <link rel="stylesheet" href="styler.css">
    <script src="main.js"></script>
    <title>Registro</title>
    
</head>

<body>
    <div class="container">
        <img src="../../img/JobsOn.png" alt="Logo">
        <h1>Regístrate hoy y encuentra tu trabajo adecuado</h1>
        <form action="../../php/registrousuario.php" method="post">
            <div class="form-group">
                <label for="nombre">Nombre *</label>
                <input type="text" name="nombre" class="form-control">
            </div>
            <div class="form-group">
                <label for="paterno">Apellido Paterno *</label>
                <input type="text" name="paterno" class="form-control">
            </div>
            <div class="form-group">
                <label for="materno">Apellido Materno *</label>
                <input type="text" name="materno" class="form-control">
            </div>
            <div class="form-group">
                <label for="nacimiento">Fecha de nacimiento *</label>
                <input type="date" name="nacimiento" class="form-control">
            </div>
            <div class="form-group">
                <label for="telefono">Teléfono *</label>
                <input type="number" name="telefono" class="form-control">
            </div>
            <div class="form-group">
                <label for="email">Correo *</label>
                <input type="email" name="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="direccion">Ingrese su dirección</label>
                <textarea name="direccion" class="form-control" rows="4"></textarea>
            </div>
            <div class="form-group">
                <label for="user">Crea tu nombre de usuario</label>
                <input type="text" name="user" class="form-control" id="user">
                <div id="usuario"></div>
            </div>
            <div class="form-group">
                <label for="psw">Crea tu contraseña</label>
                <input type="password" name="psw" class="form-control">
            </div>
            <div class="form-group">
                <label for="pswc">Confirma tu contraseña</label>
                <input type="password" name="pswc" class="form-control">
            </div>
            <button type="submit">Registrar</button>
            <div id="response"></div>
        </form>
    </div>


<!-- Modal -->
<div class="modal fade" id="miModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">¡Bienvenido a JobsOn!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Contenido del modal -->
                <div class="alert alert-success">¡Registro guardado correctamente!</div>
            </div>
        </div>
    </div>
</div>
</body>

</html>