<?php
session_start();
if(isset($_SESSION["ID"])){
    //$id = $_SESSION["ID"];
}else{
    ?>
    <script>
        //window.location = "../../login/";
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
    <H1>FORMULARIO PARA ADMINISTRADORES</H1>
    <form method="post" action="php/registroadmin.php">

        <input type="hidden" name="action" value="create">
    
        <label for="username">USER:</label>
        <input type="text" id="nombre" name="nombre" required>
<br>
        <label for="password">PASSWORD:</label>
        <input type="password" id="password" name="password" required>
<br>
        <label for="email">EMAIL:</label>
        <input type="email" id="email" name="email" required>
<br>
        <label for="name">NAME:</label>
        <input type="text" id="name" name="name" required>
<br>
        <label for="nacimiento">NACIMIENTO:</label>
        <input type="date" id="nacimiento" name="nacimiento" required>
<br>
        <label for="ciudad">CIUDAD:</label>
        <input type="text" id="ciudad" name="ciudad" required>
<br>
        <label for="telefono">TELEFONO:</label>
        <input type="text" id="telefono" name="telefono" required>
<br>
        <label for="respaldo">RESPALDO:</label>
        <input type="text" id="respaldo" name="respaldo" required>
<br>
        <input type="submit" value="Enviar">
    </form>

    <div id="resultado"></div>
</body>
</html>