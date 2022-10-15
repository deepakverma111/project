<?php
session_start();
include "registerconnection.php";
if(!isset($_SESSION['information']) && (empty($_SESSION['information']))){
    header ("location:loginproject.php");
}
$loginid=$_SESSION['information']['id'];
$data="select p.*,c.name as category_name,b.name as brand_name,m.name as manufacture_name from product as p join category as c on p.category_id=c.id join brand as b on p.brand_id=b.id join manufacture as m 
on p.manufacture_id=m.id where p.user_id='$loginid' ";
$dataresult=$conn->query($data);
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
    <h1>Product</h1>
    <h1>Hello Mr. <?php  echo $_SESSION['information']['user_fname'] . " " . $_SESSION['information']['user_lname'] ?></h1>
        <h2><a href="Product.php"> Product </a> | <a href="Category.php"> Category </a> | <a href="Brand.php"> Brand </a>
    | <a href="manufacture.php"> Manufecture </a> | <a href="registerlogout.php"> Logout </a> | </h2><br><br>
    <h1>Product List <a href="addproduct.php">Add Product<a></h1>

    <table border="1">
    <tr>    
    <th>ID</th>
    <th>Name</th>
    <th>Category</th>
    <th>Brand</th>
    <th>Manufecture</th>
    <th>Action</th>  
    </tr>
    <?php if($dataresult->num_rows>0){?>
        <?php while($result=mysqli_fetch_assoc($dataresult)){
            ?>
            <tr>
                <td><?php echo $result['id'];?></td>
                <td><?php echo $result['name'];?></td>
                <td><?php echo $result['category_name'];?></td>
                <td><?php echo $result['brand_name'];?></td>
                <td><?php echo $result['manufacture_name'];?></td>
                <td><a href="editproduct.php?id=<?php echo $result['id'];?>">Edit</a> | <a href="deleteproduct.php?id=<?php echo $result['id'];?>">Delete</a></td>
            </tr>
        <?php } 
         }
         else
         {
            ?>
    <tr>
        <td colspan="3">No data found</td>
    </tr>
    <?php } ?>
    </table>
   
   
    
</body>
</html>