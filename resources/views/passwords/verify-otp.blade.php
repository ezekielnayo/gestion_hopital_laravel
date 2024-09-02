// resources/views/auth/passwords/verify-otp.blade.php

@extends('app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Vérifier le Code OTP') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.verifyOtp') }}">
                        @csrf

                        <div class="form-group">
                            <label for="otp">{{ __('Code OTP') }}</label>
                            <input id="otp" type="text" class="form-control @error('otp') is-invalid @enderror" name="otp" required autofocus>

                            @error('otp')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-0">
                            <button type="submit" class="btn btn-primary btn-block">
                                {{ __('Vérifier') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
