<?php
/**
 * Created by PhpStorm.
 * User: Shibu
 * Date: 5/3/16
 * Time: 4:46 AM
 */
session_start();
$cname=$_GET["CUName"];
$dealername=$_SESSION["DealerName"];

$servername="localhost";
$username="root";
$pass="";
$dbname="mydb";
$conn=new mysqli($servername,$username,$pass,$dbname);

$sql="update Customer set DealerName='$dealername' where Username='$cname'";
$sql1="update Artist set DealerName='$dealername' where Username='$cname'";

if($conn->connect_error)
{
    die("Connection failed: ".$conn->connect_error);
echo "error";
}
else {
    echo "sf";
    echo "Hi";
    if($_SESSION["Visit"]=="Customer") {
        if ($conn->query($sql) == TRUE) {
            echo "Success";
            header("Location: http://localhost/226_Project/HTML/Artdealer_Invite_Customer.php");
        }
    }

    else if($_SESSION["Visit"]=="Artist")
    {
        echo "No way";
        if ($conn->query($sql1) == TRUE) {
            echo "Success";
            header("Location: http://localhost/226_Project/HTML/Artdealer_Invite_Artist.php");
            echo "a";
        }
    }
    else echo "No way";
}

?>