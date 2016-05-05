<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>


<?php
session_start();

$dealername=$_SESSION["DealerName"];

$servername="localhost";
$username="root";
$pass="";
$dbname="mydb";
$conn=new mysqli($servername,$username,$pass,$dbname);

$sql="select  C.Username,C.Style,E.Name from Artist C inner join Events E on C.Style=E.Theme
 inner join `Art Dealer` A on A.Username=E.DealerName where A.Username='$dealername'";

//using View to select artists who have matching style and having a dealer from whom invite has arrived
$sql1="create or replace view artistinvites as (select distinct A.Username from Artist A
inner join Events E on A.Style=E.Theme
inner join `Art Dealer` AD on AD.Username=E.DealerName where AD.Username='$dealername')";

$result1=NULL;
if($conn->query($sql1)===TRUE)
$result1=$conn->query("select * from artistinvites");

?>


<body>
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
<body>
<div>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div>
                <a class="navbar-brand" href="Artdealer_Home.php">Artdealer Home</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="nav-item">
                    <a href="Artdealer_Home.php">Events</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Artdealer_Painting.php">Update Painting</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Artdealer_Employee.php">Employee</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Artdealer_Invite_Customer.php">Invite Customer</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="Artdealer_Invite_Artist.php">Invite Artist</a>
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
        This will describe all the artis whom can be invited to the event. We can give a invite button and event id dropdown<br><br>
        <?php

        $_SESSION["Visit"]="Artist";
        if($result1!=NULL && $result1->num_rows>0)
        {

            while($row=$result1->fetch_assoc())
            {
                $_SESSION["Visit"]="Artist";
                $cus=$row["Username"];


                echo $cus."&nbsp;&nbsp;&nbsp;"."&nbsp;&nbsp;&nbsp;"."  &nbsp;&nbsp; <input type=button value=Invite onclick=\"location='invite_customer.php?CUName=$cus'\"/><br>";
            }
        }
        ?>



    </div>
</div>
</body>
</html>