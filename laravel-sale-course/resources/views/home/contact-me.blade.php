@section('title')
تماس با ما
@endsection

@include('home.layouts.header')

<section class="ftco-section img bg-hero" style="background-image: url(images/bg_1.jpg);">
    <div class="container">
        <div class="row justify-content-center my-4 py-5">
            <div class="col-lg-12">
                <div class="wrapper">
                    <div class="row no-gutters justify-content-between">
                        <div class="col-12">
                            <ul class="d-flex mb-0 mt-3 px-0">
                                <li>
                                    <a href="{{ route('home.index') }}" class="mx-2 text-dark custom-href-contact-link" style="font-size: 13px;">
                                        <span> بیزی لرن </span>
                                    </a>
                                </li>
                                <li>
                                    /
                                </li>
                                <li>
                                    <a href="{{ route('contact.index') }}" class="current mx-2 text-dark custom-href-contact-link" style="font-size: 13px;">
                                        <span> تماس با ما </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-5 d-flex align-items-stretch mb-3">
                            <div class="col-12">
                                <div class="info-wrap w-100 p-4 mt-5" style="box-shadow: 0 0 7px 0 #eaeff4;">
                                    <h5 class="mb-4 mb-4 text-primary"> <i class="fa fa-phone" aria-hidden="true"></i> راه های ارتباطی</h5>
                                    @if($web_setting->phone)
                                        <div class="dbox w-100 d-flex align-items-start">
                                            <div class="text pl-4">
                                                <p style="font-size: 14px; word-break: break-all;"><span>تلفن : </span> <a href="tel:{{ $web_setting->phone }}" class="text-dark">{{ $web_setting->phone }}</a></p>
                                            </div>
                                        </div>
                                    @endif
                                    @if($web_setting->email)
                                        <div class="dbox w-100 d-flex align-items-start">
                                            <div class="text pl-4">
                                                <p style="font-size: 14px; word-break: break-all;"><span>ایمیل : </span> <a href="mailto:{{ $web_setting->email }}" class="text-dark">{{ $web_setting->email }}</a></p>
                                            </div>
                                        </div>
                                    @endif
                                    @if($web_setting->address)
                                        <div class="dbox w-100 d-flex align-items-start">
                                            <div class="text pl-4">
                                                <p class="gap-1" style="font-size: 14px; word-break: break-all;"><span>آدرس : </span>{{ $web_setting->address }}</p>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="contact-wrap w-100 p-md-5 p-4">
                                <h5 class="mb-4">فرم تماس با ما</h5>
                                <div id="form-message-warning" class="mb-4"></div>
                                <div class="mb-4 p-3 rounded fs-14" style="color: #00b3e9; background-color: #effafd; border: 1px solid #a3def2; font-size: 13px;">
                                    در صورتیکه مشکل شما نیاز به پیگیری و پاسخ دارد لطفا از طریق پنل کاربری تیکت بزنید .
                                </div>
                                <form action="{{ route('home.send.email') }}" method="POST">
                                    @csrf
                                    @method('POST')
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="mt-3" for="name" style="font-size: 13px;">نام و نام خانوادگی</label>
                                                <input type="text" class="form-control rounded bg-white border mt-1" name="name" id="name">
                                                @error('name')
                                                    <span class="text-danger mb-3 mt-2 d-block" style="font-size: 13px;">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="mt-3" for="subject" style="font-size: 13px;">عنوان</label>
                                                <input type="text" class="form-control rounded bg-white border mt-1" name="subject" id="subject">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="mt-3" for="email" style="font-size: 13px;">ایمیل</label>
                                                <input type="email" class="form-control rounded bg-white border mt-1" name="email" id="email">
                                                @error('email')
                                                    <span class="text-danger mb-3 mt-2 d-block" style="font-size: 13px;">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="mt-3" for="description" style="font-size: 13px;">توضیحات</label>
                                                <textarea name="description" class="form-control rounded bg-white border mt-1" id="description" cols="30" rows="5"></textarea>
                                                @error('description')
                                                    <span class="text-danger mb-3 mt-2 d-block" style="font-size: 13px;">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12 mt-4">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary w-auto px-4 rounded" style="font-size: 13px;">ارسال پیام</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include('home.layouts.footer')
