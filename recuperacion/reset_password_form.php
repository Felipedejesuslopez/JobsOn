<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restablecer Contraseña</title>
</head>
<body>

    <div class="container">
        <form action="update_password.php" method="post">
            <h2>Restablecer Contraseña</h2>
            <label for="new_password">Nueva Contraseña:</label>
            <input type="password" name="new_password" required>
            <label for="confirm_password">Confirmar Contraseña:</label>
            <input type="password" name="confirm_password" required>
            <input type="hidden" name="token" value="<?php echo $_GET['token']; ?>">
            <input type="hidden" name="email" value="<?php echo $_GET['email']; ?>">
            <button type="submit">Restablecer Contraseña</button>
        </form>
    </div>

</body>
</html>
