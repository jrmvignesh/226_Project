<html>
<head><title>login_check</title></head>
<body bgcolor="#00bfff">
<?php
/**
 * Created by PhpStorm.
 * User: Shibu
 * Date: 5/1/16
 * Time: 1:46 AM
 */


session_start();

$servername="localhost";
$username="root";
$pass="";
$dbname="mydb";
$conn=new mysqli($servername,$username,$pass,$dbname);



echo "Customers"."<br>";
echo "Hello ".$_SESSION["DealerName"]."<br>";


if($conn->connect_error)
{
    die("Connection failed: ".$conn->connect_error);
}
else
{
    $result=$conn->query("select * from Customer");

    if($result->num_rows>0)
    {
        while ($row = $result->fetch_assoc())
        {
            $t=$row["Username"];
            echo "<a href='customer.php?UName=$t'>".$row["Username"]."</a><br>";
        }
    }
}

?>
</body>
</html>
