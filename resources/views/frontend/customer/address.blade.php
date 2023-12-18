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
                        <h6 class="mb-0 fw-bold ">Address</h6>
                        {{-- <a href="#" class="btn btn-primary btn-sm">Edit</a> --}}
                    </div>
                    <div class="card-body">
                        @foreach($addresses as $address)
                            <div style="width: 100%; border: 1px solid #ccc; padding: 10px; margin-bottom: 10px;">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h5>{{$address->name}}</h5>
                                        <p>{{$address->address}}</p>
                                        <p>{{$address->city}}, {{$address->state}} -
                                        <p>{{$address->phone}}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="d-flex justify-content-end">
                                            <a href="#" class="btn btn-primary btn-sm">Edit</a>
                                            <a href="#" class="btn btn-danger btn-sm ml-2">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
