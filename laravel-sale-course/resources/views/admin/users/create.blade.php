@section('title')
ایجاد کاربر
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
                                    <form role="form" action="{{ route('admin.users.store') }}" enctype="multipart/form-data" method="POST">
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
                                                <label for="exampleInputEmail1">نام کاربری</label>
                                                <input type="text" name="name" class="form-control" id="exampleInputEmail1" value="{{ old('name') }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">ایمیل</label>
                                                <input type="email" name="email" class="form-control" id="exampleInputPassword1" value="{{ old('email') }}">
                                            </div>
                        				</div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">شماره موبایل</label>
                                                <input type="text" name="phone_number" class="form-control" id="exampleInputEmail1" value="{{ old('phone_number') }}">
                                            </div>
                        				</div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">نقش کاربر</label>
                                                    <select class="form-control" name="role" {{ old('role') }}>
                                                        <option></option>
                                                        @foreach($roles as $role)
                                                            <option value="{{ $role->name }}" {{ in_array($role->id , $user->roles->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $role->display_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">تایید ایمیل</label>
                                                <select class="form-control" name="email_verified_at" value="{{ old('email_verified_at') }}">
                                                    <option value="1">فعال</option>
                                                    <option value="0">غیرفعال</option>
                                                </select>
                                            </div>
                        				</div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">وضعیت حساب کاربری</label>
                                                <select class="form-control" name="status" value="{{ old('status') }}">
                                                    <option value="1">فعال</option>
                                                    <option value="0">غیرفعال</option>
                                                    <option value="2">مسدود</option>
                                                </select>
                                            </div>
                        				</div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">تصویر پروفایل</label>
                                                <input type="file" name="profile" class="form-control" id="exampleInputEmail1" value="{{ old('profile') }}">
                                            </div>
                        				</div>
                                        @if($user->profile)
                                        <img style="width: 130px;" src="{{ url('images/'.$user->profile) }}" alt="" class="img-fluid">
                                        @else

                                        @endif

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="password">رمز عبور</label>

                                            <script>
                                                function myFunction() {
                                                var x = document.getElementById("password");
                                                if (x.type === "password") {
                                                    x.type = "text";
                                                } else {
                                                    x.type = "password";
                                                }
                                                }
                                            </script>


                                                <input id="password" type="password" class="form-control" name="password" value="{{ old('password') }}">
                                                <button id="display-password" onclick="myFunction()" type="button" style="position: absolute; top: 36px; left: 16px; border: none;"><i class="fa fa-lock"></i></button

                                            </div>
                                        </div>

                        			</div><!-- end row -->

                                        <div class="col-md-12" style="margin-top: 20px;">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">ایجاد کاربر</button>
                                            </div>
                                        </div>

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
