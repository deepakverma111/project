<?php
include "registerconnection.php";
if(isset($_POST) && (!empty($_POST))){
$firstname=$_POST['fname'];
$lastname=$_POST['lname'];
$email=$_POST['useremail'];
$phoneno=$_POST['phoneno'];
$password=$_POST['psd'];
$x="select * from register where email='$email' and password='$password'";
$y=$conn->query($x);
if($y->num_rows>0) {
echo "Email is already exists";
}
else {
    $z="insert into `register` (id,firstname,lastname,email,phoneno,password) values (null,'$firstname','$lastname','$email','$phoneno',$password)";
    $conn->query($z);
    echo "Record created successfully";
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
       FIRSTNAME : <input type="text" name="fname" placeholder="enter your first name">
        LASTNAME : <input type="text" name="lname" placeholder="enter your last name">
        EMAIL ADDRESS : <input type="email" name="useremail" placeholder="enter your valid email">
       PHONE NO. : <input type="number" name="phoneno" placeholder="enter your phone number">
       PASSWORD : <input type="number" name="psd" placeholder="enter your password">
        <input type="submit" value="Register">
        </form>
    
</body>
</html>