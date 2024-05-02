<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor\PHPMailer-master/src/Exception.php';
require 'vendor\PHPMailer-master/src/PHPMailer.php';
require 'vendor\PHPMailer-master/src/SMTP.php';



$email = '';
$subject = '';
$message = '';
$sent = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $errors = [];

    if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
        $errors[] = 'please enter a valid email address';
    }
    if ($subject == '') {
        $errors[] = 'please enter a subject';
    }
    if ($message == '') {
        $errors[] = "please enter a message";
    }

    if (empty($errors)) {

        $mail = new PHPMailer(true);

        try {

            $mail->isSMTP();
            $mail->Host = "smtp.gmail.com";
            $mail->SMTPAuth = "true";
            $mail->Username = "kajaz6563@gmail.com";
            $mail->Password = "ezgxliszxuixmyix";
            $mail->SMTPSecure = "tls";
            $mail->Port = 587;

            $mail->setFrom('kajaz6563@gmail.com');
            $mail->addAddress($_POST["email"]);
            $mail->addReplyTo($email);
            $mail->Subject = $subject;
            $mail->Body = $message;

            $mail->send();
            $sent = true;
        } catch (Exception $e) {
            $errors[] = $mail->ErrorInfo;
        }
    }
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <?php require 'includes/header.php'; ?>
    <h2>contact</h2>

    <?php if ($sent) : ?>
    <p>Message sent.</p>
    <?php else : ?>
    <?php if (!empty($errors)) :  ?>
    <ul>
        <?php foreach ($errors as $error) : ?>
        <li><?= $error ?></li>
        <?php endforeach; ?>
    </ul>

    <?php endif; ?>
    <?php endif; ?>

    <form action="" method="post" id="formContact">
        <div class="form-group">
            <label for="email">Your Email</label>
            <input type="email" name="email" id="email" placeholder="Your email" class="form-control"
                value="<?= htmlspecialchars($email) ?>">
        </div>
        <div class="form-group">
            <label for="subject">Subject</label>
            <input type="text" name="subject" id="subject" placeholder="Subject" class="form-control"
                value="<?= htmlspecialchars($subject) ?>">
        </div>

        <div class="form-group">
            <label for="message">Message</label>
            <textarea name="message" id="message" placeholder="Message" cols="30" rows="10" class="form-control"
                value="<?= htmlspecialchars($message) ?>"></textarea>
        </div>

        <button class="btn form-control">Send</button>



    </form>













    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <?php require 'includes/footer.php'; ?>
</body>


</html>