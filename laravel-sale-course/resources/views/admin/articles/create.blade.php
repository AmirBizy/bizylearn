@section('title')
ایجاد مقاله
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
                                    <form role="form" action="{{ route('admin.articles.store') }}" enctype="multipart/form-data" method="POST">
                                        @csrf
                                        @method('POST')
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
                                                <input type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="عنوان مقاله را وارد کنید">
                                            </div>
                        				</div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">تصویر شاخص</label>
                                                <input type="file" name="thumbnail" class="form-control" id="exampleInputEmail1" placeholder="ایمیل خود  را وارد کنید">
                                            </div>
                        				</div>

                        				<div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">دسته بندی</label>
                                                <select class="form-control" name="category">
                                                    @foreach($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                        				</div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">وضعیت انتشار</label>
                                                <select class="form-control" name="status">
                                                    <option value="1">منتشر شده</option>
                                                    <option value="0">پیش نویس</option>
                                                </select>
                                            </div>
                        				</div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">توضیحات</label>

                                                <textarea name="description" id="content" class="ckeditor" rows="6"></textarea>
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
                                                <button type="submit" class="btn btn-primary">ایجاد مقاله</button>
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
