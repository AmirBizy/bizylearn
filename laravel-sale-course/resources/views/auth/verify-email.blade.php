@section('title')
تایید حساب کاربری
@endsection

@include('home.layouts.header')

@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center" id="responsive-nav-menu-pc">
        <div class="col-md-8" style="width: 700px;">
            <div class="card">
                <div class="card-header">{{ __('تایید حساب کاربری') }}</div>

                <div class="card-body">

                        <div class="row mb-3">
                            <p>{{ __('لطفا برای ادامه فعالیت ایمیل خود را تایید کنید') }}</p>
                        </div>

                        @if (session('status') == 'verification-link-sent')
                        <div class="row mb-3">
                            <p class="text-success">{{ __('ایمیل فعالسازی برای شما ارسال شد. لطفا صندوق ورودی ایمیل خود را چک کنید') }}</p>
                        </div>
                        @endif

                        <div class="row mb-3">

                            <div class="col-md-6" style="margin-left: -150px;">
                                <form method="POST" action="{{ route('verification.send') }}">
                                    @csrf

                                    <div>
                                        <x-primary-button>
                                            {{ __('ارسال ایمیل فعالسازی') }}
                                        </x-primary-button>
                                    </div>
                                </form>
                            </div>

                            <div class="col-md-6">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <div>
                                        <x-primary-button id="hover_verify_email">
                                            {{ __('خروج از حساب') }}
                                        </x-primary-button>
                                    </div>
                                </form>
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

