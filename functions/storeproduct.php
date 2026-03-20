<?php
session_start();
include "../dbconnection.php";
 
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: ../logged/admin/addproduct.php");
    exit;
}
 
$name     = trim($_POST['productname']);
$brand    = trim($_POST['brand']);
$price    = trim($_POST['price']);
$discount = trim($_POST['discountpercent']);
$stock    = trim($_POST['stock']);
$desc     = trim($_POST['description']);
 
if (empty($name) || empty($price)) {
    header("Location: ../logged/admin/addproduct.php?error=Product name and price are required");
    exit;
}
 
$sql = "INSERT INTO products (productname, brand, price, discountpercent, stock, description)
        VALUES ('$name', '$brand', '$price', '$discount', '$stock', '$desc')";
 
if (mysqli_query($conn, $sql)) {
    header("Location: ../logged/admin/index.php?success=Product added successfully");
    exit;
} else {
    header("Location: ../logged/admin/addproduct.php?error=Failed to add product");
    exit;
}
?>