<?php

/*** Connection start code */
$servername="localhost";
$username="root";
$password="";
$database="php_learning";

$conn= new mysqli($servername,$username,$password,$database);
/*** Connection start end */

/**** Create User Code Start */
if(isset($_POST) && !empty($_POST)){

    /***** Capture Form values  */
    $studentname=$_POST['studentname'];
    $schoolname=$_POST['schoolname'];
    $studentemail=$_POST['email'];
    $schoolcode=$_POST['schoolcode'];
    $countryname=$_POST['country'];

    $q2=$conn->query("select * from tbl_school where  student_email='$studentemail'");
    if($q2->num_rows>0){
        /**  User already exists case */
        echo "This student already exists";
    }
    else{
        /*** New user created case */
        $q4="insert into tbl_school (student_name,school_name,student_email,school_code,country_name) values('$studentname','$schoolname','$studentemail','$schoolcode','$countryname')";
        $conn->query($q4);
        echo "New record created successfully ";
    }
}
/**** Create User Code Start */

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
       STUDENT NAME : <input type="text" name="studentname" placeholder="enter student name">
        SCHOOL NAME : <input type="text" name="schoolname" placeholder="enter your school name">
       EMAIL ADDRESS : <input type="email" name="email" placeholder="enter student email address">
        SCHOOL CODE : <input type="number" name="schoolcode" placeholder="enter your school code">
        COUNTRY NAME : <select name="country">
            <option value="">Select country</option>
            <option value="India">India</option>
            <option value="USA">USA</option>
            <option value="China">China</option>
        </select>
        <input type="submit" value="SUBMIT">
    </form>
    
</body>
</html>