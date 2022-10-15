<?php
$servername="localhost";
$username="root";
$password="";
$database="information";
$conn= new mysqli($servername,$username,$password,$database);
if ($conn->connect_error){
    echo "connection failed";
    print_r($_POST);
}
?>