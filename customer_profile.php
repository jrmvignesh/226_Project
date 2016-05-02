<html>
<head><title>Customer Profile</title></head>
<body bgcolor="#00bfff">
<?php
session_start();
/**
 * Created by PhpStorm.
 * User: Shibu
 * Date: 5/1/16
 * Time: 6:32 PM
 */
$cname=$_SESSION["CustomerName"];

$servername="localhost";
$db="mydb";
$user="root";
$pass="";

$conn=new mysqli($servername,$user,$pass,$db);

if($conn->connect_error)
{
    die("Connection failed: ".$conn->connect_error);

}
else
{
    $result=$conn->query("select * from Customer where Username='$cname'");
    $result1=$conn->query("select * from Customer_Events where Username='$cname'");
    $result3=$conn->query("select * from Paintings where CUsernamePurchase='$cname'");
    $result4=$conn->query("select * from Paintings where CUsernameSell='$cname'");
if($result->num_rows>0)
{
    while ($row = $result->fetch_assoc()) {
        $username = $row["Username"];
        $name = $row["Name"];
        $age = $row["Age"];
        $sex = $row["Sex"];
        $taste = $row["Taste"];
        break;
    }

    echo "User Name: ".$username."<br>";
    echo "Name: ".$name."<br>";
    echo "Age: ".$age."<br>";
    echo "Sex: ".$sex."<br>";
    echo "Taste: ".$taste."<br><br><br>";


///Events customer has registers
    if($result1->num_rows>0)
    {
        while($row1=$result1->fetch_assoc())
        {
            $eid=$row1["Event_ID"];


            $res=$conn->query("select * from Events where Event_ID='$eid'");

          if($res->num_rows>0)
          {
              echo "Event Name"."  "."Event Location"."  <br>";
              while($row2=$res->fetch_assoc())
              {
                  $ename=$row2["Name"];
                  $loc=$row2["Location"];

                  echo $ename."  ".$loc."  <br>";
              }
          }

        }
    }


    //// Paintings customer is selling

    if($result4->num_rows>0)
    {
        echo "Selling Paintings: <br>";
        while($row4=$result4->fetch_assoc())
        {
            $pid=$row4["Painting_ID"];
            $pname=$row4["Name"];

            echo $pid."  ".$pname."  <br>";


        }
    }



    //// Paintings customer has purchased

    //// Paintings customer is selling

    if($result3->num_rows>0)
    {
        echo "Purchased Paintings: <br>";
        while($row3=$result4->fetch_assoc())
        {
            $pidd=$row3["Painting_ID"];
            $pnamee=$row3["Name"];

            echo $pidd."  ".$pnamee."  <br>";


        }
    }



}
    else
    {
    header("Location: https://localhost/226_Project/login.php");
    }
}


?>
<a href="paintings.php">Paintings</a><br>
<a href="events.php">Events</a><br>
</body>
</html>
