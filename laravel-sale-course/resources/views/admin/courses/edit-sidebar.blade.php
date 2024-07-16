@section('title')
ویرایش سایدبار دوره
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
                                    <form role="form" action="{{ route('admin.update-sidebar-course' , ['course' => $course->id]) }}" method="POST" enctype="multipart/form-data">
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

                                            <h2 style="margin-bottom: 30px;">ویرایش سایدبار برای: <span class="text-primary"></span><a href="{{ route('home.course' , ['course' => $side_course->sideCourse->slug]) }}" target="_blank"><span class="text-primary">{{ $side_course->sideCourse->title }}</span></a></h2>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">توضیحات سایدبار</label>

                                                    <textarea name="description" value="{{ old('description') }}" id="content" class="ckeditor" rows="6">{{ $side_course->description }}</textarea>
                                                    <script type="text/javascript">
                                                        CKEDITOR.replace('content', {
                                                            language: 'fa'
                                                        });
                                                    </script>

                                                </div>
                                            </div>

                                            <div class="col-md-12" style="margin-top: 20px;">
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary">ویرایش سایدبار</button>
                                                </div>
                                            </div>

                                        </form>

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
