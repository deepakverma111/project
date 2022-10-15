<?php
session_start();
include "registerconnection.php";
if(!isset($_SESSION['information']) && (empty($_SESSION['information']))){
    header ("location:loginproject.php");
}
if(!isset($_GET['id']) && empty($_GET['id'])){
  header("location:product.php");
}
$id=$_GET['id'];
if(isset($_POST) && (!empty($_POST))){
    $productname=$_POST['nm'];
    $saleprice=$_POST['nm1'];
    $description=$_POST['nm2'];
    $discount=$_POST['nm3'];
    $picture=$_POST['productimg'];
    $brand=$_POST['selectbrand'];
    $category=$_POST['selectcategory'];
    $manufacture=$_POST['selectmanufacture'];
    $loginid=$_SESSION['information']['id'];
    $q1="select * from product where name='$productname' and user_id='$loginid' and id!='$id'";
    $q2=$conn->query($q1);
    if($q2->num_rows>0){
        echo "product name already exists";
    }
    else{
        $date=date("Y-m-d");
        $loginid=$_SESSION['information']['id'];
        $s="update product set `name`='$productname',`sale_price`='$saleprice',`description`='$description',`discount`='$discount',`brand_id`='$brand',`category_id`='$category',`manufacture_id`=' $manufacture',`date`='$date',`user_id`=' $loginid'";
        $conn->query($s);
        header("location:addproduct.php");
    }
    
}
$productdata=$conn->query("select * from product where id='$id'");

if($productdata->num_rows>0){
$productresult=mysqli_fetch_assoc($productdata);
print_r($productresult);
}
else{
    header("location:product.php");
}
/** Manufacturer data  */
$manufacturedata="select * from manufacture";
$manufacuturelist=$conn->query($manufacturedata);
/** Category data  */
$categorydata="select * from category";
$categorylist=$conn->query($categorydata);
//  brand data ///
$branddata="select * from brand";
$brandlist=$conn->query($branddata);
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
    <h1>Product List</h1>

    <form method="post">
    <label for="demo">Product Name : </label><input type="text" name="nm" id="demo" placeholder="enter product name" value="<?php echo $productresult['name'] ?>"><br><br>

        <label for="demo1">Sale Price : </label><input type="number" name="nm1" id="demo1" placeholder="enter product sale price" value="<?php echo $productresult['sale_price'] ?>"><br><br>

        <label for="demo2">Description : </label><input type="text" name="nm2" id="demo2" placeholder="enter Description about product" value="<?php echo $productresult['description'] ?>"><br><br>

        <label for="demo3">Discount : </label><input type="text" name="nm3" id="demo3" placeholder="enter discount on product" value="<?php echo $productresult['discount'] ?>"><br><br>

        <label for="demo4">Picture : </label><input type="file" name="productimg" id="demo4" ><br><br>

      
Brand : <select name="selectbrand">
    <option value="">Select Brand</option>
   <?php while($b=mysqli_fetch_assoc($brandlist)){?>

    <?php if($b['id']==$productresult['brand_id']){?>
    <option value="<?php echo $b['id'];?>" selected="selected"><?php echo $b['name'];?></option>
    <?php } else{ ?>
    <option value="<?php echo $b['id'];?>"><?php echo $b['name'];?></option>
    <?php } ?>
    <?php } ?>
</select><br><br>


Category : <select name="selectcategory">
    <option value="">Select Category</option>
    <?php while($a=mysqli_fetch_assoc($categorylist)) {?>
        <?php if($a['id']==$productresult['category_id']){?>
    <option value="<?php echo $a['id']; ?>" selected="selected"><?php echo $a['name'];?></option>
    <?php } else{ ?>
    <option value="<?php echo $a['id']; ?>"><?php echo $a['name'];?></option>
    <?php } ?>
   <?php } ?>
</select><br><br>


Manufacture : <select name="selectmanufacture">
    <option value="" >Select Manufacture</option>
    <?php while($c=mysqli_fetch_assoc($manufacuturelist)) {?>
        <?php if($c['id']==$productresult['manufacture_id']){?>
            <option value="<?php echo $c['id']; ?>" selected="selected"><?php echo $c['name'];?></option>
    <?php } else{ ?>
    <option value="<?php echo $c['id']; ?>"><?php echo $c['name'];?></option>
    <?php } ?>
   <?php } ?>
</select><br><br>

<input type="submit" value="SUBMIT">

</form>
    
</body>
</html>
