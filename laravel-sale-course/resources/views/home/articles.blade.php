@section('title')
مقالات تخصصی
@endsection

@include('home.layouts.header')

    <div class="container-fluid d-flex justify-content-between" id="responsive-title-pc"><!-- start title-->

        <div class="title">

            <p class="font-25 ps-2">مقالات تخصصی</p>

        </div>

    </div><!-- end title-->


    <div class="container-fluid"><!-- start course box -->

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

                        <p class="font-13 text-justify line-height vazir-font text-secondary mb-4" style="padding: 5px 0px">
                            @php
                            echo \Str::limit(strip_tags($article->description) , 250)
                            @endphp
                        </p>

                        <div style="display: flex; justify-content: space-between; align-items: center;" id="custom_card_footer">

                            <span class="font-12 vazir-font"><i class="fa fa-user" style="margin-left: 5px;"></i>
                                @php
                                    echo \Str::limit(strip_tags($article->creatorArticle->name) , 40)
                                @endphp
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

    </div><!-- end course box -->

    @include('home.layouts.footer')
