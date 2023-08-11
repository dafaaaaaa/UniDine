<?php
include 'koneksi.php';

if (isset($_GET['no_meja'])) {
    $no_meja = $_GET['no_meja'];
    
    // Perform the delete operation
    $delete_query = "DELETE FROM meja WHERE no_meja = '$no_meja'";
    if (mysqli_query($koneksi, $delete_query)) {
        // Redirect back to the Meja.php page after successful deletion
        header('Location: Meja.php');
        exit;
    } else {
        echo "Error deleting record: " . mysqli_error($koneksi);
    }
} else {
    echo "No record to delete.";
}
?>
