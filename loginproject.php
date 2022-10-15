<?php
session_start();
include "registerconnection.php";
if(isset($_POST) && (!empty($_POST))){
    $email=$_POST['em'];
    $password=$_POST['password'];
    $d="select * from register where email='$email' and password='$password' ";
    $d1=$conn->query($d);
    if ($d1->num_rows>0) {
        $d2=mysqli_fetch_assoc($d1);
        $_SESSION['information']['user_fname']=$d2['firstname'];
        $_SESSION['information']['user_lname']=$d2['lastname'];
        $_SESSION['information']['id']=$d2['id'];
        header ("location:registerdashboard.php");
       
    }
    else {
        echo "User not exists";
    }
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
    <form method="post">
      EMAIL ADDRESS :  <input type="email" name="em" placeholder="enter your valid email address"><br><br>
      PASSWORD :  <input type="number" name="password" placeholder="enter your password"><br><br>
        <input type="submit" value="LOG IN">
</form>
    
</body>
</html>