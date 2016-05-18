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
$artist=$_SESSION["Artist"];

$servername="localhost";
$username="root";
$pass="";
$dbname="mydb";
$conn=new mysqli($servername,$username,$pass,$dbname);

$result1=$conn->query("select * from paintings where ArtistUsername='$artist'");

?>




<body>
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
    <div class="container">
        <div class = "row">
            <div class="col-sm-6">
                <div>
                    <h2 class="text-center">Paintings</h2>
                </div>
                This section will display all the paintings that the artist has putout for sale. The other section will allow artist to
                add new paintings

                <?php



                if($result1!=NULL && $result1->num_rows>0)
                {

                    echo "<ol><table class='table'><tr><th>Serial No</th><th>Painting ID</th><th>Name</th></tr>";
                    echo "";
                    while ($row = $result1->fetch_assoc())
                    {
                        $evid=$row["Painting_ID"];
                        echo "<tr><td><li></td><td><a href='painting.php?PID=$evid'>$evid</a>"."</td><td>".$row["Name"]."</td></tr>";
                    }
                    echo "</table></ol>";
                }
                ?>



            </div>
            <div class="col-sm-6">
                <div>
                    <h2 class="text-center">Add Painting</h2>
                </div>
                <form role="form" method="post" action="add_painting.php">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" required id="name" placeholder="Enter name" name="name">
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <label for="painting_type">Painting Type:</label>
                            <select name = "painting_type" class="form-control" id="painting_type" required>
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
                            <label for="ask_price">Ask Price:</label>
                            <input type="number" name="ask_price" class="form-control" required id="ask_price" placeholder="Enter ask price">
                        </div>
                        <div class="form-group">
                            <label for="date">Date:</label>
                            <input  type="date" name="date" class="form-control" required id="date" placeholder="Enter date">
                        </div>

                    </div>
                    <button type="submit" class="btn btn-success">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>