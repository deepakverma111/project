<?php
session_start();
?>
<?php
include 'connection.php';


if(isset($_POST) && !empty($_POST))
{
    $firstname=$_POST["fname"];
    $lastname=$_POST["lname"];
    $email=$_POST["email"];
    $password=$_POST["password"];
    $q1="select * from user where email= '$email'";
    $q2=$conn->query($q1);
    if($q2->num_rows>0){
        echo "Email already exists";
    }
    else{
       $q3="insert into user(firstname,lastname,email,password) values('$firstname','$lastname','$email','$password')";
$conn->query($q3);
echo "New user created successfully";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>
</head>
<body>
    <form method="POST">
       First name :  <input type="text" name="fname" placeholder="enter your first name"><br><br>
      Last name :  <input type="text" name="lname" placeholder="enter your last name"><br><br>
       Email Address : <input type="email" name="email" placeholder="enter your valid email"><br><br>
      Password :  <input type="password" name="password" placeholder="enter your password"><br><br>
        <input type="submit" value="Sign Up">
    </form>
   
    
</body>
</html>