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

    <div id="login">
        <div>
            <h3 class="title" style="text-align: center; padding-top: 50px">
                Log In
            </h3>
        </div>
        <div class="row card title-skills rounded item">
            <form action="signIn.php" method="post">
                <?php
                    echo '<input name="email" placeholder="Email" class="email" required>';
                    echo '<input type="password" name="password" placeholder="Password" class="email" required>';
                    echo '<input class="submit-button" type="submit" value="Log In"> <br>';

                    include("config.php");
                    session_start();

                    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
                        header("location: dashboard.php");
                        exit;
                    }

                    if($_SERVER['REQUEST_METHOD'] === 'POST'){
                        $username = $_POST['email'];
                        $sql = "SELECT username, password FROM users_table WHERE username='$username'";
                        $result = $conn->query($sql);
                        $row = $result->fetch_assoc();

                        if($row["username"] == $_POST['email'] && $row["password"] == sha1($_POST['password'])){
                            header('Location: dashboard.php');
                            $_SESSION["loggedin"] = true;
                            $_SESSION["userName"] = $_POST["email"];
                        } else {
                            echo "Invalid login details";
                        }
                    }
                ?>
            </form>
        </div>    
    </div>

</body>
</html>