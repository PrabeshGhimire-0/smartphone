<?php
session_start();
include "../dbconnection.php";
 
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: ../logged/admin/index.php");
    exit;
}
 
$id = intval($_POST['productid']);
$sql = "DELETE FROM products WHERE id='$id'";
 
if (mysqli_query($conn, $sql)) {
    header("Location: ../logged/admin/index.php?success=Product deleted successfully");
    exit;
} else {
    header("Location: ../logged/admin/index.php?error=Failed to delete product");
    exit;
}
?>
 