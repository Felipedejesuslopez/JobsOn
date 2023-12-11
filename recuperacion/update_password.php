<?php
require_once 'funciones.php';

// Verificar la existencia del token y el email en la sesión
session_start();
if (!isset($_SESSION['reset_token']) || !isset($_SESSION['reset_email'])) {
    echo "Acceso no autorizado.";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_SESSION['reset_email'];
    $newPassword = $_POST["new_password"];
    $confirmPassword = $_POST["confirm_password"];

    if ($newPassword !== $confirmPassword) {
        echo "Las contraseñas no coinciden.";
        exit();
    }

    if (changePassword($email, $newPassword)) {
        // Elimina el token y el email de la sesión despues de cambiar la contraseña
        unset($_SESSION['reset_token']);
        unset($_SESSION['reset_email']);
        echo "Contraseña cambiada exitosamente.";
    } else {
        echo "Error al cambiar la contraseña.";
    }
} else {

    header("Location: index.html");
    exit();
}
?>
