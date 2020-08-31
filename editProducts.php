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
            <a href="edit.php">Back</a>
        </div>
    </div>

    <div id="login">
        <div>
            <h3 class="title" style="text-align: center; padding-top: 50px">
                Edit Product
            </h3>
        </div>
        <div class="row card title-skills rounded" style="width: 30%; margin-left: 35%;">
            <?php
                include("config.php");
                session_start();
                if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
                    if($_SERVER['REQUEST_METHOD'] === 'GET'){
                        if($_GET['id'] != "" && $_GET['qrcode'] == "" && $_GET['name'] == "" && $_GET['mrp'] == "" && $_GET['price'] == ""){
                            $id = $_GET['id'];
                            $sql = "SELECT qr,item_name,mrp,sale_price FROM items_table WHERE id=$id";
                            $result = $conn->query($sql) or die($conn->error);
                            $row = $result->fetch_assoc();
                            echo '
                                <form action="editProducts.php" method="get">
                                    <input name="qrcode" placeholder="Qr Code" value="'.$row["qr"].'" class="email" required>
                                    <input name="name" placeholder="Name"  value="'.$row["item_name"].'" class="email" required readonly>
                                    <input name="mrp" placeholder="Mrp"  value="'.$row["mrp"].'" class="email" required>
                                    <input name="price" placeholder="Sale Price"  value="'.$row["sale_price"].'" class="email" required>
                                    <input type="submit" value="Submit">
                                </form>';
                        }
                        if($_GET['qrcode'] != "" && $_GET['name'] != "" && $_GET['mrp'] != "" && $_GET['price'] != ""){
                            $qrcode = $_GET['qrcode']; 
                            $name = $_GET['name']; 
                            $mrpItem = $_GET['mrp']; 
                            $price = $_GET['price']; 
                            $sql = "UPDATE items_table
                                    SET qr=$qrcode, item_name='$name', mrp=$mrpItem, sale_price=$price
                                    WHERE item_name='$name'";
                            $result = $conn->query($sql) or die($conn->error);
                            header('Location: edit.php');
                        }
                    }
                } else{
                    echo "you are not Logdin";
                }
            ?>
        </div>    
    </div>

</body>
</html>