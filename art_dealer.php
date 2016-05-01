<html>
<head><title>login page</title></head>
<body bgcolor="#00bfff">


<?php
/**
 * Created by PhpStorm.
 * User: Shibu
 * Date: 5/1/16
 * Time: 1:20 AM
 */
session_start();
echo "Hello ".$_SESSION["Name"]."<br>";

$name=$_SESSION["Name"];
$servername="localhost";
$username="root";
$pass="";
$dbname="mydb";
$conn=new mysqli($servername,$username,$pass,$dbname);
$result=$conn->query("select * from `Customer` where taste = '$name'");
if($result->num_rows>0)
{

    while ($row = $result->fetch_assoc())
    {
    echo "Customer Name: ".$row["Name"]."<br>";

    }
}

?>
<a href="customers.php">Customers</a>
</body>
</html>
