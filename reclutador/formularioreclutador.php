<?php
session_start();
if(isset($_SESSION["ID"])){
    //$id = $_SESSION["ID"];
} else {
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
    <h1>FORMULARIO PARA RECLUTADORES</h1>
    <form method="post" action="php/registroreclutador.php" enctype="multipart/form-data">

        <input type="hidden" name="action" value="create">

        <div>
            <label for="user">USER:</label>
            <input type="text" id="user" name="user" required>
        </div>

        <div>
            <label for="email">EMAIL:</label>
            <input type="email" id="email" name="email" required>
        </div>

        <div>
            <label for="password">PASSWORD:</label>
            <input type="password" id="password" name="password" required>
        </div>

        <div>
            <label for="cedula">CEDULA:</label>
            <input type="text" id="cedula" name="cedula" required>
        </div>

        <div>
            <label for="name">NAME:</label>
            <input type="text" id="name" name="name" required>
        </div>

        <div>
            <label for="telefono">telefono:</label>
            <input type="text" id="telefono" name="telefono" required>
        </div>

        <div>
            <label for="foto">FOTO:</label>
            <input type="file" id="foto" name="foto" accept="image/*" required>
        </div>

        <div>
            <label for="nacimiento">NACIMIENTO:</label>
            <input type="date" id="nacimiento" name="nacimiento" required>
        </div>

        <div>
            <label for="ingreso">INGRESO:</label>
            <input type="text" id="ingreso" name="ingreso" required>
        </div>

        <div>
            <label for="estatus">ESTATUS:</label>
            <input type="text" id="estatus" name="estatus" required>
        </div>

        <div>
            <input type="submit" value="Enviar">
        </div>
    </form>
</body>
</html>

