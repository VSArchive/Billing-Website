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
            <a href="signUp.php">New User</a>
            <a href="index.php?logout=true">Logout</a>
        </div>
    </div>
    <div class="options">
        <div class="row card rounded" style="padding: 100px;">
            <?php
                session_start();
                if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
                    echo '<a href="billpage.php">Billing</a><br>
                            <a href="entry.php">Product Entry</a><br>
                            <a href="edit.php">Edit Product</a>';
                } else{
                    echo "you are not Logdin";
                }
            ?>
        </div>
    </div>
</body>

</html>