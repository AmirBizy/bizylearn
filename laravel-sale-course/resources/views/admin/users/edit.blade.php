@section('title')
ویرایش کاربر
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
                                    <form role="form" action="{{ route('admin.users.update' , ['user' => $user->id]) }}" enctype="multipart/form-data" method="POST">
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
                        				<div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">نام کاربری</label>
                                                <input type="text" name="name" {{ old('name') }} class="form-control" id="exampleInputEmail1" value="{{ $user->name }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">ایمیل</label>
                                                <input type="email" name="email" {{ old('email') }} class="form-control" id="exampleInputPassword1" value="{{ $user->email }}">
                                            </div>
                        				</div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">شماره موبایل</label>
                                                <input type="text" name="phone_number" {{ old('phone_number') }} class="form-control" id="exampleInputEmail1" value="{{ $user->phone_number }}">
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
                                                <label for="exampleInputEmail1">وضعیت حساب کاربری</label>
                                                <select class="form-control" name="status" {{ old('status') }}>
                                                    <option value="1" {{ $user->status == 1 ? 'selected' : '' }}>فعال</option>
                                                    <option value="0" {{ $user->status == 0 ? 'selected' : '' }}>غیرفعال</option>
                                                    <option value="2" {{ $user->status == 2 ? 'selected' : '' }}>مسدود</option>
                                                </select>
                                            </div>
                        				</div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">تایید ایمیل</label>
                                                <select class="form-control" name="email_verified_at" value="{{ old('email_verified_at') }}">
                                                    <option value="1" {{ $user->email_verified_at !== null ? 'selected' : '' }}>فعال</option>
                                                    <option value="0" {{ $user->email_verified_at == null ? 'selected' : '' }}>غیرفعال</option>
                                                </select>
                                            </div>
                        				</div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">تصویر پروفایل</label>
                                                <input type="file" name="profile" {{ old('profile') }} class="form-control" id="exampleInputEmail1" placeholder="ایمیل خود  را وارد کنید">
                                            </div>
                                            @if($user->profile)
                                        <img style="width: 130px;" src="{{ url('images/'.$user->profile) }}" alt="" class="img-fluid">
                                        @else

                                        @endif
                        				</div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">رمز عبور</label>
                                                <input type="password" name="password" value="{{ old('password') }}" class="form-control" id="exampleInputEmail1" placeholder="برای تغییر رمز عبور فیلد را پر کنید در غیر اینصورت فیلد را پر نکنید!">
                                            </div>
                        				</div>


                                            <div class="col-md-12">
                                                <div class="accordion" id="accordionExample" style="direction: rtl;">
                                                    <div class="card" style="box-shadow: 0 0 4px -1px; border-radius: 5px;">
                                                        <div class="card-header" id="headingOne">
                                                            <h2 class="mb-0">
                                                                <button style="text-decoration: none; font-size: 17px;" class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                    سطوح دسترسی
                                                                </button>
                                                            </h2>
                                                        </div>

                                                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                                            <div class="card-body row">
                                                                @foreach($permissions as $permission)
                                                                    <div class="form-group form-check col-md-2" style="margin-right: 15px; margin-left: -50px;">
                                                                        <label class="form-check-label" for="exampleCheck1-{{ $permission->id }}">{{ $permission->display_name }}</label>
                                                                        <input type="checkbox" class="form-check-input" id="exampleCheck1-{{ $permission->id }}"
                                                                               name="{{ $permission->name }}" value="{{ $permission->name }}"
                                                                            {{ in_array($permission->id , $user->permissions->pluck('id')->toArray()) ? 'checked' : '' }}
                                                                        >
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        <div class="col-md-12" style="margin-top: 20px;">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">ویرایش کاربر</button>
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
