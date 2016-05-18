<html>
<head><title>login_check</title></head>
<body bgcolor="#00bfff">

<?php
/**
 * Created by PhpStorm.
 * User: Shibu
 * Date: 5/4/16
 * Time: 5:16 PM
 */
session_start();
$artist=$_SESSION["Artist"];
$n=$_SESSION["ARNAME"];
$servername="localhost";
$username="root";
$pass="";
$dbname="mydb";
$conn=new mysqli($servername,$username,$pass,$dbname);



$name=$_POST["name"];

$ptype=$_POST["painting_type"];

$ask_price=$_POST["ask_price"];

$date=$_POST["date"];


//Query to add painting

$sql="insert into paintings values(DEFAULT,'$name','$ptype','$ask_price',null,'$artist','$ask_price',null,'$date',null,null,null,null,null,'$n')";

if($conn->query($sql)===TRUE)
{
    $file=fopen('log','a');
    $date=date_create();
    fwrite($file,$sql."\t".date_format($date,'Y-m-d H:i:s')."\n");
    echo "Up for sale";
}

/*
$m=new MongoClient();
$db=$m->selectDB("art_gallery");
$c=$db->selectCollection("Artist");
$document = array(
    "Name" => "Vignesh"
);

$c->insert($document);*/

header("Location: http://localhost/226_Project/HTML/Artist_Sell_Painting.php");




?>

</body>

</html>
