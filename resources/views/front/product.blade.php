@extends('front.layouts.frontlayout')

@section('content')

         <!-- breadcrumb area start -->
         <section class="breadcrumb__area include-bg pt-95 pb-50">
            <div class="container">
               <div class="row">
                  <div class="col-xxl-12">
                     <div class="breadcrumb__content p-relative z-index-1">
                        <h3 class="breadcrumb__title">Shopping Cart</h3>
                        <div class="breadcrumb__list">
                           <span><a href="{{ route('front.home') }}">Home</a></span>
                           <span><a href="{{ route('front.shop') }}">Shop</a></span>
                           <span>{{$product->title}}</span>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <!-- breadcrumb area end -->

<section class="section-7 pt-3 mb-3">
    <div class="container">
        <div class="row ">
            <div class="col-md-5">
                <div id="product-carousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner bg-light">

                        @if($product->product_images)

                        @foreach ($product->product_images  as $key => $productImage)
                            <div class="carousel-item {{ ($key == 0) ? 'active' : '' }}">
                                <img class="w-100 h-100" src="{{asset('uploads/products/large/'.$productImage->image)}}" alt="Image">
                            </div>
                        @endforeach

                        @endif
                    </div>
                    <a class="carousel-control-prev" href="#product-carousel" data-bs-slide="prev">
                        <i class="fa fa-2x fa-angle-left text-dark"></i>
                    </a>
                    <a class="carousel-control-next" href="#product-carousel" data-bs-slide="next">
                        <i class="fa fa-2x fa-angle-right text-dark"></i>
                    </a>
                </div>
            </div>
            <div class="col-md-7">
                <div class="bg-light right p-3">
                    <h1>{{$product->title}}</h1>
                    <?php
                        $d = json_decode($product->metadata);                                                                                                                                       
                    ?>
                    <?php
                     if(!empty($d->self_life)) { ?>
                     <b>(Shelf Life: {{$d->self_life}} days)</b>
                     <?php  
                    }
                    ?>

                    <div class="d-flex mb-3">
                        <div class="text-primary mr-2">
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star-half-alt"></small>
                            <small class="far fa-star"></small>
                        </div>
                        <small class="pt-1">(99 Reviews)</small>
                    </div>
                    @if($product->compare_price > 0)
                        <h2 class="price text-secondary"><del>₹.{{$product->compare_price}}</del></h2>
                    @endif
                    <h2 class="price ">₹.{{$product->price}}</h2>

                    {!!$product->short_description!!}

                    {{-- <a href="javascript:void(0);" onclick="addToCart({{ $product->id }})" class="btn btn-dark"><i class="fas fa-shopping-cart"></i> &nbsp;ADD TO CART</a> --}}
                    @if ($product->track_qty == 'Yes')
                         @if ($product->qty > 0)
                             <a class="btn btn-dark" href="javascript:void(0)" onclick="addToCart({{ $product->id }})" >
                                 <i class="fa fa-shopping-cart"></i>&nbsp;ADD TO CART
                             </a>
                         @else
                             <a class="btn btn-danger" href="javascript:void(0)" >
                                 Out of stock
                             </a>    
                         @endif
                    @else
                        <a class="btn btn-dark" href="javascript:void(0)" onclick="addToCart({{ $product->id }})" >
                            <i class="fa fa-shopping-cart"></i>&nbsp;ADD TO CART
                        </a>
                    @endif

                </div>
            </div>

            <div class="col-md-12 mt-5">
                <div class="bg-light">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="description-tab" data-bs-toggle="tab" data-bs-target="#description" type="button" role="tab" aria-controls="description" aria-selected="true">Description</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="shipping-tab" data-bs-toggle="tab" data-bs-target="#shipping" type="button" role="tab" aria-controls="shipping" aria-selected="false">Shipping & Returns</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews" type="button" role="tab" aria-controls="reviews" aria-selected="false">Reviews</button>
                        </li>
                    </ul>
                    <div class="tab-content p-3" id="myTabContent">
                        <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                            {!!$product->description!!}
                        </div>
                        <div class="tab-pane fade" id="shipping" role="tabpanel" aria-labelledby="shipping-tab">
                            {!!$product->shipping_returns!!}

                        </div>
                        <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                        
                        </div>
                    </div>
                </div>
            </div> 
        </div>           
    </div>
</section>

@if(!empty($relatedProducts))
<section class="pt-5 section-8">
    <div class="container">
        <div class="section-title">
            <h2>Related Products</h2>
        </div> 
        <div class="col-md-12">
            <div id="related-products" class="carousel">
                    @foreach ($relatedProducts as $relProduct)  
                    @php
                        $productImage = $relProduct->product_images->first();
                        // dd($productImage);
                    @endphp  
                        <div class="card product-card">
                            <div class="product-image position-relative">
                                <a href="" class="product-img">
                                    {{-- <img class="card-img-top" src="images/product-1.jpg" alt=""></a> --}}
                                    @if (!empty($productImage->image))
                                         <img src="{{ asset('/uploads/products/small/'.$productImage->image) }}"alt="error" class="card-img-top">
                                    @else
                                        <img src="{{ asset('/admin-assets/img/default-150x150.png') }}" alt="error" class="card-img-top">
                                    @endif
                                <a class="whishlist" href="222"><i class="far fa-heart"></i></a>                            

                                <div class="product-action">
                                    @if ($relProduct->track_qty == 'Yes')
                                        @if ($relProduct->qty > 0)
                                            <a class="btn btn-dark" href="javascript:void(0)" onclick="addToCart({{ $relProduct->id }})" >
                                                <i class="fa fa-shopping-cart"></i> Add To Cart
                                            </a>
                                        @else
                                            <a class="btn btn-danger" href="javascript:void(0)" >
                                                Out of stock
                                            </a>    
                                        @endif
                                    @else
                                        <a class="btn btn-dark" href="javascript:void(0)" onclick="addToCart({{ $relProduct->id }})" >
                                            <i class="fa fa-shopping-cart"></i> Add To Cart
                                        </a>
                                    @endif
                                </div>
                            </div>                        
                            <div class="card-body text-center mt-3">
                                <a class="h6 link" href="">{{$relProduct->title}}</a>
                                
                                <div class="price mt-2">
                                    <span class="h5"><strong>?. {{$relProduct->price}}</strong></span>
                                    @if($relProduct->compare_price > 0)
                                    <span class="h6 text-underline"><del>?. {{$relProduct->compare_price}}</del></span>
                                    @endif
                                </div>
                            </div>                        
                        </div>
                    @endforeach


                 
            </div>
        </div>
    </div>
</section>
@endif

@endsection

@section('customJs')

@endsection