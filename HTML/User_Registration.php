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
$dealer="None";
$conn=new mysqli($servername,$username,$pass,$dbname);
$nation="";
$sqld="";


//Encrypting password
$pass=md5($password);

$sql="insert into customer values('$email','$name','$age','$sex','$taste','$pass','$dealer')";

if($conn->connect_error)
{
    die("Connection failed: ".$conn->connect_error);
}
else
{
    if($conn->query($sql)===TRUE)
    {
        echo "Inserted successfully";
        $file=fopen('log','a');
        $date=date_create();
        fwrite($file,$sql."\t".date_format($date,'Y-m-d H:i:s')."\n");
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
