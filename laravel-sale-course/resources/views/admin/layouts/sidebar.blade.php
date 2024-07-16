<div class="sidebar-inner slimscrollleft">

    <!-- User -->
    <div class="user-box">
        <div class="user-img">
            @if(auth()->user()->profile)
                <img src="{{ url('images/'.auth()->user()->profile) }}" style="border-radius: 50%; height: 87px; width: 160px;" alt="user-img" title="Mat Helme" class="img-circle img-thumbnail img-responsive">
            @else
                <img src="{{ url('assets/admin/images/users/avatar-1.jpg') }}" alt="user-img" title="Mat Helme" class="img-circle img-thumbnail img-responsive">
            @endif
            <div class="user-status offline"><i class="zmdi zmdi-dot-circle"></i></div>
        </div>
        <h5><a href="#">{{ auth()->user()->name }} ( <span class="text-primary">{{ auth()->user()->roles[0]->display_name }}</span> )</a> </h5>
        <ul class="list-inline">
            <li>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    @method('POST')
                    <button type="submit" style="background: none; border: none">
                            <i class="zmdi zmdi-power"></i>
                    </button>
                </form>
            </li>
        </ul>
    </div>
    <!-- End User -->

    <!--- Sidemenu -->
    <div id="sidebar-menu">
        <ul>
            @role('admin|writer|support')
            <li>
                <a href="{{ route('admin.admin_index') }}" class="waves-effect {{ request()->is('admin') ? 'active' : '' }}"><i class="zmdi zmdi-view-dashboard"></i> <span> داشبورد </span> </a>
            </li>
            @endrole
            @role('admin')
            <li>
                <a href="{{ route('admin.statement.edit') }}" class="waves-effect {{ request()->is('admin/statement/edit') ? 'active' : '' }}"><i class="zmdi zmdi-collection-text"></i> <span> اعلامیه </span> </a>
            </li>
            @endrole
            @role('admin')
            <li class="has_sub">
                <a href="javascript:void(0);" class="waves-effect {{ request()->is('admin/courses*') ? 'active' : '' }}"><i class="fa fa-play-circle"></i> <span> دوره ها </span> <span class="menu-arrow"></span></a>
                <ul class="list-unstyled">
                    <li class="{{ request()->is('admin/courses') ? 'active' : '' }}"><a href="{{ route('admin.courses.index') }}">لیست دوره ها</a></li>
                    <li class="{{ request()->is('admin/courses/create') ? 'active' : '' }}"><a href="{{ route('admin.courses.create') }}">ایجاد دوره جدید</a></li>
                </ul>
            </li>
            @endrole

            @role('admin')
            <li class="has_sub">
                <a href="javascript:void(0);" class="waves-effect {{ request()->is('admin/users') ? 'active' : '' }}"><i class="fa fa-user"></i> <span> کاربران </span> <span class="menu-arrow"></span></a>
                <ul class="list-unstyled">
                    <li class="{{ request()->is('admin/users/*') ? 'active' : '' }}"><a href="{{ route('admin.users.index') }}">لیست کاربران</a></li>
                    <li class="{{ request()->is('admin/users/create') ? 'active' : '' }}"><a href="{{ route('admin.users.create') }}">ایجاد کاربر دستی</a></li>
                </ul>
            </li>
            @endrole

            @role('admin')
            <li>
                <a href="{{ route('admin.users-courses') }}" class="{{ request()->is('admin/users-courses') ? 'active' : '' }}"><i class="fa fa-shopping-cart"></i> <span> تراکنش های کاربران </span> </a>
            </li>
            @endrole

            @role('admin')
            <li class="has_sub">
                <a href="javascript:void(0);" class="waves-effect {{ request()->is('admin/permissions*') ? 'active' : '' }}"><i class="fa fa-lock"></i> <span> سطوح دسترسی </span> <span class="menu-arrow"></span></a>
                <ul class="list-unstyled">
                    <li class="{{ request()->is('admin/permissions') ? 'active' : '' }}"><a href="{{ route('admin.permissions.index') }}">لیست سطوح دسترسی</a></li>
                    <li class="{{ request()->is('admin/permissions/create') ? 'active' : '' }}"><a href="{{ route('admin.permissions.create') }}">ایجاد سطح دسترسی</a></li>
                </ul>
            </li>
            @endrole

            @role('admin')
            <li class="has_sub">
                <a href="javascript:void(0);" class="waves-effect {{ request()->is('admin/roles*') ? 'active' : '' }}"><i class="fa fa-user-plus"></i> <span> نقش ها </span> <span class="menu-arrow"></span></a>
                <ul class="list-unstyled">
                    <li class="{{ request()->is('admin/roles*' , 'admin/roles/*') ? 'active' : '' }}"><a href="{{ route('admin.roles.index') }}">لیست نقش ها</a></li>
                    <li class="{{ request()->is('admin/roles/create') ? 'active' : '' }}"><a href="{{ route('admin.roles.create') }}">ایجاد نقش</a></li>
                </ul>
            </li>
            @endrole

            @role('admin')
            <li class="has_sub">
                <a href="javascript:void(0);" class="waves-effect {{ request()->is('admin/categories*') ? 'active' : '' }}"><i class="zmdi zmdi-view-list"></i> <span> دسته بندی ها </span> <span class="menu-arrow"></span></a>
                <ul class="list-unstyled">
                    <li class="{{ request()->is('admin/categories') ? 'active' : '' }}"><a href="{{ route('admin.categories.index') }}">لیست دسته بندی ها</a></li>
                    <li class="{{ request()->is('admin/categories/create') ? 'active' : '' }}"><a href="{{ route('admin.categories.create') }}">ایجاد دسته بندی</a></li>
                </ul>
            </li>
            @endrole

            @role('admin|writer|support')
            <li class="has_sub">
                <a href="javascript:void(0);" class="waves-effect {{ request()->is('admin/articles*') ? 'active' : '' }}"><i class="zmdi zmdi-collection-item"></i><span> مقالات </span> <span class="menu-arrow"></span></a>
                <ul class="list-unstyled">
                    <li class="{{ request()->is('admin/articles') ? 'active' : '' }}"><a href="{{ route('admin.articles.index') }}">لیست مقالات</a></li>
                    <li class="{{ request()->is('admin/articles/create') ? 'active' : '' }}"><a href="{{ route('admin.articles.create') }}">ایجاد مقاله</a></li>
                </ul>
            </li>
            @endrole

            {{-- @role('admin|writer|support')
            <li class="has_sub">
                <a href="javascript:void(0);" class="waves-effect {{ request()->is('admin/ads*') ? 'active' : '' }}"><i class="zmdi zmdi-chart"></i><span> تبلیغات </span> <span class="menu-arrow"></span></a>
                <ul class="list-unstyled">
                    <li class="{{ request()->is('admin/ads') ? 'active' : '' }}"><a href="{{ route('admin.ads.index') }}">لیست تبلیغات</a></li>
                    <li class="{{ request()->is('admin/ads/create') ? 'active' : '' }}"><a href="{{ route('admin.ads.create') }}">ایجاد تبلیغ</a></li>
                </ul>
            </li>
            @endrole --}}

            @role('admin|support')
            <li>
                <a href="{{ route('admin.comments.index') }}" class="waves-effect {{ request()->is('admin/comments*') ? 'active' : '' }}"><i class="fa fa-comments"></i> <span> نظرات دوره ها </span> </a>
            </li>
            @endrole

            @role('admin|support|writer')
            <li>
                <a href="{{ route('admin.article.comments') }}" class="waves-effect {{ request()->is('admin/article-comments*') ? 'active' : '' }}"><i class="fa fa-comments"></i> <span> نظرات مقالات </span> </a>
            </li>
            @endrole

            @role('admin|support')
            <li>
                @if(\App\Models\Ticket::where('status' , '0')->get()->count() <= 0)
                <a href="{{ route('admin.tickets.index') }}" class="waves-effect {{ request()->is('admin/tickets*') ? 'active' : '' }}"><i class="fa fa-commenting"></i> <span> تیکت ها </span> </a>
                @else
                <a href="{{ route('admin.tickets.index') }}" class="waves-effect {{ request()->is('admin/tickets*') ? 'active' : '' }}"><i class="fa fa-commenting"></i> <span> تیکت ها  ({{
                $new_tickets = \App\Models\Ticket::where('status' , '0')->get()->count() }}) </span> </a>
                @endif
            </li>
            @endrole

            @role('admin')
            <li class="has_sub">
                <a href="javascript:void(0);" class="waves-effect {{ request()->is('admin/coupons*') ? 'active' : '' }}"><i class="fa fa-gg"></i><span>کد تخفیف </span> <span class="menu-arrow"></span></a>
                <ul class="list-unstyled">
                    <li class="{{ request()->is('admin/coupons') ? 'active' : '' }}"><a href="{{ route('admin.coupons.index') }}">لیست کد تخفیف</a></li>
                    <li class="{{ request()->is('admin/coupons/create') ? 'active' : '' }}"><a href="{{ route('admin.coupons.create') }}">ایجاد کد تخفیف</a></li>
                </ul>
            </li>
            @endrole

            {{-- @role('admin')
            <li>
                <a href="index.html" class="waves-effect"><i class="fa fa-bell"></i> <span> مدیریت اطلاع رسانی </span> </a>
            </li>
            @endrole --}}

            @role('admin|writer|support')
            <li>
                <a href="{{ route('admin.admin-information.index') }}" class="waves-effect {{ request()->is('admin/admin-information*') ? 'active' : '' }}"><i class="fa fa-list-alt"></i> <span> اطلاعات کاربری </span> </a>
            </li>
            @endrole

            @role('admin')
            <li>
                <a href="{{ route('admin.web.setting.index') }}" class="waves-effect {{ request()->is('admin/website-setting*') ? 'active' : '' }}"><i class="fa fa-gear"></i> <span> تنظیمات سایت </span> </a>
            </li>
            @endrole

        </ul>
        <div class="clearfix"></div>
    </div>
    <!-- Sidebar -->
    <div class="clearfix"></div>

</div>
