<html>
<head><title>login_check</title></head>
<body bgcolor="#00bfff">
<?php
/**
 * Created by PhpStorm.
 * User: Shibu
 * Date: 5/1/16
 * Time: 3:27 AM
 */

$servername="localhost";
$username="root";
$pass="";
$dbname="mydb";


$email=$_POST["email"];
$name=$_POST["name"];
$age=$_POST["age"];
$sex=$_POST["sex"];
$password=$_POST["pwd"];
$style=$_POST["style"];
$nation=$_POST["nationality"];
$dealer=NULL;
$conn=new mysqli($servername,$username,$pass,$dbname);

$pass=md5($password);

$sql="insert into Artist VALUES ('$email','$pass','$name','$sex','$age','$style','$nation','$dealer')";

if($conn->connect_error)
{
    die("Connection failed: ".$conn->connect_error);
}
else
{
    if($conn->query($sql)===TRUE)
    {
        echo "Inserted successfully";
        header("Location: http://localhost/226_Project/HTML/Welcome.html");
    }
    else
    {
        echo "Try again with another username";
    }
}


$conn->close();



?>

</body>
</html>
