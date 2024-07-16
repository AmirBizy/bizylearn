@section('title')
ایجاد دوره
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
                                    <form role="form" action="{{ route('admin.courses.store') }}" method="POST" enctype="multipart/form-data">
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
                                                <label for="exampleInputEmail1">عنوان دوره</label>
                                                <input type="text" name="title" value="{{ old('title') }}" class="form-control" id="exampleInputEmail1" placeholder="عنوان دوره وارد کنید">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">قیمت دوره ( به تومان )</label>
                                                <input type="text" name="price" value="{{ old('price') }}" class="form-control" id="exampleInputPassword1" placeholder="اگر دوره رایگان است فیلد را پر نکنید">
                                            </div>
                        				</div>

                        				<div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">وضعیت دوره</label>
                                                <select class="form-control" name="status" value="{{ old('status') }}">
                                                    <option value="1">فعال</option>
                                                    <option value="0">غیرفعال</option>
                                                </select>
                                            </div>
                        				</div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">قیمت حراجی ( به تومان )</label>
                                                <input type="text" name="sale_price" value="{{ old('sale_price') }}" class="form-control" id="exampleInputPassword1" placeholder="اگر نمیخواهید قیمت حراجی داشته باشید فیلد را پر نکنید">
                                            </div>
                        				</div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">وضعیت برگزاری دوره</label>
                                                <select class="form-control" name="course_status" value="{{ old('course_status') }}">
                                                    <option value="0">درحال برگزاری</option>
                                                    <option value="1">به اتمام رسیده</option>
                                                </select>
                                            </div>
                        				</div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">تصویر شاخص دوره</label>
                                                <input type="file" name="image" value="{{ old('image') }}" class="form-control" id="exampleInputPassword1">
                                            </div>
                        				</div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">دسته بندی</label>
                                                <select class="form-control" name="category" value="{{ old('category') }}">
                                                    @foreach($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                        				</div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">نوع دوره</label>
                                                <select class="form-control" name="type" value="{{ old('course_status') }}">
                                                    <option value="نقدی">نقدی</option>
                                                    <option value="رایگان">رایگان</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">توضیحات دوره</label>

                                                <textarea name="description" value="{{ old('description') }}" id="content" class="ckeditor" rows="6"></textarea>
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
                                                    <button type="submit" class="btn btn-primary">ایجاد دوره</button>
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
