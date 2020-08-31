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
                Billing
            </h3>
        </div>
        <div class="row card title-skills rounded" style="width: 90%; margin-left: 5%;">
            <form action='billing.php' method="get">
                <input id="ItemName" name="ItemName" class="billing-input" placeholder="Item Name"></input>
                <button id="searchButton" class="billing-button fa fa-search"></button>
            </form>

            <?php
                include("config.php");
                session_start();
                if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
                    if($_SERVER['REQUEST_METHOD'] === 'GET'){
                        $name = $_GET['ItemName'];
                        $sql = "SELECT * FROM items_table where item_name LIKE '%$name%' LIMIT 10";
                        $result = $conn->query($sql);

                        echo "<p class='editPara'>"."Item Name"."</p>
                        <p class='editPara'>"."Mrp"."</p>
                        <p class='editPara'>"."Sale Price"."</p> 
                        <button class='editButton' style='visibility: hidden;'>Edit</button> <br>";

                        while($row = $result->fetch_assoc()){
                            echo "<p class='editPara'>".$row['item_name']."</p>
                            <p class='editPara'>".$row['mrp']."</p>
                            <p class='editPara'>".$row['sale_price']."</p> 
                            <form action='billpage.php' style='margin-bottom: 0;' method='post'>
                                <button name='id' class='editButton' type='submit' value='".$row['id']."'>Add</button>
                            </form>";
                        }
                    } else if ($_SERVER['REQUEST_METHOD'] === 'POST'){
                        $id = $_POST['id'];
                        $sql1 = "SELECT qr,item_name,mrp,sale_price FROM items_table WHERE id=$id";
                        $result = $conn->query($sql1) or die($conn->error);
                        $row = $result->fetch_assoc();
                        echo "<p class='editPara'>".$row['item_name']."</p>
                        <p class='editPara'>".$row['mrp']."</p>
                        <p class='editPara'>".$row['sale_price']."</p> 
                        <form action='billpage.php' style='margin-bottom: 0;' method='post'>
                            <button name='id' class='editButton' type='submit' value='".$row['id']."'>Add</button>
                        </form>";
                    }
                } else{
                    echo "you are not Logdin";
                }
            ?>
            
        </div>

        <script>
            var popup = document.getElementById("searchPopUp");
            var btn = document.getElementById("searchButton");
            var span = document.getElementsByClassName("close")[0];
            btn.onclick = function() {
                popup.style.display = "block";
            }
            span.onclick = function() {
                popup.style.display = "none";
            }
            window.onclick = function(event) {
                if (event.target == popup) {
                    popup.style.display = "none";
                }
            }
        </script>
    </div>

</body>
</html>


