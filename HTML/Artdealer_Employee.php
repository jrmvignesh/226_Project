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
$dname=$_SESSION["DealerName"];
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
                    <a href="Artdealer_Home.php">Events</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Artdealer_Painting.php">Update Painting</a>
                </li>
                <li class="nav-item active">
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
                    <h2 class="text-center">Employees</h2>
                </div>
                This section will display all the employess the art dealer has added
                and on the other section he can add new employees.


                <?php
                $servername="localhost";
                $username="root";
                $pass="";
                $dbname="mydb";
                $conn=new mysqli($servername,$username,$pass,$dbname);

                $result1=$conn->query("select * from Employee where DealerName='$dname'");
                if($result1->num_rows>0)
                {

                    echo "<ol><table class='table'><tr><th>Serial No</th><th>Name</th></tr>";
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
                    <h2 class="text-center">Add Employee</h2>
                </div>
                <form role="form" method="post" action="add_employee.php">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" required id="name" placeholder="Enter name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="job_role">Job Role:</label>
                        <input type="text" class="form-control" required id="job_role" placeholder="Enter job role" name="job_role">
                        </div>
                    <input type="submit" class="btn btn-success" value="Submit"/>
                </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>