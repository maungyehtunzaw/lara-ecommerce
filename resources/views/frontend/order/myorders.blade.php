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
                    <h6 class="mb-0 fw-bold ">My Order History</h6>
                    {{-- <a href="#" class="btn btn-primary btn-sm">Edit</a> --}}
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <th>No.</th>
                            <th>Orde No.</th>
                            <th>Order Date</th>
                            <th>Total Qty</th>
                            <th>Total Amount</th>
                            <th>Paid</th>
                            <th>Delivery</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$order->saleno}}</td>
                                <td>{{$order->created_at->format('d-m-Y')}}</td>
                                <td>{{$order->total_qty}}</td>
                                <td>{{$order->total_amount}}</td>
                                <td>
                                    @if ($order->paid)
                                        <span class="badge badge-success">Paid</span>
                                    @else
                                        <span class="badge badge-danger">Unpaid</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($order->delivered)
                                        <span class="badge badge-success">Delivered</span>
                                    @else
                                        <span class="badge badge-danger">Undelivered</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('front.orders.show',$order->id)}}" class="btn btn-sm btn-primary">Detail</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
</div>
</div>
@endsection
