@section('title')
آموزش برنامه نویسی
@endsection

@include('home.layouts.header')

    <div class="banner-3"><!-- start banner -->

        <div class="container">

            <div class="row" id="custom-first-div-site">

                <div class="col-lg-6 mt-5 text-center">

                    <h2> برنامه نویس شو، کسب درآمد کن!</h2>
                    <h6 class="mb-5"><span class="text-primary">بیزی لرن</span>، آکادمی آموزش آنلاین تخصصی برنامه نویسی</h6>

                    <a href="{{ route('course.index') }}" class="btn-custom-info">شروع یادگیری برنامه نویسی <i class="fa fa-arrow-left align-middle mt-1"></i></a>

                </div>

                <div class="col-lg-6 mt-5">

                    <img src="{{ url('web_images/'.$web_setting->home_image) }}" class="img-fluid" id="custom_img_home">

                </div>

            </div>

        </div>

    </div><!-- end banner -->

    <div class="container-fluid d-flex justify-content-between mt-5" style="align-items: center;"><!-- start title-->

        <div class="title">

            <p class="font-25 ps-3" id="custom_course_text"><i class="fa fa-code" style="padding-left: 10px;"></i>جدیدترین دوره ها</p>

        </div>

        <a href="{{ route('course.index') }}" class="btn-sm btn-custom-info">همه دوره ها <i class="fa fa-arrow-left align-middle mt-1"></i></a>
    </div><!-- end title-->


    <div class="container-fluid"><!-- start course box -->

        <div class="row">
            @foreach($courses as $course)
            <div class="col-lg-4 col-sm-6" style="margin-top: 40px"><!-- start course item -->

                <div class="card custom-card mb-3 shadow-sm">

                    <a href="{{ route('home.course' , ['course' => $course->slug]) }}">
                        <div class="sub-layer">
                            <img src="{{ url('course_image/'.$course->image) }}" class="img-fluid custom-my-image">
                        </div>
                    </a>

                    <div class="card-body" style="margin-top: -10px;">

                        <a href="{{ route('home.course' , ['course' => $course->slug]) }}" class="text-dark d-block mb-2"><b>{{ $course->title }}</b></a>

                        <p class="font-13 text-justify line-height vazir-font text-secondary" style="padding: 5px 0px">
                            {!! \Str::limit(strip_tags($course->description) , 250) !!}
                        </p>

                        <div class="card-footer" id="custom_card_footer">
                            <span class="font-12 vazir-font"><i class="fa fa-user" style="margin-left: 5px;"></i>
                                {!! \Str::limit(strip_tags($course->creatorCourse->name) , 20) !!}
                            </span>

                            <div class="float-end">

                                @if($course->type == 'نقدی')
                                    @if($course->sale_price)
                                        <div class="float-end" id="custom_price_box">
                                            <del class="text-danger font-12">{{ number_format($course->price) }}</del>
                                            <span class="text-dark font-12">{{ number_format($course->sale_price) }} تومان</span>
                                        </div>
                                    @else
                                        <span class="text-dark font-12">{{ number_format($course->price) }} تومان</span>
                                    @endif
                                @else
                                    <span class="text-success font-12">{{ $course->type }}</span>
                                @endif

                            </div>

                        </div>

                    </div>

                    <div class="card-footer bg-white" id="custom_card_footer">

                        <a href="{{ route('home.course' , ['course' => $course->slug]) }}" style="padding: 5px" class="btn-sm btn-custom-info-course">مشاهده دوره <i class="fa fa-arrow-left align-middle mt-1"></i></a>

                    </div>

                </div>

            </div><!-- end course item -->
            @endforeach
        </div>

    </div><!-- end course box -->


    <div class="team-box mt-5 rounded"><!-- start comment slider -->

        <div class="container-fluid d-flex justify-content-between"><!-- start title-->

            <div class="title mt-5 mb-3 m-auto" style="flex-basis: -moz-available;">

                <p class="font-25 ps-2 text-center text-white">آخرین دیدگاه ها</p>

            </div>

        </div><!-- end title-->


        <div class="container-fluid">

            <div class="row">

                <div class="col-12">

                    <div class="owl-carousel owl-theme owl-rtl">
                        @foreach($comments as $comment)
                        <div class="item"><!-- start comment item -->
                            <div class="card border-0 bg-white p-3 shadow-sm" id="custom_comment_box" style="height: 240px !important;">
                                <div class="d-flex align-items-center justify-content-between mb-3 mx-auto">
                                    <div class="text-center">
                                        <div>
                                            @if(isset($comment->userComment->id) && $comment->userComment->profile !== null)
                                                <img src="{{ url('images/'.$comment->userComment->profile) }}" class="comment-pic">
                                            @else
                                                <img src="{{ url('images/users.png') }}" class="comment-pic">
                                            @endif
                                        </div>
                                        <div class="mt-2">
                                            <span class="font-18 d-block ms-2">{{ isset($comment->userComment->id) ? \Str::words($comment->userComment->name , 4) : 'کاربر' }}</span>
                                            <a href="{{ route('home.course' , ['course' => $comment->userCourseComment->slug]) }}" target="_blank"><span class="font-15 d-block ms-2 mt-1">برای: {{ \Str::limit($comment->getCourseNameAttribute[0]->title , 28) }}</span></a>
                                        </div>
                                    </div>
                                </div>
                                <p class="font-15 text-justify lh-2 text-center text-secondary">
                                    {!! \Str::limit(strip_tags($comment->text) , 90) !!}
                                </p>
                            </div>
                        </div><!-- end comment item -->
                        @endforeach
                    </div>

                </div>

            </div>

        </div>

    </div><!-- end comment slider -->


    <div class="container-fluid d-flex justify-content-between mt-5" style="align-items: center;"><!-- start title-->

        <div class="title">

            <p class="font-25 ps-2" id="custom_course_text"> مقالات تخصصی </p>

        </div>

        <a href="{{ route('home.page.article') }}" class="btn-sm btn-custom-info">همه مقالات <i class="fa fa-arrow-left align-middle mt-1"></i></a>

    </div><!-- end title-->


    <div class="container-fluid"><!-- start article box -->

        <div class="row mb-5 pb-5">
            @foreach($articles as $article)
            <div class="col-lg-4 col-sm-6" style="margin-top: 40px"><!-- start article item -->

                <div class="card custom-card mb-3 shadow-sm">

                    <div class="sub-layer">
                        @if ($article->thumbnail)
                        <a href="{{ route('home.article' , ['article' => $article->slug]) }}"><img src="{{ url('articles_image/'.$article->thumbnail) }}" class="img-fluid custom-my-image custom-article-image"></a>
                        @else
                        <a href="{{ route('home.article' , ['article' => $article->slug]) }}"><img src="{{ url('assets/images/article1.jpg') }}" class="img-fluid custom-my-image custom-article-image"></a>
                        @endif
                    </div>

                    <div class="card-body" style="margin-top: -10px;">

                        <a href="{{ route('home.article' , ['article' => $article->slug]) }}" class="text-dark d-block mb-2"><b>{{ $article->title }}</b></a>

                        <div class="font-13 text-justify line-height vazir-font text-secondary mb-4" style="padding: 5px 0px">
                            {!! \Str::limit(strip_tags($article->description) , 250) !!}
                        </div>

                        <div style="display: flex; justify-content: space-between; align-items: center;" id="custom_card_footer">

                            <span class="font-15 vazir-font"><i class="fa fa-user" style="margin-left: 5px;"></i>
                                {!! \Str::limit($article->creatorArticle->name , 25) !!}
                            </span>

                            @php
                                $article_comments = App\Models\ArticleComment::where('article_id' , $article->id)->where('status' , '1')->orderBy('id' , 'DESC')->paginate(20);
                            @endphp

                            @if ($article_comments->count() >= 1)
                            <div class="text-secondary" style="display: flex; align-items: center;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-chat-left-fill" viewBox="0 0 16 16">
                                    <path d="M2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                </svg>
                                <span style="margin-right: 7px;">
                                    {{ $article_comments->count() }}
                                </span>
                            </div>
                            @endif

                        </div>

                    </div>

                </div>

            </div><!-- end course item -->
            @endforeach
        </div>

    </div><!-- end article box -->


    @include('home.layouts.footer')
