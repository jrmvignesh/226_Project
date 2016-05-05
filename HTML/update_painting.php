<?php
/**
 * Created by PhpStorm.
 * User: Shibu
 * Date: 5/4/16
 * Time: 2:00 PM
 */

session_start();

$servername="localhost";
$username="root";
$pass="";
$dbname="mydb";
$conn=new mysqli($servername,$username,$pass,$dbname);


$id=$_POST["painting_id"];
$price=$_POST["sold_price"];
$customer=$_POST["customer_username"];

//update paintings
$res=$conn->query("select * from paintings where painting_id='$id'");

$CUS=NULL;

$AUS=NULL;

if($res->num_rows>0)
{
    while($r=$res->fetch_assoc())
    {
        $CUS=$r["CustomerUsername_Sell"];
        $AUS=$r["ArtistUsername"];
        break;
    }
}




if($CUS==NULL) {

    //Selling painting put up for auction by Artist
    if ($conn->query("update Paintings set CustomerUsername_Purchase='$customer',ArtistUsername=NULL,CustomerUsername_Sell=NULL,Last_Sold_Price='$price',Artist_Sold_Price='$price' where Painting_ID='$id'") === TRUE) {
        echo "Sale complete";
    }
}
else if($AUS==NULL)
{
    //Selling painting put up for auction by Customer
    if ($conn->query("update Paintings set CustomerUsername_Purchase='$customer',ArtistUsername=NULL,CustomerUsername_Sell=NULL,Last_Sold_Price='$price',Customer_Sold_Price='$price' where Painting_ID='$id'") === TRUE) {
        echo "Sale complete";
    }

}
header("Location: http://localhost/226_Project/HTML/ArtDealer_Painting.php");


?>