@section('title')
    سبد خرید
@endsection

@include('home.layouts.header')

<div class="container" id="responsive-nav-menu-pc">

    <div class="row p-1 mb-5 pb-5">

        @include('profile.sidebar')

        <div class="col-lg-9">

            <div class="card my-3 p-3 shadow-sm">

                <div class="row mt-2 mx-1 rounded p-3 shadow-sm"><!-- start notifications -->
                    @if (\Cart::getContent()->count() >= 1)
                    <span class="font-13 mb-3">( <span class="text-primary">{{ \Cart::getContent()->count() }}</span> ) دوره در انتظار پرداخت</span>
                    @else
                    <span class="font-13">سبد خرید شما خالی میباشد!</span>
                    @endif

                    @foreach(\Cart::getContent() as $course)
                    <div class="col-12">

                        <div class="d-flex justify-content-between align-items-center" id="custom_carts_box">

                            <div>
                                <div class="d-flex">
                                    <img width="100px;" class="rounded" src="{{ url('course_image/' . $course->attributes->image) }}" alt="">
                                    <a href="{{ $course->attributes->slug }}" target="_blank" style="margin-top: 15px; margin-right: 15px;"><p class="font-13">{{ $course->name }} - <span class="text-dark">{{ number_format($course->price) }} تومان</span></p></a>
                                </div>

                            </div>

                            <form action="{{ route('destroy.from.cart' , ['course' => $course->id]) }}" method="POST">
                                @csrf
                                @method('POST')
                                <button class="font-13" id="custom_delete_cart_icon"><i class="fa fa-trash font-14"></i></button>
                            </form>

                        </div>

                        <p class="font-13 vazir-font line-height">
                            {{ \Illuminate\Support\Str::of(strip_tags($course->description))->words(45, ' ...') }}
                        </p>

                    </div>
                    @endforeach

                </div><!-- end notifications -->

                @if (\Cart::getContent()->count() >= 1)
                <div class="col-md-7">
                    <form action="{{ route('apply.coupon') }}" class="mt-3" method="POST">
                        <span class="d-block" style="padding: 15px 0px;">اگر کد تخفیف دارید در فیلد پایین وارد کنید</span>
                        @csrf
                        @method('POST')
                        <div class="d-flex">
                            <input type="text" name="code" id="custom_search_form">
                            <button type="submit" class="w-50">اعمال کد</button>
                        </div>
                    </form>
                </div>
                @endif

                @if (\Cart::getContent()->count() >= 1)
                <span class="mt-5">مبلغ کل: <span style="color:#2ecc71;">{{ number_format(\Cart::getTotal()) }}</span> تومان</span>
                <form action="{{ route('payment.gateway') }}" class="mt-3" method="POST">
                    @csrf
                    @method('POST')
                    <button id="custom_success_btn">ادامه فرایند خرید</button>
                </form>
                @endif

            </div>

        </div>

    </div>

</div>


@include('home.layouts.footer')
