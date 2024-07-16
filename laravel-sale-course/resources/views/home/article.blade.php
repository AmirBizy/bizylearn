@section('title')
    {{ $article->title }}
@endsection

@section('css')

@endsection

@include('home.layouts.header')

    <div class="container-fluid" id="responsive-title-pc">

        <div class="row mb-5 pb-5">

            <div>
                <h1 class="mb-2 mt-4 line-height" style="font-size: 20px;"><b>{{ $article->title }}</b></h1>
                <span class="font-12">
                    <a href="{{ route('home.index') }}" class="mx-1" id="hover_sm_btn">بیزی لرن</a> /
                    <a href="{{ route('home.page.article') }}" class="mx-1" id="hover_sm_btn">مقالات</a> /
                    <a href="{{ route('home.article' , ['article' => $article->slug]) }}" class="mx-1" id="hover_sm_btn">{{ $article->title }}</a>
                </span>
            </div>

            <div class="col-lg-8 mt-4 m-auto mb-5" style="border-radius: 5px;"><!-- start course content -->

                <div id="custom_lg_8" style="padding: 12px; border-radius: 10px;">
                    <img src="{{ url('articles_image/'.$article->thumbnail) }}" class="img-fluid rounded my-course-image" id="custom_article_img">

                    <div id="custom_content_article" class="line-height">
                        {!! $article->description !!}
                    </div>
                </div>

                <div id="custom_lg_8" class="mt-5" style="border-radius: 10px;">
                    <div class="">
                        @if(auth()->check())
                        <form action="{{ route('home.send.article.comment' , ['article' => $article->id]) }}" method="POST">
                            @csrf
                            @method('POST')
                            <div class="p-2"><!-- start send comment -->

                                @if ($article_comments->count() <= 0)
                                <span class="font-14" style="padding: 10px 0px 0px 0px; display: block;">هنوز دیدگاهی برای این مقاله ثبت نشده! <span style="color:#3498db;">شما اولین نفر باشید</span></span>
                                @endif

                                <p class="font-14 mt-4" id="text-error" style="width: 300px;">دیدگاه خود را ارسال کنید @if ($article_comments->count() >= 1) <span class="text-primary">( {{ $article_comments->count() }} دیدگاه )</span> @endif</p>
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

                    @foreach($article_comments as $comment)
                    <div class="container-fluid mt-5" style="padding: 1px 15px;"><!-- start comment box -->
                            <div class="mb-3 p-2 pb-3" id="custom_comment_box"><!-- start comment item -->

                                <div class="d-flex justify-content-between align-items-center">

                                    <div class="d-flex">

                                        <div>

                                            <img src="{{ isset($comment->userArticleComment->id) && $comment->userArticleComment->profile ? url('images/'.$comment->userArticleComment->profile) : url('images/users.png') }}" class="comment-pic">

                                        </div>

                                        <div>
                                            <span class="font-13 d-block ms-3 mt-4">{!! isset($comment->userArticleComment->id) ? $comment->userArticleComment->name : 'کاربر' !!}</span>
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
                                                {{-- @if (isset($comment->adminReply->roles[0]->display_name) && $comment->adminReply->roles[0]->display_name)
                                                    {{ $comment->adminReply->name }} - {{ $comment->adminReply->roles[0]->display_name }}
                                                @else --}}
                                                @if ($comment->adminReply->profile != null)
                                                <img src="{{ url('images/'.$comment->adminReply->profile) }}" style="width: 60px; height: 60px; border-radius: 50%; margin-left:10px;" alt="">
                                                @endif
                                                {!! $comment->adminReply->name !!}
                                                {{-- @endif --}}
                                            </p>

                                        </div>

                                        <p class="vazir-font line-height font-14">
                                            {!! $comment->admin_text !!}
                                        </p>

                                    </div><!-- end reply box -->
                                @endif

                            </div><!-- end comment item -->

                    </div><!-- end comment box -->
                    @endforeach
                    {{ $article_comments->links() }}
                    </div>
                </div>

            </div><!-- end article content -->

            <div class="col-lg-4 m-auto mt-4" id="custom_side_course" style="margin: 0px auto;"><!-- start course details -->

                <div class="col-lg-12">
                    <ul class="list-group text-right py-3" style="box-shadow: 0px 0px 5px -3px;">

                        <li class="list-group-item font-13 py-3 text-secondary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-person-check-fill" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                                <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                            </svg>
                            <span style="margin-right: 5px;">نویسنده :</span>
                            <span class="text-dark">{{ $article->creatorArticle->name }}</span>
                        </li>

                        <li class="list-group-item font-13 py-3 text-secondary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-calendar-event" viewBox="0 0 16 16">
                                <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z"/>
                                <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                            </svg>
                            <span style="margin-right: 5px;">تاریخ آخرین بروزرسانی : </span>
                            <span>{{ verta($article->updated_at)->formatDifference() }}</span>
                        </li>

                        @if ($article_comments->count() > 0)
                        <li class="list-group-item font-13 py-3 text-secondary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-chat-left-fill" viewBox="0 0 16 16">
                                <path d="M2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                            </svg>
                            <span style="margin-right: 5px;">دیدگاه ها : </span>
                            <span>{{ $article_comments->count() }} دیدگاه</span>
                        </li>
                        @endif

                        <li class="list-group-item font-13 py-3 text-secondary">
                            <div class="d-flex" style="height: 20px;">
                                <p class="font-13"><i class="fa fa-tag align-middlle text-muted me-2 font-15"></i>دسته بندی :</p>

                                <div style="margin: 0px 5px;">
                                    <a target="_blank" href="{{ route('home.category' , ['category' => $article->categoryName->slug]) }}"><span class="font-13 vazir-font p-1 rounded">{{ str_replace('-' , ' ' , $article->categoryName->name) }}</span></a>
                                </div>
                            </div>
                        </li>

                    </ul>
                </div>
                <div class="col-lg-12 mt-4 d-flex justify-content-between p-3" style="box-shadow: 0px 0px 5px -3px; align-items: center;">
                    <div>
                        <span style="font-weight: bold;">به اشتراک گذاری</span>
                    </div>
                    <div style="padding: 1px;">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ route('home.article' , ['article' => $article->slug]) }}" target="_blank" id="custom_share_icon">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                                    <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                                </svg>
                            </span>
                        </a>
                        <a href="https://twitter.com/intent/tweet?url={{ route('home.article' , ['article' => $article->slug]) }}" target="_blank" id="custom_share_icon">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
                                    <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
                                </svg>
                            </span>
                        </a>
                        <a href="https://t.me/share/url?url={{ route('home.article' , ['article' => $article->slug]) }}" target="_blank" id="custom_share_icon">
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
                        <a id="custom_hover_style" target="_blank" href="{{ route('home.article' , ['article' => $related->slug]) }}">{{ $related->title }}</a>
                    </div>
                    @endforeach
                </div>

                <div class="col-lg-12 mt-4 p-3" style="box-shadow: 0px 0px 5px -3px; align-items: center;">
                    <div>
                        <span style="font-weight: bold;">دوره های مرتبط با این مقاله</span>
                    </div>
                    <hr>
                    @foreach($related_course as $related)
                    <div style="padding: 10px; margin-bottom:10px; box-shadow: 0 0 5px -3px; border-radius: 5px;">
                        <img style="width: 70px; border-radius: 5px;" src="{{ url('course_image/'.$related->image) }}" alt="">
                        <a id="custom_hover_style" style="margin-right: 5px;" target="_blank" href="{{ route('home.course' , ['course' => $related->slug]) }}">{{ \Str::words($related->title , 6) }}</a>
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
                            <a id="custom_hover_style" style="margin-right: 5px;" target="_blank" href="{{ route('home.category' , ['category' => $category->slug]) }}">{{ $category->name }}</a>
                        </div>
                    @endforeach
                </div>

            </div><!-- end article details -->

        </div>

    </div>

    @section('js')

    @endsection

    @include('home.layouts.footer')
