<?php
session_start(); // Start a session

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit(); // Stop further execution of the page
}

include 'koneksi.php';
// get data dari table menu 
$query = mysqli_query($koneksi, "SELECT * FROM tbl_menu");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Menu</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
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
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <div class="navbar-nav w-100 ">
                    <?php if ($_SESSION['role'] == 1 || $_SESSION['role'] == 3) { ?>
                        <a href="index.php" class="nav-item nav-link"><i class="fa fa-bell me-2"></i>Daftar Pesanan</a>
                    <?php } ?>
                    <?php if ($_SESSION['role'] == 1 || $_SESSION['role'] == 3) { ?>
                        <a href="KetersediaanMeja.php" class="nav-item nav-link "><i class="fa fa-envelope me-2"></i>Ketersedian Meja</a>
                    <?php } ?>
                    <?php if ($_SESSION['role'] == 1) { ?>
                        <a href="Pesanan.php" class="nav-item nav-link"><i class="fa fa-file-alt me-2"></i>Pesanan</a>
                        <div class="nav-item dropdown active">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-keyboard me-2"></i>Pengelolaan</a>
                            <div class="dropdown-menu bg-transparent border-0 ">
                                <a href="Menu.php" class="dropdown-item active">Menu</a>
                                <a href="Meja.php" class="dropdown-item">Meja</a>
                            </div>
                        </div>
                    <?php } ?>
                    <?php if ($_SESSION['role'] == 2) { ?>
                        <a href="Menu.php" class="nav-item nav-link"><i class="fa fa-file-alt me-2"></i>Pesanan</a>
                    <?php } ?>
                    <a href="Logout.php" class="nav-item nav-link">Log Out</a>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <span class="d-none d-lg-inline-flex">User</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="Login.php" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->
            <div class="container-fluid mb-4 pt-4 px-4 ">
                <div class="bg-light rounded-top p-4">
                    <div class="row">
                        <p class="h4"> UniDine - Daftar Menu</p>
                    </div>
                </div>
            </div>
            <?php if ($_SESSION['role'] == 1) { ?>
                <a href="TambahMenu.php"><button type="button" class="btn btn-primary mx-4 mb-3 col-md-2">Tambah Menu</button></a>
            <?php } ?>
            <!-- Table Start -->
            <section class="mx-4">
                <table id="myTable" class="table table-striped table-bordered table-responsive table-hover">
                    <thead>
                        <tr>
                            <th>ID Menu</th>
                            <th>Nama Menu</th>
                            <th>Deskripsi</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($h = mysqli_fetch_array($query)) {
                        ?>
                            <tr>
                                <td><?= $h['id']; ?></td>
                                <td><?= $h['nama']; ?></td>
                                <td><?= $h['deks']; ?></td>
                                <td><?= $h['kategori']; ?></td>
                                <td>Rp. <?= $h['harga']; ?></td>
                                <td><?= $h['status']; ?></td>
                                <td>
                                    <?php if ($_SESSION['role'] == 1) { ?>
                                        <a href="HapusMenu.php?id=<?= $h['id']; ?>" class="d-inline btn btn-primary m-1 col-md-5 ">Hapus</a>
                                        <a href="EditMenu.php?id=<?= $h['id']; ?>"class="d-inline btn btn-primary m-1 col-md-5 ">Edit</a>
                                    <?php } ?>
                                    <?php if ($_SESSION['role'] == 2) { ?>
                                        <a href="MenuTersedia.php?id=<?= $h['id']; ?>" class="d-inline btn btn-primary m-1 col-md-5 ">Tersedia</a>
                                        <a href="MenuTidakTersedia.php?id=<?= $h['id']; ?>" class="d-inline btn btn-primary m-1 col-md-5 ">Tidak Tersedia</a>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </section>
            <!-- Table End -->
            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded-top p-4">
                    <div class="row ">
                        <p class="h4 text-center">UniDine</p>
                    </div>
                </div>

            </div>
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').dataTable();
        });
    </script>
    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>