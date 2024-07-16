@section('title')
لیست دوره ها
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
                        			<div class="row table-responsive">

                        				<table class="table table-bordered">
                                            <thead>
                                              <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">تصویر شاخص</th>
                                                <th scope="col">عنوان دوره</th>
                                                <th scope="col">مدرس</th>
                                                <th scope="col">قیمت</th>
                                                <th scope="col">نوع</th>
                                                <th scope="col">وضعیت</th>
                                                <th scope="col">تنظیمات</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($courses as $key => $course)
                                              <tr>
                                                <th scope="row">{{ $courses->firstItem() + $key }}</th>
                                                <td><img style="width: 70px; height: 45px;" class="img-responsive" src="{{ url('course_image/'.$course->image) }}" alt=""></td>
                                                <td>{{ \Illuminate\Support\Str::of($course->title)->words(4, ' ...') }}</td>
                                                <td class="text-primary">{{ $course->creatorCourse->name }}</td>
                                                <td>
                                                    @if($course->sale_price)
                                                        <span style="text-decoration: line-through;" class="text-danger">{{ number_format($course->price) }} </span><br>
                                                        <span>{{ number_format($course->sale_price) !== null ? number_format($course->sale_price) . ' تومان' : '' }} </span>
                                                    @else
                                                        <span>{{ number_format($course->price) }} تومان</span>
                                                    @endif
                                                </td>
                                                <td class="text-primary">{{ $course->type }}</td>
                                                <td>
                                                    @if($course->status == 1)
                                                        <span class="text-success">فعال</span>
                                                    @else
                                                        <span class="text-danger">غیرفعال</span>
                                                    @endif
                                                </td>
                                                <td style="display: flex; border-bottom: none;">
                                                    <a href="{{ route('admin.managment-course' , ['course' => $course->id]) }}" class="btn btn-warning" style="margin-left: 10px;">مدیریت جلسات</a>
                                                    <a href="{{ route('admin.sidebar-course' , ['course' => $course->id]) }}" class="btn text-white" style="margin-left: 10px; background:#2ecc71;">تنظیم سایدبار</a>
                                                    <a href="{{ route('admin.courses.edit' , ['course' => $course->id]) }}" class="btn btn-primary">ویرایش</a>

                                                    <form action="{{ route('admin.courses.destroy', ['course' => $course->id]) }}" method="POST">
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

                                        {{ $courses->links() }}

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
