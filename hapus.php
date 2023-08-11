<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Perform the delete operation
    $delete_query = "DELETE FROM tbl_temp_pesanan WHERE id = '$id'";
    if (mysqli_query($koneksi, $delete_query)) {
        // Redirect back to the Meja.php page after successful deletion
        header('Location: index.php');
        exit;
    } else {
        echo "Error deleting record: " . mysqli_error($koneksi);
    }
} else {
    echo "No record to delete.";
}
