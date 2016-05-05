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
$username=$_POST['username'];
$password=$_POST['password'];
$password=md5($password);
$email1=$_POST['email1'];

mysqli_autocommit($conn,false);


$sql="delete from `Art Dealer` where Username='$email1';";

$sql1="insert into `Art Dealer` values ('$username','$password');";

if($conn->connect_error)
{
    die("Connection failed: ".$conn->connect_error);

}
else
{
    //Transaction to delete and insert an art dealer
$transaction="BEGIN;
delete from `Art Dealer` where Username='$email1';
insert into `Art Dealer` values ('$username','$password');
COMMIT;";

if($conn->multi_query($transaction)===TRUE)
{
echo "Success";
}
    else
    {
        $conn->query("ROLLBACK;");
    }

    header("Location: http://localhost/226_Project/HTML/Admin_ArtDealer_Update.php");
}
?>