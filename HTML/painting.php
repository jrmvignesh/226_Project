<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>The Art Gallery</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="../CSS/Welcome.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<div>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div>
                <a class="navbar-brand" href="Artist_Home.php">Artist Home</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="nav-item">
                    <a href="Artist_Home.php">Events</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="Artist_Sell_Painting.php">Sell Painting</a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="nav-item">
                    <a class="nav-link" href="Welcome.html" style="">Logout</a>
                </li>
            </ul>
        </div>
    </nav>
</div>
<?php
/**
 * Created by PhpStorm.
 * User: Shibu
 * Date: 5/10/16
 * Time: 12:13 AM
 */
session_start();
$pid=$_GET["PID"];

$_SESSION["PMID"]=$pid;






?>

<body>
<div class="col-sm-6">
    <div>
        <h2 class="text-center">Add Feature for <?php echo $pid; ?></h2>
    </div>
    <form role="form" method="post" action="appendMongo.php">
        <div class="form-group">
            <label for="name">Feature:</label>
            <input type="text" class="form-control" required id="name" placeholder="Enter name" name="name">
        </div>

        <div class="form-group">
            <label for="name">Value:</label>
            <input type="text" class="form-control" required id="value" placeholder="Enter name" name="value">
        </div>
        <input type="submit" class="btn btn-success" value="Insert Feature"/>
        </form>
    </div>

</body>
</html>
