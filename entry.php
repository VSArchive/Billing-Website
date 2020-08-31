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
                Product Entry
            </h3>
        </div>
        <div class="row card title-skills rounded item">
            <form action="entry.php" method="post">

                <?php
                    include("config.php");
                    session_start();
                    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
                        echo '<input name="qrcode" placeholder="Qr Code" class="email" required>';
                        echo '<input name="name" placeholder="Name" class="email" required>';
                        echo '<input name="mrp" placeholder="Mrp" class="email" required>';
                        echo '<input name="price" placeholder="Sale Price" class="email" required>';
                        echo '<input class="submit-button" type="submit" value="Submit"> <br>';
                        if($_SERVER['REQUEST_METHOD'] === 'POST'){
                            $qrcode = $_POST['qrcode']; 
                            $name = $_POST['name']; 
                            $mrpItem = $_POST['mrp']; 
                            $price = $_POST['price']; 
                            $sql = "INSERT INTO items_table(qr,item_name,mrp,sale_price) VALUES($qrcode,'$name',$mrpItem,$price)";
                            if ($conn->query($sql) === TRUE) {
                                echo "New record created successfully";
                            } else {
                                echo "Error: " . $conn->error;
                            }
                        }
                    } else{
                        echo "you are not Logdin";
                    }
                ?>
                
            </form>
        </div>    
    </div>

</body>
</html>
