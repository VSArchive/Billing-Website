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
            <a href="billpage.php">Back</a>
        </div>
    </div>

    <div id="login">
        <div>
            <h3 class="title" style="text-align: center; padding-top: 50px">
                Edit Bill
            </h3>
        </div>
        <div class="row card title-skills rounded" style="width: 30%; margin-left: 35%;">
            <?php
                include("config.php");
                session_start();
                if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
                    if($_SERVER['REQUEST_METHOD'] === 'GET'){
                        if($_GET['delete'] != ''){
                            $id = $_GET['delete'];
                            $sql = "DELETE FROM billing_table WHERE id=$id";
                            $result = $conn->query($sql) or die($conn->error);
                            if($result){
                                echo 'Deleted Sucessfully';
                            } else {
                                $conn->error;
                            }
                        } elseif($_GET['id'] != ''){
                            $id = $_GET['id'];
                            $sql = "SELECT item_name,price,count,sale_price FROM billing_table WHERE id=$id";
                            $result = $conn->query($sql) or die($conn->error);
                            $row = $result->fetch_assoc();
                            echo '
                                <form action="billedit.php" method="get">
                                    <input name="name" placeholder="Name" value="'.$row["item_name"].'" class="email" required readonly>
                                    <input id="price" name="price" placeholder="Price" oninput="updateSalePrice()" value="'.$row["price"].'" class="email" required>
                                    <input id="count" name="count" placeholder="Count" oninput="updateSalePrice()" value="'.$row["count"].'" class="email" required>
                                    <input id="sale_price" name="sale_price" placeholder="Sale Price" value="'.$row["sale_price"].'" class="email" required readonly>
                                    <input type="submit" value="Submit">
                                </form>';
                        } elseif($_GET['name'] != '' && $_GET['price'] != '' && $_GET['sale_price'] != ''){
                            $name = $_GET['name']; 
                            $price = $_GET['price'];
                            $count = $_GET['count'];
                            $sale_price = $_GET['sale_price']; 
                            $sql = "UPDATE billing_table
                                    SET item_name='$name', price=$price, count=$count, sale_price=$sale_price
                                    WHERE item_name='$name'";
                            $result = $conn->query($sql) or die($conn->error);
                            header('Location: billpage.php');
                            exit;
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