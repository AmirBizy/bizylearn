<div class="col-lg-3 mt-3 mb-5" id="custom_side_user_panel" style="height: 410px;"><!-- start right sidebar -->

    <div class="card border-0 shadow-sm bg-secondary" id="custom_profile_user" style="@auth @if(auth()->user()->profile) background: url({{ url('images/'.auth()->user()->profile) }}); background-size: cover; background-position: center; @endif @endauth"><!-- start avatar box -->

        @if(auth()->user()->hasRole('admin|support|writer'))
        <p class="font-14 text-white text-center p-1 mt-auto" id="custom_text_name_sidebar">{{ auth()->user()->name }} ( <a href="{{ route('admin.admin_index') }}" target="_blank" class="text-info">{{ auth()->user()->roles[0]->display_name }}</a> ) عزیز سلام</p>
        @else
        <p class="font-14 text-white text-center p-1 mt-auto"> {{ auth()->user()->name }} عزیز سلام !</p>
        @endif

    </div><!-- end avatar box -->

    <div class="list-group mb-3 mt-2" ><!-- start sidebar menu -->

        <a href="{{ route('profile.edit') }}" class="py-2 list-group-item-action font-13 {{ request()->is('profile') ? 'text-info' : '' }}"> <i id="custom_icon_user_profile" class="fa fa-home align-middle me-2 font-13"></i>پیشخوان</a>

        <a href="{{ route('carts.index') }}" class="py-2 list-group-item-action font-13 {{ request()->is('profile/carts') ? 'text-info' : '' }}"><i id="custom_icon_user_profile" class="fa fa-shopping-cart align-middle me-2 font-15 "></i>سبد خرید  @if(\Cart::getContent()->count() >= 1) ( <span class="text-primary">{{ \Cart::getContent()->count() }}</span> ) @endif</a>

        <a href="{{ route('mycourses') }}" class="py-2 list-group-item-action font-13 text-dark {{ request()->is('profile/my-courses') ? 'text-info' : '' }}"><i id="custom_icon_user_profile" class="fas fa-graduation-cap align-middle me-2 font-15 "></i>دوره های من</a>

        <a href="{{ route('home.ticket.index') }}" class="py-2 list-group-item-action font-13 {{ request()->is('profile/tickets') ? 'text-info' : '' }}"><i id="custom_icon_user_profile" class="fas fa-comment-alt align-middle me-2 font-12"></i>تیکت ها </a>

        <a href="{{ route('profile.information') }}" class="py-2 list-group-item-action font-13 {{ request()->is('profile/information') ? 'text-info' : '' }}"><i id="custom_icon_user_profile" class="fa fa-user-circle align-middle me-2 font-13 "></i>ویرایش حساب کاربری</a>

        <form action="{{ route('logout') }}" style="margin: 0px -6px;" method="POST">
        @csrf
        @method('POST')
        <button style="background: none; border:none;" class="py-2 list-group-item-action font-13"><i id="custom_icon_user_profile" class="fas fa-sign-out-alt align-middle me-2 font-13" style="background: #e74c3c;"></i>خروج از حساب</button>
        </form>

    </div><!-- end sidebar menu -->

</div><!-- end right sidebar -->
