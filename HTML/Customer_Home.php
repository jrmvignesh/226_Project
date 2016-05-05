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
$customer=$_SESSION["Customer"];

$servername="localhost";
$username="root";
$pass="";
$dbname="mydb";
$conn=new mysqli($servername,$username,$pass,$dbname);

$result=$conn->query("select DealerName from Customer where Username='$customer'");

if($result->num_rows>0) {
    while ($row=$result->fetch_assoc()) {
$dealer=$row["DealerName"];
        break;
    }
}
$result1=NULL;
if($dealer!=NULL)
$result1=$conn->query("select distinct E.Event_ID from Events E inner join Customer C on E.Theme=C.Taste inner join `Art Dealer` A on A.Username=C.DealerName where C.DealerName='$dealer' and C.Username='$customer'");

?>
<body>
<div>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div>
    <a class="navbar-brand" href="#">Customer Home</a>
        </div>
    <ul class="nav navbar-nav">
        <li class="nav-item active">
            <a href="#">Events</a>
        </li>
        <li class="nav-item">
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
        This will describe all the events customer is attending and for which he has been invited. He can click on the event and register
        for it.



        <?php
        if($result1!=NULL && $result1->num_rows>0)
        {
            echo "<br><br>Event Invites<br>";
            echo "<ol>";
            while ($row = $result1->fetch_assoc())
            {
                $evid=$row["Event_ID"];
                echo "<li>".$evid."&nbsp;&nbsp;&nbsp;"."&nbsp;&nbsp;&nbsp;<input type=button value=Register onclick=\"location = 'register_event.php?CUName=$customer&EVID=$evid'\"/> <br>";
            }
            echo "</ol>";
        }
        ?>
    </div>
    </div>
</body>
</html>