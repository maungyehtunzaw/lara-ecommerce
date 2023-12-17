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
                    <h6 class="mb-0 fw-bold ">Account Info</h6>
                    <a href="#" class="btn btn-primary btn-sm">Edit</a>
                </div>
                <div class="card-body">
                    <div class="row g-1">
                        <div class="col-12">
                            <label class="form-label col-6 col-sm-5">Your Name:</label>
                            <span><strong>{{$customer->name}}</strong></span>
                        </div>
                        <div class="col-12">
                            <label class="form-label col-6 col-sm-5 ">Email:</label>
                            <span><strong>{{$customer->email}}</strong></span>
                        </div>
                        <div class="col-12">
                            <label class="form-label col-6 col-sm-5">Phone:</label>
                            <span><strong>{{$customer->phone}}</strong></span>
                        </div>
                        <div class="col-12">
                            <label class="form-label col-6 col-sm-5">Member Since:</label>
                            <span><strong>{{$customer->created_at->diffForHumans()}}</strong></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
</div>
@endsection
