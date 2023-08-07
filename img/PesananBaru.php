<?php include 'koneksi.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Pesanan Baru</title>
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

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">



    <link href="css/count.css" rel="stylesheet">
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
            
            <p class="h4 text-center"> Pilih Menu & Check Out</p> 
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light text-center rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">Pilih Menu</h6>   
                            </div>
                            <ul class="nav nav-pills mb-3 justify-content-center"  id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                        aria-selected="true">Makanan</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-profile" type="button" role="tab"
                                        aria-controls="pills-profile" aria-selected="false">Minuman</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-contact" type="button" role="tab"
                                        aria-controls="pills-contact" aria-selected="false">Cemilan</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active " id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" >
                                <?php
                                    $hasil = mysqli_query($koneksi, "SELECT * FROM tbl_menu WHERE kategori = 'Makanan' ");
                                    while ($h = mysqli_fetch_array($hasil)) {
                                    ?>
                                    <div class="row justify-content-md-center">
                                        <div class="col-md-6 m-auto p-2">
                                            <div class="card-deck justify-content-center" style="width: 300px;"> 
                                                <div class="card " style="width:400px">
<<<<<<< HEAD:dashmin-1.0.0/PesananBaru.php
                                                <center><?php echo "<img src='$h[pic]' width='175' height='175' />";?> 
=======
                                                    <img src="img/Nasi.jpeg" class="img-fluid rounded mx-auto d-block" width="175" height="175"  alt="...">
>>>>>>> e431f8215c51b9995954e624cc24d5484fb6f34f:PesananBaru.php
                                                        <div class="card-body">
                                                            <h5 class="card-title"><?= $h['nama']; ?></h5>
                                                            <p class="card-text"><?= $h['deks']; ?></p>
                                                            <p class="card-text"><small class="text-muted"><?= $h['harga']; ?></small></p>
                                                                <div class="input-group" style="justify-content: center;">
                                                                    <input type="button" value="-" class="button-minus" data-field="quantity">
                                                                    <input type="number" step="1" max="" value="0" name="quantity" class="quantity-field">
                                                                    <input type="button" value="+" class="button-plus" data-field="quantity">
                                                                </div> 
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                                </div>
                                
                                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                <?php
                                // Define your base URL here
                                $base_url = "https://github.com/dafaaaaaa/UniDine/tree/main/dashmin-1.0.0"; // Ganti dengan URL dasar situs Anda

                                $hasil = mysqli_query($koneksi, "SELECT * FROM tbl_menu WHERE kategori = 'Minuman'");
                                while ($h = mysqli_fetch_array($hasil)) {
                                ?>
                                <div class="card-deck"> 
                                    <div class="card">
                                    <center><?php echo "<img src='$h[pic]' width='175' height='175' />";?> 
                                        <div class="card-body">
                                            <h5 class="card-title"><?= $h['nama']; ?></h5>
                                            <p class="card-text"><?= $h['deks']; ?></p>
                                            <p class="card-text"><small class="text-muted"><?= $h['harga']; ?></small></p>
                                            <div class="input-group" style="justify-content: center;">
                                                <input type="button" value="-" class="button-minus" data-field="quantity">
                                                <input type="number" step="1" max="" value="0" name="quantity" class="quantity-field">
                                                <input type="button" value="+" class="button-plus" data-field="quantity">
                                            </div> 
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>

                                </div>

                                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                                    <div class="card-deck">
                                        <div class="card">
                                          <img src="img/Kentang.jpeg" class="img-fluid rounded mx-auto d-block" width="175" height="175"  alt="...">
                                          <div class="card-body">
                                            <h5 class="card-title">Kentang Goreng</h5>
                                            <p class="card-text">Goreng</p>
                                            <p class="card-text"><small class="text-muted">Rp.35.000</small></p>
                                            <div class="input-group" style="justify-content: center;">
                                                <input type="button" value="-" class="button-minus" data-field="quantity">
                                                <input type="number" step="1" max="" value="0" name="quantity" class="quantity-field">
                                                <input type="button" value="+" class="button-plus" data-field="quantity">
                                            </div> 
                                          </div>
                                        </div>
                                        <div class="card">
                                          <img src="img/Kentang.jpeg" class="card-img-top" alt="...">
                                          <div class="card-body">
                                            <h5 class="card-title">Kentang Krispi</h5>
                                            <p class="card-text">Krispi</p>
                                            <p class="card-text"><small class="text-muted">Rp.50.000 </small></p>
                                            <div class="input-group" style="justify-content: center;">
                                                <input type="button" value="-" class="button-minus" data-field="quantity">
                                                <input type="number" step="1" max="" value="0" name="quantity" class="quantity-field">
                                                <input type="button" value="+" class="button-plus" data-field="quantity">
                                            </div>
                                          </div>
                                        </div>  
                                    </div>
                                    <div class="card-deck">
                                        <div class="card">
                                          <img src="img/Kentang.jpeg" alt="...">
                                          <div class="card-body">
                                            <h5 class="card-title">Kentang Goreng</h5>
                                            <p class="card-text">Goreng</p>
                                            <p class="card-text"><small class="text-muted">Rp.35.000</small></p>
                                            <div class="input-group" style="justify-content: center;">
                                                <input type="button" value="-" class="button-minus" data-field="quantity">
                                                <input type="number" step="1" max="" value="0" name="quantity" class="quantity-field">
                                                <input type="button" value="+" class="button-plus" data-field="quantity">
                                            </div> 
                                          </div>
                                        </div>
                                        <div class="card">
                                          <img src="img/Kentang.jpeg" class="card-img-top" alt="...">
                                          <div class="card-body">
                                            <h5 class="card-title">Kentang Krispi</h5>
                                            <p class="card-text">Krispi</p>
                                            <p class="card-text"><small class="text-muted">Rp.50.000 </small></p>
                                            <div class="input-group" style="justify-content: center;">
                                                <input type="button" value="-" class="button-minus" data-field="quantity">
                                                <input type="number" step="1" max="" value="0" name="quantity" class="quantity-field">
                                                <input type="button" value="+" class="button-plus" data-field="quantity">
                                            </div>
                                          </div>
                                        </div>  
                                    </div>
                                </div>
                            </div>
                            
                           
                        </div>   
                    </div>
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light rounded h-100 p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">Detail Pesanan & Checkout</h6>   
                            </div>
                            <p>Nomor Pesanan	: Nomor Pesanan</p>
                            <p>Nama Pelanggan	: Cash (Pelanggan default)</p>
                            <p>Jumlah Tamu	: 1</p>
                            <p>Meja	: dqww  </p>
                            <a href="DetailPesanan.php"><button type="button" class="btn btn-primary m-2">Proses Pesanan</button></a>
                            <a href="Pesanan.php"><button type="button" class="btn btn-primary m-2">Batal</button></a>    
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



    
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
    <script src="js/count.js"></script>

					


    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>