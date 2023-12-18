
@extends('adminlte::page')

@section('title', 'Dashboard')
@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<div class="row">
    <div class="col-lg-3 col-6">

        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{$data['total_products']}} </h3>
                <p>Total Product
                <p>
            </div>
            <div class="icon">
                <i class="fas fa-shopping-bag"></i>
            </div>
            <a href="{{route('product.index')}}" class="small-box-footer">More info <i
                    class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-6">

        <div class="small-box bg-success">
            <div class="inner">
                <h3> {{$data['total_sales']}} MMK</h3>
                <p>Total Sale</p>
            </div>
            <div class="icon">
                <i class="fas fa-piggy-bank"></i>
            </div>
            <a href="{{route('order.index')}}" class="small-box-footer">More info <i
                    class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-6">

        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{$data['total_customers']}} </h3>
                <p>Customer </p>
            </div>
            <div class="icon">
                <i class="fas fa-user-tag"></i>
            </div>
            <a href="{{route('customer.index')}}" class="small-box-footer">More info <i
                    class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-6">

        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{$data['total_orders']}} </h3>
                <p>Orders</p>
            </div>
            <div class="icon">
                <i class="fas fa-dolly"></i>
            </div>
            <a href="{{route('order.index')}}" class="small-box-footer">More info <i
                    class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

</div>
@stop
