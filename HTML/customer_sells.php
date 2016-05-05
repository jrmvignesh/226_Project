<?php
/**
 * Created by PhpStorm.
 * User: Shibu
 * Date: 5/4/16
 * Time: 2:00 PM
 */

session_start();
$customer=$_SESSION["Customer"];
$pid=$_GET["PID"];
$servername="localhost";
$username="root";
$pass="";
$dbname="mydb";
$conn=new mysqli($servername,$username,$pass,$dbname);

//Update when painting is up for sale.
if($conn->query("update Paintings set CustomerUsername_Sell='$customer' where Painting_ID='$pid'")===TRUE)
{
    echo "Up for sale";
}

header("Location: http://localhost/226_Project/HTML/Customer_Sell_Painting.php");


?>