@extends('layouts.frontend')
@section('title','Product List')
@section('content')
<div class="container-fluid pb-5">
    <form action="{{route('front.product')}}" method="GET">
    <div class="row px-xl-5 my-2">
        <div class="col-md-4">
            <select name="category" class="form-control">
                <option value="">Choose Category</option>
                <option value="1">Abc beer</option>
                <option value="2">BBC S</option>
            </select>
        </div>
        <div class="col-md-5">
            <input type="text" name="search" class="form-control" placeholder="Search" value="{{request('search')}}">
        </div>
        <div class="col-md-3">
            <button class="btn btn-primary btn-block" type="submit">Search</button>
        </div>
    </div>
</form>

    <div class="row px-xl-5">

        @foreach($products as $p)
        <div class="col-lg-3 col-md-4 col-md-6 col-sm-6 pb-1">
            <div class="product-item bg-light mb-4">
                <div class="product-img position-relative overflow-hidden">
                    <img class="img-fluid w-100" src="{{$p->image}}" alt="{{$p->name}}">
                    <div class="product-action">
                        <button class="btn btn-outline-dark btn-square" id="addToCart" data-id="{{$p->id}}"><i class="fa fa-shopping-cart"></i></button>

                        <a class="btn btn-outline-dark btn-square" href="{{route('front.product.show',$p->id)}}"><i class="fa fa-info-circle"></i></a>
                    </div>
                </div>
                <div class="text-center py-4">
                    <a class="h6 text-decoration-none text-truncate" href="{{route('front.product.show',$p->id)}}">{{$p->name}}</a>
                    <div class="d-flex align-items-center justify-content-center mt-2">
                        <h5>{{$p->unit_rate}}</h5><h6 class="text-muted ml-2"><del>$123.00</del></h6>
                    </div>
                    <div class="d-flex align-items-center justify-content-center mb-1">
                        <small class="fa fa-star text-primary mr-1"></small>
                        <small class="fa fa-star text-primary mr-1"></small>
                        <small class="fa fa-star text-primary mr-1"></small>
                        <small class="fa fa-star text-primary mr-1"></small>
                        <small class="fa fa-star text-primary mr-1"></small>
                        <small>(99)</small>
                    </div>
                </div>
            </div>
        </div>

        @endforeach

    </div>
    <div class="row px-xl-5">
    {{$products->links()}}
    </div>
</div>

@endsection
