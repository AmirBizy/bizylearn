@section('title')
ثبت نام
@endsection

@include('home.layouts.header')

@extends('layouts.app')

@section('content')
<form method="POST" action="{{ route('register') }}" class="mb-5">
@csrf
<div class="d-md-flex half">
    <div class="contents">

      <div class="container" id="responsive-nav-menu-pc">
        <div class="row align-items-center justify-content-center">

          <a href="{{ route('home.index') }}" id="login_logo_link"><img id="login_logo" src="{{ url('web_images/'.$web_setting->logo) }}" alt=""></a>

          <div class="col-md-12">
            <div class="form-block mx-auto">
              <div class="text-center mb-5">
                <h4 class="text-uppercase" style="display: inline-flex;">

                    <a href="{{ route('register') }}" id="custom_login_btn">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-add" viewBox="0 0 16 15">
                                <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0Zm-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z"/>
                                <path d="M8.256 14a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z"/>
                            </svg>
                            ثبت نام
                        </div>
                    </a>

                    <a href="{{ route('login') }}" class="" id="custom_register_btn">
                        <div>
                            ورود
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 10">
                                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                            </svg>
                        </div>
                    </a>
                </h3>
              </div>

              <form action="#" method="post">

                <div class="form-group first mb-4">
                    <label for="name">نام کاربری</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control mt-2" id="name">
                      @error('name')
                          <div class="text-danger">{{ $message }}</div>
                      @enderror
                </div>

                <div class="form-group first mb-4">
                  <label for="email">ایمیل</label>
                  <input type="text" name="email" value="{{ old('email') }}" class="form-control mt-2" id="email">
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group last mb-3 mt-3">
                  <label for="password" class="mb-2">رمز عبور</label>
                  <input type="password" name="password" class="form-control" id="password">
                  @error('password')
                      <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>

                <div class="form-group last mb-3 mt-3">
                    <label for="password_confirmation" class="mb-2">تکرار رمز عبور</label>
                    <input type="password" name="password_confirmation" class="form-control" id="password_confirmation">
                    @error('password_confirmation')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>

                <div class="row mb-3">
                    <div class="col-md-12">
                        <div id="form_1_id" name="form_1_id"></div>
                        {!!  GoogleReCaptchaV2::render('form_1_id') !!}

                        @if ($errors->has('g-recaptcha-response'))
                        <div class="text-danger">{{ $errors->first('g-recaptcha-response') }}</div>
                        @endif
                    </div>
                </div>

                <button type="submit" id="custom_btn_login">ثبت نام</button>

                {{-- <span class="text-center my-3 d-block">یا</span>
                <div class="">
                <a href="#" class="btn btn-block py-2 btn-google"><span class="icon-google mr-3"></span> ثبت نام با گوگل</a>
                </div> --}}

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>
@include('home.layouts.footer')
@endsection
