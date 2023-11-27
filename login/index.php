<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include '../css/bts.php'; ?>
    <link rel="stylesheet" href="../css/login.css">
    <title>Inicie Sesión</title>
    <script src="main.js"></script>
</head>

<body>
<br><br><br>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-4 login-sec">
                <center>
                    <img src="../img/JobsOn.png" class="logo">
                </center>
                <h2 class="text-center">Inicie Sesión</h2>
                <div id="res"></div>
                <form class="login-form" action="../php/login.php" method="post">
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="text-uppercase">Usuario/Email</label>
                        <input type="text" name="user" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="text-uppercase">Contraseña</label>
                        <input type="password" class="form-control" name="psw">
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="noclose">
                            <small>Recuérdame</small>
                        </label>
                        <button type="submit" class="btn btn-login float-right">Iniciar Sesión</button>
                    </div>
                </form>
            </div>

            <div class="col-md-12 col-lg-8 banner-sec">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <!-- El resto de tu código del carrusel -->
                </div>
            </div>
        </div>
    </div>

    <div class="container2" style="text-align: center;">
        <br>
        ¿No tienes una cuenta?
        <a href="../Postulantes/Registro/">Regístrate</a> ahora
    </div>
</body>

</html>