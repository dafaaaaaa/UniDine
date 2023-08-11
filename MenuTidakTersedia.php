<?php
session_start(); // Start a session

if (!isset($_SESSION['username'])) {
  header("Location: login.php");
  exit(); // Stop further execution of the page
}

include 'koneksi.php';

if (isset($_GET['id'])) {
  $menu_id = $_GET['id'];

  // Update menu status to 'Tidak Tersedia'
  $update_query = "UPDATE tbl_menu SET status = 'Tidak Tersedia' WHERE id = '$menu_id'";
  mysqli_query($koneksi, $update_query);

  // Redirect back to the Menu.php page with a success message
  header("Location: Menu.php");
  exit();
} else {
  header("Location: Menu.php");
  exit();
}
