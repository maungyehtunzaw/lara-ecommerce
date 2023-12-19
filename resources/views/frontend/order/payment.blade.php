@extends('layouts.frontend')
@section('title', 'Payment')
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
        <form action="{{ route('front.pay') }}" method="POST">
            @csrf
            <div class="row px-xl-5">

                <div class="col-lg-8">
                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Billing
                            Address</span></h5>
                    <div class="bg-light p-30 mb-5">
                        <div class="row">
                            @guest('cus')
                                <div class="col-md-12 form-group">
                                    <label>Your Name</label>
                                    <input name="name" class="form-control @error('name') is-invalid @enderror"
                                        type="text" placeholder="John" value="{{ old('name') }}">
                                    @error('name')
                                        <div className="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                {{-- <div class="col-md-6 form-group">
                        <label>Last Name</label>
                        <input class="form-control" type="text" placeholder="Doe">
                    </div> --}}
                                <div class="col-md-6 form-group">
                                    <label>E-mail</label>
                                    <input name="email" class="form-control @error('email') is-invalid @enderror"
                                        type="text" placeholder="example@email.com" value="{{ old('email') }}">
                                    @error('email')
                                        <div className="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Mobile No</label>
                                    <input name="phone" class="form-control @error('phone') is-invalid @enderror"
                                        type="text" placeholder="+123 456 789" value="{{ old('phone') }}">
                                    @error('phone')
                                        <div className="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>


                                <div class="col-md-6 form-group">
                                    <label>Country {{old('countries_id')}}</label>
                                    <select name="countries_id"
                                        class="form-control @error('countries_id') is-invalid @enderror">
                                        <option value="">Select Country</option>
                                        <option value="1" @if(old('countries_id')==1) selected="selected" @endif>Myanmar</option>
                                        <option value="2" @if(old('countries_id')==2) selected="selected" @endif>Chaina</option>
                                        <option value="3" @if(old('countries_id')==3) selected="selected" @endif selected>Algeria</option>
                                    </select>
                                    @error('countries_id')
                                        <div className="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>City</label>
                                    <input name="city" class="form-control @error('city') is-invalid @enderror"
                                        type="text" placeholder="New York" value="{{ old('city') }}">
                                    @error('city')
                                        <div className="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-12 form-group">
                                    <label>Address</label>
                                    <input name="address" class="form-control @error('address') is-invalid @enderror"
                                        type="text" placeholder="123 Street" value="{{ old('address') }}">
                                    @error('address')
                                        <div className="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            @endguest

                            @auth('cus')
                                @foreach ($addresses as $address)
                                    <div class="col-md-12">
                                        <div class="custom-control custom-checkbox">
                                            <input name="deli_id" type="radio" checked class="custom-control-input"
                                                id="oldadd_{{ $address->id }}" value="{{ $address->id }}">
                                            <label class="custom-control-label" for="oldadd_{{ $address->id }}">
                                                {{ $address->city }},{{ $address->address }}
                                            </label>
                                        </div>
                                    </div>
                                @endforeach
                                @if ($addresses->count() == 0)

                                    <div class="col-md-12 form-group">
                                        <label>Mobile No</label>
                                        <input name="phone" class="form-control @error('phone') is-invalid @enderror"
                                            type="text" placeholder="+123 456 789" value="{{ old('phone') }}" required>
                                        @error('phone')
                                            <div className="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>


                                    <div class="col-md-6 form-group">
                                        <label>Country</label>
                                        <select name="countries_id"
                                            class="form-control @error('countries_id') is-invalid @enderror">
                                            <option value="">Select Country</option>
                                            <option value="1" @if(old('countries_id')==1) selected="selected" @endif>Myanmar</option>
                                            <option value="2" @if(old('countries_id')==2) selected="selected" @endif>Chaina</option>
                                            <option value="3" @if(old('countries_id')==3) selected="selected" @endif selected>Algeria</option>
                                        </select>
                                        @error('countries_id')
                                            <div className="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>City</label>
                                        <input name="city" class="form-control @error('city') is-invalid @enderror"
                                            type="text" placeholder="New York" value="{{ old('city') }}" required>
                                        @error('city')
                                            <div className="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <label>Address</label>
                                        <input name="address" class="form-control @error('address') is-invalid @enderror"
                                            type="text" placeholder="123 Street" value="{{ old('address') }}" required>
                                        @error('address')
                                            <div className="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                @endif
                            @endauth

                            @guest('cus')
                                <div class="col-md-12 form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input name="deli_id" type="raido" checked class="custom-control-input"
                                            id="newaccount" value="99">
                                        <label class="custom-control-label" for="newaccount">Create an account</label>
                                    </div>
                                </div>
                            @endguest


                        </div>
                    </div>

                </div>
                <div class="col-lg-4">
                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Order
                            Total</span></h5>
                    <div class="bg-light p-30 mb-5">
                        <div class="border-bottom">
                            <h6 class="mb-3">Products</h6>
                            <?php $subTotal = 0; ?>
                            @foreach ($orderItems as $cartItem)
                                <div class="d-flex justify-content-between">
                                    <p>{{ $cartItem['product']['name'] }} <small>{{ $cartItem['product']['unit_rate'] }} X
                                            {{ $cartItem['qty'] }} </small></p>
                                    <p>{{ $cartItem['product']['unit_rate'] * $cartItem['qty'] }} </p>
                                </div>
                                <?php $subTotal += $cartItem['product']['unit_rate'] * $cartItem['qty']; ?>
                            @endforeach

                        </div>
                        <div class="border-bottom pt-3 pb-2">
                            <div class="d-flex justify-content-between mb-3">
                                <h6>Subtotal</h6>
                                <h6>{{ $subTotal }}</h6>
                            </div>
                            <div class="d-flex justify-content-between">
                                <h6 class="font-weight-medium">Shipping</h6>
                                <h6 class="font-weight-medium">0</h6>
                            </div>
                        </div>
                        <div class="pt-2">
                            <div class="d-flex justify-content-between mt-2">
                                <h5>Total</h5>
                                <h5>{{ $subTotal }}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="mb-5">



                        <h5 class="section-title position-relative text-uppercase mb-3"><span
                                class="bg-secondary pr-3">Payment</span></h5>
                        <div class="bg-light p-30">
                            <div class="form-group">
                                <div class="custom-control custom-radio">
                                    <input name="payments_id" type="radio" class="custom-control-input" id="paypal"
                                        value="1"
                                        {{ old('payments_id') == 1 ? 'checked' : '' }}
                                        >
                                    <label class="custom-control-label" for="paypal">Paypal</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-radio">
                                    <input name="payments_id" type="radio" class="custom-control-input"
                                        id="directcheck" value="2"
                                        {{ old('payments_id') == 2 ? 'checked' : '' }}
                                        >
                                    <label class="custom-control-label" for="directcheck">Direct Check</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-radio">
                                    <input name="payments_id" type="radio" class="custom-control-input"
                                        id="banktransfer" value="3"
                                        {{ old('payments_id') == 3 ? 'checked' : '' }}
                                        >
                                    <label class="custom-control-label" for="banktransfer">Bank Transfer</label>
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <div class="custom-control custom-radio">
                                    <input name="payments_id" type="radio" class="custom-control-input" id="cod"
                                        value="4"
                                        {{ old('payments_id') == 4 ? 'checked' : '' }}
                                        >
                                    <label class="custom-control-label" for="cod">COD</label>
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
