@section('title')
کاربران شرکت کرده در دوره های سایت
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
                                    <form role="form">
                        			<div class="row table-responsive">

                        				<table class="table table-bordered">
                                            <thead>
                                              <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">نام کاربر</th>
                                                <th scope="col">نام دوره</th>
                                                <th scope="col">وضعیت</th>
                                                <th scope="col">تنظیمات</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($transactions as $key => $users_course)
                                                <tr>
                                                    <th scope="row">{{ $count ++ }}</th>
                                                    <td><a target="_blank" href="{{ route('admin.users.edit' , ['user' => $users_course->users->id]) }}">{{ $users_course->users->name }}</a></td>
                                                    <td><a target="_blank" href="{{ route('admin.courses.edit' , ['course' =>$users_course->courses->id]) }}">{{ $users_course->courses->title }}</a></td>
                                                    <td>
                                                        @if($users_course->status == 1)
                                                            <span style="color: #2ecc71;">ثبت نام شده</span>
                                                        @else
                                                            <span class="text-danger">ناموفق</span>
                                                        @endif
                                                    </td>
                                                    <td style="display: flex;">
                                                            <a class="btn btn-primary btn-sm" href="{{ route('admin.users-courses-edit' , ['id' => $users_course->id]) }}">ویرایش</a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                          </table>

                                           {{ $transactions->links() }}

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
