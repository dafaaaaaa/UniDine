<?php include 'koneksi.php' ?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Tangani data yang dikirim dari form
    $mejaDipilih = $_POST["nmeja"];
    $jumlahTamu = $_POST["jumlahtamu"];

    // Simpan nomor meja dan jumlah tamu dalam sesi
    $_SESSION["meja_dipilih"] = $mejaDipilih;
    $_SESSION['jumlah_tamu'] = $jumlahTamu;
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Detail Pesanan</title>
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
                    <a href="index.php" class="nav-item nav-link"><i class="fa fa-bell me-2"></i>Daftar Pesanan</a>
                    <a href="KetersediaanMeja.php" class="nav-item nav-link "><i class="fa fa-envelope me-2"></i>Ketersedian Meja</a>
                    <a href="Pesanan.php" class="nav-item nav-link active"><i class="fa fa-file-alt me-2"></i>Pesanan</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-keyboard me-2"></i>Pengelolaan</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="Menu.php" class="dropdown-item ">Menu</a>
                            <a href="Meja.php" class="dropdown-item ">Meja</a>
                        </div>
                    </div>
                    <a href="Login.php" class="nav-item nav-link">Log Out</a>
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
            <div class="container-fluid mb-4 pt-4 px-4 " >
                <div class="bg-light rounded-top p-4">
                    <div class="row">                       
                        <p class="h4">  UniDine - Pesanan Baru</p>  
                    </div>
                </div>
            </div>
            
            <div class="container-fluid pt-4 px-4 text-align: left;">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light rounded p-4">
                            <div class="d-flex justify-content-between mb-4">
                                <h6 class="mb-0">Data Pesanan</h6>   
                            </div>  
                            <p>Jumlah Tamu: <?= isset($_SESSION["jumlah_tamu"]) ? $_SESSION["jumlah_tamu"] : ""; ?></p>
                            <p>Meja: <?= isset($_SESSION["meja_dipilih"]) ? $_SESSION["meja_dipilih"] : ""; ?></p>
                          
                              
                            <p class="h6">Item Pesanan</p>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Item</th>
                                        <th scope="col">Qt</th>
                                        <th scope="col">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Teh Manis</td>
                                        <td>1</td>
                                        <td>Rp. 7.0000</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Teh Manis</td>
                                        <td>1</td>
                                        <td>Rp. 7.0000</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>Teh Manis</td>
                                        <td>1</td>
                                        <td>Rp. 7.0000</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>   
                    </div>
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">Detail Harga</h6>
                            </div>
                            <p>Harga Pesanan: Rp. 7.000</p>
                            <p>Tunai	    : Rp. 10.000</p>
                            <p>Kembali	    : Rp. 3.000</p>
                            <a href="DetailPesanan.php"><button type="button" class="btn btn-primary m-2">Proses Pembayaran</button></a>
                            <a href="PesananBaru.php"><button type="button" class="btn btn-primary m-2">Bayar Nanti Dan Kembali</button></a>  
                        </div>
                        
                    </div>
                </div>
            </div>
            

            
    

            
            
            <!-- Footer start -->
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

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>