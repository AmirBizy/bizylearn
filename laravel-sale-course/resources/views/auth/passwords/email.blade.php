
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
                <div class="card-header">{{ __('بازیابی رمز عبور') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="col-md-12">
                            @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            @endif

                            @if (session('status') == 'verification-link-sent')
                                <div class="row mb-3">
                                    <p class="text-success">{{ __('ایمیل فعالسازی برای شما ارسال شد. لطفا صندوق ورودی ایمیل خود را چک کنید') }}</p>
                                </div>
                            @endif
                        </div>




                        <div class="row mb-3">
                            <span class="text-center">
                                ایمیل خود را برای ارسال لینک بازیابی رمز عبور وارد کنید
                            </span>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-2 col-form-label text-md-end">{{ __('ایمیل') }}</label>

                            <div class="col-md-9" id="custom_reset_pass_btn">
                                <input id="email" type="text" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-2">

                                <button class="btn btn-primary">{{ __('ارسال لینک بازیابی') }}</button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('register') }}">
                                        {{ __('حساب کاربری ندارم') }}
                                    </a>
                                @endif
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

