<?php
session_start();
include "employeeconnection.php";

if(isset($_POST) && (!empty($_POST))){
    $emname=$_POST['en'];
    $emcode=$_POST['code'];
    $d2="select * from employee_table where employee_name='$emname' and employee_code='$emcode'";
    $d3=$conn->query($d2);
    if($d3->num_rows>0) {
        $d4=mysqli_fetch_assoc($d3);
        $_SESSION['employeelogin']['employee_id']=$d4['id'];
        $_SESSION['employeelogin']['employee_name']=$d4['employee_name'];
        $_SESSION['employeelogin']['employee_code']=$d4['employee_code'];
        $_SESSION['employeelogin']['employee_phone']=$d4['phone_no'];
        header ("location:employeedashboard.php");
    }
    else{
        echo "Employee doesn't exists";
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
EMPLOYEE NAME : <input type="text" name="en" placeholder="enter employee name">
       EMPLOYEE CODE :  <input type="number" name="code" placeholder="enter employee code">
        <input type="submit" value="LOG IN">

</form>
    
</body>
</html>