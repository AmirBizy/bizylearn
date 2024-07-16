@section('title')
بیزی لرن
@endsection

@include('admin.layouts.header')


            <!-- Start right Content here -->

            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">


                        <div class="row">

                            <div class="col-lg-3 col-md-6">
                        		<div class="card-box">

                        			<h4 class="header-title m-t-0 m-b-30">دوره ها</h4>

                                    <div class="widget-chart-1">
                                        <div class="widget-chart-box-1">
                                            <input data-plugin="knob" data-width="80" data-height="80" data-fgColor="#3498db"
                                               data-bgColor="#F9B9B9" value="{{ $courses->avg('id') }}"
                                               data-skin="tron" data-angleOffset="180" data-readOnly=true
                                               data-thickness=".15"/>
                                        </div>

                                        <div class="widget-detail-1">
                                            <h2 class="p-t-10 m-b-0"> {{ $courses->count() }} </h2>
                                            <p class="text-muted">دوره در سایت</p>
                                        </div>
                                    </div>
                        		</div>
                            </div><!-- end col -->

                            <div class="col-lg-3 col-md-6">
                        		<div class="card-box">

                        			<h4 class="header-title m-t-0 m-b-30">تراکنش کاربران</h4>

                                    <div class="widget-chart-1">
                                        <div class="widget-chart-box-1">
                                            <input data-plugin="knob" data-width="80" data-height="80" data-fgColor="#2ecc71"
                                               data-bgColor="#55efc4" value="{{ $transactions->avg('id') }}"
                                               data-skin="tron" data-angleOffset="180" data-readOnly=true
                                               data-thickness=".15"/>
                                        </div>

                                        <div class="widget-detail-1">
                                            <h2 class="p-t-10 m-b-0"> {{ $transactions->count() }} </h2>
                                            <p class="text-muted">تراکنش</p>
                                        </div>
                                    </div>

                        		</div>
                            </div><!-- end col -->

                            <div class="col-lg-3 col-md-6">
                        		<div class="card-box">

                        			<h4 class="header-title m-t-0 m-b-30">کاربران سایت</h4>

                                    <div class="widget-chart-1">
                                        <div class="widget-chart-box-1">
                                            <input data-plugin="knob" data-width="80" data-height="80" data-fgColor="#ffbd4a"
                                               data-bgColor="#FFE6BA" value="{{ $users->avg('id') }}"
                                               data-skin="tron" data-angleOffset="180" data-readOnly=true
                                               data-thickness=".15"/>
                                        </div>
                                        <div class="widget-detail-1">
                                            <h2 class="p-t-10 m-b-0"> {{ $users->count() }} </h2>
                                            <p class="text-muted">کاربر</p>
                                        </div>
                                    </div>
                        		</div>
                            </div><!-- end col -->

                            <div class="col-lg-3 col-md-6">
                        		<div class="card-box">

                        			<h4 class="header-title m-t-0 m-b-30">نظرات</h4>

                                    <div class="widget-chart-1">
                                        <div class="widget-chart-box-1">
                                            <input data-plugin="knob" data-width="80" data-height="80" data-fgColor="#2d3436"
                                               data-bgColor="#b2bec3" value="{{ $comments->avg('id') }}"
                                               data-skin="tron" data-angleOffset="180" data-readOnly=true
                                               data-thickness=".15"/>
                                        </div>

                                        <div class="widget-detail-1">
                                            <h2 class="p-t-10 m-b-0"> {{ $comments->count() }} </h2>
                                            <p class="text-muted">نظر</p>
                                        </div>
                                    </div>

                        		</div>
                            </div><!-- end col -->

                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-lg-4">
                            	<div class="card-box">

                        			<h4 class="header-title m-t-0 m-b-30">آخرین نظر ها</h4>

									<div class="inbox-widget nicescroll" style="height: 315px;">
                                        @foreach ($comments as $comment)
                                        <a href="#">
                                            <div class="inbox-item">
                                                <div class="inbox-item-img">
                                                    @if (isset($comment->userComment->id) && $comment->userComment->profile != null)
                                                    <img src="{{ isset($comment->userComment->id) ? url('images/'.$comment->userComment->profile) : url('public/images/users.png') }}" style="width: 40px; height: 40px;" class="img-circle" alt="">
                                                    @else
                                                    <img src="{{ url('images/users.png') }}" class="img-circle" alt="">
                                                    @endif
                                                </div>
                                                <p class="inbox-item-author">
                                                    <a target="_blank" href="{{ isset($comment->userComment->id) ? route('admin.comments.edit' , ['comment' => $comment->id]) : 'user-not-found' }}">
                                                        @php
                                                            echo \Str::limit(strip_tags(isset($comment->userComment->id) ? $comment->userComment->name : 'کاربر') , 25)
                                                        @endphp
                                                    </a>
                                                </p>
                                                <p class="inbox-item-text">
                                                    @php
                                                    echo \Str::limit(strip_tags($comment->text) , 30)
                                                    @endphp
                                                </p>
                                                <p class="inbox-item-date my-5">{{ verta($comment->created_at)->formatDifference() }}</p>
                                            </div>
                                        </a>
                                        @endforeach
                                    </div>
								</div>
                            </div><!-- end col -->

                            <div class="col-lg-8">
                                <div class="card-box">

                        			<h4 class="header-title m-t-0 m-b-30">آخرین دوره های منتشر شده</h4>

                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>نام دوره</th>
                                                <th>تاریخ شروع</th>
                                                <th>وضعیت</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $row_count = 1;
                                                @endphp
                                                @foreach ($limit_courses as $key => $limit_course)
                                                <tr>
                                                    <td>{{ $row_count++ }}</td>
                                                    <td>
                                                    <a href="{{ route('admin.courses.edit' , ['course' => $limit_course->id]) }}" target="_blank">
                                                        @php
                                                            echo \Str::limit(strip_tags($limit_course->title) , 30)
                                                        @endphp
                                                    </a>
                                                    </td>
                                                    <td>{{ verta($limit_course->created_at)->formatDifference() }}</td>
                                                    <td>
                                                        @if ($limit_course->course_status == 1)
                                                        <span class="label label-success">به اتمام رسیده</span>
                                                        @else
                                                        <span class="label label-warning">درحال برگزاری</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
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
