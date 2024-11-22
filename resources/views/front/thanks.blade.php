@extends('front.layouts.frontlayout')

@section('content')

    <section class="container d-flex justify-content-center">
        <div class="col-md-6 text-center py-2">
              
            @if (Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            @endif

            <h1 class="mt-35 mb-15 text-bg-success">Order Confirmation</h1>
            <h2>Thank You!</h2>
            <p class="h3 py-2 text-danger">Your order ID is: {{$id}}</p>
        </div>
    </section>
@endsection