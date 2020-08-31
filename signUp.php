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
        <div id="navbar-right1">
            <a href="dashboard.php">Back</a>
        </div>
    </div>
    <div id="login">
        <div>
            <h3 class="title" style="text-align: center; padding-top: 50px">
                New User
            </h3>
        </div>
        <div class="row card title-skills rounded item">
            <form action="signUp.php" method="post">
                <?php
                    include("config.php");
                    session_start();
                    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
                        echo '<input name="uname" placeholder="User Name" class="email" required>';
                        echo '<input type="password" name="password" placeholder="Password" class="email" required>';
                        echo '<input type="password" name="confirmpassword" placeholder="Confirm Password" class="email" required>';
                        echo '<input class="submit-button" type="submit" value="Register"> <br>';
                        if($_SERVER['REQUEST_METHOD'] === 'POST'){
                            $uname = $_POST['uname']; 
                            $password = $_POST['password']; 
                            $confirmpassword = $_POST['confirmpassword'];
                            if ($password == $confirmpassword){
                                $sql = "INSERT INTO users_table(username,password) VALUES('$uname', sha1('$confirmpassword'))";
                                if ($conn->query($sql) === TRUE) {
                                    echo "<p>New User created successfully</p>";
                                } else {
                                    echo "Error: ". $conn->error;
                                }
                            } else{
                                echo "<p>Password should be same</p>";
                            }
                        }
                    } else{
                        echo "you are not Logdin";
                    }
                ?>
            </form>
        </div>    
    </div>

    <?php
        
    ?>

</body>
</html>
