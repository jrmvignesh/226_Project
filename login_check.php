<html>
<head><title>login_check</title></head>
<body bgcolor="#00bfff">
<?php
/**
 * Created by PhpStorm.
 * User: Shibu
 * Date: 4/27/16
 * Time: 1:34 AM
 */
session_start();

$name=$_POST["name"];
$password=$_POST["passwd"];

$servername="localhost";
$username="root";
$pass="";
$dbname="mydb";
$conn=new mysqli($servername,$username,$pass,$dbname);

if($conn->connect_error)
{
    die("Connection failed: ".$conn->connect_error);
    echo "Authenticated Mr/Ms A";
}
else
{
    echo "Authenticated Mr/Ms B";
    $result=$conn->query("select * from `Art Dealer` where Username = '$name'");
    $result1=$conn->query("select * from `Admin` where Username = '$name'");
    if($result->num_rows>0)
    {
        echo "Authenticated Mr/Ms B";
        while ($row = $result->fetch_assoc())
        {
            if($name==$row["Username"] && $password==$row["Password"])
            {
                echo "Authenticated Mr/Ms ";
                echo $row["Username"];
                $_SESSION["Name"]=$row["Username"];
                header("Location: http://localhost/226_Project/art_dealer.php");
            }
            else
            {
                echo "Invalid password";
            }

            break;
        }
    }
    else if($result1->num_rows>0)
    {
        echo "Authenticated Mr/Ms Inside man";
        while ($row = $result1->fetch_assoc())
        {
            if($name==$row["Username"] && $password==$row["Password"])
            {
                echo "Authenticated Mr/Ms ";
                echo $row["Username"];
                $_SESSION["Name"]=$row["Username"];
                header("Location: http://localhost/226_Project/art_dealer.php");
            }
            else
            {
                echo "Invalid password";
            }

            break;
        }
    }
    else
    {
        echo "No such record exists";
    }
}

?>
</body>
</html>
