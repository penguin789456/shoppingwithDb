<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $link = mysqli_connect(
        'localhost',
        // MySQL主機名稱
        'root',
        // 使用者名稱 
        '123456',
        // 密碼 
        'shoppingwithdb'
    );

    session_start();
    $total = $_SESSION["total"];
    $tel = $_SESSION["tel"];

    date_default_timezone_set('Asia/Taipei'); //設定時間為台北時區
    $date = date('Y-m-d H:i:s');
    $sql = "SELECT tel FROM ordertotal WHERE telPhone=('".$tel."')";
    if(!mysqli_query($link, $sql)){
        $sql = "INSERT INTO ordertotal values('" . $tel . "','" . $total . "','" . $date . "')";
        mysqli_query($link, $sql);
    }
    echo "<h1>感謝購買總金額為：" . $_SESSION["total"] . "</h1>";
    ?>
    <h2><a href="shoping.php">返回商品目錄</a></h2>
</body>

</html>

<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);
//相未設定smtp
/*try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER; //Enable verbose debug output
    $mail->isSMTP(); //Send using SMTP
    $mail->Host = 'smtp.example.com'; //Set the SMTP server to send through
    $mail->SMTPAuth = true; //Enable SMTP authentication
    $mail->Username = 'user@example.com'; //SMTP username
    $mail->Password = 'secret'; //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //Enable implicit TLS encryption
    $mail->Port = 465; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('from@example.com', 'Mailer');
    $mail->addAddress('joe@example.net', 'Joe User'); //Add a recipient
    $mail->addAddress('ellen@example.com'); //Name is optional
    $mail->addReplyTo('info@example.com', 'Information');
    $mail->addCC('cc@example.com');
    $mail->addBCC('bcc@example.com');

    //Attachments
    $mail->addAttachment('/var/tmp/file.tar.gz'); //Add attachments
    $mail->addAttachment('/tmp/image.jpg', 'new.jpg'); //Optional name

    //Content
    $mail->isHTML(true); //Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}*/
?>
