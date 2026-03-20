<?php
session_start();
include "../dbconnection.php";
 
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: ../logged/admin/index.php");
    exit;
}
 
$id       = intval($_POST['productid']);
$name     = trim($_POST['productname']);
$brand    = trim($_POST['brand']);
$price    = trim($_POST['price']);
$discount = trim($_POST['discountpercent']);
$stock    = trim($_POST['stock']);
$desc     = trim($_POST['description']);
 
$sql = "UPDATE products SET
            productname='$name',
            brand='$brand',
            price='$price',
            discountpercent='$discount',
            stock='$stock',
            description='$desc'
        WHERE id='$id'";
 
if (mysqli_query($conn, $sql)) {
    header("Location: ../logged/admin/index.php?success=Product updated successfully");
    exit;
} else {
    header("Location: ../logged/admin/editproduct.php?id=$id&error=Failed to update product");
    exit;
}
?>