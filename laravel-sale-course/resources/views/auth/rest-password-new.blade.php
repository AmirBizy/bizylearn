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
                    <form method="POST" action="{{ route('password.store') }}">
                        @csrf

                        <div class="col-md-12">
                            @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            @endif
                        </div>

                        <div class="row mb-3">
                            <div>
                                <x-input-label for="email" :value="__('Email')" />
                                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-2">
                                <div id="form_1_id" name="form_1_id"></div>
                                {!!  GoogleReCaptchaV2::render('form_1_id') !!}
                                @error('form_1_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-2">
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('فراموشی رمز عبور') }}
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

