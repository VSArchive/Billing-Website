<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    include("BusinessProfile.php");

    $msg = "Name : {$_GET['name']} <br> Email : {$_GET['email']} <br> Subject : {$_GET['subject']}";

    require $_SERVER['DOCUMENT_ROOT'] . '/mail/Exception.php';
    require $_SERVER['DOCUMENT_ROOT'] . '/mail/PHPMailer.php';
    require $_SERVER['DOCUMENT_ROOT'] . '/mail/SMTP.php';

    $mail = new PHPMailer;
    // $mail->isSMTP(); 
    // $mail->SMTPDebug = 2;
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 465;
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth = true;
    $mail->Username = '';
    $mail->Password = '';
    $mail->setFrom('', 'Contact');
    $mail->addAddress($EMAIL, 'Contact');
    $mail->Subject = 'Contact';
    $mail->msgHTML($msg);
    $mail->AltBody = 'HTML messaging not supported';
    $mail->SMTPOptions = array(
                        'ssl' => array(
                            'verify_peer' => false,
                            'verify_peer_name' => false,
                            'allow_self_signed' => true
                        )
                    );
?>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <script src="js/style.js"></script>
        <link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="icon" type="image/gif/png" href="img/profile-no-bg.png">

        <title>
            <?php
                include("BusinessProfile.php");
                echo $NAME
            ?>
        </title>
    </head>
    <body>
        <div style="width:100%;height:100%;">
            <div style="text-align: center;padding-top: 300px;">
                <p><?php 
                    if(!$mail->send()){
                        echo "<p> Mailer Error</p>". $mail->ErrorInfo;;
                    }else{
                        echo "<p> Email Sent! </p>";
                    }
                ?></p>
                <button class="button button3" onclick="back()">Go Back</button>
            </div>
        </div>
    </body>
</html>
