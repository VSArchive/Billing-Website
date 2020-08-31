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
            <a href="billpage.php?clear=true">Delete All</a>
            <a href="dashboard.php">Back</a>
        </div>
    </div>
    <div id="login">
        <div>
            <h3 class="title" style="text-align: center; padding-top: 50px">
                Billing
            </h3>
        </div>
        <div class="row card title-skills rounded" style="width: 90%; margin-left: 5%;">

            <?php
                include("config.php");
                session_start();
                if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){

                    echo "<p class='editParaBilling'>S.No</p>
                    <p class='editParaBilling'>Item Name</p>
                    <p class='editParaBilling'>Price</p>
                    <p class='editParaBilling'>Count</p>
                    <p class='editParaBilling'>Sale Price</p>
                    <form action='billsearch.php' style='margin-bottom: 0;' method='get'>
                        <button name='ItemName' class='editButton' type='submit' >Add</button>
                    </form>";

                    if($_SERVER['REQUEST_METHOD'] === 'GET'){
                        if ($_GET['clear'] == 'true'){
                            $sql = "DELETE FROM billing_table";
                            $result = $conn->query($sql);
                            header('Location: dashboard.php');
                            exit;
                        }
                    }

                    if($_SERVER['REQUEST_METHOD'] === 'POST'){

                        $itemId = $_POST['id'];
                        $getItemSql = "SELECT qr,item_name,mrp,sale_price FROM items_table WHERE id=$itemId";
                        $getItemQuery = $conn->query($getItemSql);
                        $itemDetails = $getItemQuery->fetch_assoc();
                        $item_name = $itemDetails['item_name'];
                        $price = $itemDetails['sale_price'];

                        $Sql123 = "SELECT * FROM billing_table WHERE item_name='$item_name'";
                        $Query = $conn->query($Sql123);
                        $items = $Query->fetch_assoc();
                        if ($items != null){
                            $count = $items['count'] + 1;
                            $price = $items['price'];
                            $sale_price = $count * $price;
                            $increaseCountSql = "UPDATE billing_table SET count=$count, sale_price='$sale_price' WHERE item_name='$item_name'";
                            $conn->query($increaseCountSql);
                        } else {
                            $count = 1;
                            $sale_price = $price * $count;
                            $insertToBillingSql = "INSERT INTO billing_table(item_name,price,count,sale_price) VALUES('$item_name', '$price', $count, '$sale_price')";
                            $insertToBillingQuery = $conn->query($insertToBillingSql);
                        }

                    }

                    $sql = "SELECT * FROM billing_table";
                    $result = $conn->query($sql);
                    
                    $i =1;
                    $total = 0;
                    while ($row = $result->fetch_assoc()){
                        echo "<p class='editParaBilling'>".$i."</p>
                        <p class='editParaBilling'>".$row['item_name']."</p>
                        <p class='editParaBilling'>".$row['price']."</p>
                        <p class='editParaBilling'>".$row['count']."</p>
                        <p class='editParaBilling'>".$row['sale_price']."</p>
                        <form action='billedit.php' style='margin-bottom: 0;' method='get'>
                            <button name='id' class='editButton fa fa-edit' type='submit' value='".$row['id']."'></button>
                            <button name='delete' class='editButton fa fa-trash' type='submit' value='".$row['id']."'></button>
                        </form>";
                        
                        $i++;
                        $total += $row['sale_price'];
                    }
                    echo "<p class='editParaBilling' style='visibility: hidden'></p>
                    <p class='editParaBilling' style='visibility: hidden'></p>
                    <p class='editParaBilling' style='visibility: hidden'></p>
                    <p class='editParaBilling' style='visibility: hidden'></p>
                    <p class='editParaBilling'>".$total."</p>
                    <form action='print.php' style='margin-bottom: 0; margin-top: 1;' method='post'>
                        <button class='editButton' type='submit'>Print</button>
                    </form>";

                } else{
                    echo "you are not Logdin";
                }
            ?>
            
        </div>

    </div>

</body>
</html>
