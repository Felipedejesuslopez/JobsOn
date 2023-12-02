<?php
session_start();
if (isset($_SESSION["ID"])) {
    header("Location: ../");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <?php include '../css/bts.php'; ?>
    <link rel="stylesheet" href="../css/login.css">
    <title>Iniciar Sesión</title>
    <script src="main.js"></script>
</head>

<body>

    <br><br>
    <div class="container">
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4" class="login">

                <div class="row">
                    <div class="col-12 login">
                        <br><br>
                        <center>
                            <img src="../img/JobsOn.png" class="logo">
                        </center>
                        <h2 class="text-center">Iniciar Sesión</h2>
                        <div id="res"></div>
                        <form class="login-form" action="../php/login.php" method="post">
                            <div class="form-group">
                                <label for="user" class="text-uppercase">Usuario/Email</label>
                                <input type="text" name="user" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="psw" class="text-uppercase">Contraseña</label>
                                <input type="password" name="psw" class="form-control" required>
                            </div>
                            <div class="form-check">
                                <label>
                                    <input type="checkbox"" name=" noclose">
                                    <small>Recuérdame</small>
                                </label>
                                <button type="submit" class="btn btn-primary float-right">Iniciar Sesión</button>
                            </div>
                        </form><br>
                        <div class="container" style="text-align: center; margin-top: 20px;">
                            <p>¿No tienes una cuenta? <a href="../Postulantes/Registro/">Regístrate</a> ahora</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>

</html>