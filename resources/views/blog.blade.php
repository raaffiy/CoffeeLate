<?php
// Assuming you have a Product model
use App\Models\Coffee;

// Fetch Espresso products from the database
$espressoProducts = Coffee::where('category', 'Espresso')->get();
$cappuccinoProducts = Coffee::where('category', 'Cappuccino')->get();
$americanoProducts = Coffee::where('category', 'Americano')->get();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Blog - Coffee </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
  	<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="/">Coffee<small>Late</small></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item"><a href="/" class="nav-link">Home</a></li>
	          <li class="nav-item"><a href="/menu" class="nav-link">Menu</a></li>
	          <li class="nav-item active"><a href="#" class="nav-link">Blog</a></li>
	          <li class="nav-item "><a href="/gallery" class="nav-link">Gallery</a></li>
	          <li class="nav-item cart"><a href="/cart" class="nav-link"><span class="icon icon-shopping_cart"></span><span class="bag d-flex justify-content-center align-items-center"><small>{{ count(session('cart', [])) }}</small></span></a></li>
	        </ul>
	      </div>
		  </div>
	  </nav>
    <!-- END nav -->

    <section class="home-slider owl-carousel">

      <div class="slider-item" style="background-image: url(images/bg_3.jpg);" data-stellar-background-ratio="0.5">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row slider-text justify-content-center align-items-center">

            <div class="col-md-7 col-sm-12 text-center ftco-animate">
            	<h1 class="mb-3 mt-5 bread">Blog</h1>
	            <p class="breadcrumbs"><span class="mr-2"><a href="/">Home</a></span> <span>Blog</span></p>
            </div>

          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section">
      <div class="container">
        <div class="row d-flex">
          @foreach ($cappuccinoProducts as $product)
            <?php
              $image_product_path = Storage::disk('public')->url($product->image_product);
              $name = $product->name;
              $short_description = $product->short_description;
              $productId = $product->id; // Add this line to get the product ID
            ?>
            <div class="col-md-4 d-flex ftco-animate">
              <div class="blog-entry align-self-stretch">
                <a href="/blog-single/{{ $productId }}" class="block-20" style="background-image: url('{{ $image_product_path }}');"></a>
                <div class="text py-4 d-block">
                  <h3 class="heading mt-2"><a href="/blog-single/{{ $productId }}">{{ $name }}</a></h3>
                  <p>{{ $short_description }}</p>
                </div>
              </div>
            </div>
          @endforeach
          
          @foreach ($espressoProducts as $product)
            <?php
              $image_product_path = Storage::disk('public')->url($product->image_product);
              $name = $product->name;
              $short_description = $product->short_description;
              $productId = $product->id; // Add this line to get the product ID
            ?>
            <div class="col-md-4 d-flex ftco-animate">
              <div class="blog-entry align-self-stretch">
                <a href="/blog-single/{{ $productId }}" class="block-20" style="background-image: url('{{ $image_product_path }}');"></a>
                <div class="text py-4 d-block">
                  <h3 class="heading mt-2"><a href="/blog-single/{{ $productId }}">{{ $name }}</a></h3>
                  <p>{{ $short_description }}</p>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </section>
      
	<footer class="ftco-footer ftco-section img">
    	<div class="overlay"></div>
      <div class="container">
        <div class="row mb-5">
          <div class="col-lg-3 col-md-6 mb-5 mb-md-5">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">About Us</h2>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="https://github.com/raaffiy"><span class="icon-github"></span></a></li>
                <li class="ftco-animate"><a href="https://www.linkedin.com/in/maulana-ra-afi-457414232/"><span class="icon-linkedin"></span></a></li>
                <li class="ftco-animate"><a href="https://www.instagram.com/rafy_998?igsh=dXIyY29raXo5cW1u"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mb-5 mb-md-5">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Recent Blog</h2>
              @foreach ($americanoProducts as $product)
                <?php
                  $image_product_path = Storage::disk('public')->url($product->image_product);
                  $name = $product->name;
                  $short_description = $product->short_description;
                  $productId = $product->id; // Add this line to get the product ID
                ?>
              <div class="block-21 mb-4 d-flex">
                <a href="/blog-single/{{ $productId }}" class="blog-img mr-4" style="background-image: url('{{ $image_product_path }}');"></a>
                <div class="text">
                  <h3 class="heading"><a href="/blog-single/{{ $productId }}">{{ $name }}</a></h3>
                </div>
              </div>
              @endforeach
            </div>
          </div>
          <div class="col-lg-2 col-md-6 mb-5 mb-md-5">
             <div class="ftco-footer-widget mb-4 ml-md-4">
              <h2 class="ftco-heading-2">Menu</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="py-2 d-block">Espresso</a></li>
                <li><a href="#" class="py-2 d-block">Americano</a></li>
                <li><a href="#" class="py-2 d-block">Cappuccino</a></li>
                <li><a href="#" class="py-2 d-block">Mocha Latte</a></li>
                <li><a href="#" class="py-2 d-block">Caffé Latte</a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 mb-5 mb-md-5">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Have a Questions?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">Rawalumbu, Kota Bekasi, Jawa Barat, Jembatan 8</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">(+62) 857 - 1471 - 3706</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">raafimaulana43@gmail.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy; <script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Rafi</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
      </div>
    </footer>

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
    
  </body>
</html>