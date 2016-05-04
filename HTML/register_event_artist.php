<?php
/**
 * Created by PhpStorm.
 * User: Shibu
 * Date: 5/3/16
 * Time: 7:26 PM
 */
session_start();
$aname=$_GET["AName"];
$evid=$_GET["EVID"];

$server="localhost";
$db="mydb";
$user="root";
$pass="";
$conn=new mysqli($server,$user,$pass,$db);
$sql="insert into register_events_artist values('$evid','$aname')";
$dsql="delete from register_events_artist where Event_ID='$evid' and Username='$aname'";

$s="if not exists (select * from register_events where Event_ID='$evid' and Username='$aname') ";
if($conn->connect_error)
{
    die("Connection Failed ".$conn->connect_error);
}
else
{
    if($conn->query($sql)===TRUE)
    {
        echo "Registered for event";
        header("Location: http://localhost/226_Project/HTML/Artist_Home.php");
    }
    else
    {
        echo "Error during insertion. Registration already exists";
    }
}


?>