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
$cname=$_SESSION["CustomerName"];
$pid=$_SESSION["PaintingID"];
$sql="update Paintings set CUsernamePurchase='$cname' where Painting_ID='$pid'";

if(isset($_SESSION["Visitor"]))
{
    if($_SESSION["Visitor"]=="Customer")
    {
       if( $conn->query($sql)==true)
       {
           echo "Painting bought";
           header("Location: http://localhost/226_Project/paintings.php");
       }
    }
}
?>

</body>
</html>
