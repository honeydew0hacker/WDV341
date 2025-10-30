<?php
  $name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : null;
  $email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : null;
  $reason = isset($_POST['reason']) ? htmlspecialchars($_POST['reason']) : null;
?>

<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Contact Form</title>
<style>
	body {
		text-align: center;
	}
</style>

</head>

<body>

   <?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	$name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : null;
  	$email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : null;
  	$reason = isset($_POST['reason']) ? htmlspecialchars($_POST['reason']) : null;


    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require __DIR__ .'/includes/PHPMailer-master/src/Exception.php';
    require __DIR__ .'/includes/PHPMailer-master/src/PHPMailer.php';
    require __DIR__ .'/includes/PHPMailer-master/src/SMTP.php';

    $mail = new PHPMailer(true);

    try {
        // Server settings
        // Enable verbose debug output for troubleshooting.
        // Set to 0 in production to disable.
        $mail->SMTPDebug = 0;
        $mail->isSMTP(); // Use SMTP to send.
        $mail->Host = 'smtp.gmail.com'; // Specify Gmail's SMTP server.
        $mail->SMTPAuth = true; // Enable SMTP authentication.
        $mail->Username = 'pamis.salas@gmail.com'; // Your full Gmail address.
        $mail->Password = 'mgcn ajfy hlpr ktyl'; // Your 16-character App Password.

        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption.
        $mail->Port = 587; // TCP port for TLS.

        // Recipients
        $mail->setFrom($email, $name); // Sender's email and name.
        $mail->addAddress($email, $name); // Recipient's email and name.
        $mail->addReplyTo($email, $name);
		$mail->addCC('pamis.salas@gmail.com');
		// Optional: Add a CC or BCC recipient
        // $mail->addCC('cc_recipient@example.com');
        // $mail->addBCC('bcc_recipient@example.com');

        // Content
        $mail->isHTML(true); // Set email format to HTML.
        $mail->Subject = 'Contact'; // Email subject.
        $mail->Body = '<p>Thank you, </p>' . $name . '<p>, for contacting me. It seems you wanted to talk about: </p>' . $reason . '<br>' . date("l jS \of F Y h:i:s A"); // HTML body.
        $mail->AltBody = 'Thank you for contacting me.'; // Plain text for non-HTML clients.
        // Optional: Add an attachment
        // $mail->addAttachment('/path/to/your/file.pdf', 'filename.pdf');.

        $mail->send();
        echo '<p style=text-align:center;>Message has been sent successfully! You should receive a confirmation email shortly.</style>';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    ?>

</body>
</html>
