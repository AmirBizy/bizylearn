@section('title')
    دوره های شما
@endsection

@include('home.layouts.header')

<div class="container" id="responsive-nav-menu-pc">

    <div class="row p-1 mb-5 pb-5">

        @include('profile.sidebar')

        <div class="col-lg-9">

            <div class="card my-3 p-3 shadow-sm">

                @if ($user_courses->count() <= 0)
                    <span>شما در دوره ای شرکت نکردید!</span>
                @else
                <div class="row mt-2 mx-1 rounded p-3 shadow-sm"><!-- start notifications -->
                    @foreach($user_courses as $course)
                    <div class="col-12 shadow-sm mt-2">

                        <div class="d-flex justify-content-between align-items-center mt-4">

                            <div>
                                <div class="d-flex">
                                    <img width="100px;" class="rounded" src="{{ url('course_image/' . $course->image) }}" alt="">
                                    <a href="{{ route('home.course' , ['course' => $course->slug]) }}" target="_blank" style="margin-top: 15px; margin-right: 15px;">
                                        @if ($course->type == "رایگان")
                                        <p class="font-13">{{ $course->title }} - <span class="text-success">رایگان</span></p>
                                        @else
                                        <p class="font-13">{{ $course->title }} - <span class="text-dark">{{ number_format($course->price) }} تومان</span></p>
                                        @endif
                                    </a>
                                </div>

                            </div>

                        </div>

                        <p class="font-13 mt-2 text-justify line-height vazir-font text-secondary">
                            @php
                            echo \Str::limit(strip_tags($course->description) , 400)
                            @endphp
                        </p>

                    </div>
                    @endforeach
                    @endif

                </div><!-- end notifications -->

            </div>

        </div>

    </div>

</div>


@include('home.layouts.footer')
