<?php
session_start();
if(!isset($_SESSION['LOGIN_FNAME']) && empty($_SESSION['LOGIN_FNAME']))
{
    //header ("location:login.php");
}
print_r($_SESSION);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DASHBOARD</title>
</head>
<body>
    <h1>Hello <?php echo $_SESSION['LOGIN_FNAME']." ".$_SESSION['LOGIN_LNAME'];?> you logged in successfully, click <a href="logout.php">Logout</a> to logout from application</h1>
    
</body>
</html>