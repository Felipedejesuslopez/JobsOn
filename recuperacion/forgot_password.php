<?php

require_once '../clases/class.conexion.php';

$conexion = new conexion() ;


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST["email"];


    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    $sql = "SELECT * FROM usuarios WHERE email = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {

    // Generar un token único sin almacenarlo en la base de datos
    $token = bin2hex(random_bytes(32));

    // Envía el correo electrónico con el enlace para restablecer la contraseña
    $subject = "Recuperación de Contraseña JobsOn";
    $message = "Hola, $user, Para restablecer tu contraseña, haz clic en el siguiente enlace:\n\n";
    $message .= "http://localhost/JobsOn-main/recuperacion/reset_password_form.php?token=$token&email=$email\n\n";
    $message .= "Este enlace expirará en 1 hora. \n\n";
    $message .= "Si no has solicitado restablecer tu contraseña, puedes ignorar este correo.";

    $headers = "From: 19040107@alumno.utc.edu.mx";

    mail($email, $subject, $message, $headers);

    echo "Se ha enviado un enlace de recuperación a tu correo electrónico.";
    } else {
    echo "El correo electrónico no está registrado en nuestro sistema.";
    }

    $stmt->close();
    $conexion->close();
}else {
    header("Location: ../index.php");
    exit();
}
    
?>