@section('title')
ویرایش مقاله
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
                                    <form role="form" action="{{ route('admin.articles.update' , ['article' => $article->id]) }}" enctype="multipart/form-data" method="POST">
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
                                                <label for="exampleInputEmail1">عنوان مقاله</label>
                                                <input type="text" name="title" value="{{ $article->title }}" class="form-control" id="exampleInputEmail1" placeholder="عنوان مقاله را وارد کنید">
                                            </div>
                        				</div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">لینک مقاله</label>
                                                <span class="font-13 d-block">لینک پیشنهادی : {{ str_replace(' ' , '-' , $article->title) }}</span>
                                                <input type="text" name="slug" value="{{ $article->slug }}" class="form-control" id="exampleInputEmail1" placeholder="عنوان دوره وارد کنید">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">تصویر شاخص</label>
                                                <input type="file" name="thumbnail" class="form-control" id="exampleInputEmail1" placeholder="ایمیل خود  را وارد کنید">
                                                @if($article->thumbnail)
                                                    <img src="{{ url('articles_image/'.$article->thumbnail) }}" alt="" style="width: 50px; height: 35px;">
                                                @endif
                                            </div>
                        				</div>

                        				<div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">دسته بندی</label>
                                                <select class="form-control" name="category">
                                                    @foreach($categories as $category)
                                                    <option value="{{ $category->id }}" {{ $article->categoryName->id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                        				</div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">وضعیت انتشار</label>
                                                <select class="form-control" name="status">
                                                    <option value="1"{{ $article->status == 1 ? 'selected' : '' }}>منتشر شده</option>
                                                    <option value="0"{{ $article->status == 0 ? 'selected' : '' }}>پیش نویس</option>
                                                </select>
                                            </div>
                        				</div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">توضیحات</label>

                                                <textarea name="description" id="content" class="ckeditor" rows="6">{{ $article->description }}</textarea>
                                                <script type="text/javascript">
                                                CKEDITOR.replace('content', {
                                                // Load the German interface.
                                                language: 'fa',
                                                });
                                                </script>

                                            </div>
                        				</div>

                                        <div class="col-md-12" style="margin-top: 20px;">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">ویرایش مقاله</button>
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
