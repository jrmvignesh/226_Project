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

<?php
session_start();
$dealer=$_SESSION["DealerName"];


$servername="localhost";
$username="root";
$pass="";
$dbname="mydb";
$conn=new mysqli($servername,$username,$pass,$dbname);

$result1=$conn->query("select * from Events where DealerName='$dealer'");

?>

<body>
<div>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div>
                <a class="navbar-brand" href="Admin_Home.php">Administrator Home</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="Admin_Home.php">Update Event</a>
                </li>
            </ul>
            <ul class="nav navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="Admin_Delete_Event.php">Delete Event</a>
                </li>
            </ul>
            <ul class="nav navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="Admin_Artdealer_Update.php">Update Artdealer</a>
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
<div>
    <div class="container">
        <div class = "row-sm-4">
            <div class="col-sm-6">
                <div>
                    <h2 class="text-center">Add Art Dealer</h2>
                </div>
                <form role="form" method="post" action="dealer_transaction.php">
                    <div class="form-group">
                        <label for="username">Username/Email:</label>
                        <input name="username" type="email" class="form-control" required id="username" placeholder="Enter username/email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input name="password" type="password" class="form-control" required id="password" placeholder="Enter password">
                    </div>


            </div>
            <div class="col-sm-6">
                <div>
                    <h2 class="text-center">Delete Art Dealer</h2>
                </div>

                    <div class="form-group">
                        <label for="email1">Username/Email:</label>
                        <input name="email1" type="email" class="form-control" required id="email1" placeholder="Enter username/email">
                    </div>
                    <input type="submit" class="btn btn-success" value="Delete & Insert"/>
                </form>
            </div>
        </div>
        <div> <pre style="background: white;border: hidden">


        </pre>
            </div>

        <div>
            <h2 class="text-center"> Art Dealer Username </h2>
        </div>
</div>
</body>
</html>