<?php 
  // Assuming you have a Product model
use App\Models\Coffee;

// Fetch Espresso products from the database
$cappuccinoProducts = Coffee::where('category', 'Cappuccino')->get();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Cart - Coffee </title>
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
	          <li class="nav-item"><a href="/blog" class="nav-link">Blog</a></li>
	          <li class="nav-item "><a href="/gallery" class="nav-link">Gallery</a></li>
	          <li class="nav-item cart"><a href="/cart" class="nav-link"><span class="icon icon-shopping_cart"></span><span class="bag d-flex justify-content-center align-items-center"><small>{{ count(session('cart', [])) }}</small></span></a></li>
	        </ul>
	      </div>
		  </div>	  
      @if(session('success'))
    			<div class="alert alert-success">
    			    {{ session('success') }}
    			</div>
			@endif
    </nav>
    <!-- END nav -->

    <section class="home-slider owl-carousel">

      <div class="slider-item" style="background-image: url(images/bg_3.jpg);" data-stellar-background-ratio="0.5">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row slider-text justify-content-center align-items-center">

            <div class="col-md-7 col-sm-12 text-center ftco-animate">
            	<h1 class="mb-3 mt-5 bread">Cart</h1>
	            <p class="breadcrumbs"><span class="mr-2"><a href="/">Home</a></span> <span>Cart</span></p>
            </div>

          </div>
        </div>
      </div>
    </section>
		
    <section class="ftco-section">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 ftco-animate">
                <div class="billing-details">
                    <h3 class="mb-4 billing-heading">Billing Details</h3>
                    <div class="row align-items-end">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="firstname">Name *</label>
                                <input type="text" class="form-control" placeholder="" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="towncity">Table *</label>
                                <input type="text" class="form-control" placeholder="" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="postcodezip">Notepad</label>
                                <input type="text" class="form-control" placeholder="">
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- .col-md-8 -->

            <div class="col-md-4">
                <div class="payment-method ftco-bg-dark p-3 p-md-4">
                    <h3 class="billing-heading mb-4">Payment Method</h3>
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="radio">
                                <label><input type="radio" name="optradio" class="mr-2">Bank Transfer</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="radio">
                                <label><input type="radio" name="optradio" class="mr-2">Cash</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="radio">
                                <label><input type="radio" name="optradio" class="mr-2">Paypal</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label><input type="checkbox" value="" class="mr-2"> I have read and accept the terms and conditions</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> <!-- .section -->

<section class="ftco-section ftco-cart">
    <div class="container">
        <div class="row">
            <div class="col-md-12 ftco-animate">
                <div class="cart-list">
                    <table class="table">
                        <thead class="thead-primary">
                            <tr class="text-center">
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>

                            @php $total = 0 @endphp
                            @if(session('cart'))
                                @foreach (session('cart') as $id => $details)
                                    @php $total += $details['price'] * $details['quantity'] @endphp

                                    <tr class="text-center" data-id="{{ $id }}">
                                        <td class="actions">
                                          <button type="button" class="btn btn-outline-danger cart_remove" name="cart_remove">&nbsp; &nbsp; Delete &nbsp; &nbsp;</button>
                                        </td>

                                        <td class="image-prod"><img style="width: 140px" src="{{ Storage::disk('public')->url($details['image_product']) }}" alt="{{ $details['name'] }}" class="img-fluid"></td>

                                        <td class="product-name">
                                            <h3>{{ $details['name'] }}</h3>
                                            <p>{{ $details['short_description'] }}</p>
                                        </td>

                                        <td class="price" data-th="Price">{{ "Rp " . $details['price'] }}</td>

                                        <td class="quantity" data-th="Quantity" data-th="Subtotal">
                                            <div class="input-group mb-3">
                                                <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity cart_update" data-id="{{ $id }}" min="1" max="10"/>
                                            </div>
                                        </td>
                                      
                                        <td class="total">{{ "Rp " . $details['price'] * $details['quantity'] }}</td>
                                    </tr><!-- END TR-->
                                  
                                @endforeach
                            @endif

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row justify-content-end">
            <div class="col col-lg-3 col-md-6 mt-5 cart-wrap ftco-animate">
                <div class="cart-total mb-3">
                    <p class="d-flex">
                        <span>Total</span>
                        <span>{{ "Rp " . $total }}</span>
                    </p>
                </div>
                <button type="button" class="btn btn-primary py-3 px-4" id="btn"><p style="color: white">Buying</p></button>
                <script src="/dist/sweetalert2.all.min.js"></script>
                <script>
                    const btn = document.getElementById('btn');
                    btn.addEventListener('click', function(){
                        Swal.fire({
                            title: "Are you sure?",
                            text: "buy this coffee?",
                            icon: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#3085d6",
                            cancelButtonColor: "#d33",
                            confirmButtonText: "Yes, buy it!"
                        }).then((result) => {
                            if (result.isConfirmed) {
                                Swal.fire({
                                    title: "Successful Purchase!",
                                    text: "Coffee Late",
                                    icon: "success"
                                });
                            }
                        });
                    })
                </script>
            </div>
        </div>
    </div>
</section>

<!-- Add jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<!-- Your custom script -->
<script type="text/javascript">
    $(document).ready(function () {
        $(".cart_update").change(function (e) {
            e.preventDefault();

            var ele = $(this);

            $.ajax({
                url: '{{ route('update_cart') }}',
                method: "patch",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.data("id"), // Use data-id attribute
                    quantity: ele.val()
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        });

        $(".cart_remove").click(function (e) {
            e.preventDefault();

            var ele = $(this);

            if (confirm("Do you really want to remove?")) {
                $.ajax({
                    url: '{{ route('remove_from_cart') }}',
                    method: "DELETE",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.parents("tr").attr("data-id")
                    },
                    success: function (response) {
                        window.location.reload();
                    }
                });
            }
        });
    });
</script>

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
              @foreach ($cappuccinoProducts as $product)
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
                <li><a href="/menu" class="py-2 d-block">Espresso</a></li>
                <li><a href="/menu" class="py-2 d-block">Americano</a></li>
                <li><a href="/menu" class="py-2 d-block">Cappuccino</a></li>
                <li><a href="/menu" class="py-2 d-block">Mocha Latte</a></li>
                <li><a href="/menu" class="py-2 d-block">Caffé Latte</a></li>
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