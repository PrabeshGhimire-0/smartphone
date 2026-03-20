<?php
if (session_status() === PHP_SESSION_NONE) session_start();
if (empty($_SESSION['username'])) {
    header("Location: ../../index.php");
    exit;
}
if ($_SESSION['role'] != 1) {
    header("Location: ../index.php");
    exit;
}
$username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PhoneHub — Admin</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
 
<header class="site-header">
    <a href="../index.php" class="header-logo">Phone<span>Hub</span> 📱</a>
    <ul class="header-nav">
        <li><span class="header-welcome">⚙ Admin: <?php echo htmlspecialchars($username); ?></span></li>
        <li><a href="../index.php">← Store</a></li>
        <li><a href="../../functions/logout.php" class="nav-logout">Log Out</a></li>
    </ul>
</header>
 
<nav class="admin-menu">
    <ul>
        <li><a href="index.php">📋 All Products</a></li>
        <li><a href="addproduct.php">➕ Add Product</a></li>
    </ul>
</nav>