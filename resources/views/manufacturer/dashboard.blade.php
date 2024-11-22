
@extends('vendor.layout.mfg-app')

@section('content')

<section class="content-header">
    @include('admin.message')

    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Dashboard</h1>
            </div>
            <div class="col-sm-6">

            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-6">
                <div class="small-box card">
                    <div class="inner">
                        <h3>{{$totalOrders}}</h3>
                        <p>Total Orders</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="{{ route('manufacturer.orders.index') }}" class="small-box-footer text-dark">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-4 col-6">
                <div class="small-box card">
                    <div class="inner">
                        <h3>{{$totalProducts}}</h3>
                        <p>Total Product</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="{{ route('manufacturer.raw-materials.index') }}" class="small-box-footer text-dark">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            {{--<div class="col-lg-4 col-6">
                <div class="small-box card">
                    <div class="inner">
                        <h3>{{$totalCustomers}}</h3>
                        <p>Total Customers</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="{{ route('users.index') }}" class="small-box-footer text-dark">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>--}}

            <div class="col-lg-4 col-6">
                <div class="small-box card">
                    <div class="inner">
                        <h3>₹ {{number_format($totalSale,2)}}</h3>
                        <p>Total Sale</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="javascript:void(0);" class="small-box-footer">&nbsp;</a>
                </div>
            </div>
            <div class="col-lg-4 col-6">
                <div class="small-box card">
                    <div class="inner">
                        <h3>₹ {{number_format($saleThisMonth,2)}}</h3>
                        <p>Revenue This Month</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="javascript:void(0);" class="small-box-footer">&nbsp;</a>
                </div>
            </div>
            <div class="col-lg-4 col-6">
                <div class="small-box card">
                    <div class="inner">
                        <h3>₹ {{number_format($SaleLastMonth,2)}}</h3>
                        <p>Revenue Last Month ({{$lastMonthName}})</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="javascript:void(0);" class="small-box-footer">&nbsp;</a>
                </div>
            </div>
            <div class="col-lg-4 col-6">
                <div class="small-box card">
                    <div class="inner">
                        <h3>₹ {{number_format($saleLast30Days,2)}}</h3>
                        <p>Revenue Last 30 Days</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="javascript:void(0);" class="small-box-footer">&nbsp;</a>
                </div>
            </div>
        </div>
    </div>
    <!-- /.card -->
</section>
@endsection