<html>
<head><title>login_check</title></head>
<body bgcolor="#00bfff">
<?php
/**
 * Created by PhpStorm.
 * User: Shibu
 * Date: 5/1/16
 * Time: 8:33 PM
 */
$servername="localhost";
$username="root";
$pass="";
$dbname="mydb";
$conn=new mysqli($servername,$username,$pass,$dbname);

$eid=$_SESSION["EventID"];
$dname=$_SESSION["DealerName"];
$sql="update Events values set Dealer_Name='$dname' where Event_ID='$eid'";


if(isset($_SESSION["VisitorType"]))
{
    if($_SESSION["VisitorType"]=="Dealer")
    {
        echo "Hello ".$_SESSION["DealerName"]."<br>";
    }
}

if($conn->query($sql))
{
    echo $_SESSION["DealerName"]." <br>You have ready to conduct the event ".$_SESSION["EventID"]." All the Best";
}
else
{
    echo "You have already conducted the event";
}

header("Location: http://localhost/226_Project/events.php");


?>
</body>
</html>
