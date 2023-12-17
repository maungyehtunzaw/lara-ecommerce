@extends('adminlte::page')
@section('title', 'Customer List')

@section('content_header')
    <h4>CUSTOMER DETAIL {{$customer->first_name ." ".$customer->last_name}} </h4>
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
                <div>{{$customer->first_name}}</div>
            </div>
            <div class="d-flex justify-content-between">
                <h6>Phone No.</h6>
                <div>{{$customer->phone}}</div>
            </div>
            <div class="d-flex justify-content-between">
                <h6>Email </h6>
                <div>{{$customer->email}}</div>
            </div>
        </div>
        </div>
     </div>
   </div>
   <div class="row">
     <h5>Recent Order</h5>
     <div class="col-md-12">
        <div class="d-flex flex-column justify-content-center">
            <i class="fas fa-cart-plus"></i>
            No Order F/ound
         </div>
     </div>
   </div>
</div>
@stop

