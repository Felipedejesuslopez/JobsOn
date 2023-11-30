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
    //segun el tipo {}
     include 'components/menu.usuario.php'; ?>
    <div></div>
    <div class="container" id="content">
        <div id="main">

        </div>
    </div>
</body>

</html>