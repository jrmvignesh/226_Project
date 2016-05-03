<html>
<head><title>login page</title></head>
<body bgcolor="#00bfff">

<?php

/**
 * Created by PhpStorm.
 * User: Shibu
 * Date: 5/1/16
 * Time: 7:22 PM
 */
session_start();

$pid=$_GET["PID"];
$_SESSION["PaintingID"]=$pid;
$servername="localhost";
$username="root";
$pass="";
$dbname="mydb";
$conn=new mysqli($servername,$username,$pass,$dbname);

$result=$conn->query("select * from Paintings where Painting_ID=$pid");

if(isset($_SESSION["Visitor"]))
{
    if($_SESSION["Visitor"]=="Customer")
    {
        echo "Hello ".$_SESSION["CustomerName"]."<br>";
    }
    else
    {
        echo "Hello ".$_SESSION["Artist"]."<br>";
    }
}

if($result->num_rows>0)
{
    while($row=$result->fetch_assoc())
    {
        $pids=$row["Painting_ID"];
        $pname=$row["Name"];
        $ptype=$row["Painting_Type"];
        $bprice=$row["Base_Price"];
        $lsp=$row["Last_Sold_Price"];
        $usernamepur=$row["CUsernamePurchase"];
        $usernamesell=$row["CUsernameSell"];
        echo "Painting ID: ".$pids."<br>";
        echo "Painting Name: ".$pname."<br>";
        echo "Painting Type: ".$ptype."<br>";
        echo "Base Price: ".$bprice."<br>";
        echo "Last Sold Price: ".$lsp."<br>";
        break;
    }
}

if(isset($_SESSION["Visitor"]))
{
    if($_SESSION["Visitor"]=="Customer")
    {
        $cnames=$_SESSION["CustomerName"];

        if($usernamepur==$cnames)
        echo "<input type=\"button\" value=\"Sell\" onclick=\"location='sell_painting.php'\"/><br>";
        else
        echo "<input type=\"button\" value=\"Purchase\" onclick=\"location='purchase_painting.php'\"/><br>";
    }
    else {
        $anames=$_SESSION["Artist"];

        if(is_null($usernamepur))
        echo "<input type=\"button\" value=\"Sell\" onclick=\"location='sell_painting.php'\"/><br>";
    }
}

?>


</body>
</html>