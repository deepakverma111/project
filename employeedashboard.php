<?php
session_start();
include "employeeconnection.php";
if(!isset( $_SESSION['employeelogin']) && empty( $_SESSION['employeelogin'])) {
header("location:employeelogin.php");

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Hello MR. <?php echo $_SESSION['employeelogin']['employee_name']?> Your phone number is<?php echo $_SESSION['employeelogin']['employee_phone']?></h1>
    <h2> <a href="employeelogout.php">Log out </a></h2>
    <a href="employeeprofile.php">Profile show</a>
</body>
</html>