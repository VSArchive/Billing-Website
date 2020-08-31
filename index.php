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
    <div id="navbar">
        <a href="." id="logo">
            <?php
                echo $NAME
            ?>
        </a>
        <div id="navbar-right1">
            <a id="home-n" class="active" onclick="home()" href="#home">Home</a>
            <a id="contact-n" href="#contact" onclick="contact()">Contact</a>
            <?php
                session_start();
                if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
                    $uName = $_SESSION["userName"];
                    if ($_SERVER['REQUEST_METHOD'] === 'GET'){
                        if($_GET['logout'] == "true"){
                            $_SESSION["loggedin"] = false;
                            echo '<a id="sign-n" href="signIn.php" onclick="SignIn()">Sign In</a>';
                        } else{
                            echo '<a id="sign-n" href="signIn.php" onclick="SignIn()">'.$uName.'</a>';
                        }
                    }
                } else{
                    echo '<a id="sign-n" href="signIn.php" onclick="SignIn()">Sign In</a>';
                }
            ?>
        </div>
    </div>

    <a id="fab" href="#home" class="float">
        <i class="my-float fa fa-arrow-up"></i>
    </a>

    <div onfocus="home()" onmouseover="home()" id="home" class="parallax">
    </div>

    <div onfocus="contact()" onmouseover="contact()" id="contact" style="margin-top: 0px; padding-top: 50px;">
        <div>
            <h3 class="title" style="text-align: center; margin-top: 0px; margin-bottom: 0px; padding-top: 0px;">
                Contact
            </h3>
            <p class="font-italic" style="text-align: center; padding: 0px; margin-top: 0px;">Hear is the way to contact us.</p>
        </div>
        <div class="row card title-skills rounded">
            <div class="contact-column">
                <form action="mail.php" method="get" name="contact-form">
                    <label for="name">Your Name</label>
                    <input type="text" id="name" name="name" placeholder="Name" required>

                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Email" class="email" required>

                    <label for="subject">Subject</label>
                    <textarea id="subject" name="subject" placeholder="Write something.."
                        style="height:200px" required></textarea>

                    <input type="submit" value="Submit">
                </form>
            </div>
            <div class="contact-column">
                <iframe width="100%" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" id="gmap_canvas" src="https://maps.google.com/maps?width=520&amp;height=400&amp;hl=en&amp;q=Sri%20vigneswara%20Super%20Market%20(Naga)%20Tenali+()&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe> <a style='visibility: hidden' href='http://maps-generator.com/'>Maps-Generator.com</a> <script type='text/javascript' src='https://embedmaps.com/google-maps-authorization/script.js?id=cc13daaa34c3ed3e2bf3a99d8f227e7413894777'></script>
                    <br>
                <a href="https://www.facebook.com/" class="fa fa-facebook"></a>
                <a href="mailto:<?php echo $EMAIL ?>" class="fa fa-envelope"></a>
                <a href="tel:<?php echo $PHONE ?>" class="fa fa-phone"></a>
            </div>
        </div>
    </div>
</body>

</html>