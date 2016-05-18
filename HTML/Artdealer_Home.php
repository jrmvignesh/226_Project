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








<body>
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

<div>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div>
                <a class="navbar-brand" href="Artdealer_Home.php">Artdealer Home</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="nav-item active">
                    <a href="#">Events</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Artdealer_Painting.php">Update Painting</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Artdealer_Employee.php">Employee</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Artdealer_Invite_Customer.php">Invite Customer</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Artdealer_Invite_Artist.php">Invite Artist</a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="nav-item">
                    <a class="nav-link" href="Welcome.html" style="">Logout</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <div class = "row">
            <div class="col-sm-6">
                <div>
                    <h2 class="text-center">Events</h2>
                </div>
                This section will display all the events art dealer has created
                and on the other section he can add new events


                <?php
                if($result1->num_rows>0)
                {
                    echo "<br><br><br>";
                    echo "<ol><table class='table'><tr><th>Serial No</th><th>Event</th></tr>";
                    while ($row = $result1->fetch_assoc())
                    {
                        echo "<tr><td><li></td><td>".$row["Name"]."</td></tr>";
                    }
                    echo "</table></ol>";
                }

                ?>
            </div>
            <div class="col-sm-6">
                <div>
                    <h2 class="text-center">Add Event</h2>
                </div>
                <form role="form" method="post" action="add_event.php">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" required id="name" placeholder="Enter name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="location">Location:</label>
                        <input type="text" class="form-control" required id="location" placeholder="Enter location" name="location">
                    </div>
                    <div class="form-group">
                        <label for="theme">Theme:</label>
                        <select name="theme" class="form-control" required id="theme">
                            <option>Abstract Art</option>
                            <option>Surrealism</option>
                            <option>Conceptual Art</option>
                            <option>Pop Art</option>
                            <option>Hyperrealism</option>
                            <option>Minimalism</option>
                            <option>Futurism</option>
                            <option>Impressionism</option>
                            <option>Fauvism</option>
                        </select>
                    </div>
                        <div class="form-group">
                            <label for="date">Date:</label>
                            <input type="date" class="form-control" required id="date" placeholder="Enter date" name="date">
                        </div>
                    <input type="submit" class="btn btn-success" value="Submit"/>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>