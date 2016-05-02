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
$cname=$_SESSION["CustomerName"];
$sql="if not exists(select * from Customer_Events where Event_ID='$eid' and Username='$cname') insert into Customer_Events values ('$eid','$cname')";


if(isset($_SESSION["VisitorType"]))
{
    if($_SESSION["VisitorType"]=="Customer")
    {
        echo "Hello ".$_SESSION["CustomerName"]."<br>";
    }
}

if($conn->query($sql))
{
    echo $_SESSION["CustomerName"]." <br>You have registered for the event ".$_SESSION["EventID"]." successfully";
}
else
{
    echo "You have already registered";
}

header("Location: http://localhost/226_Project/events.php");







?>
</body>
</html>
