<html>
<head><title>Art Dealer Login Check</title></head>
<body bgcolor="#00bfff">
<?php
/**
 * Created by PhpStorm.
 * User: Shibu
 * Date: 4/27/16
 * Time: 1:34 AM
 */
session_start();

$name=$_POST["email"];
$password=$_POST["pwd"];
$md5password=md5($password);

$servername="localhost";
$username="root";
$pass="";
$dbname="mydb";
$conn=new mysqli($servername,$username,$pass,$dbname);


$procedure="DROP PROCEDURE IF EXISTS sproc_authenticateToken;
DELIMITER //
CREATE PROCEDURE sproc_authenticateToken(IN `usr` varchar(50) ,IN `pwd` varchar(32))
BEGIN
DECLARE userID INT UNSIGNED;
DECLARE tokenHash VARCHAR(50);
SELECT MD5(pwd) INTO tokenHash;
SELECT count(Username) INTO userID FROM customer WHERE Username = usr and password = tokenHash;
IF userID > 0 THEN
SELECT 1 AS auth;
ELSE
SELECT 0 AS auth;
END IF;
END;";


$procedure1="DROP PROCEDURE IF EXISTS sproc_authenticate;
DELIMITER //
CREATE PROCEDURE sproc_authenticate(IN `usr` varchar(50) ,IN `pwd` varchar(32))
BEGIN
DECLARE userID INT UNSIGNED;
DECLARE tokenHash VARCHAR(50);
SELECT MD5(pwd) INTO tokenHash;
SELECT count(Username) INTO userID FROM artist WHERE Username = usr and password = tokenHash;
IF userID > 0 THEN
SELECT 1 AS auth;
ELSE
SELECT 0 AS auth;
END IF;
END;";

if($conn->connect_error)
{
    die("Connection failed: ".$conn->connect_error);

}
else
{
    $result=$conn->query("select * from `Customer` where Username = '$name'");
    $result1=$conn->query("select * from `Artist` where Username = '$name'");

    $conn->query($procedure);
    $rt=$conn->query("CALL sproc_authenticateToken('$name','$password')");

//    $conn->query($procedure1);



    $aut=0;
    $autumn=0;

    if($rt->num_rows>0)
    {
        while ($row = $rt->fetch_assoc()) {
            $aut = $row["auth"];
            break;
        }
    }

    $rt1=$conn->query("CALL sproc_authenticate('$name','$password')");

    /*
    echo $rt1['num_rows']."ksss";

    if($rt1->num_rows>0)
    {
        while ($row = $rt1->fetch_assoc()) {
            $autumn = $row["auth"];
            break;
        }
    }*/







    if($result->num_rows>0)
    {

        while ($row = $result->fetch_assoc())
        {
            if($name==$row["Username"] && $md5password==$row["Password"])
            {
                echo "Authenticated Mr/Ms  ";
                echo $row["Username"];
                $_SESSION["Customer"]=$row["Username"];
                if($aut==1)
                {
                    header("Location: http://localhost/226_Project/HTML/Customer_Home.php");
                }

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
        echo "Authenticated Mr/Ms Inside man Hi";
        echo $autumn;
        while ($row = $result1->fetch_assoc())
        {
            if($name==$row["Username"] && $md5password==$row["Password"])
            {
                $_SESSION["Artist"]=$row["Username"];
                $_SESSION["ARNAME"]=$row["Name"];

                header("Location: http://localhost/226_Project/HTML/Artist_Home.php");
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
