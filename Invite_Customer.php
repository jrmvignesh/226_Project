<html>
<head><title>login page</title></head>
<body bgcolor="#00bfff">

<?php
session_start();
$servername="localhost";
$username="root";
$pass="";
$dbname="mydb";
$conn=new mysqli($servername,$username,$pass,$dbname);
/**
 * Created by PhpStorm.
 * User: Shibu
 * Date: 5/1/16
 * Time: 2:36 AM
 */

echo "Hello "."<br>";
$cname=$_SESSION["Invite"];
$names=$_SESSION["Name"];

echo $_SESSION["Invite"];

$sql="Update Customer set Taste='$names' where Username='$cname'";

if($conn->query($sql)===TRUE)
{
    echo "Updated successfully";
}

header("Location: http://localhost/226_Project/customers.php")

?>
</body>
</html>
