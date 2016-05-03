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

$result=$conn->query("select * from Paintings");
if($result->num_rows>0)
{
    echo "Paintings Available:<br>";
    while($r=$result->fetch_assoc())
    {
        $pid=$r["Painting_ID"];
        if(isset($_SESSION["CustomerName"]))
        {
            $entityname=$_SESSION["CustomerName"];
            $_SESSION["Visitor"]="Customer";
        }
        else if(isset($_SESSION["Artist"]))
        {
            $entityname=$_SESSION["Artist"];
            $_SESSION["Visitor"]="Artist";
        }

        $pname=$r["Name"];

        echo "<a href='painting.php?PID=$pid'>$pname</a><br>";
    }
}
else
{
    echo "No Paintings at the Moment. Please come again later";
}



?>
</body>
</html>
