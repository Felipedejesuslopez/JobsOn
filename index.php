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
        default:
            # code...
            break;
    }

    ?>
    <div></div>
    <div class="container" id="content">
        <div id="main">

        </div>
    </div>
</body>

</html>