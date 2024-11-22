

@extends('front.layouts.app')

@section('content')


<section class="section-5 pt-3 pb-3 mb-3 bg-white">
    <div class="container">
        <div class="light-font">
            <ol class="breadcrumb primary-color mb-0">
                <li class="breadcrumb-item"><a class="white-text" href="{{ route('front.home') }}">Home</a></li>
                <li class="breadcrumb-item">About Us</li>
            </ol>
        </div>
    </div>
</section>

<section class="section-10 ">

    <div class="row">
        <video autoplay loop muted plays-inline class="shop-video">
            <source src="front-assets/video/fast.mp4" type="video/mp4">
        </video>
    </div>
   

    <div class="container-fluid about-bg">
        <div class="row p-5">
            <div class="col-md-6 col-sm-12 col-lg-6">
                <img class="img-fluid" src="front-assets/images/4.jpg" alt="">
            </div>
            <div class="col-md-6 col-sm-12 col-lg-6 text-left">
                <h2 class="text-primary pb-4 shop-caption">Fast Tech Technology Group</h2>
                <p class="text-light ">We are a diverse group of individuals who come together every day to turn ideas into reality, solve challenges, and drive innovation. With a shared commitment to excellence, we've built a workplace that thrives on collaboration, creativity, and continuous learning.</p>

                <div class="btn-group mt-5">
                    <button type="button" class="btn btn-outline-light">ABOUT US</button>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection