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
$artist=$_SESSION["Artist"];

$servername="localhost";
$username="root";
$pass="";
$dbname="mydb";
$conn=new mysqli($servername,$username,$pass,$dbname);

$result=$conn->query("select DealerName from Artist where Username='$artist'");

$dealer=NULL;

if($result->num_rows>0) {
    while ($row=$result->fetch_assoc()) {
        $dealer=$row["DealerName"];
        break;
    }
}
//Select those events which match the style of the artist and those are conducted by art dealer from whom invite has come
$result1=NULL;
if($dealer!=NULL)
    $result1=$conn->query("select distinct E.Event_ID from Events E inner join Artist AR on E.Theme=AR.Style inner join `Art Dealer` A on A.Username=AR.DealerName where AR.DealerName='$dealer' and AR.UserName='$artist'");

?>



<body>
<div>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div>
                <a class="navbar-brand" href="#">Artist Home</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="nav-item active">
                    <a href="#">Events</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Artist_Sell_Painting.php">Sell Painting</a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="nav-item">
                    <a class="nav-link" href="Welcome.html" style="">Logout</a>
                </li>
            </ul>
        </div>
    </nav>
</div>
<div>
    This will describe all the events he is attending and for which he has been invited. He can click on the event and register
    for it.


    <?php
    if($result1!=NULL && $result1->num_rows>0)
    {

        echo "<ol><table class= table><thead><tr><th>Serial No</th><th>Event ID</th><th>Register</th></thead></tr>";
        while ($row = $result1->fetch_assoc())
        {
            $evid=$row["Event_ID"];
            echo "<tr><td><li></td><td>


".$evid.""."</td><td>

<input type=button value=Register  class = btn btn-success  onclick=\"location = 'register_event_artist.php?AName=$artist&EVID=$evid'\"/></td></tr>";
        }
        echo "</table></ol>";
    }
    ?>


    </div>
</body>
</html>