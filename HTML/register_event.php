<html>
<head><title>Art Dealer Login Check</title></head>
<body bgcolor="#00bfff">
<?php
/**
 * Created by PhpStorm.
 * User: Shibu
 * Date: 5/3/16
 * Time: 7:26 PM
 */
session_start();
$cname=$_GET["CUName"];
$evid=$_GET["EVID"];

$server="localhost";
$db="mydb";
$user="root";
$pass="";
$conn=new mysqli($server,$user,$pass,$db);
$sql="insert into register_events values('$evid','$cname')";
$dsql="delete from register_events where Event_ID='$evid' and Username='$cname'";

$s="if not exists (select * from register_events where Event_ID='$evid' and Username='$cname') ";
if($conn->connect_error)
{
    die("Connection Failed ".$conn->connect_error);
}
else
{
if($conn->query($sql)===TRUE)
{
    echo "Registered for event";
    header("Location: http://localhost/226_Project/HTML/Customer_Home.php");
}
    else
    {
        echo "Error during insertion. Registration already exists";
    }
}


?>
</body>
</html>
