@section('title')
پاسخ به دیدگاه
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
                                    <form role="form" action="{{ route('admin.reply-comment-post' , ['comment' => $comment->id]) }}" enctype="multipart/form-data" method="POST">
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

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">متن دیدگاه کاربر: </label>
                                                <span class="text-primary">{{ strip_tags($comment->text) }}</span>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1"> پاسخ به دیدگاه کاربر: <span class="text-primary">{{ $comment->userComment->name }}</span></label>

                                                <textarea name="admin_text" id="content" class="ckeditor" rows="6">{{ $comment->admin_text }}</textarea>
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
                                                <button type="submit" class="btn btn-primary">پاسخ به دیدگاه</button>
                                                <a href="{{ route('admin.comments.index') }}" class="btn btn-primary">بازگشت</a>
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
