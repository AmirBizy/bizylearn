@section('title')
    مقاله ها
@endsection

@include('admin.layouts.header')
<div class="content">
    <div class="breadcrumb">
        <ul>
            <li><a href="index.html">پیشخوان</a></li>
            <li><a href="notification-management.html" class="is-active">مدیریت اطلاع رسانی ها</a></li>
          </ul>
    </div>
    <div class="main-content">
        <div class="row no-gutters border-radius-3">
            <div class="col-6 notification__box">
                <p class="margin-bottom-15">برای فعال‌سازی ربات تلگرام روی دکمه زیر کلیک کنید VPN روشن باشد.</p>
                <a href="https://netcopy.ir " target="_blank">
                    <button class="btn margin-bottom-15 btn-netcopy_net">فعال‌سازی ربات تلگرام</button>
                </a>
                <div>
                    <p>یا لینک زیر را کپی کنید و در تلگرام خود استارت کنید</p>
                    <p>https://netcopy.ir</p>
                </div>
            </div>
            <div class="col-6 notification__box">
                <p class="title__noti">ایجاد دوره</p>
                <div class="notificationGroup">
                    <input id="option1" name="option1" type="checkbox"/>
                    <label for="option1">ایمیل</label>
                </div>

                <div class="notificationGroup">
                    <input id="option2" name="option2" type="checkbox" />
                    <label for="option2">تلگرام</label>
                </div>
                <div class="notificationGroup">
                    <input id="option3" name="option" type="checkbox" checked/>
                    <label for="option3">نوتیفیکیشن</label>
                </div>
            </div>
            <div class="col-6 notification__box">
                <p class="title">جلسات جدید</p>
                <div class="notificationGroup">
                    <input id="option4" name="option1" type="checkbox"/>
                    <label for="option4">ایمیل</label>
                </div>

                <div class="notificationGroup">
                    <input id="option5" name="option2" type="checkbox" />
                    <label for="option5">تلگرام</label>
                </div>
                <div class="notificationGroup">
                    <input id="option6" name="option" type="checkbox" checked/>
                    <label for="option6">نوتیفیکیشن</label>
                </div>
            </div>
            <div class="col-6 notification__box">
                <p class="title">دیدگاه</p>
                <div class="notificationGroup">
                    <input id="option7" name="option1" type="checkbox"/>
                    <label for="option7">ایمیل</label>
                </div>

                <div class="notificationGroup">
                    <input id="option8" name="option2" type="checkbox" />
                    <label for="option8">تلگرام</label>
                </div>
                <div class="notificationGroup">
                    <input id="option9" name="option" type="checkbox" checked/>
                    <label for="option9">نوتیفیکیشن</label>
                </div>
            </div>
            <div class="col-6 notification__box">
                <p class="title">تیکت</p>

                <div class="notificationGroup">
                    <input id="option10" name="option1" type="checkbox"/>
                    <label for="option10">ایمیل</label>
                </div>

                <div class="notificationGroup">
                    <input id="option11" name="option2" type="checkbox" />
                    <label for="option11">تلگرام</label>
                </div>
                <div class="notificationGroup">
                    <input id="option12" name="option" type="checkbox" checked/>
                    <label for="option12">نوتیفیکیشن</label>
                </div>
            </div>
            <div class="col-6 notification__box">
                <p class="title">تسویه حساب ها</p>

                <div class="notificationGroup">
                    <input id="option13" name="option1" type="checkbox"/>
                    <label for="option13">ایمیل</label>
                </div>

                <div class="notificationGroup">
                    <input id="option14" name="option2" type="checkbox" />
                    <label for="option14">تلگرام</label>
                </div>
                <div class="notificationGroup">
                    <input id="option15" name="option" type="checkbox" checked/>
                    <label for="option15">نوتیفیکیشن</label>
                </div>
            </div>
            <div class="col-6 notification__box">
                <p class="title">خرید دوره</p>

                <div class="notificationGroup">
                    <input id="option16" name="option1" type="checkbox"/>
                    <label for="option16">ایمیل</label>
                </div>

                <div class="notificationGroup">
                    <input id="option17" name="option2" type="checkbox" />
                    <label for="option17">تلگرام</label>
                </div>
                <div class="notificationGroup">
                    <input id="option18" name="option" type="checkbox" checked/>
                    <label for="option18">نوتیفیکیشن</label>
                </div>
            </div>
        </div>
        <button class="btn btn-netcopy_net">ذخیره</button>

    </div>
</div>
@include('admin.layouts.footer')
