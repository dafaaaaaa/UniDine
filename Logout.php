<?php
session_start(); // Start a session

// Hapus semua variabel sesi
session_unset();

// Hancurkan sesi
session_destroy();

// Redirect to login page
header("Location: login.php");
exit();
