<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>The Art Gallery</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>

<?php
session_start();

$customername=$_SESSION["Customer"];

$servername="localhost";
$username="root";
$pass="";
$dbname="mydb";
$conn=new mysqli($servername,$username,$pass,$dbname);

$sql="select * from paintings where ((ArtistUsername is not NULL) or (CustomerUsername_Sell is not null))";
$s="and CustomerUsername_Purchase!='$customername'";
$result1=$conn->query($sql);
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
                <li class="nav-item active">
                    <a class="nav-link" href="Customer_Buy_Painting.php">Buy Painting</a>
                </li>
                <li class="nav-item">
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
        This will describe all the paintings to the customer which he can buy. It can just have a buy button which he can click and buy it.

        <?php

        if($result1!=NULL && $result1->num_rows>0)
        {
            echo "<br><br>Paintings available to purchase<br>";
            echo "<ol>";
            while ($row = $result1->fetch_assoc())
            {
                $pid=$row["Painting_ID"];
                $nam=$row["Name"];
                echo "<li>".$pid."&nbsp;&nbsp;&nbsp;".$nam."&nbsp;&nbsp;&nbsp;<input type=button value=Buy onclick=\"location = 'customer_buy_transaction.php?PID=$pid'\"/> <br>";
            }
            echo "</ol>";
        }
        ?>



    </div>
</div>
</body>
</html>