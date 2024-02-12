<?php
session_start();

if (isset($_SESSION["ID"])) {
    include 'css/bts.php';
    include 'modals/modalavisos.php';
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
    <!-- Botón de menú para dispositivos pequeños -->
    <button class="btn btn-primary d-lg-none" id="menuToggle" onclick="onSwipeRight()">
        <i class="fas fa-bars"></i>
    </button>
    <div>
        <?php
        switch ($_SESSION['tipo']) {
            case 1:
                include 'components/menu.usuario.php';
                break;

            case 2:
                include 'components/menu.admin.php';
                break;

            case 3:
                include 'components/menu.empresa.php';
                break;

            case 4:
                include 'components/menu.laboratorio.php';
                break;

            case 5:
                include 'components/menu.conductor.php';
                break;

            case 6:
                include 'components/menu.reclutador.php';
                break;
        }

        ?>
    </div>
    <div class="container" id="content">
        <div id="main">
            
            <?php
            error_reporting(0);
            switch ($_SESSION['tipo']) {
                case 1:
                    include 'vacantes/index.php';
                    break;

                case 2:
                    include 'components/menu.admin.php';
                    break;

                case 3:
                    include 'empresa/vacantes/detalles/';
                    break;

                case 4:
                    include 'components/menu.laboratorio.php';
                    break;

                case 5:
                    include 'components/menu.conductor.php';
                    break;

                case 6:
                    include 'components/menu.reclutador.php';
                    break;
            }
            ?>
            
        </div>
    </div>
</body>

</html>