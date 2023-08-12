<?php
session_start(); // Start a session

if (!isset($_SESSION['username'])) {
  header("Location: login.php");
  exit(); // Stop further execution of the page
}

include 'koneksi.php';

if (isset($_GET['id'])) {
  $pesanan_id = $_GET['id'];

  // Query untuk mengambil data pesanan berdasarkan ID
  $query = "SELECT p.id, p.no_meja, p.jumlah_tamu, p.status, p.total AS totalharga 
  FROM pesanan p 
  INNER JOIN tbl_temp_pesanan dp ON p.id = dp.id_pesanan 
  INNER JOIN tbl_menu m ON dp.id_menu = m.id 
  WHERE p.id = '$pesanan_id'";

  $result = mysqli_query($koneksi, $query);

  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);

    // Query untuk mengambil daftar menu yang dipilih dalam pesanan
    $menu_query = "SELECT m.nama, dp.qt FROM tbl_temp_pesanan dp INNER JOIN tbl_menu m ON dp.id_menu = m.id WHERE dp.id_pesanan = '$pesanan_id'";
    $menu_result = mysqli_query($koneksi, $menu_query);
  } else {
    header("Location: index.php");
    exit();
  }
} else {
  header("Location: index.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Bayar Pesanan</title>
  <!-- Add your meta tags, links, and stylesheets here -->
</head>

<body>
  <!-- Add your HTML content here -->
  <div class="container">
    <h2>Bayar Pesanan</h2>
    <p>Nomor Pesanan: <?php echo $row['id']; ?></p>
    <p>No Meja: <?php echo $row['no_meja']; ?></p>
    <p>Jumlah Tamu: <?php echo $row['jumlah_tamu']; ?></p>
    <p>Status: <?php echo $row['status']; ?></p>
    <p>Total Harga: <?php echo $row['totalharga']; ?></p>

    <h3>Daftar Menu:</h3>
    <ul>
      <?php
      while ($menu = mysqli_fetch_assoc($menu_result)) {
        echo "<li>{$menu['nama']} ({$menu['qt']})</li>";
      }
      ?>
    </ul>

    <form action="proses_bayar.php" method="post">
      <input type="hidden" name="pesanan_id" value="<?php echo $pesanan_id; ?>">

      <label for="uang_bayar">Uang Bayar:</label>
      <input type="number" id="uang_bayar" name="uang_bayar" step="0.01" required>

      <button type="submit" name="submit">Bayar</button>
    </form>

    <div id="changeDisplay"></div>
  </div>

  <!-- Add your scripts here -->
  <script>
    // JavaScript function to calculate and display the change
    function calculateChange() {
      const totalHarga = <?php echo $row['totalharga']; ?>;
      const uangBayar = parseFloat(document.getElementById('uang_bayar').value);
      const change = uangBayar - totalHarga;

      if (change >= 0) {
        document.getElementById('changeDisplay').innerText = `Kembalian: Rp ${change.toFixed(2)}`;
      } else {
        document.getElementById('changeDisplay').innerText = 'Uang bayar kurang';
      }
    }

    // Attach the function to the input field's "input" event
    document.getElementById('uang_bayar').addEventListener('input', calculateChange);
  </script>
</body>

</html>