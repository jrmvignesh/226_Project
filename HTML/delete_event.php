<?php
/**
 * Created by PhpStorm.
 * User: Shibu
 * Date: 5/5/16
 * Time: 1:27 AM
 */

$servername="localhost";
$username="root";
$pass="";
$dbname="mydb";
$conn=new mysqli($servername,$username,$pass,$dbname);
$eventid=$_POST['eventid'];


//Query to delete events
$sql="delete from events where Event_ID='$eventid'";

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
        header("Location: http://localhost/226_Project/HTML/Admin_Delete_Event.php");
    }
    echo "Go back";
}
?>