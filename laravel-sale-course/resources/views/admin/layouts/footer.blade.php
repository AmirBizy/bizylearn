<!-- Right Sidebar -->
<div class="side-bar right-bar">
    <a href="javascript:void(0);" class="right-bar-toggle">
        <i class="zmdi zmdi-close-circle-o"></i>
    </a>
    <h4 class="">اعلانات</h4>
    <div class="notification-list nicescroll">
        <ul class="list-group list-no-border user-list">
            <li class="list-group-item">
                <a href="#" class="user-list-item">
                    <div class="avatar">
                        <img src="{{ url('assets/admin/images/users/avatar-2.jpg') }}" alt="">
                    </div>
                    <div class="user-desc">
                        <span class="name">کاربر شماره یک</span>
                        <span class="desc">متن کاربر شماره یک</span>
                        <span class="time">2 ساعت قبل</span>
                    </div>
                </a>
            </li>
            <li class="list-group-item">
                <a href="#" class="user-list-item">
                    <div class="icon bg-info">
                        <i class="zmdi zmdi-account"></i>
                    </div>
                    <div class="user-desc">
                        <span class="name">ثبت نام جدید</span>
                        <span class="desc">کاربری جدید در سایت ثبت نام کرده است</span>
                        <span class="time">5 ساعت قبل</span>
                    </div>
                </a>
            </li>
            <li class="list-group-item">
                <a href="#" class="user-list-item">
                    <div class="icon bg-pink">
                        <i class="zmdi zmdi-comment"></i>
                    </div>
                    <div class="user-desc">
                        <span class="name">پیام جدید</span>
                        <span class="desc">متن پیام جدید از کاریی جدید</span>
                        <span class="time">1 روز قبل</span>
                    </div>
                </a>
            </li>
            <li class="list-group-item active">
                <a href="#" class="user-list-item">
                    <div class="avatar">
                        <img src="{{ url('assets/admin/images/users/avatar-3.jpg') }}" alt="">
                    </div>
                    <div class="user-desc">
                        <span class="name">کاربر شماره 2</span>
                        <span class="desc">با سلام من یک متن کاملا آزمایشی هستم</span>
                        <span class="time">2 روز قبل</span>
                    </div>
                </a>
            </li>
            <li class="list-group-item active">
                <a href="#" class="user-list-item">
                    <div class="icon bg-warning">
                        <i class="zmdi zmdi-settings"></i>
                    </div>
                    <div class="user-desc">
                        <span class="name">تنظیمات</span>
                        <span class="desc">تنظیمات جدید برای دسترسی و راحتی شما موجود است</span>
                        <span class="time">1 روز قبل</span>
                    </div>
                </a>
            </li>

        </ul>
    </div>
</div>
<!-- /Right-bar -->

</div>
<!-- END wrapper -->



<script>
var resizefunc = [];
</script>

<!-- jQuery  -->
<script src="{{ url('assets/admin/js/jquery.min.js') }}"></script>
<script src="{{ url('assets/admin/js/bootstrap-rtl.min.js') }}"></script>
<script src="{{ url('assets/admin/js/detect.js') }}"></script>
<script src="{{ url('assets/admin/js/fastclick.js') }}"></script>
<script src="{{ url('assets/admin/js/jquery.blockUI.js') }}"></script>
<script src="{{ url('assets/admin/js/waves.js') }}"></script>
<script src="{{ url('assets/admin/js/jquery.nicescroll.js') }}"></script>
<script src="{{ url('assets/admin/js/jquery.slimscroll.js') }}"></script>
<script src="{{ url('assets/admin/js/jquery.scrollTo.min.js') }}"></script>
@include('sweetalert::alert')
<!-- KNOB JS -->
<!--[if IE]>
<script type="text/javascript" src="assets/plugins/jquery-knob/excanvas.js"></script>
<![endif]-->
<script src="{{ url('assets/admin/plugins/jquery-knob/jquery.knob.js') }}"></script>

<!--Morris Chart-->
<script src="{{ url('assets/admin/plugins/morris/morris.min.js') }}"></script>
<script src="{{ url('assets/admin/plugins/raphael/raphael-min.js') }}"></script>

<!-- Dashboard init -->
<script src="{{ url('assets/admin/pages/jquery.dashboard.js') }}"></script>

<!-- App js -->
<script src="{{ url('assets/admin/js/jquery.core.js') }}"></script>
<script src="{{ url('assets/admin/js/jquery.app.js') }}"></script>

<script src="{{ url('MD.BootstrapPersianDateTimePicker-master-bs4/dist/jquery.md.bootstrap.datetimepicker.js') }}"></script>

<script>
    $('#expireDate').MdPersianDateTimePicker({
        targetTextSelector: '#expireInput',
        englishNumber: true,
        textFormat: 'yyyy-MM-dd HH:mm:ss',
        enableTimePicker: true,
    });
</script>

</body>
</html>
