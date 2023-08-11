<?php
session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pesanan Sukses</title>
  <!-- Include your CSS stylesheets here -->
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicon -->
  <link href="img/favicon.ico" rel="icon">

  <!-- Google Web Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

  <!-- Icon Font Stylesheet -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

  <!-- Libraries Stylesheet -->
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

  <!-- Customized Bootstrap Stylesheet -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <!-- Template Stylesheet -->
  <link href="css/style.css" rel="stylesheet">

  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

  <link href="css/count.css" rel="stylesheet">
</head>

<body>
  <div class="container">
    <h1>Pesanan Anda Berhasil Diproses</h1>
    <p>Terima kasih telah melakukan pesanan di UniDine.</p>

    <?php
    // Display pesanan details
    echo "<h2>Detail Pesanan:</h2>";
    echo "<ul>";
    foreach ($_SESSION['order'] as $orderItem) {
      echo "<li>{$orderItem['nama']} ({$orderItem['quantity']} x {$orderItem['harga']})</li>";
    }
    echo "</ul>";

    // Display meja dan jumlah tamu
    if (isset($_SESSION["meja_dipilih"]) && isset($_SESSION["jumlah_tamu"])) {
      echo "<p>Meja: {$_SESSION['meja_dipilih']}</p>";
      echo "<p>Jumlah Tamu: {$_SESSION['jumlah_tamu']}</p>";
    }
    ?>

    <p>Total Harga: <?= $_SESSION['total_harga']; ?> </p>

    <p>Silakan tunggu pesanan Anda akan segera disiapkan. Terima kasih!</p>

    <p><a href="Pesanan.php">Kembali ke Halaman Pesanan</a></p>
  </div>
</body>

</html>
<?php unset($_SESSION['order']);
unset($_SESSION['meja_dipilih']);
unset($_SESSION['jumlah_tamu']);
unset($_SESSION['total_harga']) ?>