<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>The Art Gallery</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>


<?php
session_start();
$customer=$_SESSION["Customer"];
?>
<body>
<div>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div>
    <a class="navbar-brand" href="#">Customer Home</a>
        </div>
    <ul class="nav navbar-nav">
        <li class="nav-item active">
            <a href="#">Events</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="Customer_Buy_Painting.html">Buy Painting</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="Customer_Sell_Painting.html">Sell Painting</a>
        </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li class="nav-item">
                <a class="nav-link" href="Welcome.html" style="">Logout</a>
            </li>
        </ul>
        </div>
</nav>
    <div>
        This will describe all the events customer is attending and for which he has been invited. He can click on the event and register
        for it.
    </div>
    </div>
</body>
</html>