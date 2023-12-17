@extends('layouts.frontend')
@section('content')
    <!-- Cart Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="card">
                <div class="card-body">
                    <div class="text-center my-3">
                        <i class="fa fa-shipping-fast fa-5x text-success"></i>
                    </div>
                    <div class="row">
                    <div class="col-md-6 text-center">
                        <h3 class="text-success">Order Confirmed</h3>
                        <p>Your order is confirmed. you will received phone call via dilivery system. lorem ispum doler site mem.</p>
                        <a href="" class="btn btn-primary">Track Order</a>
                        <a href="" class="btn btn-primary">My Order</a>

                    </div>
                    <div class="col-md-6 border-left">
                        <h1>
                            Thanks for shopping with us online.</h1>
                            <a href="{{ route('front.home') }}" class="btn btn-primary">Continue Shopping</a>

                    </div>
                </div>
                </div>
            </div>

        </div>
    </div>
@endsection
