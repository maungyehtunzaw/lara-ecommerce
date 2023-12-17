@extends('adminlte::page')

@section('title', 'Order Detail')
@section('content_header')
    <h4>SALE ORDERS DETAIL # {{ $order->saleno }}</h4>
@stop

@section('content')
    <div class="bg-white dark:bg-gray-800  p-2">
        <div class="row g-3 mb-3 row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-2 row-cols-xl-4">
            <div class="col">
                <div class="alert-success alert mb-0">
                    <div class="d-flex align-items-center">
                        <div class="avatar rounded no-thumbnail bg-success text-light"><i class="fa fa-shopping-cart fa-lg"
                                aria-hidden="true"></i></div>
                        <div class="flex-fill ms-3 text-truncate">
                            <div class="h6 mb-0">Order Created at</div>
                            <span class="small">{{ $order->created_at }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="alert-danger alert mb-0">
                    <div class="d-flex align-items-center">
                        <div class="avatar rounded no-thumbnail bg-danger text-light"><i class="fa fa-user fa-lg"
                                aria-hidden="true"></i></div>
                        <div class="flex-fill ms-3 text-truncate">
                            <div class="h6 mb-0">Customer Name</div>
                            <span class="small">{{ $order->customer->name }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="alert-warning alert mb-0">
                    <div class="d-flex align-items-center">
                        <div class="avatar rounded no-thumbnail bg-warning text-light"><i class="fa fa-envelope fa-lg"
                                aria-hidden="true"></i></div>
                        <div class="flex-fill ms-3 text-truncate">
                            <div class="h6 mb-0">Email</div>
                            <span class="small">{{ $order->customer->email }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="alert-info alert mb-0">
                    <div class="d-flex align-items-center">
                        <div class="avatar rounded no-thumbnail bg-info text-light"><i class="fa fa-phone-square fa-lg"
                                aria-hidden="true"></i></div>
                        <div class="flex-fill ms-3 text-truncate">
                            <div class="h6 mb-0">Contact No</div>
                            <span class="small">{{ $order->customer->phone }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row p-2">
            <div class="col">
                <div class="card auth-detailblock">
                    <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                        <h6 class="mb-0 fw-bold ">Invoice Detail</h6>
                        <a href="#" class="text-muted">Edit</a>
                    </div>
                    <div class="card-body">
                        <div class="row g-1">
                            <div class="col-12">
                                <label class="form-label col-6 col-sm-5">Invoice Number:</label>
                                <span><strong>{{ $order->saleno }}</strong></span>
                            </div>
                            <div class="col-12">
                                <label class="form-label col-6 col-sm-5">Total Qty:</label>
                                <span><strong>{{ $order->total_qty }}</strong></span>
                            </div>
                            <div class="col-12">
                                <label class="form-label col-6 col-sm-5">Total Amount:</label>
                                <span><strong>{{ $order->total_amount }} MMK</strong></span>
                            </div>
                            <div class="col-12">
                                <label class="form-label col-6 col-sm-5">Paid</label>
                                <span><strong>
                                        @if($order->paid_status ==1)
                                      <span class='badge badge-success'>PAID</span>
                                        @else
                                      <span class='badge badge-warning'>PENDING</span>
                                        @endif
                                    </strong></span>
                            </div>
                            <div class="col-12">
                                <label class="form-label col-6 col-sm-5">Delivery</label>
                                <span><strong>
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
                                    </strong></span>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card auth-detailblock">
                    <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                        <h6 class="mb-0 fw-bold ">Delivery Address</h6>
                        <a href="#" class="text-muted">Edit</a>
                    </div>
                    @if($order->address)
                    <div class="card-body">
                        <div class="row g-1">
                            <div class="col-12">
                                <label class="form-label col-6 col-sm-5">Block Number:</label>
                                <span><strong>A-510</strong></span>
                            </div>
                            <div class="col-12">
                                <label class="form-label col-6 col-sm-5 ">Address:</label>
                                <span><strong>{{$order->address->address}}</strong></span>
                            </div>
                            <div class="col-12">
                                <label class="form-label col-6 col-sm-5">City:</label>
                                <span><strong>{{$order->address->city}}</strong></span>
                            </div>
                            <div class="col-12">
                                <label class="form-label col-6 col-sm-5">Phone:</label>
                                <span><strong>{{$order->address->phone}}</strong></span>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <h4>Ordered Items</h4>
        <div class="row">
            <div class="col-md-8">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->order_items as $item)
                            <tr>
                                <td>{{ $item->product->name }}</td>
                                <td>{{ $item->qty }}</td>
                                <td>{{ $item->unit_rate }}</td>
                                <td>{{ $item->qty * $item->unit_rate }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3" class="text-right">Total</td>
                            <td>{{ $order->total_amount }}</td>
                        </tr>
                </table>

            </div>
            <div class="col-md-4">
                <div class="card p-2">
                    <form action="{{route('order.confirm')}}" method="POST">
                        @csrf
                        <input type="hidden" name="order_id" value="{{$order->id}}">

                        <div class="form-group">
                            <label for="paid_status">Payment Status {{$order->paid_status}}</label>


                            <select name="paid_status" class="form-control">
                                <option value="2" @if($order->paid_status ==2) selected @endif>Pending</option>
                                <option value="1" @if($order->paid_stutus ==1) selected @endif>Confirm</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="delivery_status">Delivery Status</label>
                            <select name="delivery_status" class="form-control" id="delivery_status">
                                <option value="1" @if($order->delivery_status ==1) selected @endif>Pending</option>
                                <option value="2" @if($order->delivery_status ==2) selected @endif>Processing</option>
                                <option value="3" @if($order->delivery_status ==3) selected @endif>Completed</option>
                                <option value="4" @if($order->delivery_status ==4) selected @endif>Cancelled</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Order</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
    </div>
@stop
