<!doctype html>
<html class="no-js" lang="eng">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{env("APP_NAME")}}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/front/img/logo/favicon.png')}}">

    <!-- CSS here -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/front/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/front/css/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/front/css/swiper-bundle.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/front/css/slick.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/front/css/magnific-popup.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/front/css/font-awesome-pro.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/front/css/flaticon_shofy.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/front/css/spacing.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/front/css/main.css')}}">

    <link rel="stylesheet" type="text/css" href=" {{ asset('assets/front/css/ion.rangeSlider.min.css')}}" />
</head>

<body>



    <!-- pre loader area start -->
    <div id="loading">
        <div id="loading-center">
            <div id="loading-center-absolute">
                <!-- loading content here -->
                <div class="tp-preloader-content">
                    <div class="tp-preloader-logo">
                        <div class="tp-preloader-circle">
                            <svg width="190" height="190" viewBox="0 0 380 380" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <circle stroke="#D9D9D9" cx="190" cy="190" r="180" stroke-width="6"
                                    stroke-linecap="round"></circle>
                                <circle stroke="red" cx="190" cy="190" r="180" stroke-width="6" stroke-linecap="round">
                                </circle>
                            </svg>
                        </div>
                        <img src="{{ asset('assets/front/img/logo/preloader/preloader-icon.svg')}}" alt="">
                    </div>
                    <h3 class="tp-preloader-title">{{env("APP_NAME")}}</h3>
                    <p class="tp-preloader-subtitle">Loading</p>
                </div>
            </div>
        </div>
    </div>
    <!-- pre loader area end -->

    <!-- back to top start -->
    <div class="back-to-top-wrapper">
        <button id="back_to_top" type="button" class="back-to-top-btn">
            <svg width="12" height="7" viewBox="0 0 12 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M11 6L6 1L1 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
        </button>
    </div>
    <!-- back to top end -->

    <!-- offcanvas area start -->
    <div class="offcanvas__area offcanvas__style-darkRed">
        <div class="offcanvas__wrapper">
            <div class="offcanvas__close">
                <button class="offcanvas__close-btn offcanvas-close-btn">
                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M11 1L1 11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M1 1L11 11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </button>
            </div>
            <div class="offcanvas__content">
                <div class="offcanvas__top mb-70 d-flex justify-content-between align-items-center">
                    <div class="offcanvas__logo logo">
                        <a href="#">
                            <img  src="{{ asset('assets/front/img/logo/logo.png')}}" alt="logo">
                        </a>
                    </div>
                </div>
                <div class="tp-main-menu-mobile fix mb-40"></div>

                <div class="offcanvas__contact align-items-center d-none">
                    <div class="offcanvas__contact-icon mr-20">
                        <span>
                            <img src="{{ asset('assets/front/img/icon/contact.png')}}" alt="">
                        </span>
                    </div>
                    <div class="offcanvas__contact-content">
                        <h3 class="offcanvas__contact-title">
                            <a href="tel:8263869832">8263869832</a>
                        </h3>
                    </div>
                </div>
                <div class="offcanvas__btn">
                    <a href="{{route('front.contact')}}" class="tp-btn-2 tp-btn-border-2">Contact Us</a>
                </div>
            </div>
            <div class="offcanvas__bottom">

            </div>
        </div>
    </div>
    <div class="body-overlay"></div>
    <!-- offcanvas area end -->

    <!-- mobile menu area start -->
    <div id="tp-bottom-menu-sticky" class="tp-mobile-menu d-lg-none">
        <div class="container">
            <div class="row row-cols-5">
                <div class="col">
                    <div class="tp-mobile-item text-center">
                        <a href="/shop" class="tp-mobile-item-btn">
                            <i class="flaticon-store"></i>
                            <span>Store</span>
                        </a>
                    </div>
                </div>
                <div class="col d-none">
                    <div class="tp-mobile-item text-center">
                        <button class="tp-mobile-item-btn tp-search-open-btn">
                            <i class="flaticon-search-1"></i>
                            <span>Search</span>
                        </button>
                    </div>
                </div>
                <div class="col">
                    <div class="tp-mobile-item text-center">
                        <a href="{{route('account.wishlist')}}" class="tp-mobile-item-btn">
                            <i class="flaticon-love"></i>
                            <span>Wishlist</span>
                        </a>
                    </div>
                </div>
                <div class="col">
                    <div class="tp-mobile-item text-center">
                        <a href="{{route('account.profile')}}" class="tp-mobile-item-btn">
                            <i class="flaticon-user"></i>
                            <span>Account</span>
                        </a>
                    </div>
                </div>
                <div class="col">
                    <div class="tp-mobile-item text-center">
                        <button class="tp-mobile-item-btn tp-offcanvas-open-btn">
                            <i class="flaticon-menu-1"></i>
                            <span>Menu</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- mobile menu area end -->

    <!-- search area end -->


    <!-- header area start -->
    <header>
        <div class="tp-header-area tp-header-style-darkRed tp-header-height">

            <!-- header bottom start -->
            <div id="header-sticky" class="tp-header-bottom-2 tp-header-sticky">
                <div class="container">
                    <div class="tp-mega-menu-wrapper p-relative">
                        <div class="row d-sm-none d-md-block" style="margin-top:15px">                           
                            <div class="col-md-4">
                            <form action="{{ route('front.shop') }}" method="get" class="form-inline mt-2 my-lg-0 ">					
                                <div class="input-group">
                                    <input type="text" value="{{ Request::get('search')}}" id="search" placeholder="Search For Products" class="form-control" name="search">
                                    <button type="submit" class="input-group-text">
                                        <i class="fa fa-search text-dark"></i>
                                    </button>
                                </div>
				            </form>  
                            </div>                                                  
                        </div>
                        <div class="row align-items-center">
                            <div class="col-xl-2 col-lg-5 col-md-5 col-sm-4 col-6">
                                <div class="logo mx-30">
                                    <a href="#">
                                        <img src="{{ asset('assets/front/img/logo/logo.png')}}" alt="logo">
                                    </a>
                                </div>
                            </div>
                            <div class="col-xl-5 d-none d-xl-block">
                                <div class="main-menu menu-style">
                                    <nav class="tp-main-menu-content">
                                        <ul>
                                            <li><a href="/">Home</a></li>
                                            <li class="">
                                                <a href="/shop">Mfg. Products</a>                                              
                                            </li>   
                                                                                                                                                                        
                                            <li><a href="{{route('front.raw-material.shop')}}">Raw Material</a></li>                                                                                     
                                            <li><a href="{{route('front.contact')}}">Contact</a></li>    
                                                                                                                     
                                        </ul>
                                        
                                    </nav>
                            
                                </div>
                                <div class="tp-category-menu-wrapper d-none">
                                    <nav class="tp-category-menu-content">
                                        <ul>
                                            <li>
                                                <a href="/shop">
                                                    <span>
                                                        <svg width="16" height="17" viewBox="0 0 16 17" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M5.90532 14.8316V12.5719C5.9053 11.9971 6.37388 11.5301 6.95443 11.5262H9.08101C9.66434 11.5262 10.1372 11.9944 10.1372 12.5719V12.5719V14.8386C10.1371 15.3266 10.5305 15.7254 11.0233 15.7368H12.441C13.8543 15.7368 15 14.6026 15 13.2035V13.2035V6.77525C14.9925 6.22482 14.7314 5.70794 14.2911 5.37171L9.44253 1.50496C8.59311 0.83168 7.38562 0.83168 6.5362 1.50496L1.70886 5.37873C1.26693 5.7136 1.00544 6.23133 1 6.78227V13.2035C1 14.6026 2.1457 15.7368 3.55899 15.7368H4.97671C5.48173 15.7368 5.89114 15.3315 5.89114 14.8316V14.8316"
                                                                stroke="currentColor" stroke-width="1.5"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>
                                                    </span>
                                                    New Arrivals</a>
                                            </li>
                                            <li class="has-dropdown">
                                                <a href="/shop" class="has-mega-menu">
                                                    <span>
                                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M2.6856 4.54975C2.6856 3.52014 3.51984 2.6859 4.54945 2.68508H5.3977C5.88984 2.68508 6.36136 2.48971 6.71089 2.14348L7.30359 1.54995C8.02984 0.819578 9.21031 0.816281 9.94068 1.54253L9.9415 1.54336L9.94892 1.54995L10.5425 2.14348C10.892 2.49053 11.3635 2.68508 11.8556 2.68508H12.7031C13.7327 2.68508 14.5677 3.51932 14.5677 4.54975V5.39636C14.5677 5.88849 14.7623 6.36084 15.1093 6.71037L15.7029 7.3039C16.4332 8.03015 16.4374 9.21061 15.7111 9.94098L15.7103 9.94181L15.7029 9.94923L15.1093 10.5428C14.7623 10.8915 14.5677 11.363 14.5677 11.8551V12.7034C14.5677 13.733 13.7335 14.5672 12.7039 14.5672H12.7031H11.854C11.3619 14.5672 10.8895 14.7626 10.5408 15.1096L9.94727 15.7024C9.22185 16.4327 8.04221 16.4368 7.31183 15.7122C7.31101 15.7114 7.31019 15.7106 7.30936 15.7098L7.30194 15.7024L6.70924 15.1096C6.36054 14.7626 5.88819 14.568 5.39605 14.5672H4.54945C3.51984 14.5672 2.6856 13.733 2.6856 12.7034V11.8535C2.6856 11.3613 2.49023 10.8898 2.14318 10.5411L1.55047 9.94758C0.820097 9.22215 0.815976 8.04251 1.5414 7.31214C1.5414 7.31132 1.54223 7.31049 1.54305 7.30967L1.55047 7.30225L2.14318 6.70872C2.49023 6.35919 2.6856 5.88767 2.6856 5.39471V4.54975"
                                                                stroke="currentColor" stroke-width="1.5"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                            <path d="M6.50787 10.7453L10.745 6.50812"
                                                                stroke="currentColor" stroke-width="1.5"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                            <path d="M10.6823 10.6862H10.6897" stroke="currentColor"
                                                                stroke-width="2" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                            <path d="M6.56053 6.56446H6.56795" stroke="currentColor"
                                                                stroke-width="2" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                        </svg>
                                                    </span>
                                                    Electronics</a>

                                                <ul class="mega-menu tp-submenu">
                                                    <li>
                                                        <a href="/shop" class="mega-menu-title">Featured</a>
                                                        <ul>
                                                            <li>
                                                                <a href="/shop"><img
                                                                        src="{{ asset('assets/front/img/header/menu/menu-1.jpg')}}"
                                                                        alt=""></a>
                                                            </li>
                                                            <li>
                                                                <a href="/shop">New Arrivals</a>
                                                            </li>
                                                            <li>
                                                                <a href="/shop">Best Seller</a>
                                                            </li>
                                                            <li>
                                                                <a href="/shop">Top Rated</a>
                                                            </li>
                                                        </ul>
                                                    </li>

                                                    <li>
                                                        <a href="/shop" class="mega-menu-title">Computer & Laptops</a>
                                                        <ul>
                                                            <li>
                                                                <a href="/shop"><img
                                                                        src="{{ asset('assets/front/img/header/menu/menu-2.jpg')}}"
                                                                        alt=""></a>
                                                            </li>
                                                            <li>
                                                                <a href="/shop">Top Brands</a>
                                                            </li>
                                                            <li>
                                                                <a href="/shop">Weekly Best Selling</a>
                                                            </li>
                                                            <li>
                                                                <a href="/shop">Most Viewed</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <a href="/shop" class="mega-menu-title">Accessories</a>
                                                        <ul>
                                                            <li>
                                                                <a href="/shop"><img
                                                                        src="{{ asset('assets/front/img/header/menu/menu-3.jpg')}}"
                                                                        alt=""></a>
                                                            </li>
                                                            <li>
                                                                <a href="/shop">Headphones</a>
                                                            </li>
                                                            <li>
                                                                <a href="/shop">TWS Earphone</a>
                                                            </li>
                                                            <li>
                                                                <a href="/shop">Gaming Headset</a>
                                                            </li>
                                                        </ul>
                                                    </li>

                                                </ul>
                                            </li>
                                            <li>
                                                <a href="/shop">
                                                    <span>
                                                        <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M14.5 8.5V16H2.50003V8.5" stroke="currentColor"
                                                                stroke-width="1.4" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                            <path d="M16 4.75H1V8.5H16V4.75Z" stroke="currentColor"
                                                                stroke-width="1.4" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                            <path d="M8.5 16V4.75" stroke="currentColor"
                                                                stroke-width="1.4" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                            <path
                                                                d="M8.49997 4.75H5.12497C4.62769 4.75 4.15077 4.55246 3.79914 4.20083C3.44751 3.84919 3.24997 3.37228 3.24997 2.875C3.24997 2.37772 3.44751 1.90081 3.79914 1.54917C4.15077 1.19754 4.62769 1 5.12497 1C7.74997 1 8.49997 4.75 8.49997 4.75Z"
                                                                stroke="currentColor" stroke-width="1.4"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                            <path
                                                                d="M8.5 4.75H11.875C12.3723 4.75 12.8492 4.55246 13.2008 4.20083C13.5525 3.84919 13.75 3.37228 13.75 2.875C13.75 2.37772 13.5525 1.90081 13.2008 1.54917C12.8492 1.19754 12.3723 1 11.875 1C9.25 1 8.5 4.75 8.5 4.75Z"
                                                                stroke="currentColor" stroke-width="1.4"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>
                                                    </span>
                                                    Gifts</a>
                                            </li>
                                            <li class="has-dropdown">
                                                <a href="/shop">
                                                    <span>
                                                        <svg width="17" height="16" viewBox="0 0 17 16" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M14.5 1H2.5C1.67157 1 1 1.67157 1 2.5V10C1 10.8284 1.67157 11.5 2.5 11.5H14.5C15.3284 11.5 16 10.8284 16 10V2.5C16 1.67157 15.3284 1 14.5 1Z"
                                                                stroke="currentColor" stroke-width="1.5"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                            <path d="M5.5 14.5H11.5" stroke="currentColor"
                                                                stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                            <path d="M8.5 11.5V14.5" stroke="currentColor"
                                                                stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                        </svg>
                                                    </span>
                                                    Computers</a>

                                                <ul class="tp-submenu">
                                                    <li class="has-dropdown">
                                                        <a href="/shop">Desktop</a>
                                                        <ul class="tp-submenu">
                                                            <li><a href="/shop">Gaming</a></li>
                                                            <li><a href="/shop">WorkSpace</a></li>
                                                            <li><a href="/shop">Customize</a></li>
                                                            <li><a href="/shop">Luxury</a></li>
                                                        </ul>
                                                    </li>
                                                    <li><a href="/shop">Laptop</a></li>
                                                    <li><a href="/shop">Console</a></li>
                                                    <li><a href="/shop">Top Rated</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="/shop">
                                                    <span>
                                                        <svg width="15" height="18" viewBox="0 0 15 18" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M12.375 1H2.625C1.72754 1 1 1.72754 1 2.625V15.625C1 16.5225 1.72754 17.25 2.625 17.25H12.375C13.2725 17.25 14 16.5225 14 15.625V2.625C14 1.72754 13.2725 1 12.375 1Z"
                                                                stroke="currentColor" stroke-width="1.5"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                            <path d="M7.5 14H7.50875" stroke="currentColor"
                                                                stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                        </svg>
                                                    </span>
                                                    Smartphones & Tablets</a>
                                            </li>
                                            <li>
                                                <a href="/shop">
                                                    <span>
                                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M9 1C13.4176 1 17 4.5816 17 9C17 13.4184 13.4176 17 9 17C4.5816 17 1 13.4184 1 9C1 4.5816 4.5816 1 9 1Z"
                                                                stroke="currentColor" stroke-width="1.5"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M11.5263 8.99592C11.5263 8.31286 8.02529 6.12769 7.62814 6.5206C7.23099 6.9135 7.19281 11.0413 7.62814 11.4712C8.06348 11.9027 11.5263 9.67898 11.5263 8.99592Z"
                                                                stroke="currentColor" stroke-width="1.5"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>
                                                    </span>
                                                    TV, Video & Musice</a>
                                            </li>
                                            <li>
                                                <a href="/shop">
                                                    <span>
                                                        <svg width="18" height="16" viewBox="0 0 18 16" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M11.6292 1.26076C12.5027 1.60843 12.7699 2.81924 13.1271 3.20843C13.4843 3.59762 13.9955 3.72995 14.2783 3.72995C15.7814 3.72995 17 4.94854 17 6.45081V11.4627C17 13.4778 15.3654 15.1124 13.3503 15.1124H4.64973C2.63373 15.1124 1 13.4778 1 11.4627V6.45081C1 4.94854 2.21859 3.72995 3.72173 3.72995C4.00368 3.72995 4.51481 3.59762 4.87287 3.20843C5.23005 2.81924 5.49643 1.60843 6.36995 1.26076C7.24432 0.913081 10.7557 0.913081 11.6292 1.26076Z"
                                                                stroke="currentColor" stroke-width="1.5"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                            <path d="M13.7527 5.97314H13.7605" stroke="currentColor"
                                                                stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M11.7491 9.11086C11.7491 7.59215 10.5184 6.36145 8.99974 6.36145C7.48104 6.36145 6.25034 7.59215 6.25034 9.11086C6.25034 10.6296 7.48104 11.8603 8.99974 11.8603C10.5184 11.8603 11.7491 10.6296 11.7491 9.11086Z"
                                                                stroke="currentColor" stroke-width="1.5"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>
                                                    </span>
                                                    Cameras</a>
                                            </li>
                                            <li>
                                                <a href="/shop">
                                                    <span>
                                                        <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M2.30431 1C1.58423 1 1 1.59405 1 2.32534V3.10537C1 3.64706 1.20599 4.16798 1.57446 4.55981L5.61258 8.8536L5.61436 8.8509C6.39393 9.64899 6.83254 10.7279 6.83254 11.8528V15.6626C6.83254 15.9172 7.09891 16.0798 7.32 15.9597L9.61963 14.7066C9.96679 14.517 10.1834 14.1486 10.1834 13.7487V11.8428C10.1834 10.7242 10.6158 9.64989 11.3883 8.8536L15.4264 4.55981C15.794 4.16798 16 3.64706 16 3.10537V2.32534C16 1.59405 15.4167 1 14.6966 1H2.30431Z"
                                                                stroke="currentColor" stroke-width="1.5"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>
                                                    </span>
                                                    Cooking</a>
                                            </li>
                                            <li>
                                                <a href="/shop">
                                                    <span>
                                                        <svg width="18" height="16" viewBox="0 0 18 16" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M15.7462 7.16473V13.167C15.7462 13.6457 15.556 14.1049 15.2175 14.4434C14.8789 14.782 14.4197 14.9722 13.941 14.9722H4.3058C3.82703 14.9722 3.3679 14.782 3.02936 14.4434C2.69083 14.1049 2.50061 13.6457 2.50061 13.167V9.36255"
                                                                stroke="currentColor" stroke-width="1.5"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                            <path
                                                                d="M3.46186 1.00001C3.18176 0.999863 2.90854 1.08659 2.6798 1.24825C2.45106 1.4099 2.27807 1.63852 2.18471 1.9026L1.11062 5.01655C0.713475 6.15382 1.41752 7.16021 2.71274 7.16021C3.18296 7.14863 3.64325 7.02257 4.05374 6.79294C4.46424 6.56331 4.81255 6.23705 5.0685 5.84243C5.20151 6.24071 5.46067 6.58479 5.80676 6.82258C6.15285 7.06036 6.56702 7.17889 6.98651 7.16021C7.18566 6.7642 7.4909 6.43132 7.86823 6.19871C8.24556 5.96611 8.68013 5.84294 9.1234 5.84294C9.56666 5.84294 10.0012 5.96611 10.3785 6.19871C10.7558 6.43132 11.0611 6.7642 11.2603 7.16021V7.16021C11.679 7.17789 12.0922 7.0589 12.4373 6.82119C12.7825 6.58348 13.041 6.23994 13.1738 5.84243C13.431 6.23686 13.7802 6.56288 14.1914 6.79243C14.6026 7.02199 15.0633 7.1482 15.5341 7.16021C16.8293 7.16021 17.5288 6.15382 17.1362 5.01655L16.0621 1.9026C15.9685 1.6378 15.7948 1.40866 15.5652 1.24694C15.3355 1.08522 15.0613 0.998927 14.7804 1.00001H3.46186Z"
                                                                stroke="currentColor" stroke-width="1.5"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                            <path
                                                                d="M11.0707 14.9722H7.19861V11.4701C7.19861 10.983 7.3921 10.5158 7.73656 10.1713C8.08102 9.82685 8.54822 9.63333 9.03536 9.63333H9.22041C9.70755 9.63333 10.1747 9.82685 10.5192 10.1713C10.8637 10.5158 11.0572 10.983 11.0572 11.4701L11.0707 14.9722Z"
                                                                stroke="currentColor" stroke-width="1.5"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>
                                                    </span>
                                                    Accessories</a>
                                            </li>
                                            <li>
                                                <a href="/shop">
                                                    <span>
                                                        <svg width="18" height="17" viewBox="0 0 18 17" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M6.92384 11.3525C10.1178 11.3525 12.8477 11.8365 12.8477 13.7698C12.8477 15.7032 10.136 16.201 6.92384 16.201C3.72902 16.201 1 15.7213 1 13.7871C1 11.8529 3.71084 11.3525 6.92384 11.3525Z"
                                                                stroke="currentColor" stroke-width="1.5"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M6.92383 8.59311C4.82685 8.59311 3.1264 6.89354 3.1264 4.79656C3.1264 2.69958 4.82685 1 6.92383 1C9.01994 1 10.7204 2.69958 10.7204 4.79656C10.7282 6.88575 9.03986 8.58532 6.95067 8.59311H6.92383Z"
                                                                stroke="currentColor" stroke-width="1.5"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                            <path
                                                                d="M12.8906 7.60761C14.2768 7.41281 15.3443 6.22319 15.3469 4.78336C15.3469 3.3643 14.3123 2.18681 12.9556 1.96429"
                                                                stroke="currentColor" stroke-width="1.5"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                            <path
                                                                d="M14.7195 10.9416C16.0623 11.1416 17 11.6126 17 12.5823C17 13.2498 16.5584 13.6827 15.845 13.9537"
                                                                stroke="currentColor" stroke-width="1.5"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>
                                                    </span>
                                                    Sports</a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                           
                            </div>

                            <div class="col-xl-5 col-lg-7 col-md-7 col-sm-8 col-6">
                                <div class="tp-header-bottom-right d-flex align-items-center justify-content-end pl-30">

                                    <div class="tp-header-action d-flex align-items-center ml-30">
                                        <div class="tp-header-action-item">
                                            <a class="tp-header-action-btn" href="{{ route('front.cart') }}">
                                                <svg width="21" height="22" viewBox="0 0 21 22" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M6.48626 20.5H14.8341C17.9004 20.5 20.2528 19.3924 19.5847 14.9348L18.8066 8.89359C18.3947 6.66934 16.976 5.81808 15.7311 5.81808H5.55262C4.28946 5.81808 2.95308 6.73341 2.4771 8.89359L1.69907 14.9348C1.13157 18.889 3.4199 20.5 6.48626 20.5Z"
                                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path
                                                        d="M6.34902 5.5984C6.34902 3.21232 8.28331 1.27803 10.6694 1.27803V1.27803C11.8184 1.27316 12.922 1.72619 13.7362 2.53695C14.5504 3.3477 15.0081 4.44939 15.0081 5.5984V5.5984"
                                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M7.70365 10.1018H7.74942" stroke="currentColor"
                                                        stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M13.5343 10.1018H13.5801" stroke="currentColor"
                                                        stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>

                                            </a>
                                        </div>
                                        <div class="tp-header-action-item d-none d-lg-block">
                                            <a href="/account/login" class="tp-header-action-btn">
                                                <svg width="21" height="22" viewBox="0 0 21 22" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M4 21C4 17.4735 6.60771 14.5561 10 14.0709M19.8726 15.2038C19.8044 15.2079 19.7357 15.21 19.6667 15.21C18.6422 15.21 17.7077 14.7524 17 14C16.2923 14.7524 15.3578 15.2099 14.3333 15.2099C14.2643 15.2099 14.1956 15.2078 14.1274 15.2037C14.0442 15.5853 14 15.9855 14 16.3979C14 18.6121 15.2748 20.4725 17 21C18.7252 20.4725 20 18.6121 20 16.3979C20 15.9855 19.9558 15.5853 19.8726 15.2038ZM15 7C15 9.20914 13.2091 11 11 11C8.79086 11 7 9.20914 7 7C7 4.79086 8.79086 3 11 3C13.2091 3 15 4.79086 15 7Z"
                                                        stroke="#000000" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                            </a>
                                        </div>
                                        <div class="tp-header-action-item tp-header-hamburger mr-20 d-xl-none">
                                            <button type="button" class="tp-offcanvas-open-btn">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="16"
                                                    viewBox="0 0 30 16">
                                                    <rect x="10" width="20" height="2" fill="currentColor" />
                                                    <rect x="5" y="7" width="25" height="2" fill="currentColor" />
                                                    <rect x="10" y="14" width="20" height="2" fill="currentColor" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header area end -->

    <main>

        @yield('content')


        <div class="modal fade tp-product-modal tp-product-modal-styleDarkRed" id="producQuickViewModal" tabindex="-1"
            aria-labelledby="producQuickViewModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="tp-product-modal-content d-lg-flex align-items-start">
                        <button type="button" class="tp-product-modal-close-btn" data-bs-toggle="modal"
                            data-bs-target="#producQuickViewModal"><i class="fa-regular fa-xmark"></i></button>
                        <div class="tp-product-details-thumb-wrapper tp-tab d-sm-flex">
                            <nav>
                                <div class="nav nav-tabs flex-sm-column " id="productDetailsNavThumb" role="tablist">
                                    <button class="nav-link active" id="nav-1-tab" data-bs-toggle="tab"
                                        data-bs-target="#nav-1" type="button" role="tab" aria-controls="nav-1"
                                        aria-selected="true">
                                        <img src="{{ asset('assets/front/img/product/details/3/nav/product-details-nav-1.jpg')}}"
                                            alt="">
                                    </button>
                                    <button class="nav-link" id="nav-2-tab" data-bs-toggle="tab" data-bs-target="#nav-2"
                                        type="button" role="tab" aria-controls="nav-2" aria-selected="false">
                                        <img src="{{ asset('assets/front/img/product/details/3/nav/product-details-nav-2.jpg')}}"
                                            alt="">
                                    </button>
                                    <button class="nav-link" id="nav-3-tab" data-bs-toggle="tab" data-bs-target="#nav-3"
                                        type="button" role="tab" aria-controls="nav-3" aria-selected="false">
                                        <img src="{{ asset('assets/front/img/product/details/3/nav/product-details-nav-3.jpg')}}"
                                            alt="">
                                    </button>
                                    <button class="nav-link" id="nav-4-tab" data-bs-toggle="tab" data-bs-target="#nav-4"
                                        type="button" role="tab" aria-controls="nav-4" aria-selected="false">
                                        <img src="{{ asset('assets/front/img/product/details/3/nav/product-details-nav-4.jpg')}}"
                                            alt="">
                                    </button>
                                </div>
                            </nav>
                            <div class="tab-content m-img" id="productDetailsNavContent">
                                <div class="tab-pane fade show active" id="nav-1" role="tabpanel"
                                    aria-labelledby="nav-1-tab" tabindex="0">
                                    <div class="tp-product-details-nav-main-thumb">
                                        <img src="{{ asset('assets/front/img/product/details/3/main/product-details-main-1.jpg')}}"
                                            alt="">
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-2" role="tabpanel" aria-labelledby="nav-2-tab"
                                    tabindex="0">
                                    <div class="tp-product-details-nav-main-thumb">
                                        <img src="{{ asset('assets/front/img/product/details/3/main/product-details-main-2.jpg')}}"
                                            alt="">
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-3" role="tabpanel" aria-labelledby="nav-3-tab"
                                    tabindex="0">
                                    <div class="tp-product-details-nav-main-thumb">
                                        <img src="{{ asset('assets/front/img/product/details/3/main/product-details-main-3.jpg')}}"
                                            alt="">
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-4" role="tabpanel" aria-labelledby="nav-4-tab"
                                    tabindex="0">
                                    <div class="tp-product-details-nav-main-thumb">
                                        <img src="{{ asset('assets/front/img/product/details/3/main/product-details-main-4.jpg')}}"
                                            alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tp-product-details-wrapper">
                            <div class="tp-product-details-category">
                                <span>Shirt, Women</span>
                            </div>
                            <h3 class="tp-product-details-title">Brown Gown for Women</h3>

                            <!-- inventory details -->
                            <div class="tp-product-details-inventory d-flex align-items-center mb-10">
                                <div class="tp-product-details-stock mb-10">
                                    <span>In Stock</span>
                                </div>
                                <div class="tp-product-details-rating-wrapper d-flex align-items-center mb-10">
                                    <div class="tp-product-details-rating">
                                        <span><i class="fa-solid fa-star"></i></span>
                                        <span><i class="fa-solid fa-star"></i></span>
                                        <span><i class="fa-solid fa-star"></i></span>
                                        <span><i class="fa-solid fa-star"></i></span>
                                        <span><i class="fa-solid fa-star"></i></span>
                                    </div>
                                    <div class="tp-product-details-reviews">
                                        <span>(36 Reviews)</span>
                                    </div>
                                </div>
                            </div>
                            <p>A Screen Everyone Will Love: Whether your family is streaming or video chatting with
                                friends tablet A8... <span>See more</span></p>

                            <!-- price -->
                            <div class="tp-product-details-price-wrapper mb-20">
                                <span class="tp-product-details-price old-price">$320.00</span>
                                <span class="tp-product-details-price new-price">$236.00</span>
                            </div>

                            <!-- variations -->
                            <div class="tp-product-details-variation">
                                <!-- single item -->
                                <div class="tp-product-details-variation-item">
                                    <h4 class="tp-product-details-variation-title">Color :</h4>
                                    <div class="tp-product-details-variation-list">
                                        <button type="button" class="color tp-color-variation-btn">
                                            <span data-bg-color="#F8B655"></span>
                                            <span class="tp-color-variation-tootltip">Yellow</span>
                                        </button>
                                        <button type="button" class="color tp-color-variation-btn active">
                                            <span data-bg-color="#CBCBCB"></span>
                                            <span class="tp-color-variation-tootltip">Gray</span>
                                        </button>
                                        <button type="button" class="color tp-color-variation-btn">
                                            <span data-bg-color="#494E52"></span>
                                            <span class="tp-color-variation-tootltip">Black</span>
                                        </button>
                                        <button type="button" class="color tp-color-variation-btn">
                                            <span data-bg-color="#B4505A"></span>
                                            <span class="tp-color-variation-tootltip">Brown</span>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- actions -->
                            <div class="tp-product-details-action-wrapper">
                                <h3 class="tp-product-details-action-title">Quantity</h3>
                                <div class="tp-product-details-action-item-wrapper d-sm-flex align-items-center">
                                    <div class="tp-product-details-quantity">
                                        <div class="tp-product-quantity mb-15 mr-15">
                                            <span class="tp-cart-minus">
                                                <svg width="11" height="2" viewBox="0 0 11 2" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 1H10" stroke="currentColor" stroke-width="1.5"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </span>
                                            <input class="tp-cart-input" type="text" value="1">
                                            <span class="tp-cart-plus">
                                                <svg width="11" height="12" viewBox="0 0 11 12" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 6H10" stroke="currentColor" stroke-width="1.5"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M5.5 10.5V1.5" stroke="currentColor" stroke-width="1.5"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="tp-product-details-add-to-cart mb-15 w-100">
                                        <button class="tp-product-details-add-to-cart-btn w-100">Add To Cart</button>
                                    </div>
                                </div>
                                <button class="tp-product-details-buy-now-btn w-100">Buy Now</button>
                            </div>
                            <div class="tp-product-details-action-sm">
                                <button type="button" class="tp-product-details-action-sm-btn">
                                    <svg width="14" height="16" viewBox="0 0 14 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M1 3.16431H10.8622C12.0451 3.16431 12.9999 4.08839 12.9999 5.23315V7.52268"
                                            stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M3.25177 0.985168L1 3.16433L3.25177 5.34354" stroke="currentColor"
                                            stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path d="M12.9999 12.5983H3.13775C1.95486 12.5983 1 11.6742 1 10.5295V8.23993"
                                            stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M10.748 14.7774L12.9998 12.5983L10.748 10.4191" stroke="currentColor"
                                            stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                    Compare
                                </button>
                                <button type="button" class="tp-product-details-action-sm-btn">
                                    <svg width="17" height="16" viewBox="0 0 17 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M2.33541 7.54172C3.36263 10.6766 7.42094 13.2113 8.49945 13.8387C9.58162 13.2048 13.6692 10.6421 14.6635 7.5446C15.3163 5.54239 14.7104 3.00621 12.3028 2.24514C11.1364 1.8779 9.77578 2.1014 8.83648 2.81432C8.64012 2.96237 8.36757 2.96524 8.16974 2.81863C7.17476 2.08487 5.87499 1.86999 4.69024 2.24514C2.28632 3.00549 1.68259 5.54167 2.33541 7.54172ZM8.50115 15C8.4103 15 8.32018 14.9784 8.23812 14.9346C8.00879 14.8117 2.60674 11.891 1.29011 7.87081C1.28938 7.87081 1.28938 7.8701 1.28938 7.8701C0.462913 5.33895 1.38316 2.15812 4.35418 1.21882C5.7492 0.776121 7.26952 0.97088 8.49895 1.73195C9.69029 0.993159 11.2729 0.789057 12.6401 1.21882C15.614 2.15956 16.5372 5.33966 15.7115 7.8701C14.4373 11.8443 8.99571 14.8088 8.76492 14.9332C8.68286 14.9777 8.592 15 8.50115 15Z"
                                            fill="currentColor" />
                                        <path
                                            d="M8.49945 13.8387L8.42402 13.9683L8.49971 14.0124L8.57526 13.9681L8.49945 13.8387ZM14.6635 7.5446L14.5209 7.4981L14.5207 7.49875L14.6635 7.5446ZM12.3028 2.24514L12.348 2.10211L12.3478 2.10206L12.3028 2.24514ZM8.83648 2.81432L8.92678 2.93409L8.92717 2.9338L8.83648 2.81432ZM8.16974 2.81863L8.25906 2.69812L8.25877 2.69791L8.16974 2.81863ZM4.69024 2.24514L4.73548 2.38815L4.73552 2.38814L4.69024 2.24514ZM8.23812 14.9346L8.16727 15.0668L8.16744 15.0669L8.23812 14.9346ZM1.29011 7.87081L1.43266 7.82413L1.39882 7.72081H1.29011V7.87081ZM1.28938 7.8701L1.43938 7.87009L1.43938 7.84623L1.43197 7.82354L1.28938 7.8701ZM4.35418 1.21882L4.3994 1.36184L4.39955 1.36179L4.35418 1.21882ZM8.49895 1.73195L8.42 1.85949L8.49902 1.90841L8.57801 1.85943L8.49895 1.73195ZM12.6401 1.21882L12.6853 1.0758L12.685 1.07572L12.6401 1.21882ZM15.7115 7.8701L15.5689 7.82356L15.5686 7.8243L15.7115 7.8701ZM8.76492 14.9332L8.69378 14.8011L8.69334 14.8013L8.76492 14.9332ZM2.19287 7.58843C2.71935 9.19514 4.01596 10.6345 5.30013 11.744C6.58766 12.8564 7.88057 13.6522 8.42402 13.9683L8.57487 13.709C8.03982 13.3978 6.76432 12.6125 5.49626 11.517C4.22484 10.4185 2.97868 9.02313 2.47795 7.49501L2.19287 7.58843ZM8.57526 13.9681C9.12037 13.6488 10.4214 12.8444 11.7125 11.729C12.9999 10.6167 14.2963 9.17932 14.8063 7.59044L14.5207 7.49875C14.0364 9.00733 12.7919 10.4 11.5164 11.502C10.2446 12.6008 8.9607 13.3947 8.42364 13.7093L8.57526 13.9681ZM14.8061 7.59109C15.1419 6.5613 15.1554 5.39131 14.7711 4.37633C14.3853 3.35729 13.5989 2.49754 12.348 2.10211L12.2576 2.38816C13.4143 2.75381 14.1347 3.54267 14.4905 4.48255C14.8479 5.42648 14.8379 6.52568 14.5209 7.4981L14.8061 7.59109ZM12.3478 2.10206C11.137 1.72085 9.72549 1.95125 8.7458 2.69484L8.92717 2.9338C9.82606 2.25155 11.1357 2.03494 12.2577 2.38821L12.3478 2.10206ZM8.74618 2.69455C8.60221 2.8031 8.40275 2.80462 8.25906 2.69812L8.08043 2.93915C8.33238 3.12587 8.67804 3.12163 8.92678 2.93409L8.74618 2.69455ZM8.25877 2.69791C7.225 1.93554 5.87527 1.71256 4.64496 2.10213L4.73552 2.38814C5.87471 2.02742 7.12452 2.2342 8.08071 2.93936L8.25877 2.69791ZM4.64501 2.10212C3.39586 2.49722 2.61099 3.35688 2.22622 4.37554C1.84299 5.39014 1.85704 6.55957 2.19281 7.58826L2.478 7.49518C2.16095 6.52382 2.15046 5.42513 2.50687 4.48154C2.86175 3.542 3.58071 2.7534 4.73548 2.38815L4.64501 2.10212ZM8.50115 14.85C8.43415 14.85 8.36841 14.8341 8.3088 14.8023L8.16744 15.0669C8.27195 15.1227 8.38645 15.15 8.50115 15.15V14.85ZM8.30897 14.8024C8.19831 14.7431 6.7996 13.9873 5.26616 12.7476C3.72872 11.5046 2.07716 9.79208 1.43266 7.82413L1.14756 7.9175C1.81968 9.96978 3.52747 11.7277 5.07755 12.9809C6.63162 14.2373 8.0486 15.0032 8.16727 15.0668L8.30897 14.8024ZM1.29011 7.72081C1.31557 7.72081 1.34468 7.72745 1.37175 7.74514C1.39802 7.76231 1.41394 7.78437 1.42309 7.8023C1.43191 7.81958 1.43557 7.8351 1.43727 7.84507C1.43817 7.8504 1.43869 7.85518 1.43898 7.85922C1.43913 7.86127 1.43923 7.8632 1.43929 7.865C1.43932 7.86591 1.43934 7.86678 1.43936 7.86763C1.43936 7.86805 1.43937 7.86847 1.43937 7.86888C1.43937 7.86909 1.43937 7.86929 1.43938 7.86949C1.43938 7.86959 1.43938 7.86969 1.43938 7.86979C1.43938 7.86984 1.43938 7.86992 1.43938 7.86994C1.43938 7.87002 1.43938 7.87009 1.28938 7.8701C1.13938 7.8701 1.13938 7.87017 1.13938 7.87025C1.13938 7.87027 1.13938 7.87035 1.13938 7.8704C1.13938 7.8705 1.13938 7.8706 1.13938 7.8707C1.13938 7.8709 1.13938 7.87111 1.13938 7.87131C1.13939 7.87173 1.13939 7.87214 1.1394 7.87257C1.13941 7.87342 1.13943 7.8743 1.13946 7.8752C1.13953 7.87701 1.13962 7.87896 1.13978 7.88103C1.14007 7.88512 1.14059 7.88995 1.14151 7.89535C1.14323 7.90545 1.14694 7.92115 1.15585 7.93861C1.16508 7.95672 1.18114 7.97896 1.20762 7.99626C1.2349 8.01409 1.26428 8.02081 1.29011 8.02081V7.72081ZM1.43197 7.82354C0.623164 5.34647 1.53102 2.26869 4.3994 1.36184L4.30896 1.0758C1.23531 2.04755 0.302663 5.33142 1.14679 7.91665L1.43197 7.82354ZM4.39955 1.36179C5.7527 0.932384 7.22762 1.12136 8.42 1.85949L8.57791 1.60441C7.31141 0.820401 5.74571 0.619858 4.30881 1.07585L4.39955 1.36179ZM8.57801 1.85943C9.73213 1.14371 11.2694 0.945205 12.5951 1.36192L12.685 1.07572C11.2763 0.632908 9.64845 0.842602 8.4199 1.60447L8.57801 1.85943ZM12.5948 1.36184C15.4664 2.27018 16.3769 5.34745 15.5689 7.82356L15.8541 7.91663C16.6975 5.33188 15.7617 2.04893 12.6853 1.07581L12.5948 1.36184ZM15.5686 7.8243C14.9453 9.76841 13.2952 11.4801 11.7526 12.7288C10.2142 13.974 8.80513 14.7411 8.69378 14.8011L8.83606 15.0652C8.9555 15.0009 10.3826 14.2236 11.9413 12.9619C13.4957 11.7037 15.2034 9.94602 15.8543 7.91589L15.5686 7.8243ZM8.69334 14.8013C8.6337 14.8337 8.56752 14.85 8.50115 14.85V15.15C8.61648 15.15 8.73201 15.1217 8.83649 15.065L8.69334 14.8013Z"
                                            fill="currentColor" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M12.8384 6.93209C12.5548 6.93209 12.3145 6.71865 12.2911 6.43693C12.2427 5.84618 11.8397 5.34743 11.266 5.1656C10.9766 5.07361 10.8184 4.76962 10.9114 4.48718C11.0059 4.20402 11.3129 4.05023 11.6031 4.13934C12.6017 4.45628 13.3014 5.32371 13.3872 6.34925C13.4113 6.64606 13.1864 6.90622 12.8838 6.92993C12.8684 6.93137 12.8538 6.93209 12.8384 6.93209Z"
                                            fill="currentColor" />
                                        <path
                                            d="M12.8384 6.93209C12.5548 6.93209 12.3145 6.71865 12.2911 6.43693C12.2427 5.84618 11.8397 5.34743 11.266 5.1656C10.9766 5.07361 10.8184 4.76962 10.9114 4.48718C11.0059 4.20402 11.3129 4.05023 11.6031 4.13934C12.6017 4.45628 13.3014 5.32371 13.3872 6.34925C13.4113 6.64606 13.1864 6.90622 12.8838 6.92993C12.8684 6.93137 12.8538 6.93209 12.8384 6.93209"
                                            stroke="currentColor" stroke-width="0.3" />
                                    </svg>
                                    Add Wishlist
                                </button>
                                <button type="button" class="tp-product-details-action-sm-btn">
                                    <svg width="17" height="16" viewBox="0 0 17 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M8.575 12.6927C8.775 12.6927 8.94375 12.6249 9.08125 12.4895C9.21875 12.354 9.2875 12.1878 9.2875 11.9907C9.2875 11.7937 9.21875 11.6275 9.08125 11.492C8.94375 11.3565 8.775 11.2888 8.575 11.2888C8.375 11.2888 8.20625 11.3565 8.06875 11.492C7.93125 11.6275 7.8625 11.7937 7.8625 11.9907C7.8625 12.1878 7.93125 12.354 8.06875 12.4895C8.20625 12.6249 8.375 12.6927 8.575 12.6927ZM8.55625 5.0638C8.98125 5.0638 9.325 5.17771 9.5875 5.40553C9.85 5.63335 9.98125 5.92582 9.98125 6.28294C9.98125 6.52924 9.90625 6.77245 9.75625 7.01258C9.60625 7.25272 9.3625 7.5144 9.025 7.79763C8.7 8.08087 8.44063 8.3795 8.24688 8.69352C8.05313 9.00754 7.95625 9.29385 7.95625 9.55246C7.95625 9.68792 8.00938 9.79567 8.11563 9.87572C8.22188 9.95576 8.34375 9.99578 8.48125 9.99578C8.63125 9.99578 8.75625 9.94653 8.85625 9.84801C8.95625 9.74949 9.01875 9.62635 9.04375 9.47857C9.08125 9.23228 9.16562 9.0137 9.29688 8.82282C9.42813 8.63195 9.63125 8.42568 9.90625 8.20402C10.2812 7.89615 10.5531 7.58829 10.7219 7.28042C10.8906 6.97256 10.975 6.62775 10.975 6.246C10.975 5.59333 10.7594 5.06996 10.3281 4.67589C9.89688 4.28183 9.325 4.0848 8.6125 4.0848C8.1375 4.0848 7.7 4.17716 7.3 4.36187C6.9 4.54659 6.56875 4.81751 6.30625 5.17463C6.20625 5.31009 6.16563 5.44863 6.18438 5.59025C6.20313 5.73187 6.2625 5.83962 6.3625 5.91351C6.5 6.01202 6.64688 6.04281 6.80313 6.00587C6.95937 5.96892 7.0875 5.88272 7.1875 5.74726C7.35 5.5256 7.54688 5.35627 7.77813 5.23929C8.00938 5.1223 8.26875 5.0638 8.55625 5.0638ZM8.5 15.7775C7.45 15.7775 6.46875 15.5897 5.55625 15.2141C4.64375 14.8385 3.85 14.3182 3.175 13.6532C2.5 12.9882 1.96875 12.2062 1.58125 11.3073C1.19375 10.4083 1 9.43547 1 8.38873C1 7.35431 1.19375 6.38762 1.58125 5.48866C1.96875 4.58969 2.5 3.80772 3.175 3.14273C3.85 2.47775 4.64375 1.95438 5.55625 1.57263C6.46875 1.19088 7.45 1 8.5 1C9.5375 1 10.5125 1.19088 11.425 1.57263C12.3375 1.95438 13.1313 2.47775 13.8063 3.14273C14.4813 3.80772 15.0156 4.58969 15.4094 5.48866C15.8031 6.38762 16 7.35431 16 8.38873C16 9.43547 15.8031 10.4083 15.4094 11.3073C15.0156 12.2062 14.4813 12.9882 13.8063 13.6532C13.1313 14.3182 12.3375 14.8385 11.425 15.2141C10.5125 15.5897 9.5375 15.7775 8.5 15.7775ZM8.5 14.6692C10.2625 14.6692 11.7656 14.0534 13.0094 12.822C14.2531 11.5905 14.875 10.1128 14.875 8.38873C14.875 6.6647 14.2531 5.18695 13.0094 3.95549C11.7656 2.72404 10.2625 2.10831 8.5 2.10831C6.7125 2.10831 5.20312 2.72404 3.97188 3.95549C2.74063 5.18695 2.125 6.6647 2.125 8.38873C2.125 10.1128 2.74063 11.5905 3.97188 12.822C5.20312 14.0534 6.7125 14.6692 8.5 14.6692Z"
                                            fill="currentColor" stroke="currentColor" stroke-width="0.3" />
                                    </svg>
                                    Ask a question
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>


    <!-- footer area start -->
    <footer>
        <div class="tp-footer-area tp-footer-style-2" data-bg-color="footer-bg-white">
            <div class="tp-footer-top pt-95 pb-40">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-lg-3 col-md-4 col-sm-6">
                            <div class="tp-footer-widget footer-col-1 mb-50">
                                <div class="tp-footer-widget-content">
                                    <div class="tp-footer-logo">
                                        <a href="index.html">
                                            <img src="{{ asset('assets/front/img/logo/logo.png')}}" alt="logo">
                                        </a>
                                    </div>
                                    <p class="tp-footer-desc">We are connecting the businesses</p>
                                    <div class="tp-footer-social d-none">
                                        <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                                        <a href="#"><i class="fa-brands fa-twitter"></i></a>
                                        <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                                        <a href="#"><i class="fa-brands fa-vimeo-v"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                            <div class="tp-footer-widget footer-col-2 mb-50">
                                <h4 class="tp-footer-widget-title">Login As</h4>
                                <div class="tp-footer-widget-content">
                                    <ul>
                                        <li><a href="/admin/login">Super Admin</a></li>
                                        <li><a href="manufacturer/login">Manufacturer</a></li>
                                        <li><a href="seller/login">Raw Material Seller</a></li>
                                        <li><a href="account/login">Customer</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                            <div class="tp-footer-widget footer-col-3 mb-50">
                                <h4 class="tp-footer-widget-title">Infomation</h4>
                                <div class="tp-footer-widget-content">
                                    <ul>
                                        <li><a href="#">Our Story</a></li>
                                        <li><a href="#">Careers</a></li>
                                        <li><a href="#">Privacy Policy</a></li>
                                        <li><a href="#">Terms & Conditions</a></li>
                                        <li><a href="#">Latest News</a></li>
                                        <li><a href="#">Contact Us</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div> -->
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                            <div class="tp-footer-widget footer-col-4 mb-50">
                                <h4 class="tp-footer-widget-title">Talk To Us</h4>
                                <div class="tp-footer-widget-content">
                                    <div class="tp-footer-talk mb-20">
                                        <span>Got Questions? Call us</span>
                                        <h4><a href="tel:+918263869832">+918263869832</a></h4>
                                    </div>
                                    <div class="tp-footer-contact">
                                        <div class="tp-footer-contact-item d-flex align-items-start">
                                            <div class="tp-footer-contact-icon">
                                                <span>
                                                    <svg width="18" height="16" viewBox="0 0 18 16" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M1 5C1 2.2 2.6 1 5 1H13C15.4 1 17 2.2 17 5V10.6C17 13.4 15.4 14.6 13 14.6H5"
                                                            stroke="currentColor" stroke-width="1.5"
                                                            stroke-miterlimit="10" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                        <path
                                                            d="M13 5.40039L10.496 7.40039C9.672 8.05639 8.32 8.05639 7.496 7.40039L5 5.40039"
                                                            stroke="currentColor" stroke-width="1.5"
                                                            stroke-miterlimit="10" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                        <path d="M1 11.4004H5.8" stroke="currentColor"
                                                            stroke-width="1.5" stroke-miterlimit="10"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                        <path d="M1 8.19922H3.4" stroke="currentColor"
                                                            stroke-width="1.5" stroke-miterlimit="10"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                </span>
                                            </div>
                                            <div class="tp-footer-contact-content">
                                                <p><a href="mailto:support@gmail.com"><span class="__cf_email__"
                                                            data-cfemail="9fecf7f0f9e6dfeceaefeff0edebb1fcf0f2">[support@gmail.com]</span></a>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="tp-footer-contact-item d-flex align-items-start">
                                            <div class="tp-footer-contact-icon">
                                                <span>
                                                    <svg width="17" height="20" viewBox="0 0 17 20" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M8.50001 10.9417C9.99877 10.9417 11.2138 9.72668 11.2138 8.22791C11.2138 6.72915 9.99877 5.51416 8.50001 5.51416C7.00124 5.51416 5.78625 6.72915 5.78625 8.22791C5.78625 9.72668 7.00124 10.9417 8.50001 10.9417Z"
                                                            stroke="currentColor" stroke-width="1.5" />
                                                        <path
                                                            d="M1.21115 6.64496C2.92464 -0.887449 14.0841 -0.878751 15.7889 6.65366C16.7891 11.0722 14.0406 14.8123 11.6313 17.126C9.88298 18.8134 7.11704 18.8134 5.36006 17.126C2.95943 14.8123 0.210885 11.0635 1.21115 6.64496Z"
                                                            stroke="currentColor" stroke-width="1.5" />
                                                    </svg>
                                                </span>
                                            </div>
                                            <div class="tp-footer-contact-content">
                                                <p><a href="https://www.google.com/maps/place/Sleepy+Hollow+Rd,+Gouverneur,+NY+13642,+USA/@44.3304966,-75.4552367,17z/data=!3m1!4b1!4m6!3m5!1s0x4cccddac8972c5eb:0x56286024afff537a!8m2!3d44.3304928!4d-75.453048!16s%2Fg%2F1tdsjdj4"
                                                        target="_blank">JNEC. <br> Cidco, Ch. Sambhajinagar</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tp-footer-bottom">
                <div class="container">
                    <div class="tp-footer-bottom-wrapper">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <div class="tp-footer-copyright">
                                    <p>© 2024 All Rights Reserved | By <a href="#">Flora Reuse</a>.
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="tp-footer-payment text-md-end">
                                    <p>
                                        <!-- <img src="{{ asset('assets/front/img/footer/footer-pay-2.png')}}" alt=""> -->
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer area end -->


    {{-- whishlist model --}}
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

    <!-- JS here -->
    </script>
    <script src="{{ asset('assets/front/js/vendor/jquery.js')}}"></script>
    <script src="{{ asset('assets/front/js/vendor/waypoints.js')}}"></script>
    <script src="{{ asset('assets/front/js/bootstrap-bundle.js')}}"></script>
    <script src="{{ asset('assets/front/js/meanmenu.js')}}"></script>
    <script src="{{ asset('assets/front/js/swiper-bundle.js')}}"></script>
    <script src="{{ asset('assets/front/js/slick.js')}}"></script>
    <script src="{{ asset('assets/front/js/range-slider.js')}}"></script>
    <script src="{{ asset('assets/front/js/magnific-popup.js')}}"></script>
    <script src="{{ asset('assets/front/js/nice-select.js')}}"></script>
    <script src="{{ asset('assets/front/js/purecounter.js')}}"></script>
    <script src="{{ asset('assets/front/js/countdown.js')}}"></script>
    <script src="{{ asset('assets/front/js/wow.js')}}"></script>
    <script src="{{ asset('assets/front/js/isotope-pkgd.js')}}"></script>
    <script src="{{ asset('assets/front/js/imagesloaded-pkgd.js')}}"></script>
    <script src="{{ asset('assets/front/js/ajax-form.js')}}"></script>
    <script src="{{ asset('assets/front/js/main.js')}}"></script>
    <script src="{{ asset('assets/front/js/custom.js')}}"></script>
    <script src="{{ asset('assets/front/js/ion.rangeSlider.min.js')}}"></script>


    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function addToCart(id) {
            $.ajax({
                url: '{{ route("front.addToCart") }}',
                type: 'post',
                data: {
                    id: id
                },
                dataType: 'json',
                success: function (response) {
                    if (response.status == true) {
                        alert("Item successfully added to cart");
                       // window.location.href = "{{ route('front.cart') }}"
                    } else {
                        alert(response.message);
                    }
                }

            });
        }

        function addToWhishlist(id) {
            $.ajax({
                url: '{{ route("front.addToWhishlist") }}',
                type: 'post',
                data: {
                    id: id
                },
                dataType: 'json',
                success: function (response) {
                    if (response.status == true) {
                        $("#whishlistModel .modal-body").html(response.message);
                        $("#whishlistModel").modal('show');
                    } else {
                        window.location.href = "{{ route('account.login') }}"
                    }
                }

            });
        }

    </script>
</body>


@yield('customJs')
</html>