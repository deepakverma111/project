<?php
session_start();
include 'connection.php';
if(isset($_POST)&& !empty($_POST)){
$email=$_POST['email'];
$password=$_POST['password'];
$x="select * from user where email='$email' and password='$password'";
$x2=$conn->query($x);
if($x2->num_rows>0){
    $data = mysqli_fetch_assoc($x2);
    $_SESSION['LOGIN_ID']=$data['id'];
    $_SESSION['LOGIN_FNAME']=$data['firstname'];
    $_SESSION['LOGIN_LNAME']=$data['lastname'];
   header("location:dashboard.php");
}
else{
    echo "email not exists";
}


}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form method="POST">
        <input type="email" name="email" placeholder="enter your valid email">
        <input type="password" name="password" placeholder="enter your password">
        <input type="submit" value="LOG IN">
    </form>
    
</body>
</html>