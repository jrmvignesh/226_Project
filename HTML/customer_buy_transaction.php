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


if($conn->query("update Paintings set CustomerUsername_Purchase='$customer',ArtistUsername=NULL,CustomerUsername_Sell=NULL where Painting_ID='$pid'")===TRUE)
{
    echo "Bought the painting";
}

header("Location: http://localhost/226_Project/HTML/Customer_Buy_Painting.php");


?>