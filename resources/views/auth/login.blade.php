@extends('layouts.guest')
@section('title', 'Admin Login')
@section('content')
<div class="row">
    <div class="col-md-4 col-sm-12 offset-md-4">
        <div class="card">
            <div class="card-header text-center">
               <img src="{{ asset('img/logo.png') }}" alt="" width="100px">
               <h3 class="my-2">Administration</h3>
               <p>yeye@gmial.com / yeyeyeye</p>
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email Address -->
                    <div>
                        <label for="email" class="form-label">{{ __('Email') }}</label>
                        <input id="email" class="form-control @error('email') is-invalid @enderror" type="email"
                            name="email" value="{{ old('email') }}" required autofocus autocomplete="username" />
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <label for="password" class="form-label">{{ __('Password') }}</label>
                        <input id="password" class="form-control" type="password" name="password" required
                            autocomplete="current-password" />

                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Remember Me -->

                    <div class="form-check my-3">
                        <input name="remember_me" class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                        <label class="form-check-label" for="defaultCheck1">
                            {{ __('Remember me') }}
                        </label>
                      </div>

                    <div class="">
                        {{-- @if (Route::has('password.request'))
                            <a class="btn btn-link"
                                href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif --}}

                        <button  class="btn btn-primary">
                            {{ __('Log in') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
