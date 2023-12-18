@extends('layouts.frontend')
@section('title', 'Sign In')
@section('content')
    <div class="d-flex justify-content-center align-items-center rounded-sm">
        <div class="card " style="width: 20rem">

            <div class="card-header text-center">
                <h3>Sign In Account</h3>
                <p>Welcome Back</p>
            </div>
            <div class="card-body">
                <form action="{{ route('front.postlogin') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input name="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            id="email" placeholder="Enter email" value="{{old('email')}}">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                            placeholder="Password">
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="remember">
                            <label class="custom-control-label" for="remember">Remember me</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Sign in</button>
                    <a href="{{ route('front.register') }}" class="btn btn-link">No Account? Sign up</a>

                </form>
            </div>
        </div>

    </div>
@endsection
