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


$name=$_POST["name"];
$job=$_POST["job_role"];


$conn=new mysqli($servername,$username,$pass,$dbname);
$dname=$_SESSION["DealerName"];


//Query to add employee
$sql="insert into Employee VALUES (DEFAULT,'$name','$job','$dname')";

if($conn->connect_error)
{
    die("Connection failed: ".$conn->connect_error);
}
else
{
    if($conn->query($sql)===TRUE)
    {
        $file=fopen('log','a');
        $date=date_create();
         fwrite($file,$sql."\t".date_format($date,'Y-m-d H:i:s')."\n");
        echo "Inserted successfully";

    }
    else
    {
        echo "Try again with another username";
    }
}
//header("Location: http://localhost/226_Project/HTML/Artdealer_Employee.php");

$conn->close();

?>