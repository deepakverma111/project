<?php
include "employeeconnection.php";
if(isset($_POST) && !empty($_POST)){
$employee_name=$_POST['ename'];
$employee_code=$_POST['ecode'];
$employee_phoneno=$_POST['ephone'];
$q1="select * from employee_table where employee_code='$employee_code' and phone_no='$employee_phoneno'";
$q2=$conn->query($q1);
if($q2->num_rows>0){
    echo "This employee exists";

}
else{
    $d1="Insert into employee_table (id,employee_name,employee_code,phone_no) values(null,'$employee_name','$employee_code','$employee_phoneno')";
    $conn->query($d1);
    echo "New employee record created";
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
      EMPLOYEE NAME :  <input type="text" name="ename" placeholder="enter employee name">
       EMPLOYEE CODE : <input type="number" name="ecode" placeholder="enter employee code">
       PHONE NO : <input type="number" name="ephone" placeholder="enter phone number">
        <input type="Submit" value="SUBMIT">
</form>
    
</body>
</html>