<html>
<head><title>login page</title></head>
<body bgcolor="#00bfff">
<div id="artist">
Artist/Admin
    <form method="post" action="login_check.php">
User Name: <input type="text" id="name" name="name"/><br>
    Password:<input type="password" id="passwd" name="passwd"/><br>
    <input type="submit" value="Submit"/>  <input type="button" value="Register" onclick="location='register_art_dealer.html'"/>


</form>
</div>


<br><br>

<div id="customer">
    Customer
    <form method="post" action="customer_login_check.php">
        User Name: <input type="text" id="cname" name="cname"/><br>
        Password:<input type="password" id="cpasswd" name="cpasswd"/><br>
        <input type="submit" value="Submit"/>  <input type="button" value="Register" onclick="location='register_customer.html'"/>


    </form>
</div>


<?php
/**
 * Created by PhpStorm.
 * User: Shibu
 * Date: 4/27/16
 * Time: 1:23 AM
 */

?>
</body>
</html>
