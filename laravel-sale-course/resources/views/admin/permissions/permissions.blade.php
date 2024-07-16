@section('title')
لیست سطوح دسترسی
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
                        				<table class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>نام انگلیسی</th>
                                                <th>نام نمایشی فارسی</th>
                                                <th>تنظیمات</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                              @foreach ($permissions as $key => $permission)
                                              <tr>
                                                <th scope="row">1</th>
                                                <td>{{ $permission->name }}</td>
                                                <td>{{ $permission->display_name }}</td>
                                                <td style="display: flex;">
                                                    <a class="btn btn-primary" href="{{ route('admin.permissions.edit' , ['permission' => $permission->id]) }}">ویرایش</a>
                                                    <form action="{{ route('admin.permissions.destroy', ['permission' => $permission->id]) }}" method="POST">
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
