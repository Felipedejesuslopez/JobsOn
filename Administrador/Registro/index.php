<?php
session_start();
if(isset($_SESSION["ID"])){
    //$id = $_SESSION["ID"];
}else{
    ?>
    <script>
        window.location = "../../login/";
    </script>
    <?php
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jobs0n</title>
</head>
<body> 
<form method="post" action="registroadmin.php" id="formulario">
        <label for="username">USERNAME:</label>
        <input type="text" id="nombre" name="nombre" required>

        <label for="password">PASSWORD:</label>
        <input type="password" id="password" name="password" required>

        <label for="email">EMAIL:</label>
        <input type="email" id="email" name="email" required>

        <label for="name">NAME:</label>
        <input type="text" id="name" name="name" required>

        <label for="nacimiento">NACIMIENTO:</label>
        <input type="date" id="nacimiento" name="nacimiento" required>

        <label for="ciudad">CIUDAD:</label>
        <input type="text" id="ciudad" name="ciudad" required>

        <label for="telefono">TELEFONO:</label>
        <input type="text" id="telefono" name="telefono" required>

        <label for="respaldo">RESPALDO:</label>
        <input type="text" id="respaldo" name="respaldo" required>

        <input type="submit" value="Enviar">
    </form>

    <div id="resultado"></div>
</body>
</html>