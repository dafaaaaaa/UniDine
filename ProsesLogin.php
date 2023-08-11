<?php
session_start(); // Start a session

// Database connection
include 'koneksi.php';

if ($koneksi->connect_error) {
    die("Connection failed: " . $koneksi->connect_error);
}

// Retrieve form data
$username = $_POST['username'];
$password = md5($_POST['password']); // MD5 encryption

// Query to check user
$sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
$result = $koneksi->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    
    $_SESSION['username'] = $row['username'];
    $_SESSION['role'] = $row['role']; 
    
    // Redirect to dashboard or desired page
    header("Location: index.php");
} else {
    // User not found, redirect back to login page
    header("Location: login.php");
}

$koneksi->close();
?>
