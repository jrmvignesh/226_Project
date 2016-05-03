<html>
<head><title>login_check</title></head>
<body bgcolor="#00bfff">
<?php
/**
 * Created by PhpStorm.
 * User: Shibu
 * Date: 5/2/16
 * Time: 1:25 AM
 */

$servername="localhost";
$username="root";
$pass="";
$dbname="mydb";
$conn=new mysqli($servername,$username,$pass,$dbname);

$pid=$_SESSION["PaintingID"];
if(isset($_SESSION["Visitor"]) && $_SESSION["Visitor"]=="Customer") {
$cname=$_SESSION["CustomerName"];
}
else if(isset($_SESSION["Visitor"]) && $_SESSION["Visitor"]=="Artist")
{
    $cname=$_SESSION["Artist"];
}

$sql="update Paintings set CUsernameSell='$cname' where Painting_ID='$pid'";
$sql1="update Paintings set ANameSell='$cname' where Painting_ID='$pid'";

if(isset($_SESSION["Visitor"]))
{
    if($_SESSION["Visitor"]=="Customer")
    {
        if($conn->query($sql)==true)
        {
            echo "Painting Up for Sale";
            header("Location: http://localhost/226_Project/paintings.php");
        }
    }
    else if($_SESSION["Visitor"]=="Artist")
    {
        if($conn->query($sql1)==true)
        {
            echo "Painting Up for Sale";
            header("Location: http://localhost/226_Project/paintings.php");
        }
    }
}

header("Location: http://localhost/226_Project/paintings.php");

?>

</body>
</html>
