<?php
session_start();
include "connection1.php";
if(isset($_POST) && !empty($_POST)) {
    $loginemail=$_POST['email'];
    $loginschoolcode=$_POST['code'];
    $result="select * from tbl_school where student_email='$loginemail' and school_code='$loginschoolcode'";
    $x=$conn->query($result);
    if($x->num_rows>0){
        $x4=mysqli_fetch_assoc($x);
        $_SESSION['student_login']['student_id']=$x4['id'];
        $_SESSION['student_login']['student_name']=$x4['student_name'];
        $_SESSION['student_login']['student_email']=$x4['email'];
        $_SESSION['student_login']['school_name']=$x4['school_name'];
        $_SESSION['student_login']['school_code']=$x4['school_code'];
        header ("location:schooldashboard.php");
    }
    else {
        echo "email not  exists";
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
        <input type="email" name="email" placeholder="enter your valid email">
        <input type="number" name="code" placeholder="enter your school code">
        <input type="submit" value="LOG IN">
    </form>
    
</body>
</html>