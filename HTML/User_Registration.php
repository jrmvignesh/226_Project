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
$taste=$_POST["taste"];

$conn=new mysqli($servername,$username,$pass,$dbname);

$sql="insert into Customer VALUES ('$email','$name','$age','$sex','$taste','$password')";

if($conn->connect_error)
{
    die("Connection failed: ".$conn->connect_error);
}
else
{
    if($conn->query($sql)===TRUE)
    {
        echo "Inserted successfully";
    }
    else
    {
        echo "Try again with another username";
    }
}

header("Location: http://localhost/226_Project/HTML/Welcome.html");
$conn->close();



?>

</body>
</html>
