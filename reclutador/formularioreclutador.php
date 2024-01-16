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
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="scriptreclutador.js"></script>
</head>
<body> 
<form method="post" action="create" id="formulario">
        <label for="user">USER:</label>
        <input type="text" id="nombre" name="nombre" required>
   
        <label for="email">EMAIL:</label>
        <input type="email" id="nombre" name="nombre" required>
    
        <label for="password">PASSWORD:</label>
        <input type="password" id="edad" name="edad" required>

        <label for="cedula">CEDULA:</label>
        <input type="text" id="edad" name="edad" required>

        <label for="name">NAME:</label>
        <input type="text" id="edad" name="edad" required>

        <label for="telefono">telefono:</label>
        <input type="date" id="edad" name="edad" required>

        <label for="foto">FOTO:</label>
        <input type="file" id="foto" name="foto" required>

        <label for="nacimiento">FECHA NACIMIENTO:</label>
        <input type="text" id="nacimiento" name="nacimieto" required>

        <label for="ingreso">INGRESO:</label>
        <input type="text" id="ingreso" name="ingreso" required>
       
        <label for="estatus">ESTATUS:</label>
        <input type="text" id="estatus" name="estatus" required>

        <input type="submit" value="Enviar">
    </form>

    <div id="resultado"></div>
</body>
</html>