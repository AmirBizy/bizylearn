@section('title')
    تنظیمات اطلاعات کاربری
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
                        <form role="form" action="{{ route('admin.admin-information.update' , ['admin_information' => $user->id]) }}" enctype="multipart/form-data" method="POST">
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
                                        <input type="email" name="email" disabled {{ old('email') }} class="form-control" id="exampleInputPassword1" value="{{ $user->email }}">
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
                                        <label for="exampleInputEmail1">وضعیت حساب کاربری</label>
                                        <select class="form-control" disabled name="status" {{ old('status') }}>
                                            <option value="1" {{ $user->status == 1 ? 'selected' : '' }}>فعال</option>
                                            <option value="0" {{ $user->status == 0 ? 'selected' : '' }}>غیرفعال</option>
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
                                        <label for="exampleInputEmail1">تایید ایمیل</label>
                                        <select class="form-control" disabled name="email_verified_at" value="{{ old('email_verified_at') }}">
                                            <option value="1" {{ $user->email_verified_at !== null ? 'selected' : '' }}>فعال</option>
                                            <option value="0" {{ $user->email_verified_at == null ? 'selected' : '' }}>غیرفعال</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#demo">تغییر رمز عبور</button>
                                    <div id="demo" class="collapse">
                                        <div class="row">
                                            <span class="mb-5 text-primary">در صورتی که رمز عبور حساب را میخواهید تغییر دهید 3 فیلد پایین را با دقت پر کنید. در غیر این صورت فیلد ها را پر نکنید</span>
                                            <div class="col-lg-12 mb-3" style="margin-top: 20px;">
                                                <label for="">رمز عبور فعلی را وارد کنید</label>
                                                <input class="form-control" type="password" name="password" autocomplete="off">
                                            </div>
                                            <div class="col-lg-12 mb-3" style="margin-top: 20px;">
                                                <label for="">رمز عبور جدید را وارد کنید</label>
                                                <input class="form-control" type="password" name="new_password" value="{{ old('new_password') }}">
                                            </div>
                                            <div class="col-lg-12 mb-3" style="margin-top: 20px;">
                                                <label for="">تکرار رمز عبور جدید را وارد کنید</label>
                                                <input class="form-control" type="password" name="retype_new_password">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12" style="margin-top: 20px;">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">ویرایش اطلاعات</button>
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
        آقای ادمین2016 ©.
    </footer>

</div>



<!-- End Right content here -->



@include('admin.layouts.footer')
