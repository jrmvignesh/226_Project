
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
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
$dealer=$_SESSION["DealerName"];

$servername="localhost";
$username="root";
$pass="";
$dbname="mydb";
$conn=new mysqli($servername,$username,$pass,$dbname);
$sql="select * from paintings where ((ArtistUsername is not NULL) or (CustomerUsername_Sell is not null))";
$result1=NULL;
$result1=$conn->query($sql);
?>

<body>
<div>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div>
                <a class="navbar-brand" href="Artdealer_Home.php">Artdealer Home</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="nav-item">
                    <a href="Artdealer_Home.html">Events</a>
                </li>
                <li class="nav-item active">
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
                    <h2 class="text-center">Paintings</h2>
                </div>
                This section will display all the paintings


                <?php
                if($result1!=NULL && $result1->num_rows>0)
                {
                    echo "<br><br>Paintings up for sale<br>";
                    echo "Painting ID&nbsp;Name";
                    echo "<ol>";

                    while ($row = $result1->fetch_assoc())
                    {
                        $evid=$row["Painting_ID"];
                        echo "<li>".$evid."&nbsp;".$row["Name"]."<br>";
                    }
                    echo "</ol>";
                }
                ?>

            </div>
            <div class="col-sm-6">
                <div>
                    <h2 class="text-center">Update Painting</h2>
                </div>
                <form role="form" method="post" action="update_painting.php">
                    <div class="form-group">
                        <label for="painting_id">Painting ID:</label>
                        <input name="painting_id" type="text" class="form-control" required id="painting_id" placeholder="Enter paintingid">
                    </div>
                    <div class="form-group">
                        <label for="sold_price">Sold Price:</label>
                        <input name="sold_price" type="text" class="form-control" required id="sold_price" placeholder="Enter soldprice">
                    </div>
                    <div class="form-group">
                        <label for="customer_username">Customer Username</label>
                        <input name="customer_username" type="text" class="form-control" required id="customer_username" placeholder="Enter customerusername">
                    </div>
                    <input type="submit" class="btn btn-success" value="Submit"/>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>