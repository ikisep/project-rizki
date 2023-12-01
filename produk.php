<?php 
include 'koneksi/koneksi.php';




if(isset($_GET['idkategori']))
{
    $id_kategori = $_GET['idkategori'];


    $kategori_produk = array();
    
    $ambil = $koneksi->query("SELECT * FROM  produk JOIN kategori
    ON produk.id_kategori=kategori.id_kategori WHERE produk.id_kategori='$id_kategori' LIMIT 8");
    
    while($pecah = $ambil->fetch_assoc())
    {
       $kategori_produk[]=$pecah;
    }
}
else
{
    $produk = array();

    $ambil = $koneksi->query("SELECT * FROM  produk JOIN kategori
    ON produk.id_kategori=kategori.id_kategori LIMIT 8");
    
    while($pecah = $ambil->fetch_assoc())
    {
       $produk[]=$pecah;
    }
}

?>   
   
 
 <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Penjualan|Rizki Septian</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner"></div>
    </div>
    <!-- Spinner End -->


    <!-- Topbar Start -->
   
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-dark px-5 py-3 py-lg-0">
            <a href="index.html" class="navbar-brand p-0">
                <h1 class="m-0"><i class="fa fa-user-tie me-2"></i>Silat Store</h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="index.php" class="nav-item nav-link">Home</a>
                    <a href="produk.php" class="nav-item nav-link active">Produk</a>
                    <a href="service.html" class="nav-item nav-link">Services</a>
                    
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                        <div class="dropdown-menu m-0">
                            <a href="price.html" class="dropdown-item">Pricing Plan</a>
                            <a href="feature.html" class="dropdown-item">Our features</a>
                            <a href="team.html" class="dropdown-item">Team Members</a>
                            <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                            <a href="quote.html" class="dropdown-item">Free Quote</a>
                        </div>
                    </div>
                    <a href="contact.html" class="nav-item nav-link">Contact</a>
                </div>
                <butaton type="button" class="btn text-primary ms-3" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fa fa-search"></i></butaton>
                
            </div>
        </nav>

        <div class="container-fluid bg-primary py-2 bg-header" style="margin-bottom: 90px;">
            
                <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                    <h1 class="display-4 text-white animated zoomIn">Produk</h1>
                    <a href="" class="h5 text-white">Home</a>
                    <i class="far fa-circle text-white px-2"></i>
                    <a href="" class="h5 text-white">Produk</a>
                </div>
            </div>
        </div>
    </div>
   
   <div class="row">

   <div class="col-md-3">
    <?php include 'include/sidebar.php';?>
   </div>
   <div class="col-md-9">
    <div class="card box">
        <div class="card-body">
        <h2>Produk kami</h2>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
            Architecto dolorem vero expedita consequuntur deleniti, 
            corporis aspernatur dolor obcaecati laudantium eum illum 
            eligendi at exercitationem in officia delectus voluptatem provident. Omnis.
        </p>
        </div>
        
    </div>
   </div>

          <div class="row g-5">

                 <?php if(isset($_GET['idkategori'])):?>
                    <?php foreach ($kategori_produk as $key => $value):?>
                       

                   <div class="col-lg-4 wow slideInUp" data-wow-delay="0.3s">
                    <div class="team-item bg-light rounded overflow-hidden">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="assets/foto_produk/<?php echo $value['foto_produk'];?>" alt="">
                            <div class="team-social">
                                
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <h4 class="text-primary"><?php echo $value['nama_produk'];?></h4>
                            <p class="text-uppercase m-0">Rp<?php echo number_format($value['harga_produk']);?></p>
                            <br>
                            <a href="beli.php?idproduk=<?php echo $value['id_produk'];?>" class="btn btn-primary py-md-1 px-md-4 me-2 animated slideInLeft">
                                <i class="fas fa-shopping-cart"> Keranjang</i>
                            </a>
                            <a href="detail_produk.php?idproduk=<?php echo $value['id_produk'];?>" class="btn btn-primary py-md-1 px-md-4 me-2 animated slideInLeft ">
                                <li class="fas fa-eye"> Detail</li>
                            </a>
                        </div>
                    </div>
                </div> 
                <?php endforeach ?>

                    <?php else: ?>
          
                <?php foreach ($produk as $key => $value): ?>
                <div class="col-lg-4 wow slideInUp" data-wow-delay="0.3s">
                    <div class="team-item bg-light rounded overflow-hidden">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="assets/foto_produk/<?php echo $value['foto_produk'];?>" alt="">
                            <div class="team-social">
                                
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <h4 class="text-primary"><?php echo $value['nama_produk'];?></h4>
                            <p class="text-uppercase m-0">Rp<?php echo number_format($value['harga_produk']);?></p>
                            <br>
                            <a href="beli.php?idproduk=<?php echo $value['id_produk'];?>" class="btn btn-primary py-md-1 px-md-4 me-2 animated slideInLeft">
                                <i class="fas fa-shopping-cart"> Keranjang</i>
                            </a>
                            <a href="detail_produk.php?idproduk=<?php echo $value['id_produk'];?>" class="btn btn-primary py-md-1 px-md-4 me-2 animated slideInLeft ">
                                <li class="fas fa-eye"> Detail</li>
                            </a>
                        </div>
                    </div>
                </div> 
            <?php endforeach ?>  
            
            <?php endif; ?>
   </div>

   <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded back-to-top"><i class="bi bi-arrow-up"></i></a>

   <div class="container-fluid bg-dark text-light mt-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row gx-5">
                <div class="col-lg-4 col-md-6 footer-about">
                    <div class="d-flex flex-column align-items-center justify-content-center text-center h-100 bg-primary p-4">
                        <a href="index.html" class="navbar-brand">
                            
                        </a>
                        
                        <form action="">
                            <div class="input-group">
                               
                                
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-8 col-md-6">
                    <div class="row gx-5">
                        <div class="col-lg-4 col-md-12 pt-5 mb-5">
                            <div class="section-title section-title-sm position-relative pb-3 mb-4">
                                <h3 class="text-light mb-0">Get In Touch</h3>
                            </div>
                            <div class="d-flex mb-2">
                                <i class="bi bi-geo-alt text-primary me-2"></i>
                                <p class="mb-0">JL.Simpang Palarang</p>
                            </div>
                            <div class="d-flex mb-2">
                                <i class="bi bi-envelope-open text-primary me-2"></i>
                                <p class="mb-0">septianrizkj54@gmail.com</p>
                            </div>
                            <div class="d-flex mb-2">
                                <i class="bi bi-telephone text-primary me-2"></i>
                                <p class="mb-0">089531281109</p>
                            </div>
                            <div class="d-flex mt-4">
                                <a class="btn btn-primary btn-square me-2" href="#"><i class="fab fa-twitter fw-normal"></i></a>
                                <a class="btn btn-primary btn-square me-2" href="#"><i class="fab fa-facebook-f fw-normal"></i></a>
                                <a class="btn btn-primary btn-square me-2" href="#"><i class="fab fa-linkedin-in fw-normal"></i></a>
                                <a class="btn btn-primary btn-square" href="#"><i class="fab fa-instagram fw-normal"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 pt-0 pt-lg-5 mb-5">
                            <div class="section-title section-title-sm position-relative pb-3 mb-4">
                                <h3 class="text-light mb-0">Quick Links</h3>
                            </div>
                            <div class="link-animated d-flex flex-column justify-content-start">
                                <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Home</a>
                                <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>About Us</a>
                                <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Our Services</a>
                                <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Meet The Team</a>
                                <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Latest Blog</a>
                                <a class="text-light" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Contact Us</a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 pt-0 pt-lg-5 mb-5">
                            <div class="section-title section-title-sm position-relative pb-3 mb-4">
                                <h3 class="text-light mb-0">Popular Links</h3>
                            </div>
                            <div class="link-animated d-flex flex-column justify-content-start">
                                <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Home</a>
                                <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>About Us</a>
                                <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Our Services</a>
                                <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Meet The Team</a>
                                <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Latest Blog</a>
                                <a class="text-light" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid text-white" style="background: #061429;">
        <div class="container text-center">
            <div class="row justify-content-end">
                <div class="col-lg-8 col-md-6">
                    <div class="d-flex align-items-center justify-content-center" style="height: 75px;">
                        <p class="mb-0">&copy; <a class="text-white border-bottom" href="#">Your Site Name</a>. All Rights Reserved. 
						
						<!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
						Designed by <a class="text-white border-bottom" href="https://htmlcodex.com">Rizki Septian</a></p>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>