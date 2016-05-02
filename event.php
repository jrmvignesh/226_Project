<html>
<head><title>login page</title></head>
<body bgcolor="#00bfff">

<?php

/**
 * Created by PhpStorm.
 * User: Shibu
 * Date: 5/1/16
 * Time: 7:22 PM
 */
session_start();

$eid=$_GET["EID"];
$_SESSION["EventID"]=$eid;
$servername="localhost";
$username="root";
$pass="";
$dbname="mydb";
$conn=new mysqli($servername,$username,$pass,$dbname);

$result=$conn->query("select * from Events where Event_ID=$eid");

if(isset($_SESSION["VisitorType"]))
{
    if($_SESSION["VisitorType"]=="Customer")
    {
        echo "Hello ".$_SESSION["CustomerName"]."<br>";
    }
    else
    {
        echo "Hello ".$_SESSION["DealerName"]."<br>";
    }
}

if($result->num_rows>0)
{
    while($row=$result->fetch_assoc())
    {
        $eids=$row["Event_ID"];
        $ename=$row["Name"];
        $elocation=$row["Location"];
        $etheme=$row["Theme"];
        $edate=$row["Date"];

        echo "Event ID: ".$eids."<br>";
        echo "Event Name: ".$ename."<br>";
        echo "Event Location: ".$elocation."<br>";
        echo "Event Theme: ".$etheme."<br>";
        echo "Event Date: ".$edate."<br>";
        break;
    }
}

if(isset($_SESSION["VisitorType"]))
{
    if($_SESSION["VisitorType"]=="Customer")
    {
        echo "<input type=\"button\" value=\"Register\" onclick=\"location='Register_Event.php'\"/><br>";
    }
    else
        echo "<input type=\"button\" value=\"Conduct\" onclick=\"location='Conduct_Event.php'\"/><br>";
}

?>


</body>
</html>