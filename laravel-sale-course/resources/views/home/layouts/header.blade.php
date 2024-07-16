<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ url('assets/css/bootstrap.rtl.css') }}">
    <link rel="stylesheet" href="{{ url('assets/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/style.css') }}">
    <script src="{{ url('assets/js/multinav-jquery.js') }}"></script>
    <script src="{{ url('assets/js/multilevel-nav-js.js') }}"></script>
    @php
        $web_setting = App\Models\WebSetting::first();
    @endphp
    <link rel="shortcut icon" href="{{ url('public/web_images/'.$web_setting->logo) }}">

    <title>@yield('title') - بیزی لرن</title>

    @yield('css')

    {!! SEO::generate() !!}

</head>
<body>

    {{-- <div align="center" id="overLayer" style="max-width: 1270px;">
        <span class="loader">
            <span class="loader-inner"></span>
        </span>
    </div> --}}

    <header class="d-none d-lg-block container-fluid"><!-- start header -->

        <div class="row">
            @php
                $statement = App\Models\Statement::where('status' , '1')->first();
            @endphp
            @if($statement && $statement->expire_date >= verta()->now())
                <div class="col-md-12 p-0">
                    <div id="custom_statement_style" class="alert text-white m-auto text-right alert-dismissible fade show" style="border-radius: 0px !important; background: {{ $statement->color == 'green' ? '#2ecc71' : '' }} {{ $statement->color == 'yellow' ? '#fbc531' : '' }} {{ $statement->color == 'red' ? '#ff7675' : '' }} !important;" role="alert">
                        {!! $statement->text !!}
                        <button type="button" class="btn-close text-white" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endif


            <div class="col-lg-2 rounded" id="bizylearn"><a href="{{ route('home.index') }}"><img src="{{ url('web_images/'.$web_setting->logo) }}" style="width: 100px; margin: 0px 55px; height: auto;" alt="{{ $web_setting->logo }}"></a></div><!-- logo -->

            <div class="col-lg-6 d-flex align-items-center ps-5 pe-0"><!-- start search box -->

                <div class="input-group">
                <form action="{{ route('home.search') }}" class="d-flex" id="custom_search_form">
                    <input type="text" placeholder="دنبال چی میگردی؟" name="keyword" value="<?php if(isset($_GET['keyword'])) echo $_GET['keyword'] ?>">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
                </div>

            </div><!-- end search box -->

            <div class="col-lg-1 d-flex align-items-center justify-content-end"><!-- start shopping bag-->

                <a href="#bizylearn-bag" class="position-relative" style="left: -60px;" data-bs-toggle="offcanvas"><i class="fa fa-shopping-cart custom-shop-nav-icon"></i>
                    <div class="count">{{ \Cart::getContent()->count() }}</div>
                </a>

                <div class="offcanvas offcanvas-end" tabindex="-1" data-bs-scroll="true" id="bizylearn-bag"><!-- start shopping bag side bar -->

                    @if (\Cart::getContent()->count() >= 1)
                    <div class="offcanvas-header mb-3"><!-- start bag header -->

                        <p class="offcanvas-title font-12">سبد خرید ({{ \Cart::getContent()->count() }} دوره)</p>

                        <button type="button" data-bs-dismiss="offcanvas" style="border: none; background: none;"><i class="fa fa-times"></i></button>

                    </div><!-- end bag header -->

                    <div class="offcanvas-body"><!-- start bag body -->
                        @foreach(\Cart::getContent() as $course)
                        <div class="cart-item d-flex align-items-center justify-content-between position-relative"><!-- start cart item -->

                            <div class="cart-item-detail" style="padding: 10px;">

                                <img style="width: 80px; border-radius: 5px;" src="{{ url('course_image/' . $course->attributes->image) }}" alt="">

                                <a href="{{ $course->attributes->slug }}" target="_blank">{{ $course->name }}</a>

                                <p class="font-12 text-muted mt-3">
                                    @if($course->price == '0' && $course->sale_price == null)
                                        رایگان
                                    @elseif($course->price !== '0' && $course->sale_price !== null)
                                        <span style="text-decoration: line-through;" class="text-danger">{{ number_format($course->price) }}</span> <span>{{ number_format($course->sale_price) }}</span> تومان
                                    @elseif($course->price !== '0' && $course->sale_price == null)
                                        <span style="color: #2ecc71;">{{ number_format($course->price) }}</span> تومان
                                    @else
                                        <span>{{ number_format($course->price) }}</span>
                                    @endif
                                </p>

                            </div>

                            <form action="{{ route('destroy.from.cart' , ['course' => $course->id]) }}" method="POST">
                                @csrf
                                @method('POST')
                                <button class="delete-item"><i class="fa fa-times font-14"></i></button>
                            </form>

                        </div><!-- end cart item -->
                        @endforeach
                    </div><!-- end bag body -->

                    <div class="d-flex justify-content-center align-items-center px-3">

                        <p class="font-13"> مبلغ کل:</p>

                        <p class="font-13" style="margin-right: 5px;">
                            <span style="color: #2ecc71;">{{ number_format(\Cart::getTotal()) }}</span> تومان
                        </p>

                    </div>

                    <div class="d-flex">

                        <form action="{{ route('payment.gateway') }}" class="mt-3 w-50" method="POST">
                            @csrf
                            @method('POST')
                            <button style="width: 95%;" class="font-13 m-2 p-2" id="custom_checkout_button">پرداخت</button>
                        </form>

                        <a href="{{ route('carts.index') }}" class="font-13 w-50" id="custom_cart_button_page">مشاهده سبد خرید</a>

                    </div>
                    @else
                    <button type="button" data-bs-dismiss="offcanvas" style="border: none; background: none; margin-right: 240px; margin-top: 15px;"><i class="fa fa-times"></i></button>

                        <div class="m-auto">
                            <span class="text-center" style="color: #3498db;">سبد خرید شما خالی است</span>
                        </div>
                    @endif

                </div><!-- end shopping bag side bar -->

            </div><!-- end shopping bag-->

            <div class="col-lg-2 d-flex align-items-center justify-content-center signup-login" style="margin-right: 45px;"><!-- satrt signup & login -->

                @guest
                @if (Route::has('register'))
                <a href="{{ route('register') }}" class="btn-signup">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-add" viewBox="0 0 16 15">
                        <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0Zm-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z"/>
                        <path d="M8.256 14a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z"/>
                    </svg>
                    عضویت
                </a>
                @endif

                @if (Route::has('login'))
                <a href="{{ route('login') }}" class="btn-login">
                    ورود
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 11">
                        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                    </svg>
                </a>
                @endif

                @else

                <div class="btn-group" style="max-width: 240px;">
                    <nav id="navbar" class="navbar" style="padding-top: 15px;">
                        <ul style="direction: rtl;">
                          <li class="dropdown" style="padding: 0;"><button href="#" id="collapse-btn-category" class="border-0 bg-transparent">
                            <span>
                                @if(auth()->user()->profile !== null)
                                <img src="{{ url('images/'.auth()->user()->profile) }}" style="width: 33px; border-radius: 50%; height: 33px; margin-left: 5px;" alt="">
                                @endif
                                {{ \Str::limit(Auth::user()->name , 15) }}
                            </span> <i class="bi bi-chevron-down"></i></button>
                            <ul>
                                @if(auth()->user()->hasRole('admin|support|writer'))
                                <li><a href="{{ route('admin.admin_index') }}" target="_blank">مدیریت</a></li>
                                @endif
                                <li><a href="{{ route('profile.edit') }}">حساب کاربری</a></li>
                                <li>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();" id="btn-logout-pc">{{ __('خروج') }}</a>
                                </li>
                            </ul>
                          </li>
                        </ul>
                        <i class="bi bi-list mobile-nav-toggle"></i>
                      </nav><!-- .navbar -->
                </div>

                @endguest

            </div><!-- end signup & login -->

        </div>

    </header><!-- end header -->


    <header class="d-lg-none container-fluid pt-4 px-4"><!-- start responsive header -->

        <div class="row" id="custom_row_nav_mobile">

            <div class="d-flex">
                <div class="col-4 ps-0">
                    <a href="#mobile-menu" data-bs-toggle="offcanvas" class="d-block m-4"><i class="fa fa-bars header-icon"></i></a>
                </div><!-- logo -->

                <div class="col-4 d-flex align-items-center justify-content-center">

                    <div class="offcanvas offcanvas-end" tabindex="-1" data-bs-scroll="true" id="bizylearn-bag-responsive"><!-- start shopping bag side bar -->

                        <div class="offcanvas-header mb-3"><!-- start bag header -->

                            <p class="offcanvas-title font-12">سبد خرید ({{ \Cart::getContent()->count() }} دوره)</p>

                            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>

                        </div><!-- end bag header -->

                        <div class="offcanvas-body"><!-- start bag body -->

                            @foreach(\Cart::getContent() as $course)
                            <div class="cart-item d-flex align-items-center justify-content-between"><!-- start cart item -->

                                <div class="cart-item-detail" style="padding: 10px;">

                                    <img style="width: 80px; border-radius: 5px;" src="{{ url('course_image/' . $course->attributes->image) }}" alt="">

                                    <a href="{{ $course->attributes->slug }}" target="_blank">{{ $course->name }}</a>

                                    <p class="font-12 text-muted mt-3">
                                        @if($course->price == '0' && $course->sale_price == null)
                                            رایگان
                                        @elseif($course->price !== '0' && $course->sale_price !== null)
                                            <span style="text-decoration: line-through;" class="text-danger">{{ number_format($course->price) }}</span> <span>{{ number_format($course->sale_price) }}</span> تومان
                                        @elseif($course->price !== '0' && $course->sale_price == null)
                                            <span>{{ number_format($course->price) }}</span> تومان
                                        @else
                                            <span>{{ number_format($course->price) }}</span>
                                        @endif
                                    </p>

                                </div>

                                <form action="{{ route('destroy.from.cart' , ['course' => $course->id]) }}" method="POST">
                                    @csrf
                                    @method('POST')
                                    <button class="delete-item"><i class="fa fa-times font-14"></i></button>
                                </form>

                            </div><!-- end cart item -->
                            @endforeach

                        </div><!-- end bag body -->

                        <div class="d-flex justify-content-center align-items-center px-3 pt-3">

                            <p class="font-13">مبلغ کل :</p>

                            <p class="font-13">
                                {{ number_format(\Cart::getTotal()) }} تومان
                            </p>

                        </div>

                        <form action="{{ route('payment.gateway') }}" class="mt-3" method="POST">
                            @csrf
                            @method('POST')
                            <button style="width: 94%;" class="btn btn-info font-13 m-2 p-2">پرداخت</button>
                        </form>

                        <a href="{{ route('carts.index') }}" class="btn btn-secondary font-13 m-2 p-2">مشاهده سبد خرید</a>

                    </div><!-- end shopping bag side bar -->

                    <a href="{{ route('home.index') }}">
                        <img src="{{ url('web_images/'.$web_setting->logo) }}" class="rounded" style="width: 70px; height: auto;" alt="{{ $web_setting->logo }}">
                    </a>

                    <div class="offcanvas offcanvas-start" tabindex="-1" data-bs-scroll="true" id="mobile-menu"><!-- start responsive menu -->

                        <div class="offcanvas-body">
                            <a href="{{ route('home.index') }}" class="d-table m-auto"><img class="m-auto d-block mt-4 rounded" src="{{ url('web_images/'.$web_setting->logo) }}" style="width: 50px; height: auto;" alt="{{ $web_setting->logo }}"></a>
                            <div class="d-flex align-items-center justify-content-center signup-login mt-3"><!-- start signup & login -->

                            <div class="btn-group">
                                <form action="{{ route('home.search') }}" id="custom_search_form" style="position: relative; width: 270px">
                                    <input type="text" name="keyword" value="<?php if(isset($_GET['keyword'])) echo $_GET['keyword'] ?>" class="rounded" placeholder="دنبال چی میگردی؟">
                                    <button type="submit" id="custom_mobile_serach_btn">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </form>
                            </div>

                            </div><!-- end signup & login -->

                            <ul class="responsive-menu-level-1 ps-0 mt-4"><!-- start menu level 1 -->

                                @auth
                                    @if (\Cart::getContent()->count() >= 1)
                                    <div class="col-lg-1 d-flex align-items-center mb-3" style="margin-right: 15px"><!-- start shopping bag-->
                                        <a href="{{ route('carts.index') }}" class="position-relative me-1">
                                            <i class="fa fa-shopping-cart my-shop-icon"></i>
                                            <div class="count-mobile">{{ \Cart::getContent()->count() }}</div>
                                        </a>
                                        <a href="{{ route('carts.index') }}" style="font-size: 13px;">سبد خرید</a>
                                    </div>
                                    @endif
                                @endauth

                                <li class="menu-item"><a href="{{ route('home.index') }}">بیزی لرن</a></li>

                                <li class="menu-item"><a href="{{ route('home.page.article') }}">مقالات</a></li>

                                <li class="menu-item"><a href="{{ route('contact.index') }}">تماس با ما</a></li>

                                @foreach ($valed_categories as $valed_category)
                                    <li class="menu-item"><a href="{{ route('home.category' , ['category' => $valed_category->slug]) }}">{{ $valed_category->name }}</a></li>
                                @endforeach

                                @foreach ($categories as $category)
                                <li class="menu-item has-sub-menu" style="position: relative;">

                                    <a style="position: absolute;left: 25px; cursor: pointer; bottom: 0; top: 0px;">
                                        @foreach ($subcategories as $sub_category) @endforeach
                                            @if ($sub_category->status == 1)
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                                            </svg>
                                            @endif
                                        <a id="custom_mobile_nav_id" href="{{ route('home.category' , ['category' => $category->slug]) }}">{{ $category->name }} </a>
                                    </a>

                                    <ul class="responsive-menu-level-2 ps-0 mb-4"><!-- start menu level 2 -->
                                        @foreach ($subcategories as $baby_category)
                                            @if($baby_category->parent == $category->id)
                                            <li class="menu-item-2"><a href="{{ route('home.category' , ['category' => $baby_category->slug]) }}">{{ $baby_category->name }}</a></li>
                                            @endif
                                        @endforeach
                                    </ul><!-- end menu level 2 -->

                                </li>
                                @endforeach

                            </ul><!-- end menu level 1 -->

                        </div>

                    </div><!-- end responsive menu -->

                </div>

                <div class="col-4 pt-4" id="custom_login_icon_mobile">
                    @auth
                    <div class="dropdown" id="custom_username_box">
                        <button id="custom_out_mobile_button" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                @if(auth()->user()->profile !== null)
                                <img src="{{ url('images/'.auth()->user()->profile) }}" id="custom_mobile_profile" alt="">
                                @else
                                {{ auth()->user()->name }}
                                @endif
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('profile.edit') }}"><span class="d-flex justify-content-center p-2 text-secondary" style="word-break: break-all;">{{ auth()->user()->name }}</span></a></li>
                            @if(auth()->user()->hasRole('admin|support|writer'))
                            <li><a class="dropdown-item p-2 d-flex justify-content-center" href="{{ route('admin.admin_index') }}" target="_blank">مدیریت</a></li>
                            @endif
                            <li>
                            <a class="dropdown-item p-2 d-flex justify-content-center text-danger" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('خروج از حساب') }}
                            </a>
                            </li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </ul>
                      </div>
                      @else
                        @if (Route::has('login'))
                            <a href="{{ route('login')}}" id="custom_login_mobile">
                                <i>
                                    {{-- <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                                    </svg> --}}
                                    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                                    </svg>
                                </i>
                            </a>
                        @endif
                      @endauth
                </div>
            </div>

        </div>

        <div class="row"><!-- start search box -->

            <div class="col-12 collapse py-3" id="search">

                <div class="input-group">

                    <input type="search" class="form-control form-control-lg"  placeholder="چی دوست داری یاد بگیری ؟! ...">

                    <button type="submit" class="btn btn-secondary"></button>

                </div>

            </div><!-- end search box -->

        </div><!-- end responsive search box -->

    </header><!-- end header -->


    <nav class="d-none d-lg-block navigation shadow-sm"><!-- start nav menu -->

        <div id="custom-nav-style">

            <ul class="main-menu" id="custom-main-menu-style">

                <li><a href="{{ route('home.index') }}">بیزی لرن</a></li>
                <li><a href="{{ route('course.index') }}">دوره ها</a></li>


                <li>

                    <nav id="navbar" class="navbar" style="padding-bottom: 0;">
                        <ul style="direction: rtl;">
                          <li class="dropdown"><button id="collapse-btn-category"><span>دسته بندی</span> <i class="bi bi-chevron-down"></i></button>
                            <ul>

                            @foreach ($categories as $category)
                              <li class="dropdown"><a href="{{ route('home.category' , ['category' => $category->slug]) }}"><span>{{ $category->name }}</span> <i class="bi bi-chevron-left"></i></a>
                                <ul id="custom-nav-list">
                                @foreach ($subcategories as $baby_category)
                                @if($baby_category->parent == $category->id)
                                  <li><a href="{{ route('home.category' , ['category' => $baby_category->slug]) }}">{{ $baby_category->name }}</a></li>
                                @endif
                                @endforeach
                                </ul>
                              </li>
                            @endforeach

                            @foreach ($valed_categories as $valed_category)
                                <li><a href="{{ route('home.category' , ['category' => $valed_category->slug]) }}">{{ $valed_category->name }}</a></li>
                            @endforeach

                            </ul>
                          </li>
                        </ul>
                        <i class="bi bi-list mobile-nav-toggle"></i>
                      </nav><!-- .navbar -->

                </li>


                <li><a href="{{ route('home.page.article') }}">مقالات</a></li>

                <li><a href="{{ route('contact.index') }}">تماس با ما</a></li>

            </ul>

        </div>

    </nav><!-- end nav menu -->
