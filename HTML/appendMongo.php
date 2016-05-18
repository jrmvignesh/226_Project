<?php
/**
 * Created by PhpStorm.
 * User: Shibu
 * Date: 5/9/16
 * Time: 12:15 AM
 */
session_start();
$m=new MongoClient();


$name=$_POST["name"];
$value=$_POST["value"];
$db=$m->selectDB("art_gallery");

$c=$db->selectCollection("Artist");

$pid= $_SESSION["PMID"];


$query = array(
    "ID" => $pid);

$doc=$c->findOne($query);

$update=array('$push'=>array($name=>$value));


if(empty($doc)) {
    $c->insert(array("ID"=>$pid,$name=>$value));


}
else
{
    $x = $c->update($query, $update);
}


header("Location: http://localhost/226_Project/HTML/painting.php?PID=$pid");

?>