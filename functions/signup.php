<?php
session_start();
include "../dbconnection.php";
 
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: ../register.php");
    exit;
}
 
$username = trim($_POST['username']);
$psw      = trim($_POST['psw']);
$cpsw     = trim($_POST['cpsw']);
$role     = 0;
 
if (empty($username) || empty($psw) || empty($cpsw)) {
    header("Location: ../register.php?error=Please fill in all fields");
    exit;
}
 
if ($psw !== $cpsw) {
    header("Location: ../register.php?error=Passwords do not match");
    exit;
}
 
$check = mysqli_query($conn, "SELECT id FROM userdata WHERE username='$username'");
if ($check && $check->num_rows > 0) {
    header("Location: ../register.php?error=Username already taken");
    exit;
}
 
$insert = "INSERT INTO userdata (username, password, role) VALUES ('$username', '$psw', '$role')";
if (mysqli_query($conn, $insert)) {
    $_SESSION['username'] = $username;
    $_SESSION['role']     = $role;
    header("Location: ../logged/index.php");
    exit;
} else {
    header("Location: ../register.php?error=Something went wrong. Please try again.");
    exit;
}
?>