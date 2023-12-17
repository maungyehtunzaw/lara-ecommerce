@extends('layouts.frontend')
@section('content')
    <div class="d-flex justify-content-center align-items-center rounded-sm">
        <div class="card " style="width: 27rem">
            <div class="card-header">Sign up Account</div>
            <div class="card-body">
                <form action="{{ route('front.postregister') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email"  id="email" placeholder="Enter email" name="email" class="form-control @error('email') is-invalid @enderror"  value="{{old('email')}}"/>
                        @error('email')
                        <div class="invalid-feedback">
                           {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Phone No.</label>
                        <input name="phone" type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" placeholder="Enter Phone" value="{{old('phone')}}">
                        @error('phone')
                        <div class="invalid-feedback">
                           {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter Name"  value="{{old('name')}}">
                        @error('name')
                        <div class="invalid-feedback">
                           {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" >
                        @error('password')
                        <div class="invalid-feedback">
                           {{$message}}
                        </div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Sign Up</button>
                    <a href="{{ route('front.register') }}" class="btn btn-link">Already account?</a>

                </form>
            </div>
        </div>

    </div>
@endsection
