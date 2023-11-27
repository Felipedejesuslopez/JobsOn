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
            <div class="col-md-4 login-sec">
                <center>
                    <img src="../img/JobsOnLight.png" class="logo">
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
            <div class="col-md-8 banner-sec">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active">
                            <img class="d-block img-fluid" src="https://static.pexels.com/photos/33972/pexels-photo.jpg" alt="First slide">
                            <div class="carousel-caption d-none d-md-block">
                                <div class="banner-text">
                                    <h2>This is Heaven</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img class="d-block img-fluid" src="https://images.pexels.com/photos/7097/people-coffee-tea-meeting.jpg" alt="First slide">
                            <div class="carousel-caption d-none d-md-block">
                                <div class="banner-text">
                                    <h2>This is Heaven</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img class="d-block img-fluid" src="../img/JobsOnDark.png" alt="First slide">
                            <div class="carousel-caption d-none d-md-block">
                                <div class="banner-text">
                                    <h2>This is Heaven</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="container2" style="text-align: right;">
            <br>
            ¿No tienes una cuenta?
            <a href="../Postulantes/Registro/">Regístrate</a> ahora
        </div>
</body>

</html>