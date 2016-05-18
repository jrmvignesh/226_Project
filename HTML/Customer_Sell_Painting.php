<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>The Art Gallery</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="../CSS/Welcome.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>

<?php
session_start();
$customer=$_SESSION["Customer"];

$servername="localhost";
$username="root";
$pass="";
$dbname="mydb";
$conn=new mysqli($servername,$username,$pass,$dbname);


    $result1=$conn->query("select * from paintings where CustomerUsername_Purchase='$customer'");

?>

<body>
<div>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div>
                <a class="navbar-brand" href="Customer_Home.php">Customer Home</a>
            </div>
            <ul class="nav navbar-nav">
                <li>
                    <a href="Customer_Home.php">Events</a>
                </li >
                <li class="nav-item">
                    <a class="nav-link" href="Customer_Buy_Painting.php">Buy Painting</a>
                </li>
                <li class="nav-item active">

                    <a class="nav-link" href="Customer_Sell_Painting.php">Sell Painting</a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="nav-item">
                    <a class="nav-link" href="Welcome.html" style="">Logout</a>
                </li>
            </ul>
        </div>
    </nav>
    <div>
        This will describe all the paintings to the customer which he has already bought.
        It can just have a sell button in front of each painting which he can click and sell it.
        There will also be a ask price text area which will update the new ask price. We have to think about the date
        whether needs to change it or not.

        <?php
        if($result1!=NULL && $result1->num_rows>0)
        {

            echo "<ol><table class='table'><tr><th>Serial No</th><th>Painting ID</th><th>Sell</th></tr>";
            while ($row = $result1->fetch_assoc())
            {
                $evid=$row["Painting_ID"];
                echo "<tr><td><li></td><td>".$evid."</td><td>"."&nbsp;&nbsp;&nbsp;<input type=button value=Sell onclick=\"location = 'customer_sells.php?PID=$evid'\"/></td></tr>";
            }
            echo "</table></ol>";
        }
        ?>



    </div>
</div>
</body>
</html>