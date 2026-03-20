<?php
session_start();
include "../dbconnection.php";
 
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: ../index.php");
    exit;
}
 
$username = trim($_POST['username']);
$psw      = trim($_POST['psw']);
 
if (empty($username) || empty($psw)) {
    header("Location: ../index.php?error=Please fill in all fields");
    exit;
}
 
$sql    = "SELECT * FROM userdata WHERE username='$username' AND password='$psw'";
$result = mysqli_query($conn, $sql);
 
if ($result && $result->num_rows > 0) {
    $user = $result->fetch_assoc();
    $_SESSION['username'] = $user['username'];
    $_SESSION['role']     = $user['role'];
    header("Location: ../logged/index.php");
    exit;
} else {
    header("Location: ../index.php?error=Invalid username or password");
    exit;
}
?>