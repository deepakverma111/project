<?php
session_start();
if(!isset($_SESSION['student_login']) && empty($_SESSION['student_login'])){
    header("location:studentlogin.php");
}
print_r($_SESSION);
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
    <h1>Hello Mr <?php echo $_SESSION['student_login']['student_name'];?>. Your School name is <?php echo $_SESSION['student_login']['school_name'];?>.</h1>
    <h2>Thanks for visiting here******</h2>
    <h1><a href="studentlogout.php">Log out </a></h1>
</body>
</html>