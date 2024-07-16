@section('title')
    ایجاد تیکت
@endsection

@include('home.layouts.header')

<div class="container" id="responsive-nav-menu-pc">

    <div class="row p-1 mb-5 pb-5">

        @include('profile.sidebar')

        <div class="col-lg-9">

            <div class="card my-3 p-3 shadow-sm">

                <form action="{{ route('home.ticket.store') }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="row"><!-- start dashboard icons -->
                        @if(count($errors) > 0)
                            <div class="mb-3 alert alert-danger">
                                @foreach($errors->all() as $error)
                                    <ul class="list-group">
                                        <li class="text-dark" style="list-style: none;">
                                            {{ $error }}
                                        </li>
                                    </ul>
                                @endforeach
                            </div>
                        @endif

                        <div class="row">
                            <div class="col-lg-6 mb-3">
                                <label class="mb-2">عنوان تیکت</label>
                                <input class="" id="custom_ticket_btn" type="text" name="title">
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label class="mb-2">اولویت</label>
                                <select name="priority" class="form-control" style="padding: 9px;">
                                    <option value="1">معمولی</option>
                                    <option value="2">مهم</option>
                                    <option value="3">فوری</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-12 mb-3">
                            <label class="mb-2">توضیحات تیکت</label>
                            <textarea name="description" id="custom_ticket_btn" cols="30" rows="10" placeholder="متن تیکت شما..."></textarea>
                        </div>

                        <div class="col-lg-6 mt-3">
                            <button type="submit" id="custom_update_btn">ایجاد تیکت</button>
                        </div>

                    </div><!-- end dashboard icons -->
                </form>

            </div>

        </div>

    </div>

</div>


@include('home.layouts.footer')
