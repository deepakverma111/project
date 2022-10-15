<?php
session_start();
include "registerconnection.php";
if(!isset($_SESSION['information']) && (empty($_SESSION['information']))){
    header ("location:loginproject.php");
}
if(!isset($_GET['id']) && empty($_GET['id']))
{
    header("location:brand.php");
}
$id=$_GET['id'];
if(isset($_POST) && !empty($_POST)){
     $brandname=$_POST['brandname'];
     $brandid=$_POST['id'];
     $userid=$_SESSION['information']['id'];
    $q="select * from brand where name='$brandname' and user_id='$userid' and id!='$brandid'";
    $q1=$conn->query($q);
    if($q1->num_rows>0){
        echo "Brand name already exists";
    }
    else {
        $date=date("Y-m-d");
        $q3=" update brand set `name`='$brandname' where id='$brandid'";
        $conn->query($q3);
       header("location:brand.php");
    }
}
$branddata=$conn->query("select * from brand where id='$id'");
if($branddata->num_rows>0)
{
    $brandresult=mysqli_fetch_assoc($branddata);
}
else
{
    header("location:brand.php"); 
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
    | <a href="manufacture.php"> Manufecture </a> | <a href="registerlogout.php"> Logout </a> | </h2>
    <form method="post">
<input type="hidden" name="id" value="<?php echo $brandresult['id'];?>">
<label for="brandname"> Brand Name : </label><input type="text" id="brandname" name="brandname" value="<?php echo $brandresult['name'];?>" placeholder="enter product brand name">
    <input type="submit" value="Update Brand">

   </form>
    
</body>
</html>