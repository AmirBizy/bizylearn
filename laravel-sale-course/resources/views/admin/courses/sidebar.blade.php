@section('title')
تنظیم سایدبار دوره
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
                                    <form role="form" action="{{ route('admin.add-sidebar-course' , ['course' => $course->id]) }}" method="POST" enctype="multipart/form-data">
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

                                            <h2 style="margin-bottom: 30px;">تنظیم سایدبار برای: <span class="text-primary"></span><span class="text-primary">{{ $course->title }}</span></h2>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">توضیحات سایدبار</label>

                                                    <textarea name="description" value="{{ old('description') }}" id="content" class="ckeditor" rows="6"></textarea>
                                                    <script type="text/javascript">
                                                        CKEDITOR.replace('content', {
                                                            language: 'fa'
                                                        });
                                                    </script>

                                                </div>
                                            </div>

                                            <div class="col-md-12" style="margin-top: 20px;">
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary">ایجاد سایدبار</button>
                                                </div>
                                            </div>
                                    </form>


                                            <div class="col-sm-12" style="margin-top: 30px;">
                                                <div class="card-box">
                                                    <div class="row table-responsive">

                                                        <table class="table table-bordered">
                                                            <thead>
                                                              <tr>
                                                                <th scope="col">#</th>
                                                                <th scope="col">توضیحات سایدبار</th>
                                                                <th scope="col">تنظیمات</th>
                                                              </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($side_courses as $key => $side)
                                                              <tr>
                                                                <th scope="row">{{ $row_count ++ }}</th>
                                                                <td class="text-primary">
                                                                    @php
                                                                        echo \Str::limit(strip_tags($side->description) , 100)
                                                                    @endphp
                                                                </td>
                                                                <td style="display: flex;">
                                                                    <a href="{{ route('admin.edit-sidebar-course' , ['course' => $side->id]) }}" class="btn btn-primary btn-sm">ویرایش</a>
                                                                    <form action="{{ route('admin.delete-sidebar-course', ['course' => $side->id]) }}" method="POST">
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
