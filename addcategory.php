<?php
session_start();
include "registerconnection.php";
if(!isset($_SESSION['information']) && (empty($_SESSION['information']))){
    header ("location:loginproject.php");
}
if(isset($_POST) && !empty($_POST)){
    $categoryname=$_POST['nm'];
    $userid=$_SESSION['information']['id'];
   $q="select * from category where name='$categoryname' and user_id='$userid'";
   $q1=$conn->query($q);
   if($q1->num_rows>0){
       echo "Category name already exists";
   }
   else {
       $q3="insert into category (`name`,`date`,`user_id`) values('$categoryname','','$userid')";
       $conn->query($q3);
      header("location:category.php");
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
<h1>Hello Mr. <?php  echo $_SESSION['information']['user_fname'] . " " . $_SESSION['information']['user_lname'] ?></h1>
        <h2><a href="Product.php"> Product </a> | <a href="Category.php"> Category </a> | <a href="Brand.php"> Brand </a>
    | <a href="manufacture.php"> Manufecture </a> | <a href="registerlogout.php"> Logout </a> | </h2><br><br>
    <h1>Here you can add category name </h1>
    <form method="post">
        <input type="text" name="nm" placeholder="add a new category">
        <input type="submit" value="Add">
</form>
    
    
</body>
</html>