@section('title')
بازیابی رمز عبور
@endsection

@include('home.layouts.header')

@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center" id="responsive-nav-menu-pc">
        <div class="col-md-8" style="width: 700px;">
            <div class="card">
                <div class="card-header">{{ __('تنظیم رمز عبور جدید') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                                <div class="row mb-3">
                                    <label style="font-size: 13px;" for="email" class="col-md-2 col-form-label text-md-end">{{ __('ایمیل') }}</label>

                                    <div class="col-md-9">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="row">
                                    <label style="font-size: 13px;" for="password" class="col-md-2 col-form-label text-md-end">{{ __('رمز عبور جدید') }}</label>

                                    <div class="col-md-9 mb-3">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label style="font-size: 13px;" for="password-confirm" class="col-md-2 col-form-label text-md-end">{{ __('تایید رمز جدید') }}</label>

                                    <div class="col-md-9">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>

                                <div class="row mb-0">
                                    <div class="col-md-8 offset-md-2">
                                        <button class="btn btn-primary">{{ __('تنظیم رمز عبور جدید') }}</button>
                                    </div>
                                </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@include('home.layouts.footer')

@endsection

