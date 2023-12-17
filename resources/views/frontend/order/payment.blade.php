@extends('layouts.frontend')
@section('content')
<div class="container-fluid">

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
    <form action="{{route('front.pay')}}" method="POST">
        @csrf
    <div class="row px-xl-5">

        <div class="col-lg-8">
            <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Billing Address</span></h5>
            <div class="bg-light p-30 mb-5">
                <div class="row">
                    <div class="col-md-12 form-group">
                        <label>Your Name</label>
                        <input name="name" class="form-control @error('name') is-invalid @enderror" type="text" placeholder="John" value="{{old('name')}}">
                        @error('name')
                        <div className="invalid-feedback">
                            {{$message}}
                          </div>
                        @enderror
                    </div>
                    {{-- <div class="col-md-6 form-group">
                        <label>Last Name</label>
                        <input class="form-control" type="text" placeholder="Doe">
                    </div> --}}
                    <div class="col-md-6 form-group">
                        <label>E-mail</label>
                        <input name="email" class="form-control @error('email') is-invalid @enderror" type="text" placeholder="example@email.com" value="{{old('email')}}">
                        @error('email')
                        <div className="invalid-feedback">
                            {{$message}}
                          </div>
                        @enderror
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Mobile No</label>
                        <input name="phone" class="form-control @error('phone') is-invalid @enderror" type="text" placeholder="+123 456 789" value="{{old('phone')}}">
                        @error('phone')
                        <div className="invalid-feedback">
                            {{$message}}
                          </div>
                        @enderror
                    </div>


                    <div class="col-md-6 form-group">
                        <label>Country</label>
                        <select name="countries_id" class="custom-select @error('countries_id') is-invalid @enderror">
                            <option value="">Select Country</option>
                            <option value="1">Myanmar</option>
                            <option value="2">Albania</option>
                            <option value="3">Algeria</option>
                        </select>
                        @error('countries_id')
                        <div className="invalid-feedback">
                            {{$message}}
                          </div>
                        @enderror
                    </div>
                    <div class="col-md-6 form-group">
                        <label>City</label>
                        <input name="city" class="form-control @error('city') is-invalid @enderror" type="text" placeholder="New York" value="{{old('city')}}">
                        @error('city')
                        <div className="invalid-feedback">
                            {{$message}}
                          </div>
                        @enderror
                    </div>
                    <div class="col-md-12 form-group">
                        <label>Address</label>
                        <input name="address" class="form-control @error('address') is-invalid @enderror" type="text" placeholder="123 Street" value="{{old('address')}}">
                        @error('address')
                        <div className="invalid-feedback">
                            {{$message}}
                          </div>
                        @enderror
                    </div>
                    {{-- <div class="col-md-6 form-group">
                        <label>State</label>
                        <input class="form-control" type="text" placeholder="New York">
                    </div>
                    <div class="col-md-6 form-group">
                        <label>ZIP Code</label>
                        <input class="form-control" type="text" placeholder="123">
                    </div> --}}
                    @guest
                    <div class="col-md-12 form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" checked class="custom-control-input" id="newaccount">
                            <label class="custom-control-label" for="newaccount">Create an account</label>
                        </div>
                    </div>
                    @endguest
                    @auth('cus')
                    <div class="col-md-12">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="shipto">
                            <label class="custom-control-label" for="shipto" data-toggle="collapse" data-target="#shipping-address">Ship to different address</label>
                        </div>
                    </div>
                    @endauth

                </div>
            </div>
            <div class="collapse mb-5" id="shipping-address">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Shipping Address</span></h5>
                <div class="bg-light p-30">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>First Name</label>
                            <input class="form-control" type="text" placeholder="John">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Last Name</label>
                            <input class="form-control" type="text" placeholder="Doe">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>E-mail</label>
                            <input class="form-control" type="text" placeholder="example@email.com">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Mobile No</label>
                            <input class="form-control" type="text" placeholder="+123 456 789">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Address Line 1</label>
                            <input class="form-control" type="text" placeholder="123 Street">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Address Line 2</label>
                            <input class="form-control" type="text" placeholder="123 Street">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Country</label>
                            <select class="custom-select">
                                <option selected="">United States</option>
                                <option>Afghanistan</option>
                                <option>Albania</option>
                                <option>Algeria</option>
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>City</label>
                            <input class="form-control" type="text" placeholder="New York">
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Order Total</span></h5>
            <div class="bg-light p-30 mb-5">
                <div class="border-bottom">
                    <h6 class="mb-3">Products</h6>
                    @foreach($orderItems as $cartItem)
                    <div class="d-flex justify-content-between">
                        <p>{{ $cartItem['product']['name'] }} <small>{{$cartItem['product']['unit_rate']}} X {{ $cartItem['qty'] }} </small></p>
                        <p>{{$cartItem['product']['unit_rate'] * $cartItem['qty']}} </p>
                    </div>
                    @endforeach

                </div>
                <div class="border-bottom pt-3 pb-2">
                    <div class="d-flex justify-content-between mb-3">
                        <h6>Subtotal</h6>
                        <h6>$150</h6>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h6 class="font-weight-medium">Shipping</h6>
                        <h6 class="font-weight-medium">$10</h6>
                    </div>
                </div>
                <div class="pt-2">
                    <div class="d-flex justify-content-between mt-2">
                        <h5>Total</h5>
                        <h5>$160</h5>
                    </div>
                </div>
            </div>
            <div class="mb-5">



                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Payment</span></h5>
                <div class="bg-light p-30">
                    <div class="form-group">
                        <div class="custom-control custom-radio">
                            <input name="payments_id" type="radio" class="custom-control-input"  id="paypal" value="1">
                            <label class="custom-control-label" for="paypal">Paypal</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-radio">
                            <input name="payments_id" type="radio" class="custom-control-input"  id="directcheck" value="2">
                            <label class="custom-control-label" for="directcheck">Direct Check</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-radio">
                            <input name="payments_id" type="radio" class="custom-control-input"  id="banktransfer" value="3">
                            <label class="custom-control-label" for="banktransfer">Bank Transfer</label>
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <div class="custom-control custom-radio">
                            <input name="payments_id" type="radio" class="custom-control-input"  id="banktransfer" value="4">
                            <label class="custom-control-label" for="banktransfer">COD</label>
                        </div>
                    </div>
                    <button class="btn btn-block btn-primary font-weight-bold py-3">Place Order</button>
                </div>
            </div>
        </div>
    </div>
</form>
</div>
@endsection
