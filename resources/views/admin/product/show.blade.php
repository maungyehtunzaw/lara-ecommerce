@extends('adminlte::page')

@section('title', 'Dashboard')
@section('content_header')
    <h5> DETAIL PRODUCT # {{ $product->id }} - {{ $product->name }}</h5>
@stop

@section('content')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="row m-2">
                        <div class="col-md-4">
                            <x-adminlte-info-box title="{{ $data['total_amount'] }}" description="Total Sale Amount"
                                icon="fas fa-lg fa-piggy-bank" theme="primary" progress=75 progress-theme="dark" />
                        </div>
                        <div class="col-md-4">
                            <x-adminlte-info-box title="{{ $data['total_qty'] }}" description="Sale Quatity "
                                icon="fas fa-lg fa-store" theme="warning" progress=75 progress-theme="dark" />
                        </div>
                        <div class="col-md-4">
                            <x-adminlte-info-box title="{{ $data['total_order'] }}" description="Number of order"
                                theme="success" icon="fas fa-lg fa-truck" progress=75 progress-theme="dark" />
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                                    <h6 class="mb-0 fw-bold ">Product Detail</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row g-1">
                                        <div class="col-12">
                                            <label class="form-label col-6 col-sm-5">Product ID</label>
                                            <span><strong>{{ $product->id }}</strong></span>
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label col-6 col-sm-5">Product Name</label>
                                            <span><strong>{{ $product->name }}</strong></span>
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label col-6 col-sm-5">Cateogry:</label>
                                            <span><strong>{{ $product->category->name }} MMK</strong></span>
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label col-6 col-sm-5">-</label>
                                            {{ $product->description }}
                                        </div>


                                    </div>
                                </div>
                            </div>
                            </div>
                            <div class="col-md-6">
                                <h3>Product Image</h3>
                                <img src="{{ asset('storage/' . $product->image) }}" alt="" class="img-fluid">
                                @foreach ($product->images as $image)
                                    <img src="{{ asset('storage/' . $image->image) }}" alt="" class="img-fluid">
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="m-3">
                        <h6>Recent Orders</h6>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Order No.</th>
                                    <th>Customer Name</th>
                                    <th>Unit Rate</th>
                                    <th>Qty</th>
                                    <th>Amount</th>
                                    <th>Order Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($recent_orders as $order)
                                    <tr>
                                        <td>{{ $order->id }}</td>
                                        <td>{{ $order->order->saleno }}</td>
                                        <td>{{ $order->order->customer->name }}</td>
                                        <td>{{ $order->unit_rate }}</td>
                                        <td>{{ $order->qty }}</td>
                                        <td>{{ $order->total_amount }}</td>
                                        <td>{{ $order->created_at }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                    </div>
                </div>

            </div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop
