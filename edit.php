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
                Edit Product
            </h3>
        </div>
        <div class="row card title-skills rounded" style="width: 90%; margin-left: 5%;">
            <?php
                include("config.php");
                session_start();
                if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
                    $sql = "SELECT * FROM items_table";
                    $result = $conn->query($sql);

                    echo "<p class='editPara'>"."Qr Code"."</p>
                    <p class='editPara'>"."Item Name"."</p>
                    <p class='editPara'>"."Mrp"."</p>
                    <p class='editPara'>"."Sale Price"."</p>
                    <button class='editButton' style='visibility: hidden;'>Edit</button>";

                    while($row = $result->fetch_assoc()){
                        echo "<p class='editPara'>".$row['qr']."</p>
                        <p class='editPara'>".$row['item_name']."</p>
                        <p class='editPara'>".$row['mrp']."</p>
                        <p class='editPara'>".$row['sale_price']."</p> 
                        <form action='editProducts.php' style='margin-bottom: 0;' method='get'>
                            <button name='id' class='editButton' type='submit' value='".$row['id']."'>Edit</button>
                        </form>";
                    }
                } else{
                    echo "you are not Logdin";
                }
            ?>
        </div>    
    </div>

</body>
</html>