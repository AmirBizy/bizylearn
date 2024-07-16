@section('title')
ویرایش دیدگاه
@endsection

@include('admin.layouts.header')


            <!-- Start right Content here -->

            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">
                        <div class="row">
                        	<div class="col-sm-12">
                        		<div class="card-box">
                                    <form role="form" action="{{ route('admin.article.comments.update' , ['comment' => $comment->id]) }}" enctype="multipart/form-data" method="POST">
                                    @csrf
                                    @method('PUT')
                        			<div class="row">
                                        @if(count($errors) > 0)
                                            <div class="mb-3 alert alert-danger">
                                                @foreach($errors->all() as $error)
                                                    <ul class="list-group">
                                                        <li class="list-item text-dark" style="list-style: none;">
                                                            {{ $error }}
                                                        </li>
                                                    </ul>
                                                @endforeach
                                            </div>
                                        @endif

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">برای مقاله</label>
                                                <a href="{{ route('home.article' , ['article' => $comment->ArticleCommentBlade->slug]) }}" target="_blank" class="text-primary"><span>{{ $comment->ArticleCommentBlade->title }}</span></a>
                                            </div>
                                        </div>

                        				<div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">نام کاربری</label>
                                                <input type="text" name="user_id" value="{{ $comment->userArticleComment->name }}" class="form-control" id="exampleInputEmail1">
                                            </div>
                        				</div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">ایمیل</label>
                                                <input type="email" disabled value="{{ $comment->userArticleComment->email }}" class="form-control" id="exampleInputPassword1" placeholder="مثال: https://amirbizy.ir">
                                            </div>
                        				</div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">وضعیت</label>
                                                <select name="status" class="form-control">
                                                    <option value="1" {{ $comment->status == 1 ? 'selected' : '' }}>تایید شده</option>
                                                    <option value="0" {{ $comment->status == 0 ? 'selected' : '' }}>در انتظار تایید</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">متن دیدگاه</label>

                                                <textarea name="text" id="content" class="ckeditor" rows="6">{{ $comment->text }}</textarea>
                                                <script type="text/javascript">
                                                    CKEDITOR.replace('content', {
                                                        // Load the German interface.
                                                        language: 'fa'
                                                    });
                                                </script>

                                            </div>
                                        </div>

                                        <div class="col-md-12" style="margin-top: 20px;">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">ویرایش دیدگاه</button>
                                            </div>
                        				</div>


                        			</div><!-- end row -->
                                    </form>
                        		</div>
                        	</div><!-- end col -->
                        </div>
                        <!-- end row -->

                    </div> <!-- container -->

                </div> <!-- content -->

                <footer class="footer">
بیزی لرن                </footer>

            </div>



            <!-- End Right content here -->



@include('admin.layouts.footer')
