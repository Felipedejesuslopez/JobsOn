<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambiar Contraseña</title>
</head>
<body>
    <h2>Cambiar Contraseña</h2>
    <form action="update_password.php" method="POST">
        <label for="new_password">Nueva Contraseña:</label>
        <input type="password" name="new_password" required>
        <br>
        <label for="confirm_password">Confirmar Contraseña:</label>
        <input type="password" name="confirm_password" required>
        <br>
        <input type="submit" value="Cambiar Contraseña">
    </form>
</body>
</html>
