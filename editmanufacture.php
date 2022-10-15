<?php
session_start();
include "registerconnection.php";
if(!isset($_SESSION['information']) && (empty($_SESSION['information']))){
    header ("location:loginproject.php");
}
if(!isset($_GET['id']) && empty($_GET['id'])){
 header("location:manufacture.php");
}
$id=$_GET['id'];
if(isset($_POST) && (!empty($_POST))) {
    $manufacturedata=$_POST['nm'];
    $manufacutreid=$_POST['id'];
    $userid=$_SESSION['information']['id'];
    $q1="select * from manufacture where name='$manufacturedata' and user_id='$userid' and id!='$manufacutreid'";
    $q2=$conn->query($q1);
    if($q2->num_rows>0){
        echo "manufacture already exists";
    }
    else{
        $date=date("Y-m-d");
        $q3="update  manufacture set `name`='$manufacturedata' where `id`='$manufacutreid'";
        $conn->query($q3);
       header("location:manufacture.php");
    }
}

$manufacturedata=$conn->query("select * from manufacture where id='$id'");
if($manufacturedata->num_rows>0) {

    $manufactureresult=mysqli_fetch_assoc($manufacturedata);
}
else {
    header("location:manufacture.php");
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
<h1>Hello Mr. <?php  echo $_SESSION['information']['user_fname'] . " " . $_SESSION['information']['user_lname'] ?></h1>
        <h2><a href="Product.php"> Product </a> | <a href="Category.php"> Category </a> | <a href="Brand.php"> Brand </a>
    | <a href="manufacture.php"> Manufecture </a> | <a href="registerlogout.php"> Logout </a> | </h2><br><br>
    <h1>Here you can add manufacture</h1>
    <form method="post">
        <input type="hidden" name="id" value="<?php echo $manufactureresult['id']; ?>">
        <input type="text" name="nm" placeholder="Update manufacture name" value="<?php echo $manufactureresult['name']; ?>">
        <input type="submit" value="Update manufacture">
</form>

    
    
</body>
</html>