<?php
session_start();
include "employeeconnection.php";
if(!isset($_SESSION['employeelogin']) && empty($_SESSION['employeelogin'])){
    header("location:employeelogin.php");
}
$id=$_SESSION['employeelogin']['employee_id'];
$q1="select * from employee_table where id='$id'";
$q2=$conn->query($q1);
$q3=mysqli_fetch_assoc($q2);
if(isset($_POST) && (!empty($_POST))){
    $data=$_POST['ename'];
    $data1=$_POST['ecode'];
    $data2=$_POST['ephone'];
    $dq="update `employee_table` set `employee_name`=' $data', `employee_code`='$data1',`phone_no`=' $data2' where `id`='$id' ";
    $conn->query($dq);
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
        <input type="hidden" name="record_id" value="<?php echo $q3['id']; ?>">
      EMPLOYEE NAME :  <input type="text" name="ename" placeholder="enter employee name" value="<?php echo $q3['employee_name']; ?>">
       EMPLOYEE CODE : <input type="number" name="ecode" placeholder="enter employee code" value="<?php echo $q3['employee_code']; ?>">
       PHONE NO : <input type="number" name="ephone" placeholder="enter phone number" value="<?php echo $q3['phone_no']; ?>">
        <input type="Submit" value="SUBMIT">
</form>


    
    
</body>
</html>