<?php
session_start();
include "registerconnection.php";
if(!isset($_SESSION['information']) && (empty($_SESSION['information']))){
    header ("location:loginproject.php");
}
$loginid=$_SESSION['information']['id'];
$data="select * from brand where user_id='$loginid' order by id desc";
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
<h1>Hello Mr. <?php  echo $_SESSION['information']['user_fname'] . " " . $_SESSION['information']['user_lname'] ?></h1>
        <h2><a href="Product.php"> Product </a> | <a href="Category.php"> Category </a> | <a href="Brand.php"> Brand </a>
    | <a href="manufacture.php"> Manufecture </a> | <a href="registerlogout.php"> Logout </a> | </h2>

    <h1>Brand List <a href="addbrand.php">Add Brand<a></h1>

    <table border="1">
    <tr>    
    <th>ID</th>
    <th>Name</th>
    <th>Action</th>  
    </tr>
    <?php if($dataresult->num_rows>0){?>
        <?php while($result=mysqli_fetch_assoc($dataresult)){?>
            <tr>
                <td><?php echo $result['id'];?></td>
                <td><?php echo $result['name'];?></td>
                <td><a href="editbrand.php?id=<?php echo $result['id'];?>">Edit</a> | <a href="deletebrand.php?id=<?php echo $result['id'];?>">Delete</a></td>
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