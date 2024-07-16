@section('title')
مدیریت جلسات دوره
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
                                    <form role="form" action="{{ route('admin.managment-store' , ['course' => $course->id]) }}" method="POST" enctype="multipart/form-data">
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

                                        <h2 style="margin-bottom: 30px;">آپلود ویدیو برای: <span class="text-primary">{{ $course->title }}</span></h2>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">آپلود ویدیو</label>
                                                <input type="file" name="video_url" value="{{ old('video_url') }}" class="form-control" id="exampleInputEmail1" placeholder="عنوان دوره وارد کنید">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">زمان قسمت ویدیو</label>
                                                <input type="text" name="video_time" value="{{ old('video_time') }}" class="form-control" id="exampleInputPassword1" placeholder="مثال: 17:29">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">نوع قسمت</label>
                                                <select class="form-control" name="type">
                                                    <option value="نقدی">نقدی</option>
                                                    <option value="رایگان">رایگان</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">توضیحات قسمت</label>

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
                                                <button type="submit" class="btn btn-primary">ایجاد جلسه جدید</button>
                                            </div>
                                        </div>

                        			</div><!-- end row -->
                                    </form>
                        		</div>
                        	</div><!-- end col -->

                        	<div class="col-sm-12">
                        		<div class="card-box">
                        			<div class="row table-responsive">

                        				<table class="table table-bordered">
                                            <thead>
                                              <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">لینک ویدیو</th>
                                                <th scope="col">زمان قسمت ویدیو</th>
                                                <th scope="col">نوع قسمت ویدیو</th>
                                                <th scope="col">توضیحات قسمت</th>
                                                <th scope="col">تنظیمات</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($courses_video as $key => $course)
                                              <tr>
                                                <th scope="row">{{ $num_row ++ }}</th>
                                                <td class="text-primary">{{ $course->video_url }}</td>
                                                <td class="text-primary">{{ $course->video_time }}</td>
                                                  <td class="text-primary">{{ $course->type }}</td>
                                                <td class="text-primary">{{ \Illuminate\Support\Str::of(strip_tags($course->description))->words(5, ' ...') }}</td>
                                                <td style="display: flex;">
                                                    <a href="{{ route('admin.managment-edit-video' , ['video' => $course->id]) }}" class="btn btn-primary btn-sm">ویرایش</a>
                                                    <form action="{{ route('admin.managment-delete', ['video' => $course->id]) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <!-- Button trigger modal -->
                                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#staticBackdrop-{{ $key + 1 }}" style="margin-right: 10px;">
                                                            حذف
                                                        </button>

                                                        <!-- Modal -->
                                                        <div class="modal fade" id="staticBackdrop-{{ $key + 1 }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close" style="font-size: 30px;" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <b><span style="font-size: 20px;">برای حذف مطمئن هستید؟</span></b>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">انصراف</button>
                                                                        <button type="submit" class="btn btn-danger">حذف</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </td>
                                              </tr>
                                            @endforeach
                                            </tbody>
                                          </table>

                        			</div><!-- end row -->
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
