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


$result1=$conn->query("select * from Events");
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
                <li class="nav-item active">
                    <a class="nav-link" href="Admin_Delete_Event.php">Delete Event</a>
                </li>
            </ul>
            <ul class="nav navbar-nav">
                <li class="nav-item">
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
        <div class = "row">
            <div class="col-sm-6">
                <div>
                    <h2 class="text-center">Events</h2>

                    <?php
                    if($result1!=NULL && $result1->num_rows>0)
                    {
                        //Display all events
                        echo "<br><br>Events<br>";
                        echo "<ol>";
                        while ($row = $result1->fetch_assoc())
                        {
                            $evid=$row["Event_ID"];
                            echo "<li>".$evid."&nbsp;"."&nbsp;&nbsp;&nbsp; <br>";
                        }
                        echo "</ol>";
                    }
                    ?>

                </div>
            </div>
            <div class="col-sm-6">
                <div>
                    <h2 class="text-center">Delete Event</h2>
                </div>
                <form role="form" method="post" action="delete_event.php">
                    <div class="form-group">
                        <label for="eventid">Event ID:</label>
                        <input name="eventid" type="text" class="form-control" required id="eventid" placeholder="Enter eventid">
                    </div>
                    <input type="submit" class="btn btn-success" value="Delete"/>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>