@section('title')
    حساب کاربری
@endsection

@include('home.layouts.header')

<div class="container" id="responsive-nav-menu-pc">

    <div class="row p-1 mb-5 pb-5">

        @include('profile.sidebar')

        <div class="col-lg-9">

            <div class="card my-3 p-3 shadow-sm">

                <form action="{{ route('profile.information.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row"><!-- start dashboard icons -->
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
                        <div class="col-lg-6 mb-3">
                            <label for="" class="mb-2">نام کاربری</label>
                            <input class="form-control" type="" name="name" value="{{ auth()->user()->name }}">
                        </div>

                        <div class="col-lg-6 mb-3">
                            <label for="" class="mb-2">ایمیل ( غیرقابل تغییر )</label>
                            <input class="form-control" disabled type="email" name="email" value="{{ auth()->user()->email }}">
                        </div>

                        <div class="col-lg-6 mb-3">
                            <label for="" class="mb-2">پروفایل</label>
                            <input type="file" name="profile" class="form-control" id="exampleInputEmail1" placeholder="ایمیل خود  را وارد کنید">
                            @if(auth()->user()->profile !== null)
                                <img width="50px" src="{{ url('images/'.auth()->user()->profile) }}" alt="{{ auth()->user()->name }}">
                            @endif
                        </div>

                        <div class="col-lg-6 mb-3">
                            <label for="" class="mb-2">تاریخ عضویت ( غیرقابل تغییر )</label>
                            <input class="form-control" style="padding: 7px;" disabled type="text" name="created_at" value="{{ verta(auth()->user()->created_at)->formatDate() }}">
                        </div>

                        <div class="col-lg-12 mb-3">
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingThree">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            تغییر رمز عبور
                                        </button>
                                    </h2>
                                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div class="row">
                                                <span class="mb-5 text-primary">در صورتی که رمز عبور حساب را میخواهید تغییر دهید 3 فیلد پایین را با دقت پر کنید. در غیر این صورت فیلد ها را پر نکنید</span>
                                                <div class="col-lg-6 mb-3">
                                                    <label for="" class="mb-2">رمز عبور فعلی را وارد کنید</label>
                                                    <input class="form-control" type="password" name="password" autocomplete="off">
                                                </div>
                                                <div class="col-lg-6 mb-3">
                                                    <label for="" class="mb-2">رمز عبور جدید را وارد کنید</label>
                                                    <input class="form-control" type="password" name="new_password" value="{{ old('new_password') }}">
                                                </div>
                                                <div class="col-lg-6 mb-3">
                                                    <label for="" class="mb-2">تکرار رمز عبور جدید را وارد کنید</label>
                                                    <input class="form-control" type="password" name="retype_new_password">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 mt-3">
                            <button type="submit" id="custom_update_btn">بروزرسانی پروفایل</button>
                        </div>

                    </div><!-- end dashboard icons -->
                </form>

            </div>

        </div>

    </div>

</div>


@include('home.layouts.footer')
