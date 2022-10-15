<?php
session_start();
include "registerconnection.php";
if(!isset($_SESSION['information']) && (empty($_SESSION['information']))){
    header ("location:loginproject.php");
}
if(isset($_POST) && (!empty($_POST))){
    $productname=$_POST['productname'];
    $saleprice=$_POST['saleprice'];
    $description=$_POST['description'];
    $discount=$_POST['discount'];
    $brand=$_POST['selectbrand'];
    $category=$_POST['selectcategory'];
    $manufacture=$_POST['selectmanufacture'];
    $loginid=$_SESSION['information']['id'];
    $q1="select * from product where name='$productname' and user_id='$loginid' ";
    $q2=$conn->query($q1);
    if($q2->num_rows>0){
        echo "product name already exists";
    }
    else{

        $productpicture="";
        if(isset($_FILES['productimg']) && ($_FILES['productimg']['size'])>0){

            $fileexplode=explode(".",$_FILES['productimg']['name']);
            $endfile=end($fileexplode);
            $newfilename="newfilename".date("ymdhis").rand().".".$endfile;
            
            if(move_uploaded_file($_FILES['productimg']['tmp_name'],"upload/".$newfilename)){
                $productpicture=$newfilename;
            }
        }

        $date=date("Y-m-d");
        $loginid=$_SESSION['information']['id'];
        $s="insert into product (`name`,`sale_price`,`description`,`discount`,`picture`,`brand_id`,`category_id`,`manufacture_id`,`date`,`user_id`)values( '$productname','$saleprice','$description',' $discount',' $productpicture','$brand','$category','$manufacture','$date', '$loginid')";
        $conn->query($s);
        header("location:product.php");
    }
    
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

    <form method="post" enctype="multipart/form-data">
    <label for="demo">Product Name : </label><input type="text" name="productname" id="demo" placeholder="enter product name"><br><br>

        <label for="demo1">Sale Price : </label><input type="number" name="saleprice" id="demo1" placeholder="enter product sale price"><br><br>

        <label for="demo2">Description : </label><input type="text" name="description" id="demo2" placeholder="enter Description about product"><br><br>

        <label for="demo3">Discount : </label><input type="text" name="discount" id="demo3" placeholder="enter discount on product"><br><br>

        <label for="demo4">Picture : </label><input type="file" name="productimg" id="demo4" ><br><br>

      
Brand : <select name="selectbrand">
    <option value="">Select Brand</option>
   <?php while($b=mysqli_fetch_assoc($brandlist)){?>
    <option value="<?php echo $b['id'];?>"><?php echo $b['name'];?></option>
    <?php } ?>
</select><br><br>


Category : <select name="selectcategory">
    <option value="">Select Category</option>
    <?php while($a=mysqli_fetch_assoc($categorylist)) {?>
    <option value="<?php echo $a['id']; ?>"><?php echo $a['name'];?></option>
   <?php } ?>
</select><br><br>


Manufacture : <select name="selectmanufacture">
    <option value="" >Select Manufacture</option>
    <?php while($a=mysqli_fetch_assoc($manufacuturelist)) {?>
    <option value="<?php echo $a['id']; ?>"><?php echo $a['name'];?></option>
   <?php } ?>
</select><br><br>

<input type="submit" value="SUBMIT">

</form>
    
</body>
</html>