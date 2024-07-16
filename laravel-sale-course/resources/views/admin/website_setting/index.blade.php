@section('title')
    تنظیمات سایت
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
                        <form role="form" action="{{ route('admin.web.setting.update') }}" enctype="multipart/form-data" method="POST">
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

                                <div class="col-md-12">
                                        <div class="row">
                                            <span class="mb-5 text-primary">در این قسمت اطلاعاتی مانند آدرس شرکت، خانه و شماره تماس شرکت تنظیم میشود</span>

                                            <div class="col-lg-12 mb-3" style="margin-top: 20px;">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">توضیحات فوتر</label>

                                                    <textarea name="description" id="content" class="ckeditor" rows="6">{{ $web_setting->description }}</textarea>
                                                    <script type="text/javascript">
                                                    CKEDITOR.replace('content', {
                                                    language: 'fa',
                                                    height: 100
                                                    });
                                                    </script>

                                                </div>
                                            </div>

                                            <div class="col-lg-4 mb-3" style="margin-top: 20px;">
                                                <label for="">تصویر صفحه اول سایت</label>
                                                <input class="form-control" type="file" name="home_image">
                                                @if ($web_setting->logo)
                                                    <img src="{{ url('web_images/'.$web_setting->home_image) }}" alt="{{ $web_setting->home_image }}" style="width: 70px; height: auto;">
                                                @endif
                                            </div>

                                            <div class="col-lg-4 mb-3" style="margin-top: 20px;">
                                                <label for="">لوگو سایت</label>
                                                <input class="form-control" type="file" name="logo">
                                                @if ($web_setting->logo)
                                                    <img src="{{ url('web_images/'.$web_setting->logo) }}" alt="{{ $web_setting->logo }}" style="width: 70px; height: auto;">
                                                @endif
                                            </div>

                                            <div class="col-lg-4 mb-3" style="margin-top: 20px;">
                                                <label for="">شماره تماس شرکت یا شما</label>
                                                <input class="form-control" type="text" name="phone" value="{{ $web_setting->phone }}" placeholder="مثال: 12345678-021" {{ old('new_password') }}>
                                            </div>

                                            <div class="col-lg-6 mb-3" style="margin-top: 20px;">
                                                <label for="">آدرس شرکت یا محل کار توسعه سایت</label>
                                                <input class="form-control" type="text" name="address" value="{{ $web_setting->address }}" placeholder="مثال: استان تهران شهر تهران - خیابان گاندی جنوبی - پلاک ۲۸">
                                            </div>

                                            <div class="col-lg-6 mb-3" style="margin-top: 20px;">
                                                <label for="">آدرس ایمیل شرکت یا پشتیبانی</label>
                                                <input class="form-control" type="email" name="email" value="{{ $web_setting->email }}" placeholder="مثال: info@sitename.com">
                                            </div>
                                        </div>
                                </div>

                                <div class="col-md-12" style="margin-top: 100px;">
                                    <span class="text-primary">تنظیمات ارتباط در شبکه های اجتمائی</span>
                                    <div class="row">
                                        <div class="col-lg-4 mb-3" style="margin-top: 20px;">
                                            <label for="">نام کاربری تلگرام - <span class="text-primary">مثال: rtltheme</span></label>
                                            <input class="form-control" type="text" name="telegram_link" value="{{ $web_setting->telegram_link }}" placeholder="مثال: amir_bizy">
                                        </div>
                                        <div class="col-lg-4 mb-3" style="margin-top: 20px;">
                                            <label for="">نام کاربری گیت هاب - <span class="text-primary">مثال: rtltheme</span></label>
                                            <input class="form-control" type="text" name="github_link" value="{{ $web_setting->github_link }}" placeholder="مثال: AmirBizy">
                                        </div>
                                        <div class="col-lg-4 mb-3" style="margin-top: 20px;">
                                            <label for="">نام کاربری اینستاگرام - <span class="text-primary">مثال: rtltheme</span></label>
                                            <input class="form-control" type="text" name="instagram_link" value="{{ $web_setting->instagram_link }}" placeholder="مثال: amir_bizy">
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
