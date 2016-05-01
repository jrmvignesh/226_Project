<html>
<head><title>login_check</title></head>
<body bgcolor="#00bfff">
<?php
/**
 * Created by PhpStorm.
 * User: Shibu
 * Date: 5/1/16
 * Time: 2:03 AM
 */
session_start();
$servername="localhost";
$username="root";
$pass="";
$dbname="mydb";
$conn=new mysqli($servername,$username,$pass,$dbname);


$user=$_GET["UName"];

$result=$conn->query("select * from Customer where Username='$user'");

if($result->num_rows>0)
{

    while ($row = $result->fetch_assoc())
    {
    echo "Username ".$row["Username"]."<br>";
        echo "Name ".$row["Name"]."<br>";
        echo "Age ".$row["Age"]."<br>";
        echo "Sex ".$row["Sex"]."<br>";
        echo "Taste ".$row["Taste"]."<br>";
        $_SESSION["cname"]=$row["Username"];
        $_SESSION["Invite"]=$row["Username"];

        break;

    }
}



?>
<input type="button" value="Invite" onclick="location='Invite_Customer.php'"/>
</body>
</html>
