<html>
<head><title>login page</title></head>
<body bgcolor="#00bfff">
<?php
/**
 * Created by PhpStorm.
 * User: Shibu
 * Date: 5/1/16
 * Time: 3:17 AM
 */
session_start();

$name=$_POST["cname"];
$password=$_POST["cpasswd"];

$servername="localhost";
$username="root";
$pass="";
$dbname="mydb";
$conn=new mysqli($servername,$username,$pass,$dbname);

if($conn->connect_error)
{
    die("Connection failed: ".$conn->connect_error);
}
else
{
$result=$conn->query("select * from Customer where Username= '$name'");
if($result->num_rows>0)
{
    while ($row = $result->fetch_assoc())
    {
        if($row["Username"]==$name && $row["Password"]==$password)
        {
            echo "Authenticated Mr/Ms. ".$name."<br>";
            $_SESSION["CustomerName"]=$name;
            header("Location: http://localhost/226_Project/customer_profile.php");
        }
        else
        {
            echo "Invalid Password";
            header("Location: http://localhost/226_Project/login_check.php");
        }
break;
    }
}
    else
    {
        echo "Record does not exist"."<br>";
    }


}




?>
</body>
</html>

