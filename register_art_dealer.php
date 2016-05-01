<html>
<head><title>Artist Register</title></head>
<body bgcolor="#00bfff">
<div id="artist">


    <?php
/**
 * Created by PhpStorm.
 * User: Shibu
 * Date: 4/27/16
 * Time: 2:04 AM
 */
    $servername="localhost";
    $username="root";
    $pass="";
    $dbname="mydb";
    $conn=new mysqli($servername,$username,$pass,$dbname);
    $user=$_POST["name"];
    $password=$_POST["passwd"];

    $sql="insert into Admin VALUES ('$user','$password')";

    $stmt=$conn->prepare($sql);
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
    $conn->close();
?>
    </div>
</html>
