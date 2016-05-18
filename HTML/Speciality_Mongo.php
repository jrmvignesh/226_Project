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
/**
 * Created by PhpStorm.
 * User: Shibu
 * Date: 5/9/16
 * Time: 12:03 AM
 */

?>



<body>
<div>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div>
                <a class="navbar-brand" href="#">Artist Home</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="nav-item active">
                    <a href="#">Events</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Artist_Sell_Painting.php">Sell Painting</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Speciality_Mongo.php">Add speciality</a>
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
    This will allow the artist to add a feature about him/her
<form method="post" action="appendMongo.php">
    <div class="form-group">
        <label for="name">Speciality Name:</label>
        <input type="text" class="form-control" required id="name" placeholder="Enter name" name="name">

        <label for="name">Speciality Value:</label>
        <input type="text" class="form-control" required id="name" placeholder="Enter value" name="value">
    </div>
    <input type="submit" class="btn btn-success" value="Submit"/>
    </form>

    <?php

    ?>


</div>
</body>
</html>
