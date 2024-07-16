@section('title')
    {{ $course->title }}
@endsection

@include('home.layouts.header')

    <div class="container-fluid" id="responsive-title-pc">

        <div class="row">

            <div>
                <div>
                    <h1 class="mb-2 mt-4 line-height" style="font-size: 20px;"><b>{{ $course->title }}</b></h1>
                    <span class="font-12">
                        <a href="{{ route('home.index') }}" class="mx-1" id="hover_sm_btn">بیزی لرن</a> /
                        <a href="{{ route('course.index') }}" class="mx-1" id="hover_sm_btn">دوره ها</a> /
                        <a href="{{ route('home.course' , ['course' => $course->slug]) }}" class="mx-1" id="hover_sm_btn">{{ $course->title }}</a>
                    </span>
                </div>
                {{-- @if ($course->sale_price !== null)
                @php
                    $off_price = (($course->price - $course->sale_price) / $course->price) * 100;
                @endphp
                <div>
                    <span>
                        قیمت این دوره با تخفیف {{ $off_price . '%' }} : <span style="color: #6fc341;">{{ number_format($course->sale_price) . ' تومان' }}</span>
                    </span>
                </div>
                @endif --}}
            </div>

            <div class="col-lg-8 mt-4 m-auto"><!-- start course content -->

                <div id="custom_lg_8" style="padding: 12px; border-radius: 10px;">
                    <img src="{{ url('course_image/'.$course->image) }}" class="img-fluid rounded my-course-image">
                    <div>

                        <div id="custom_content_article" class="line-height">
                           {!! $course->description !!}
                        </div>

                        <p class="font-14 my-3">سر فصل ها  :</p>

                        @if($course_videos)
                            @foreach($course_videos as $key => $course_video)
                                @if($course_video->type == 'رایگان')
                                    <div class="d-flex align-items-center justify-content-between rounded mb-3 p-3" id="custom_download_course_box"><!-- start course list item -->

                                        <div class="d-flex align-items-center">

                                            <i class="fa fa-check" id="custom_icon_course"></i>

                                            <p class="font-13 vazir-font mt-3 {{ \Str::length(strip_tags($course_video->description)) >= 113 ? 'px-3 ms-0' : 'ms-2' }}">{{ $numb_row++ }} - {{ strip_tags($course_video->description) }}</p>

                                        </div>

                                        <a href="{{ route('file.access' , ['video_url' => $course_video->video_url]) }}" class="d-flex align-items-center"><span style="margin-left: 10px;">{{ $course_video->video_time }}</span><i class="fa fa-download text-muted"></i></a>

                                    </div><!-- end course list item -->
                                @else
                                    <div class="d-flex align-items-center justify-content-between rounded mb-3 p-3" id="custom_download_course_box"><!-- start course list item -->

                                        <div class="d-flex align-items-center">
                                            @if ($transaction->first() !== null)
                                            <i class="fa fa-check play-icon"></i>
                                            @else
                                            <i class="fa fa-lock lock-icon"></i>
                                            @endif
                                            <p class="font-13 vazir-font mt-3 {{ \Str::length(strip_tags($course_video->description)) >= 113 ? 'px-3 ms-0' : 'ms-2' }}">{{ $numb_row++ }} - {{ strip_tags($course_video->description) }}</p>

                                        </div>

                                        <a href="{{ route('file.download' , ['video_url' => $course_video->video_url]) }}" class="d-flex align-items-center"><span style="margin-left: 10px;">{{ $course_video->video_time }}</span><i class="fa fa-download text-muted"></i></a>

                                    </div><!-- end course list item -->
                                @endif
                            @endforeach
                        @else
                            <span class="text-warning">هنوز جلسه ای برای این دوره منتشر نشده!</span>
                        @endif
                    </div>
                </div>

                <div id="custom_lg_8" class="mt-5" style="border-radius: 10px;">
                    <div class="">
                        @if(auth()->check())
                        <form action="{{ route('home.send.comment' , ['course' => $course->id]) }}" method="POST">
                            @csrf
                            @method('POST')
                            <div class="container-fluid" style="padding: 1px 10px;"><!-- start send comment -->

                                @if ($comments->count() <= 0)
                                <span class="font-14" style="padding: 10px 0px 0px 0px; display: block;">هنوز دیدگاهی برای این دوره ثبت نشده! <span class="text-success">شما اولین نفر باشید</span></span>
                                @endif

                                <p class="font-14 mt-4" id="text-error" style="width: 300px;">دیدگاه خود را ارسال کنید @if ($comments->count() >= 1) <span class="text-primary">( {{ $comments->count() }} دیدگاه )</span> @endif</p>
                                <p id="test-p">دقت کنید که دیدگاه شما پس از تایید مدیر در سایت قرار میگیرد</p>

                                @if(count($errors) > 0)
                                    <div class="mb-3">
                                        @foreach($errors->all() as $error)
                                            <script>
                                                Alert::warning($error)->autoClose(5000);
                                                return redirect()->back();
                                            </script>
                                        @endforeach
                                    </div>
                                @endif

                                <div class="row mt-3">
                                    <div class="col-12">
                                        <textarea id="text-box" class="form-control" name="text" rows="5" placeholder="متن دیدگاه شما">{{ old('text') }}</textarea>
                                        <button type="submit" id="comment-form" class="float-end font-13 my-3 radius-btn rounded w-auto">ثبت دیدگاه</button>
                                    </div>
                                </div>
                            </div><!-- end send comment -->
                        </form>
                    @else
                        <div class="container-fluid"><!-- start send comment -->
                            <div class="row mt-3">
                                <div class="col-12">
                                    <div id="comment_course_box" style="margin: 15px;">
                                        <a href="{{ route('login') }}" id="custom_login_btn"><span>برای ارسال دیدگاه ابتدا وارد حساب کاربری خود شوید</span></a>
                                    </div>
                                </div>
                            </div>

                        </div><!-- end send comment -->
                    @endif

                    @foreach($comments as $comment)
                    <div class="container-fluid mt-5" style="padding: 1px 15px;"><!-- start comment box -->
                            <div class="mb-3 p-2 pb-3" id="custom_comment_box"><!-- start comment item -->

                                <div class="d-flex justify-content-between align-items-center">

                                    <div class="d-flex">

                                        <div>

                                            <img src="{{ isset($comment->userComment->id) && $comment->userComment->profile ? url('images/'.$comment->userComment->profile) : url('images/users.png') }}" class="comment-pic">

                                        </div>

                                        <div>
                                            <span class="font-13 d-block ms-3 mt-4">{!! isset($comment->userComment->id) ? \Str::words($comment->userComment->name , 7) : 'کاربر' !!}</span>
                                        </div>

                                    </div>

                                    <span class="font-12 text-muted"> <i class="fas fa-clock font-14 me-1"></i> {{ verta($comment->created_at)->formatDifference() }} </span>

                                </div>

                                <p class="font-19 vazir-font line-height" id="custom_user_comment_box">
                                    {!! $comment->text !!}
                                </p>



                                @if($comment->admin_text !== null)
                                    <div class="bg-white p-3 rounded" id="custom_reply_box"><!-- start reply box -->

                                        <div class="justify-content-between align-items-center">

                                            <p class="font-13 text-danger">
                                                @if ($comment->adminReply->profile != null)
                                                <img src="{{ url('images/'.$comment->adminReply->profile) }}" style="margin-left: 10px; width: 60px; height: 60px; border-radius: 50%;" alt="">
                                                @endif
                                                {!! $comment->adminReply->name !!}
                                            </p>

                                        </div>

                                        <p class="font-14 vazir-font line-height">
                                            {!! $comment->admin_text !!}
                                        </p>

                                    </div><!-- end reply box -->
                                @endif

                            </div><!-- end comment item -->
                    </div><!-- end comment box -->
                    @endforeach
                    {{ $comments->links() }}
                    </div>
                </div>

            </div><!-- end course content -->

            <div class="col-lg-4 mt-4 m-auto" id="custom_side_course"><!-- start course details -->

                <div class="col-lg-12">
                    <div id="sidebar_course">

                        <ul class="list-group mt-3">

                            <li class="list-group-item font-15 py-3 d-flex">
                                قیمت دوره :
                                @if($course->type == 'نقدی')
                                    @if($course->sale_price)
                                        <div style="margin-right: 5px;">
                                            <b><del class="text-danger font-15 me-1">{{ number_format($course->price) }} </del></b>
                                            <b><span class="font-15" style="color: #6fc341;">{{ number_format($course->sale_price) }} تومان</span></b>
                                        </div>
                                    @elseif($course->price == 0)
                                        <b><span class="font-15" style="margin-right: 5px; color: #6fc341;">رایگان :)</span></b>
                                    @else
                                        <b><span class="font-15" style="margin-right: 5px; color: #6fc341;">{{ number_format($course->price) }} تومان</span></b>
                                    @endif
                                @else
                                    <b><span class="font-15" style="margin-right: 5px; color: #6fc341;">{{ $course->type }}</span></b>
                                @endif
                            </li>

                            <hr style="color: #d2d2d2">

                            <li class="list-group-item font-13 py-3 text-secondary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-person-check-fill" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                                    <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                </svg>
                                <span style="margin-right: 5px;">مدرس :</span>
                                <span class="text-dark">{{ $course->creatorCourse->name }}</span>
                            </li>

                            @if($course->course_status == 0)
                                <li class="list-group-item font-13 py-3 text-secondary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-exclamation-circle-fill" viewBox="0 0 16 16">
                                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                                    </svg>
                                    <span style="margin-right: 5px;">وضعیت دوره : </span>
                                    <span class="text-warning">درحال برگزاری</span>
                                </li>
                            @else
                                <li class="list-group-item font-13 py-3 text-secondary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-exclamation-circle-fill" viewBox="0 0 16 16">
                                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                                    </svg>
                                    <span style="margin-right: 5px;">وضعیت دوره : </span>
                                    <span style="color:#6fc341;">به اتمام رسیده</span>
                                </li>
                            @endif

                            <li class="list-group-item font-13 py-3 text-secondary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-calendar-event" viewBox="0 0 16 16">
                                    <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z"/>
                                    <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                                </svg>
                                <span style="margin-right: 5px;">تاریخ آخرین بروزرسانی : </span>
                                <span>{{ verta($course->updated_at)->formatDifference() }}</span>
                            </li>

                            <li class="list-group-item font-13 py-3 text-secondary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-box-fill" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M15.528 2.973a.75.75 0 0 1 .472.696v8.662a.75.75 0 0 1-.472.696l-7.25 2.9a.75.75 0 0 1-.557 0l-7.25-2.9A.75.75 0 0 1 0 12.331V3.669a.75.75 0 0 1 .471-.696L7.443.184l.004-.001.274-.11a.75.75 0 0 1 .558 0l.274.11.004.001 6.971 2.789Zm-1.374.527L8 5.962 1.846 3.5 1 3.839v.4l6.5 2.6v7.922l.5.2.5-.2V6.84l6.5-2.6v-.4l-.846-.339Z"/>
                                </svg>
                                <span style="margin-right: 5px;">تعداد ویدیو ها :</span>
                                <span class="text-dark">{{ $count_video }} ویدیو</span><br>
                            </li>

                            <li class="list-group-item font-13 py-3 text-secondary d-flex">
                                <p class="font-13"><i class="fa fa-tag align-middlle text-muted me-2 font-15"></i>دسته بندی :</p>

                                <div style="margin: 0px 5px;">
                                    <a target="_blank" href="{{ route('home.category' , ['category' => $course->categoryName->slug]) }}"><span class="font-13 vazir-font p-1 rounded">{{ str_replace('-' , ' ' , $course->categoryName->name) }}</span></a>
                                </div>
                            </li>

                            <li class="list-group-item font-13 py-3 text-secondary mb-3">
                                @if(auth()->check())
                                    @if($transaction->first() !== null)
                                    <button type="button" class="btn-block mt-3 py-2 font-13" id="custom_free_course_button">در دوره شرکت کرده اید</span>
                                    @else
                                    @if (\Cart::get($course->id))
                                        <span class="btn btn-primary btn-block mt-3 py-2 font-13" id="custom_success_course_button">دوره به سبد خرید اضافه شده است</span>
                                    @else
                                        @if ($course->type == 'رایگان')
                                            <button type="button" class="btn-block mt-3 py-2 font-13" id="custom_free_course_button"> این دوره رایگان است</button>
                                        @else
                                        <form action="{{ route('add.to.cart' , ['course' => $course->id]) }}" method="POST">
                                            @csrf
                                            @method('POST')
                                            <button type="submit" class="btn-block mt-3 py-2 font-13" id="custom_course_button"> ثبت نام در این دوره</button>
                                        </form>
                                        @endif
                                    @endif
                                    @endif
                                @else
                                    <form action="{{ route('add.to.cart' , ['course' => $course->id]) }}" method="POST">
                                        @csrf
                                        @method('POST')
                                        <button type="submit" class="btn-block mt-3 py-2 font-13" id="custom_course_button"> ثبت نام در این دوره</button>
                                    </form>
                                @endif
                            </li>

                        </ul>

                    </div>

                    <div class="col-lg-12 mt-4 d-flex justify-content-between p-3" style="box-shadow: 0px 0px 5px -3px; align-items: center;">
                        <div>
                            <span style="font-weight: bold;">به اشتراک گذاری</span>
                        </div>
                        <div style="padding: 1px;">
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ route('home.course' , ['course' => $course->slug]) }}" target="_blank" id="custom_share_icon">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                                        <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                                    </svg>
                                </span>
                            </a>
                            <a href="https://twitter.com/intent/tweet?url={{ route('home.course' , ['course' => $course->slug]) }}" target="_blank" id="custom_share_icon">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
                                        <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
                                    </svg>
                                </span>
                            </a>
                            <a href="https://t.me/share/url?url={{ route('home.course' , ['course' => $course->slug]) }}" target="_blank" id="custom_share_icon">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-telegram" viewBox="0 0 16 16">
                                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.287 5.906c-.778.324-2.334.994-4.666 2.01-.378.15-.577.298-.595.442-.03.243.275.339.69.47l.175.055c.408.133.958.288 1.243.294.26.006.549-.1.868-.32 2.179-1.471 3.304-2.214 3.374-2.23.05-.012.12-.026.166.016.047.041.042.12.037.141-.03.129-1.227 1.241-1.846 1.817-.193.18-.33.307-.358.336a8.154 8.154 0 0 1-.188.186c-.38.366-.664.64.015 1.088.327.216.589.393.85.571.284.194.568.387.936.629.093.06.183.125.27.187.331.236.63.448.997.414.214-.02.435-.22.547-.82.265-1.417.786-4.486.906-5.751a1.426 1.426 0 0 0-.013-.315.337.337 0 0 0-.114-.217.526.526 0 0 0-.31-.093c-.3.005-.763.166-2.984 1.09z"/>
                                    </svg>
                                </span>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-12 mt-4 p-3" style="box-shadow: 0px 0px 5px -3px; align-items: center;">
                        <div>
                            <span style="font-weight: bold;">لینک های مفید</span>
                        </div>
                        <hr>
                        @foreach($related_article as $related)
                        <div style="padding: 1px; margin-bottom:10px;">
                            <a id="custom_hover_style" target="_blank" href="{{ route('home.course' , ['course' => $related->slug]) }}">{{ $related->title }}</a>
                        </div>
                        @endforeach
                    </div>

                    <div class="col-lg-12 mt-4 p-3" style="box-shadow: 0px 0px 5px -3px; align-items: center;">
                        <div>
                            <span style="font-weight: bold;">دسته بندی</span>
                        </div>
                        <hr>
                        @foreach($random_category as $category)
                            <div style="padding: 6px; margin-bottom:10px;">
                                <svg style="color: #3498db;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-left-fill" viewBox="0 0 16 16">
                                    <path d="m3.86 8.753 5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z"/>
                                </svg>
                                <a id="custom_hover_style" id="custom_hover_style" style="margin-right: 5px;" target="_blank" href="{{ route('home.category' , ['category' => $category->slug]) }}">{{ $category->name }}</a>
                            </div>
                        @endforeach
                    </div>

                    @foreach ($side_courses as $side_course)
                    <div class="p-2 mt-4 rounded" id="sidebar_course">
                        <div class="line-height font-14 p-2" style="margin-top: -13px;">
                            <p class="vazir-font font-13 text-justify line-height">
                                @php
                                    echo $side_course->description
                                @endphp
                            </p>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div><!-- end course details -->

        </div>

    </div>



    <div class="container-fluid d-flex justify-content-between mt-5 pt-4" style="align-items: center;"><!-- start title-->

        <div class="title">

            <p class="font-25" id="custom_course_text">دوره های مرتبط</p>

        </div>

        <a href="{{ route('course.index') }}" class="btn-custom-info">همه دوره ها <i class="fa fa-arrow-left align-middle"></i></a>

    </div><!-- end title-->

    <div class="container-fluid"><!-- start course box -->

        <div class="row mb-5 pb-5">

            @foreach($related_course as $related)
            <div class="col-lg-4 col-sm-6 mt-5"><!-- start course item -->

                <div class="card custom-card mb-3 shadow-sm">

                    <a href="{{ route('home.course' , ['course' => $related->slug]) }}">
                        <div class="sub-layer">
                            <img src="{{ url('course_image/'.$related->image) }}" class="img-fluid custom-my-image">
                        </div>
                    </a>

                    <div class="card-body">

                        <a href="{{ route('home.course' , ['course' => $related->slug]) }}" class="text-dark d-block mb-2">{{ $related->title }}</a>

                        <p class="font-13 text-justify line-height vazir-font text-secondary">
                            @php
                            echo \Str::limit(strip_tags($related->description) , 250)
                            @endphp
                        </p>

                        <div class="card-footer" id="custom_card_footer">

                            <span class="font-12 vazir-font"><i class="fa fa-user" style="margin-left: 5px;"></i>
                                @php
                                    echo \Str::limit(strip_tags($related->creatorCourse->name) , 20)
                                @endphp
                            </span>

                            <div class="float-end">

                                @if($related->type == 'نقدی')
                                    @if($related->sale_price)
                                        <div class="float-end" id="custom_price_box">
                                            <del class="text-danger font-12">{{ number_format($related->price) }}</del>
                                            <span class="text-dark font-12">{{ number_format($related->sale_price) }} تومان</span>
                                        </div>
                                    @else
                                        <span class="text-dark font-12">{{ number_format($related->price) }} تومان</span>
                                    @endif
                                @else
                                    <span class="text-success font-12">{{ $related->type }}</span>
                                @endif

                            </div>

                        </div>

                    </div>

                    <div class="card-footer bg-white" id="custom_card_footer">

                        <a href="{{ route('home.course' , ['course' => $related->slug]) }}" style="padding: 5px" class="btn-sm btn-custom-info-course">مشاهده اطلاعات دوره <i class="fa fa-arrow-left align-middle mt-1"></i></a>

                    </div>

                </div>

            </div><!-- end course item -->
            @endforeach

        </div>

    </div><!-- end course box -->


    @include('home.layouts.footer')
