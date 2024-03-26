<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php'; // Asegúrate de que el archivo de autoloader de PHPMailer esté incluido correctamente

// Reemplaza 'your_email@gmail.com' y 'your_password' con tu dirección de correo electrónico y contraseña de Gmail
$smtp_email = 'your_email@gmail.com';
$smtp_password = 'your_password';

$mail = new PHPMailer(true);

try {
    // Configuración del servidor SMTP de Gmail
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = $smtp_email;
    $mail->Password = $smtp_password;
    $mail->SMTPSecure = 'tls'; // O 'ssl' si prefieres SSL
    $mail->Port = 587; // Puerto SMTP de Gmail

    // Destinatario y remitente
    $mail->setFrom($_POST['email'], $_POST['name']);
    $mail->addAddress('leff1476@gmail.com'); // Dirección de correo electrónico de destino

    // Contenido del mensaje
    $mail->isHTML(true);
    $mail->Subject = $_POST['subject'];
    $mail->Body = $_POST['message'];

    $mail->send();
    echo 'El correo electrónico ha sido enviado con éxito.';
} catch (Exception $e) {
    echo "Error al enviar el correo electrónico: {$mail->ErrorInfo}";
}
?>
