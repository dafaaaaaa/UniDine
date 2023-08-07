<?php
include 'koneksi.php';

// Periksa koneksi
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data yang dikirimkan melalui POST
    $kd_menu = $_POST['kd_menu'];
    $nama = $_POST['nama'];
    $deskripsi = $_POST['deks'];
    $kategori = $_POST['kategori'];
    $harga = $_POST['harga'];

    // Upload gambar
    $targetDir = "img/"; // Directory where you want to store the uploaded images
    $targetFile = $targetDir . basename($_FILES["pic"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if (isset($_POST["btn_simpan"])) {
        $check = getimagesize($_FILES["pic"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    // Check if file already exists
    if (file_exists($targetFile)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["pic"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["pic"]["tmp_name"], $targetFile)) {

            // Perintah SQL INSERT
            $sql = "INSERT INTO tbl_menu (kd_menu, nama, deks, kategori, harga, pic) VALUES ('$kd_menu', '$nama', '$deskripsi','$kategori','$harga','$targetFile')";

            if (mysqli_query($koneksi, $sql)) {
                echo "<script>alert('Menu berhasil ditambah!');</script>";
                include("TambahMenu.php");
            } else {
                echo "Terjadi kesalahan: " . mysqli_error($koneksi);
            }
        } else {
            echo "Maaf, Terjadi kesalahan saat upload foto.";
        }
    }
}

mysqli_close($koneksi);
?>