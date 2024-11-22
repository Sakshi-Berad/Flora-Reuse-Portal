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
                           <span>Shopping Cart</span>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <!-- breadcrumb area end -->

         <!-- cart area start -->
         <section class="tp-cart-area pb-120">
            <div class="container">
               <div class="row">
                
                @if (Session::has('success'))
                    <div class="col-md-12">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {!! Session::get('success') !!}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                @endif
                @if (Session::has('error'))
                    <div class="col-md-12">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ Session::get('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                @endif

                @if (Cart::count() > 0)
                  <div class="col-xl-9 col-lg-8">                   
                     <div class="tp-cart-list mb-25 mr-30">
                        <table class="table">
                           <thead>
                             <tr>
                               <th colspan="2" class="tp-cart-header-product">Product</th>
                               <th class="tp-cart-header-price">Price</th>
                               <th class="tp-cart-header-quantity">Quantity</th>
                               <th class="tp-cart-header-total">Total</th>
                               <th></th>
                             </tr>
                           </thead>
                           <tbody>
                            @foreach ($cartContent as $item)
                            
                              <tr>
                                 <!-- img -->
                                 <td class="tp-cart-img">
                                    @if (!empty($item->options->productImage->image))
                                    <img src="{{ asset('/uploads/products/small/' . $item->options->productImage->image) }}"
                                        alt="error">
                                    @else
                                        <img src="{{ asset('/admin-assets/img/default-150x150.png') }}"
                                            alt="error" class="card-img-top">
                                    @endif
                                </td>
                                 <!-- title -->
                                 <td class="tp-cart-title"><a href="#">{{ $item->name }}</a></td>
                                 <!-- price -->
                                 <td class="tp-cart-price"><span>₹.{{ $item->price }}</span></td>
                                 <!-- quantity -->
                                 <td class="tp-cart-quantity">

                                    <div class="input-group quantity mx-auto" style="width: 120px; display: flex; align-items: center;">
                                        <div class="input-group-btn">
                                            <button class="btn btn-sm btn-dark btn-minus p-2 pt-1 pb-1 sub"
                                                data-id="{{ $item->rowId }}">
                                                <i class="fa fa-minus"></i>
                                            </button>
                                        </div>
                                        <input type="text"
                                            class="form-control form-control-sm  border-0 text-center"
                                            value="{{ $item->qty }}">
                                        <div class="input-group-btn">
                                            <button class="btn btn-sm btn-dark btn-plus p-2 pt-1 pb-1 add"
                                                data-id="{{ $item->rowId }}">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                 </td>
                                 <!-- total -->                                 
                                 <td>
                                    ₹.{{ $item->price * $item->qty }}
                                </td>
                                 <!-- action -->
                                 <td class="tp-cart-action">
                                    <button class="tp-cart-action-btn" onclick="deleteItem('{{ $item->rowId }}');">
                                       <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <path fill-rule="evenodd" clip-rule="evenodd" d="M9.53033 1.53033C9.82322 1.23744 9.82322 0.762563 9.53033 0.46967C9.23744 0.176777 8.76256 0.176777 8.46967 0.46967L5 3.93934L1.53033 0.46967C1.23744 0.176777 0.762563 0.176777 0.46967 0.46967C0.176777 0.762563 0.176777 1.23744 0.46967 1.53033L3.93934 5L0.46967 8.46967C0.176777 8.76256 0.176777 9.23744 0.46967 9.53033C0.762563 9.82322 1.23744 9.82322 1.53033 9.53033L5 6.06066L8.46967 9.53033C8.76256 9.82322 9.23744 9.82322 9.53033 9.53033C9.82322 9.23744 9.82322 8.76256 9.53033 8.46967L6.06066 5L9.53033 1.53033Z" fill="currentColor"/>
                                       </svg>
                                       <span>Remove</span>
                                    </button>
                                 </td>
                              </tr>
                              @endforeach
                           </tbody>
                         </table>
                     </div>
                  </div>
                  <div class="col-xl-3 col-lg-4 col-md-6">
                     <div class="tp-cart-checkout-wrapper">
                        <div class="cart-summery">
                        
                            <div class="card-body">
                                <div class="sub-title">
                                <h2 class="bg-white">Cart Summery</h3>
                            </div>
                                <div class="d-flex justify-content-between pb-2">
                                    <div>Subtotal</div>
                                    <div>₹{{ Cart::subtotal() }}</div>
                                </div>
                                {{-- <div class="d-flex justify-content-between pb-2">
                                    <div>Shipping</div>
                                    <div>$0</div>
                                </div>
                                <div class="d-flex justify-content-between summery-end">
                                    <div>Total</div>
                                    <div>₹{{ Cart::subtotal() }}</div>
                                </div> --}}
                                <div class="pt-2">
                                    <a href="{{ route('front.checkout') }}" class="btn-dark btn btn-block w-100">Proceed to Checkout</a>
                                </div>
                            </div>
                        </div>
                     </div>
                  </div>
                  @else

                  <div class="col-ms-12">
                      <div class="card">
                          <div class="card-body d-flex justify-content-center align-items-center">
                              <h4>Your Cart is empty</h4>
                          </div>
                      </div>
                  </div>
  
                  @endif
               </div>
            </div>
         </section>
         <!-- cart area end -->

@endsection


@section('customJs')
    <script>
        $('.add').click(function() {
            var qtyElement = $(this).parent().prev(); // Qty Input
            var qtyValue = parseInt(qtyElement.val());
            if (qtyValue < 10) {
                qtyElement.val(qtyValue + 1);

                var rowId = $(this).data('id');
                var newQty = qtyElement.val();
                updateCart(rowId, newQty)
            }
        });

        $('.sub').click(function() {
            var qtyElement = $(this).parent().next();
            var qtyValue = parseInt(qtyElement.val());
            if (qtyValue > 1) {
                qtyElement.val(qtyValue - 1);

                var rowId = $(this).data('id');
                var newQty = qtyElement.val();
                updateCart(rowId, newQty)
            }
        });


        function updateCart(rowId, qty) {
            $.ajax({

                url: '{{ route("front.updateCart") }}',
                type: 'post',
                data: {rowId:rowId, qty:qty},
                dataType: 'json',
                success: function(responce) {
                    // window.location.href = '{{ route("front.cart") }}'
                    window.location.href = '{{ route("front.cart") }}'
                }

            });
        }

        function deleteItem(rowId) {
            if (confirm("Are you sure you want to delete ? ")) {

                $.ajax({

                    url: '{{ route("front.deleteItem.cart") }}',
                    type: 'post',
                    data: {rowId:rowId},
                    dataType: 'json',
                    success: function(responce) {
                        window.location.href = '{{ route("front.cart") }}'
                    }

                });

            }

        }
    </script>
@endsection
