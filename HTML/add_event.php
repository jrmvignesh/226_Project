<?php
/**
 * Created by PhpStorm.
 * User: Shibu
 * Date: 5/1/16
 * Time: 3:27 AM
 */
session_start();
$servername="localhost";
$username="root";
$pass="";
$dbname="mydb";

$event_id=1001;
$name=$_POST["name"];
$location=$_POST["location"];
$theme=$_POST["theme"];
$date=$_POST["date"];

$conn=new mysqli($servername,$username,$pass,$dbname);
$dname=$_SESSION["DealerName"];

//Query to add event
$sql="insert into Events VALUES (DEFAULT,'$name','$location','$theme','$date','$dname')";

if($conn->connect_error)
{
    die("Connection failed: ".$conn->connect_error);
}
else
{
    if($conn->query($sql)===TRUE)
    {
        echo "Inserted successfully";
    }
    else
    {
        echo "Try again with another username";
    }
}

header("Location: http://localhost/226_Project/HTML/Artdealer_Home.php");
$conn->close();



?>