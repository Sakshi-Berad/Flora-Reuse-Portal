<!DOCTYPE html>
<html class="no-js" lang="en_AU" />
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title><?= env("APP_NAME");?></title>
	<meta name="description" content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, maximum-scale=1, user-scalable=no" />

	<meta name="HandheldFriendly" content="True" />
	<meta name="pinterest" content="nopin" />

	<meta property="og:locale" content="en_AU" />
	<meta property="og:type" content="website" />
	<meta property="fb:admins" content="" />
	<meta property="fb:app_id" content="" />
	<meta property="og:site_name" content="" />
	<meta property="og:title" content="" />
	<meta property="og:description" content="" />
	<meta property="og:url" content="" />
	<meta property="og:image" content="" />
	<meta property="og:image:type" content="image/jpeg" />
	<meta property="og:image:width" content="" />
	<meta property="og:image:height" content="" />
	<meta property="og:image:alt" content="" />

	<meta name="twitter:title" content="" />
	<meta name="twitter:site" content="" />
	<meta name="twitter:description" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:image:alt" content="" />
	<meta name="twitter:card" content="summary_large_image" />
	

	<link rel="stylesheet" type="text/css" href="{{ asset('front-assets/css/slick.css')}}" />
	<link rel="stylesheet" type="text/css" href=" {{ asset('front-assets/css/slick-theme.css')}}" />
	<link rel="stylesheet" type="text/css" href=" {{ asset('front-assets/css/ion.rangeSlider.min.css')}}" />
	<link rel="stylesheet" type="text/css" href="{{ asset('front-assets/css/video-js.css')}}" />
    <link rel="stylesheet" type="text/css" href=" {{ asset('front-assets/css/style.css')}}" />
    {{-- <link rel="stylesheet" type="text/css" href=" {{ asset('front-assets/css/ion.rangeSlider.min')}}" /> --}}

	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;500&family=Raleway:ital,wght@0,400;0,600;0,800;1,200&family=Roboto+Condensed:wght@400;700&family=Roboto:wght@300;400;700;900&display=swap" rel="stylesheet">

	<!-- Fav Icon -->
	<link rel="shortcut icon" type="image/x-icon" href="{{ asset('front-assets/images/F.jpeg')}}" />

	<meta name="csrf-token" content="{{ csrf_token() }}">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body data-instant-intensity="mousedown">

<div class="bg-light top-header">        
	<div class="container">
		<div class="row align-items-center py-3 d-none d-lg-flex justify-content-between">
			<div class="col-lg-4 logo">
				<a href="{{ route('front.home') }}" class="text-decoration-none">
					{{-- <span class="h2 text-uppercase text-dark">
						<img src="{{ asset('front-assets/images/flogo.png')}}" style="width: 70px;position:absolute;" class="img-fluid" alt="">
					</span> --}}
					<span class="h2 text-uppercase text-dark bg-primary border-5 ml-n1">{{env("APP_NAME")}}</span>
				</a>
			</div>
			<div class="col-lg-6 col-6 text-left  d-flex justify-content-end align-items-center">
				<a href="{{ route('front.home') }}" class="nav-link text-dark">Home</a>
				@if(Auth::check())
				<a href="{{ route('account.profile') }}" class="nav-link text-dark">My Account</a>
				@else
				<a href="{{ route('account.login') }}" class="nav-link text-dark">Login/Regiter</a>
				@endif

				<!-- <form action="{{ route('front.shop') }}" method="get">					
					<div class="input-group">
						<input type="text" value="{{ Request::get('search')}}" id="search" placeholder="Search For Products" class="form-control" name="search">
						<button type="submit" class="input-group-text">
							<i class="fa fa-search text-dark"></i>
					  	</button>
					</div>
				</form> -->

			</div>		
		</div>
	</div>
</div>

<header class="bg-dark">
	<div class="container">
		<nav class="navbar navbar-expand-xl" id="navbar">
			<a href="{{route('front.home')}}" class="text-decoration-none mobile-logo">
				<span class="h2 text-uppercase text-white bg-dark"><?= env("APP_NAME");?></span>
				<span class="h2 text-uppercase text-white px-2">SHOP</span>
			</a>
			<button class="navbar-toggler menu-btn" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      			<!-- <span class="navbar-toggler-icon icon-menu"></span> -->
				  <i class="navbar-toggler-icon fas fa-bars"></i>
    		</button>
    		<div class="collapse navbar-collapse" id="navbarSupportedContent">
      			<ul class="navbar-nav me-auto mb-2 mb-lg-0">
        			<!-- <li class="nav-item">
          				<a class="nav-link active" aria-current="page" href="index.php" title="Products">Home</a>
        			</li> -->

                    {{-- ******** Dy category --}}
                    @if(getCategories()->isNotEmpty())
                        @foreach (getCategories() as $category)
                            <li class="nav-item dropdown">
                                <button class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{$category->name}}
                                </button>
                                @if ($category->sub_category->isNotEmpty()) 
                                <ul class="dropdown-menu dropdown-menu-dark">
                                        @foreach ($category->sub_category as $subcategory)    
                                            <li><a class="dropdown-item nav-link" href="{{ route('front.shop',[$category->slug,$subcategory->slug]) }}">{{$subcategory->name}}</a></li>
                                        @endforeach
                                </ul>
                                @endif
                            </li>
                        @endforeach
                    @endif
                    {{-- ******** Dy category End --}}
      			</ul>      			
      		</div>   
			<div class="right-nav py-0">
				<a href="{{ route('front.cart') }}" class="ml-3 d-flex pt-2">
					<i class="fas fa-shopping-cart text-light"> Cart</i>					
				</a>
			</div> 		
      	</nav>
  	</div>
</header>

{{-- ******************* --}}
<main>
    @yield('content')
</main>
{{-- ******************* --}}


<footer class="bg-dark mt-5">
	<div class="container pb-5 pt-3">
		<div class="row">
			<div class="col-md-4">
				<div class="footer-card">
					<h3>Get In Touch</h3>
					<p>
						JNEC, Ch. Sambhaji Nagar, Maharashtra 431001. </p> 
						<small><u>Email :</u>support@gmail.com</small><br>
						<small><u>Mob :</u>+918263869832</small>
				</div>
			</div>
			<div class="col-md-2">
				<div class="footer-card">
					<h3>Links</h3>
					<ul>
						<li><a href="{{ route('front.aboutUs') }}" title="About">About Us</a></li>
						<li><a href="{{ route('front.contact') }}" title="Contact Us">Contact Us</a></li>						
						<li><a href="{{ route('front.shop') }}" title="Privacy">Shop Now</a></li>
					</ul>
				</div>
			</div>

			<div class="col-md-3">
				<div class="footer-card">
					<h3>Account Login</h3>
					<ul>
						<li><a href="{{ route('account.login') }}" title="Sell">Customer Login</a></li>
						<li><a href="{{ route('manufacturer.login') }}" title="Sell">Manufacturer Login</a></li>
						<li><a href="{{ route('seller.login') }}" title="Sell">Raw Material Seller Login</a></li>
						<li><a href="{{ route('account.register') }}" title="Advertise">Register</a></li>
						<li><a href="{{ route('account.orders') }}" title="Contact Us">My Orders</a></li>						
					</ul>
				</div>
			</div>	
			
			<div class="col-md-3 maps">
				<h5>Shop Location</h5>
				<div id="map">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15009.392720109512!2d75.33737697603071!3d19.867514486218624!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bdba3a0ab7088b7%3A0xb5af50109d8a8cce!2sMGM%20University%20Chh. Sambhajinagar!5e0!3m2!1sen!2sin!4v1679919114736!5m2!1sen!2sin" width="300" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
				</div>
			</div>			
		</div>
	</div>
	<div class="copyright-area">
		<div class="container">
			<div class="row">
				<div class="col-12 mt-3">
					<div class="copy-right text-center">
						{{-- <p>© Copyright 2024 FloraReuse. All Rights Reserved</p> --}}
						<p class="text-size">All Rights Reserved. © 2024 <strong> Florareuse </strong></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>

{{-- whishlist model  --}}
<div class="modal fade" id="whishlistModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
	  <div class="modal-content">
		<div class="modal-header">
		  <h5 class="modal-title" id="exampleModalLabel">Success</h5>
		  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		</div>
		<div class="modal-body">
		  
		</div>
		<div class="modal-footer">
		  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
		</div>
	  </div>
	</div>
</div>

<script src="{{ asset('front-assets/js/jquery-3.6.0.min.js')}}"></script>
<script src="{{ asset('front-assets/js/bootstrap.bundle.5.1.3.min.js')}}"></script>
<script src="{{ asset('front-assets/js/instantpages.5.1.0.min.js')}}"></script>
<script src="{{ asset('front-assets/js/lazyload.17.6.0.min.js')}}"></script>
<script src="{{ asset('front-assets/js/slick.min.js')}}"></script>
<script src="{{ asset('front-assets/js/custom.js')}}"></script>
<script src="{{ asset('front-assets/js/ion.rangeSlider.min.js')}}"></script>

<script>
window.onscroll = function() {myFunction()};

var navbar = document.getElementById("navbar");
var sticky = navbar.offsetTop;

function myFunction() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky")
  } else {
    navbar.classList.remove("sticky");
  }
}

$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});

function addToCart(id)
{
    $.ajax({
        url: '{{ route("front.addToCart") }}',
        type: 'post',
        data: {id: id},
        dataType: 'json',
        success: function(response)
        {
            if(response.status == true)
            {
                window.location.href="{{ route('front.cart') }}"
            }
            else
            {
                alert(response.message);
            }
        }

    });
}

function addToWhishlist(id){
	$.ajax({
        url: '{{ route("front.addToWhishlist") }}',
        type: 'post',
        data: {id: id},
        dataType: 'json',
        success: function(response)
        {
            if(response.status == true)
            {
				$("#whishlistModel .modal-body").html(response.message);
				$("#whishlistModel").modal('show');
            }
            else
            {
                window.location.href="{{ route('account.login') }}"
            }
        }

    });
}

// window.oncontextmenu = function(){
// 	return false;
// }


</script>

@yield('customJs')
</body>
</html>