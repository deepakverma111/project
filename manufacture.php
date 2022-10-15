<?php
session_start();
include "registerconnection.php";
if(!isset($_SESSION['information']) && (empty($_SESSION['information']))){
    header ("location:loginproject.php");
}
$loginid=$_SESSION['information']['id'];
$data="select * from manufacture where user_id='$loginid'";
$data1=$conn->query($data);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,  -scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Manufacture</h1>
    <h1>Hello Mr. <?php  echo $_SESSION['information']['user_fname'] . " " . $_SESSION['information']['user_lname'] ?></h1>
        <h2><a href="Product.php"> Product </a> | <a href="Category.php"> Category </a> | <a href="Brand.php"> Brand </a>
    | <a href="manufacture.php"> Manufecture </a> | <a href="registerlogout.php"> Logout </a> | </h2><br><br>
    <h1>Manufacture <a href="addmanufacture.php">Add Manufacture</a></h1>
    <table border="2">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Action</th>
        </tr>
        
       <?php if($data1->num_rows>0){?>
        <?php while($d1=mysqli_fetch_assoc($data1)) {?>
            <tr>
                <td><?php echo $d1['id']; ?></td>
                <td><?php echo $d1['name'];?></td>
                <td><a href="editmanufacture.php?id=<?php echo $d1['id']; ?>">Edit</a> | <a href="deletemanufacture.php?id=<?php echo $d1['id']; ?>">Delete</a> </td>
            </tr>
            <?php } 
            }else {
             ?>
             <tr><td colspan="3">No record found</td></tr>
            <?php } ?>
       
        

    </table>
    
</body>
</html>