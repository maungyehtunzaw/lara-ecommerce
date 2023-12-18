@extends('adminlte::page')
@section('title', 'Customer List')

@section('content_header')
    <h4>CUSTOMER DETAIL {{ $customer->first_name . ' ' . $customer->last_name }} </h4>
@stop

@section('content')
    <div class="bg-white dark:bg-gray-800  p-2">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header ">Personal Info</div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h6>Name</h6>
                            <div>{{ $customer->first_name }}</div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6>Phone No.</h6>
                            <div>{{ $customer->phone }}</div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6>Email </h6>
                            <div>{{ $customer->email }}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header ">Address</div>
                    <div class="card-body">
                        @foreach($customer->addresses as $ad)
                        <div class="d-flex align-items-center">
                            <i class="fas fa-map-marker-alt"></i> &nbsp;
                            <div>{{ $ad->city }}/ {{$ad->street}} / {{$ad->address}} <br/>{{$ad->phone}}</div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <h5 class="ml-3">Recent Order</h5>
            <div class="col-md-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Id.</th>
                            <th>Order No.</th>
                            <th>Qty Total</th>
                            <th>Amount Total</th>
                            <th>isPaid</th>
                            <th>Delivery</th>
                            <th>Order Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @empty($recentOrders)
                            <tr>
                                <td colspan="10" class="text-center">No Order Found</td>
                            </tr>
                        @else
                            @foreach ($recentOrders as $order)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->saleno }}</td>
                                    <td>{{ $order->total_qty }}</td>
                                    <td>{{ $order->total_amount }}</td>
                                    <td>  @if($order->paid_status ==1)
                                        <span class='badge badge-success'>PAID</span>
                                          @else
                                        <span class='badge badge-warning'>PENDING</span>
                                          @endif
                                        </td>
                                    <td>
                                        @switch($order->delivery_status)
                                            @case(1)
                                                <span class='badge badge-warning'>PENDING</span>
                                            @break

                                            @case(2)
                                                <span class='badge badge-info'>PROCESSING</span>
                                            @break

                                            @case(3)
                                                <span class='badge badge-success'>COMPLETED</span>
                                            @break

                                            @case(4)
                                                <span class='badge badge-danger'>CANCELLED</span>
                                            @break
                                            @default
                                        @endswitch
                                    </td>
                                    <td>{{ $order->created_at->format('Y-m-d H:i A') }}</td>
                                    <td>{{ $order->payment_amount }}</td>
                                    <td>
                                        <a href="{{ route('order.show', $order->id) }}"
                                            class="btn btn-sm btn-primary">View</a>
                                    </td>
                                </tr>
                            @endforeach
                        @endempty
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop
