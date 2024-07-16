@section('title')
ویرایش جلسه دوره
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
                                    <form role="form" action="{{ route('admin.managment-update-video' , ['video' => $id]) }}" method="POST" enctype="multipart/form-data">
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

                                            <h2 style="margin-bottom: 30px;">ویرایش ویدیو جلسه: <span class="text-primary">{{ $courses_video->id }}</span> برای: <span class="text-primary">{{ $title_course }}</span></h2>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">آپلود ویدیو</label>
                                                    <input type="file" name="video_url" class="form-control" id="exampleInputEmail1" placeholder="عنوان دوره وارد کنید">
                                                </div>
                                                    <video style="width: 350px; height: 220px;" controls autoplay>
                                                        <source src="{{ url('course_video/'.$courses_video->video_url) }}" type=video/mp4>
                                                    </video>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">زمان قسمت ویدیو</label>
                                                    <input type="text" name="video_time" value="{{ $courses_video->video_time }}" class="form-control" id="exampleInputPassword1" placeholder="مثال: 17:29">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">نوع قسمت</label>
                                                    <select class="form-control" name="type">
                                                        <option value="نقدی" {{ $courses_video->type == 'نقدی' ? 'selected' : '' }}>نقدی</option>
                                                        <option value="رایگان" {{ $courses_video->type == 'رایگان' ? 'selected' : '' }}>رایگان</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">توضیحات قسمت</label>

                                                    <textarea name="description" value="{{ old('description') }}" id="content" class="ckeditor" rows="6">{{ $courses_video->description }}</textarea>
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
                                                    <button type="submit" class="btn btn-primary">ویرایش جلسه</button>
                                                </div>
                                            </div>

                                        </div><!-- end row -->
                                    </form>                        		</div>
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
