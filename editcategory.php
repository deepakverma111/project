<?php
session_start();
include "registerconnection.php";
if(!isset($_SESSION['information']) && (empty($_SESSION['information']))){
    header ("location:loginproject.php");
}
if(!isset($_GET['id']) && empty($_GET['id'])){
    header("location:category.php");
}
$id=$_GET['id'];
if(isset($_POST) && !empty($_POST)){
    $categoryname=$_POST['nm'];
    $categoryid=$_POST['id'];

    $userid=$_SESSION['information']['id'];
   $q="select * from category where name='$categoryname' and user_id='$userid' and id!= '$categoryid'";
   $q1=$conn->query($q);
   if($q1->num_rows>0){
       echo "Category name already exists";
   }
   else {
    $date=("Y-m-d");
       $q3="update  category set `name`='$categoryname' where id='$categoryid'";
       $conn->query($q3);
      header("location:category.php");
   }
}

$categorydata=$conn->query("select * from category where id='$id'");
if($categorydata->num_rows>0) {

    $categoryresult=mysqli_fetch_assoc($categorydata);
}
else {
    header("location:category.php");
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
        <input type="hidden" name="id" value="<?php echo  $categoryresult['id']; ?>">
        <input type="text" name="nm" placeholder="upadate category" value="<?php echo  $categoryresult['name']; ?>">
        <input type="submit" value="Update category">
</form>
    
    
</body>
</html>