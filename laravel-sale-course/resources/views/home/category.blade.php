@section('title')
    @foreach($category_courses as $course)@endforeach
    @if(isset($course->categoryName->name))
        {{ $course->categoryName->name }} نتایج دسته بندی:
    @else
        نتیجه ای یافت نشد
    @endif
@endsection

@include('home.layouts.header')

    <div class="container-fluid d-flex justify-content-between" style="align-items: center;" id="responsive-title-pc"><!-- start title-->

        <div class="title">

            @foreach($category_courses as $course)@endforeach
            @foreach($articles as $article)@endforeach

            @if(!isset($articles[0]->category) && !isset($category_courses[0]->category))
                @if(isset($category_courses[0]->category))
                        <p class="font-25" id="custom_course_text">نتایج دسته بندی: <span class="text-primary">{{ $course->categoryName->name }}</span></p>
                @else
                    <span class="text-danger h2 font-30 ps-3" id="custom_course_text">نتیجه ای یافت نشد</span>
                @endif
            @endif

            @if(isset($articles[0]->category) && isset($category_courses[0]->category))
                @if(isset($category_courses[0]->category))
                    <p class="font-25" id="custom_course_text">نتایج دسته بندی: <span class="text-primary">{{ $course->categoryName->name }}</span></p>
                @else
                    <span class="text-danger h2 font-30 ps-3" id="custom_course_text">نتیجه ای یافت نشد</span>
                @endif
            @endif

            @if(!isset($category_courses[0]->category) && isset($articles[0]->category))
                @if(isset($articles[0]->category))
                    <p class="font-25" id="custom_course_text">نتایج دسته بندی: <span class="text-primary">{{ $article->categoryName->name }}</span></p>
                @else
                    <span class="text-danger h2 font-30 ps-3" id="custom_course_text">نتیجه ای یافت نشد</span>
                @endif
            @endif

        </div>

        <a href="{{ route('course.index') }}" class="btn-sm btn-custom-info">همه دوره ها <i class="fa fa-arrow-left align-middle mt-1"></i></a>

    </div><!-- end title-->


    <div class="container-fluid"><!-- start course box -->

        <div class="row mb-5 pb-5">

            @if($category_courses)
                @foreach($category_courses as $course)
                <div class="col-lg-4 col-sm-6" style="margin-top: 40px"><!-- start course item -->

                    <div class="card custom-card mb-3 shadow-sm">

                        <a href="{{ route('home.course' , ['course' => $course->slug]) }}">
                            <div class="sub-layer">
                                <img src="{{ url('course_image/'.$course->image) }}" class="img-fluid custom-my-image">
                            </div>
                        </a>

                        <div class="card-body">

                            <a href="{{ route('home.course' , ['course' => $course->slug]) }}" style="margin-top: -8px;" class="text-dark d-block mb-2"><b>{{ $course->title }}</b></a>

                            <p class="font-13 text-justify line-height vazir-font text-secondary">
                                @php
                                echo \Str::limit(strip_tags($course->description) , 250)
                                @endphp
                            </p>

                            <div class="card-footer" id="custom_card_footer">
                                <span class="font-12 vazir-font"><i class="fa fa-user" style="margin-left: 5px;"></i>
                                    @php
                                        echo \Str::limit(strip_tags($course->creatorCourse->name) , 20)
                                    @endphp
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
            @endif

            @if($articles)
                @foreach($articles as $article)
                    <div class="col-lg-4 col-sm-6" style="margin-top: 40px"><!-- start course item -->

                        <div class="card custom-card mb-3 shadow-sm">

                            <a href="{{ route('home.article' , ['article' => $article->slug]) }}">
                                <div class="sub-layer">
                                    <img src="{{ url('articles_image/'.$article->thumbnail) }}" class="img-fluid custom-my-image">
                                </div>
                            </a>

                            <div class="card-body">

                                <a href="{{ route('home.article' , ['article' => $article->slug]) }}" style="margin-top: -8px;" class="text-dark d-block mb-2"><b>{{ $article->title }}</b></a>

                                <p class="font-13 text-justify line-height vazir-font text-secondary">
                                    @php
                                        echo \Str::limit(strip_tags($article->description) , 250)
                                    @endphp
                                </p>

                            <div class="card-footer" id="custom_card_footer">
                            <span class="font-12 vazir-font"><i class="fa fa-user" style="margin-left: 5px;"></i>
                                @php
                                    echo \Str::limit(strip_tags($article->creatorArticle->name) , 20)
                                @endphp
                            </span>

                            </div>

                            </div>

                            <div class="card-footer bg-white" id="custom_card_footer">

                                <a href="{{ route('home.article' , ['article' => $article->slug]) }}" style="padding: 5px" class="btn-sm btn-custom-info-course">ادامه مطلب <i class="fa fa-arrow-left align-middle mt-1"></i></a>

                            </div>

                        </div>

                    </div><!-- end course item -->
                @endforeach
            @endif

            {{ $category_courses->links() }}
        </div>

    </div><!-- end course box -->

    @include('home.layouts.footer')