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
echo "Hello ".$_SESSION["DealerName"]."<br>";

$name=$_SESSION["DealerName"];
$servername="localhost";
$username="root";
$pass="";
$dbname="mydb";
$conn=new mysqli($servername,$username,$pass,$dbname);

$result=$conn->query("select * from `Customer` where taste = '$name'");
$result1=$conn->query("select * from Events where Dealer_Name='$name'");

if($result->num_rows>0)
{
echo "Customers";
    while ($row = $result->fetch_assoc())
    {
    echo "Customer Name: ".$row["Name"]."<br>";

    }
}

if($result1->num_rows>0)
{
    echo "Events Conducting<br>";
    while ($row = $result1->fetch_assoc())
    {
        echo "Event Name: ".$row["Name"]."<br>";
    }
}


?>
<a href="customers.php">Customers</a><br>
<a href="events.php">Events</a><br>
</body>
</html>
