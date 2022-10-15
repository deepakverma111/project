<?php
session_start();
include "registerconnection.php";
if(!isset($_SESSION['information']) && (empty($_SESSION['information']))){
    header ("location:loginproject.php");
}
if(!isset($_GET['id']) && empty($_GET['id']))
{
    header("location:category.php");
}
$id=$_GET['id'];
$conn->query("delete  from category where id='$id' ");
header("location:category.php");
?>