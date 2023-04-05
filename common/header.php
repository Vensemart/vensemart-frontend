<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Vensemart</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="keywords" />
    <meta content="" name="description" />

    <!-- Favicon -->
    <link href="img/vens_icon.jpeg" rel="icon" />

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Quicksand:wght@600;700&display=swap"
      rel="stylesheet"
    />

    <!-- Icon Font Stylesheet -->
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css"
      rel="stylesheet"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"
      rel="stylesheet"
    />

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet" />
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet" />
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet" />
    <style>
        .bg-navbar {
            background-color: #fff!important;
        }
    </style>
  </head>

  <body>
    <!-- Spinner Start -->
    <div
      id="spinner"
      class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center"
    >
      <div
        class="spinner-border text-primary"
        style="width: 3rem; height: 3rem"
        role="status"
      >
        <span class="sr-only">Loading...</span>
      </div>
    </div>
    <!-- Spinner End -->

    <!-- Topbar Start -->
    <div class="container-fluid bg-light p-0 wow fadeIn" data-wow-delay="0.1s">
      <div class="row gx-0 d-none d-lg-flex bg-navbar" style="background-color: #003399!important;">
        <div class="col-lg-6 px-5 text-start">
          <div class="h-100 d-inline-flex align-items-center py-2 me-4 text-white">
            <small>O’Neal Center. Plot 360 Obafemi Awolowo Way. Jabi, Abuja. Nigeria</small>
            <small class="text-nowrap d-inline-block ms-3">Mon - Sat : 07.00 AM - 07.00 PM</small>
          </div>
        </div>
        <div class="col-lg-6 px-5 text-end">
            <div class="form-group d-inline-flex align-items-center py-2 me-1">
                <input class="form-control" placeholder="search..." />
            </div>
          <div class="h-100 d-inline-flex align-items-center py-3 me-4 text-white">
            <small>+234 816 713 1445</small>
          </div>
          <div class="h-100 d-inline-flex align-items-center">
            <a class="btn btn-sm-square bg-white text-primary me-1" target="_blank" href="https://www.facebook.com/Vensemart-111737978246924/"
              ><i class="fab fa-facebook-f"></i
            ></a>
            <a class="btn btn-sm-square bg-white text-primary me-1" target="_blank" href="https://twitter.com/vensemart_apps/status/1546134777950003201?s=21&t=f5Nglcl9M1W7VXzoAcAY3g"
              ><i class="fab fa-twitter"></i
            ></a>
            <a class="btn btn-sm-square bg-white text-primary me-1" target="_blank" href="https://www.youtube.com/channel/UCkBAireWdSGOgG-2U0zc_fA"
              ><i class="fab fa-youtube"></i
            ></a>
            <a class="btn btn-sm-square bg-white text-primary me-1" target="_blank" href="https://www.instagram.com/vensemart/"
              ><i class="fab fa-instagram"></i
            ></a>
            <a class="btn btn-sm-square bg-white text-primary me-0" target="_blank" href="https://www.linkedin.com/in/vensemart-apps-3971b5243"
              ><i class="fab fa-linkedin"></i
            ></a>
          </div>
        </div>
      </div>
    </div>
    <!-- Topbar End -->

    <!-- Navbar Start -->
    <nav
      class="navbar navbar-expand-lg bg-navbar sticky-top py-lg-0 px-4 px-lg-5 wow fadeIn"
      data-wow-delay="0.1s"
    >
      <a href="index.php" class="navbar-brand p-0">
        <img class="img-fluid me-3" src="img/icon/VMlogo.png" alt="Icon" />
        <!--<h1 class="m-0 text-primary">Pontus</h1>-->
      </a>
      <button
        type="button"
        class="navbar-toggler"
        data-bs-toggle="collapse"
        data-bs-target="#navbarCollapse"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse py-4 py-lg-0" id="navbarCollapse">
        <div class="navbar-nav ms-auto">
          <a href="index.php" class="nav-item nav-link">Home</a>
          <a href="about.php" class="nav-item nav-link">About</a>
          <a href="homeService.php" class="nav-item nav-link">Home Services</a>
          <a href="shop.php" class="nav-item nav-link">Shop</a>
          <a href="logistic.php" class="nav-item nav-link">Logistics</a>
          <a href="contact.php" class="nav-item nav-link">Contact</a>
        </div>
        <a href="https://vensemart.com/vensemart_vendor/franchisepanel/login.php" class="btn btn-primary"
          >Vendor Log in/Register<i class="fa fa-arrow-right ms-3"></i
        ></a>
        <!--<a href="" class="btn btn-info ms-2 text-white">Login to Service Provider<i class="fa fa-arrow-right ms-3"></i></a>-->
      </div>
    </nav>
    <!-- Navbar End -->