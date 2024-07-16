@section('title')
    حساب کاربری
@endsection

@include('home.layouts.header')

<div class="container" id="responsive-nav-menu-pc">

    <div class="row p-1 mb-5 pb-5">

        @include('profile.sidebar')

        <div class="col-lg-9">

            <div class="card my-3 p-3 shadow-sm">

                <div class="row"><!-- start dashboard icons -->

                    <div class="col-lg-4 mb-3">

                        <div class="card d-flex flex-row justify-content-center align-items-center shadow p-4">

                            <i class="fa fa-shopping-cart font-30 me-2" id="custom_my_cart_icon"></i>

                            <div class="d-inline-block text-center">

                                <p class="mb-1 font-15 fw-bold"> {{ \Cart::getContent()->count() }} دوره  </p>

                                <small class="font-10 text-muted">  در انتظار پرداخت  </small>

                            </div>

                        </div>

                    </div>

                    <div class="col-lg-4 mb-3">

                        <div class="card d-flex flex-row justify-content-center align-items-center shadow p-4">

                            <i class="fa fa-globe font-30 me-3" id="custom_courses_icon"></i>

                            <div class="d-inline-block text-center">

                                <p class="mb-1 font-15 fw-bold"> {{ $courses_count }} دوره  </p>

                                <small class="font-10 text-muted">  موجود در سایت  </small>

                            </div>

                        </div>

                    </div>

                    <div class="col-lg-4 mb-3">

                        <div class="card d-flex flex-row justify-content-center align-items-center shadow p-4">

                            <i class="fa fa-graduation-cap font-30 me-3" id="custom_my_course_icon"></i>

                            <div class="d-inline-block text-center">

                                <p class="mb-1 font-15 fw-bold"> <span class="text-primary">{{ $user_courses->count() }}</span> دوره  </p>

                                <small class="font-10 text-muted">شرکت کرده اید </small>

                            </div>

                        </div>

                    </div>


                </div><!-- end dashboard icons -->

                <div class="row mt-4 mx-1 rounded p-3 shadow-sm"><!-- start notifications -->

                    <span class="font-16 mb-2"><i class="fa fa-bell align-middle font-18 me-2" style="color: #2ecc71"></i>جدیدترین دوره های منتشر شده</span>

                    @foreach($courses as $course)
                    <div class="col-12 shadow-sm mt-2">

                        <div class="d-flex justify-content-between align-items-center mt-4">

                            <a href="{{ route('home.course' , ['course' => $course->slug]) }}" target="_blank"><p class="font-13">{{ $course->title }} منتشر شد</p></a>

                            <span class="font-13 text-muted">{{ verta($course->created_at)->formatDifference() }}<i class="fa fa-rocket text-danger font-14 ms-2"></i></span>

                        </div>

                        <p class="font-13 text-justify line-height vazir-font text-secondary">
                            @php
                            echo \Str::limit(strip_tags($course->description) , 400)
                            @endphp
                        </p>

                    </div>
                    @endforeach

                </div><!-- end notifications -->

            </div>

        </div>

    </div>

</div>


@include('home.layouts.footer')
