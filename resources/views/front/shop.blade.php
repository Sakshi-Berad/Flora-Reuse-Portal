@extends('front.layouts.frontlayout')

@section('content')


<!-- breadcrumb area start -->
<section class="breadcrumb__area include-bg pt-95 pb-50">
    <div class="container">
        <div class="row">
            <div class="col-xxl-12">
                <div class="breadcrumb__content p-relative z-index-1">
                    <h3 class="breadcrumb__title">Shopping</h3>
                    <div class="breadcrumb__list">
                        <span><a href="{{ route('front.home') }}">Home</a></span>
                        <span>Shop</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb area end -->

<section class="section-6 pt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-3 sidebar">
                <div class="sub-title">
                    <h2>Categories</h3>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="accordion accordion-flush" id="accordionExample">

                            @if ($categories->isNotEmpty())
                                @foreach ($categories as $key => $category)

                                    <div class="accordion-item">
                                        @if ($category->sub_category->isNotEmpty())
                                            <h2 class="accordion-header" id="headingOne">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#collapseOne-{{$key}}" aria-expanded="false"
                                                    aria-controls="collapseOne">
                                                    {{$category->name}}
                                                </button>
                                            </h2>
                                        @else
                                            <a href="{{ route("front.shop", $category->slug) }}"
                                                class="nav-item nav-link {{ ($categorySelected == $category->id) ? 'text-primary' : ''}}">{{$category->name}}</a>
                                        @endif

                                        @if ($category->sub_category->isNotEmpty())

                                            <div id="collapseOne-{{$key}}"
                                                class="accordion-collapse collapse {{($categorySelected == $category->id) ? 'show' : ''}}"
                                                aria-labelledby="headingOne" data-bs-parent="#accordionExample" style="">
                                                <div class="accordion-body">
                                                    <div class="navbar-nav">
                                                        @foreach ($category->sub_category as $subCategory)
                                                            <a href="{{ route("front.shop", [$category->slug, $subCategory->slug]) }}"
                                                                class="nav-item nav-link {{ ($subCategorySelected == $subCategory->id) ? 'text-primary' : ''}}">{{$subCategory->name}}</a>
                                                        @endforeach
                                                        {{-- <a href="" class="nav-item nav-link">Tablets</a>
                                                        <a href="" class="nav-item nav-link">Laptops</a>
                                                        <a href="" class="nav-item nav-link">Speakers</a>
                                                        <a href="" class="nav-item nav-link">Watches</a> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        @endif

                                    </div>
                                @endforeach

                            @endif

                        </div>
                    </div>
                </div>

                <div class="sub-title mt-5">
                    <h2>Brand</h3>
                </div>

                <div class="card">
                    <div class="card-body">
                        @if ($brands->isNotEmpty())
                            @foreach ($brands as $brand)
                                <div class="form-check mb-2">
                                    <input {{ (in_array($brand->id, $brandsArray)) ? 'checked' : '' }}
                                        class="form-check-input brand-label" type="checkbox" name="brand[]"
                                        value="{{$brand->id}}" id="brand-{{$brand->id}}">
                                    <label class="form-check-label" for="brand-{{$brand->id}}">
                                        {{$brand->name}}
                                    </label>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>

                <div class="sub-title mt-5">
                    <h2>Price</h3>
                </div>

                <div class="card">
                    <div class="card-body">
                        <input type="text" class="js-range-slider" name="my_range" value="" />
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="row pb-3">
                    <div class="col-12 pb-1">
                        <div class="d-flex align-items-center justify-content-end mb-4">
                            <div class="ml-2">
                                {{-- <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-light dropdown-toggle"
                                        data-bs-toggle="dropdown">Sorting</button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#">Latest</a>
                                        <a class="dropdown-item" href="#">Price High</a>
                                        <a class="dropdown-item" href="#">Price Low</a>
                                    </div>
                                </div>--}}

                                <select name="sort" id="sort" class="form-control">
                                    <option value="latest" {{ ($sort == 'latest') ? 'selected' : '' }}>Latest</option>
                                    <option value="price_desc" {{ ($sort == 'price_desc') ? 'selected' : '' }}>Price High
                                    </option>
                                    <option value="price_asc" {{ ($sort == 'price_asc') ? 'selected' : '' }}>Price Low
                                    </option>
                                </select>
                            </div>


                        </div>
                       
                    </div>

                    @if ($products->isNotEmpty())
                                    @foreach ($products as $product)
                                                    @php
                                                        $productImage = $product->product_images->first();
                                                    @endphp
                                                    <div class="col-md-4">
                                                        <div class="card product-card" style="padding: 25px">
                                                            <div class="product-image position-relative text-center">
                                                                <a href="{{ route("front.product", $product->slug) }}" class="product-img">
                                                                    @if (!empty($productImage->image))
                                                                        <img src="{{ asset('/uploads/products/small/' . $productImage->image) }}" alt="error"
                                                                            class="card-img-top">
                                                                    @else
                                                                        <img src="{{ asset('/admin-assets/img/default-150x150.png') }}" alt="error"
                                                                            class="card-img-top">
                                                                    @endif
                                                                </a>
                                                                <a onclick="addToWhishlist({{$product->id}})" class="whishlist"
                                                                    href="javascript:void(0);"><i class="far fa-heart fs-3"></i></a>


                                                                <div class="product-action text-center">
                                                                    @if ($product->track_qty == 'Yes')
                                                                        @if ($product->qty > 0)
                                                                            <a class="btn btn-dark" href="javascript:void(0)"
                                                                                onclick="addToCart({{ $product->id }})">
                                                                                <i class="fa fa-shopping-cart"></i> Add To Cart
                                                                            </a>
                                                                        @else
                                                                            <a class="btn btn-danger" href="javascript:void(0)">
                                                                                Out of stock
                                                                            </a>
                                                                        @endif
                                                                    @else
                                                                        <a class="btn btn-dark" href="javascript:void(0)"
                                                                            onclick="addToCart({{ $product->id }})">
                                                                            <i class="fa fa-shopping-cart"></i> Add To Cart
                                                                        </a>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                           
                                                            <div class="card-body text-center mt-3">
                                                                <a class="h6 link"
                                                                    href="{{ route("front.product", $product->slug) }}">{{$product->title}}</a>
                                                                    <?php
                                                                    $d = json_decode($product->metadata);                                                                                                                                       
                                                            ?>
                                                            <?php
                                                                if(!empty($d->self_life)) { ?>
                                                                        <b>(Shelf Life: {{$d->self_life}} days)</b>
                                                            <?php  
                                                            }
                                                            ?>
                                                                <div class="price mt-2">
                                                                    <span class="h5"><strong>₹.{{$product->price}}</strong></span>
                                                                    @if($product->compare_price > 0)
                                                                        <span class="h6 text-underline"><del>₹.{{$product->compare_price}}</del></span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                    @endforeach
                    @endif


                    <div class="col-md-12 pt-5" style="margin-top: 20px">
                        {{ $products->withQueryString()->links() }}
                    </div>
                  
                </div>
                @if($products->isEmpty())
                <div class="container">
                <div class="row">
                                                            <div class="col-md-12">
                                                            <h4>No matching products found</h4>
                                                            </div>
                </div>
                </div>
               
                   
                    @endif                              
            </div>
        </div>
    </div>
</section>
@endsection


@section('customJs')

<script>
    // for the slider **
    rangeSlider = $(".js-range-slider").ionRangeSlider({

        type: "double",
        min: 0,
        max: 100000,
        from: {{ ($priceMin) }},    //chnage to next
        step: 10,
        to: {{ ($priceMax) }},   //chnage to next
        skin: "round",
        max_postfix: "+",
        prefix: "₹",
        onFinish: function () {
            apply_filters();
        }
    });

    // Saving it's instance to in variable 
    var slider = $(".js-range-slider").data("ionRangeSlider");


    $(".brand-label").change(function () {
        apply_filters();
    });

    $("#sort").change(function () {
        apply_filters();
    });


    function apply_filters() {
        var brands = [];

        $(".brand-label").each(function () {
            if ($(this).is(":checked") == true) {
                brands.push($(this).val());
            }
        });

        var url = '{{ url()->current() }}?';

        // brand filter 
        if (brands.length > 0) {
            url += '&brand=' + brands.toString();
        }

        // price renge filter 
        url += '&price_min=' + slider.result.from + '&price_max=' + slider.result.to;

        // sorting filter 

        var keyword = $('#search').val() ?? "";

        if (keyword.length > 0) {
            url += '&search=' + keyword;
        }


        url += '&sort=' + $("#sort").val();



        window.location.href = url;


    }
</script>

@endsection