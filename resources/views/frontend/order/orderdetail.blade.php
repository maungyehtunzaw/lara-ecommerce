@extends('layouts.frontend')
@section('content')
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-3">
                @include('frontend.elements.cussidebar')
            </div>
            <div class="col-lg-9">
                <div class="card auth-detailblock">
                    <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                        <h6 class="mb-0 fw-bold ">ORDER # {{$order->saleno}}</h6>
                        {{-- <a href="#" class="btn btn-primary btn-sm">Edit</a> --}}
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <th>No.</th>
                                <th>Image</th>
                                <th>Product</th>
                                <th>Qty</th>
                                <th>Price</th>
                                <th>Amount</th>
                            </thead>
                            <tbody>
                                @foreach ($order->order_items as $od)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>
                                        <img src="{{$od->product->image}}" alt="" width="50"></td>
                                    <td>{{$od->product->name}}</td>
                                    <td>{{$od->qty}}</td>
                                    <td>{{$od->unit_rate}}</td>
                                    <td>{{$od->total_amount}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="5" class="text-right">Total Amount</td>
                                    <td>{{$order->total_amount}}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
