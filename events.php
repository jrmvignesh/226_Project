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
$servername="localhost";
$username="root";
$pass="";
$dbname="mydb";
$conn=new mysqli($servername,$username,$pass,$dbname);

$result=$conn->query("select * from Events");
if($result->num_rows>0)
{
    echo "Events Available:<br>";
    while($r=$result->fetch_assoc())
    {
        $eid=$r["Event_ID"];
        if(isset($_SESSION["CustomerName"]))
        {
            $entityname=$_SESSION["CustomerName"];
            $_SESSION["VisitorType"]="Customer";
        }
        else if(isset($_SESSION["DealerName"]))
        {
            $entityname=$_SESSION["DealerName"];
            $_SESSION["VisitorType"]="Dealer";
        }
        $ename=$r["Name"];

      echo "<a href='event.php?EID=$eid'>$ename</a><br>";
    }
}
else
{
    echo "No Events at the Moment. Please come again later";
}



?>
</body>
</html>
