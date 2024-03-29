<?php
require_once 'PHPMailer/src/PHPMailer.php';
require_once 'PHPMailer/src/Exception.php';
require_once 'PHPMailer/src/SMTP.php';
require_once 'funciones.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["forgotEmail"];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Formato de correo electrónico inválido.";
        exit();
    }

    $userType =  getUserTypeByEmail($email);

    if ($userType !== false) {
        $token = generateToken();

        session_start();
        $_SESSION['reset_token'] = $token;
        $_SESSION['reset_email'] = $email;
        $_SESSION['user_type'] = $userType;

        try {
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = '19040107@alumno.utc.edu.mx'; // Coloca tu dirección de correo
            $mail->Password = 'Alertarcp724'; // Coloca tu contraseña
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;
            $mail->setFrom('19040107@alumno.utc.edu.mx', 'JobsOn'); // Coloca tu dirección de correo
            $mail->addAddress($email);
            $mail->Subject = 'Recuperación de Contraseña JobsOn';
            $mail->Body = "Para restablecer tu contraseña, haz clic en el siguiente enlace:\n\nhttp://localhost/JobsOn/recuperacion/reset_password_form.php?token=$token\n\nEste enlace expirará en 1 hora.";

            $mail->send();
            echo "Se ha enviado un enlace de recuperación a tu correo electrónico.";
        } catch (Exception $e) {
            echo "Error al enviar el correo electrónico: {$mail->ErrorInfo}";
        }
    } else {
        echo "El correo electrónico no está registrado en ninguna tabla de usuarios.";
    }
} else {
    header("Location: index.html");
    exit();
}
?>