<?php
session_start();
if (isset($_SESSION["ID"])) {
    include 'css/bts.php';
    $user = $_SESSION;
} else {
?>
    <script>
        window.location = "login/";
    </script>
<?php
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="js/main.js"></script>
    <link rel="stylesheet" href="css/main.css">
    <!-- Incluye la hoja de estilos de Bootstrap -->

    <title>JobsOn</title>
</head>

<body>
    <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white" id="sidebarMenu">
        <div class="position-sticky">

            <div class="container menu" style="margin-top:-15%;">
                <div class="row">
                    <!-- Col-sm-6 se ajustará automáticamente a la pantalla completa en dispositivos pequeños -->
                    <div class="col-6">
                        <img src="img/JobsOn.png" id="logo">
                        <h7>
                            Hola, <b>
                                <?php echo $user['NOMBRE'] ?>
                            </b>
                        </h7>
                    </div>
                    <!-- Col-sm-6 se ajustará automáticamente a la pantalla completa en dispositivos pequeños -->
                    <div class="col-6" id="mad">
                        <br>
                        <img src="img/profile.png" id="profile" alt="">
                    </div>
                </div>

                <div class="container custom-search">
                    <div class="input-group">
                        <input type="search" class="form-control search-input" placeholder="Buscar" aria-label="Buscar" aria-describedby="search-addon" />
                        <!-- Eliminado el botón de limpiar -->
                        <button type="button" class="btn btn-primary search-btn">
                            <i class="fas fa-search search-icon"></i>
                        </button>
                    </div>
                </div>

                <div class="row" class>
                    <div class="col-6">
                        <a class="botonmenu" href="ParaTi/">
                            <img src="img/Menu/User/1.png" class="botonmenu">
                        </a>
                    </div>
                    <div class="col-6">
                        <a class="botonmenu" href="Mensajes/">
                            <img class="botonmenu" src="img/Menu/User/2.png" alt="">
                        </a>
                    </div>
                    <br><br><br>
                    <div class="col-6">
                        <a class="botonmenu" href="Curriculum/">
                            <img class="botonmenu" src="img/Menu/User/3.png" alt="">
                        </a>
                    </div>
                    <div class="col-6">
                        <a class="botonmenu" href="Experiencia/">
                            <img class="botonmenu" src="img/Menu/User/4.png" alt="">
                        </a>
                    </div>
                    <br><br><br>
                    <div class="col-6">
                        <a class="botonmenu" href="Postulaciones/">
                            <img class="botonmenu" src="img/Menu/User/5.png" alt="">
                        </a>
                    </div>
                    <div class="col-6">
                        <a class="botonmenu" href="Informacion/">
                            <img class="botonmenu" src="img/Menu/User/6.png" alt="">
                        </a>
                    </div>
                </div>
                <br><br><br>
                <div class="col-2"></div>
                <div class="col-8">
                    <a href="Settings/" class="botonmenu">
                        <img src="img/Menu/Settings.png" class="botonmenu">
                    </a>
                </div>
                <div class="col-2"></div>
            </div>
        </div>
    </nav>
    <div class="container">
        <div id="main">

        </div>
    </div>
</body>

</html>