@section('title')
    مشاهده تیکت
@endsection

@include('home.layouts.header')

<div class="container" id="responsive-nav-menu-pc">

    <div class="row p-1 mb-5 pb-5">

        @include('profile.sidebar')

        <div class="col-lg-9">

            <div class="card my-3 p-3 shadow-sm">

                <div>

                    @foreach($admin_reply as $admin)
                        @if($admin->reply == 1)
                            <div class="text-dark col-md-7" style="margin-right: auto;">
                                <p class="" style="text-align: right; position: relative; background: #e8e8e8; width: 100%; float: right; padding: 10px 9px; border-radius: 5px;">
                                    <span style="position: absolute; left: 10px; top: 10px;">{{ verta($admin->created_at)->formatDifference() }}</span>
                                    <span class="text-danger">{{ $admin->admin_name }}</span> <br><br> {{ $admin->description }}
                                </p>
                            </div>
                        @else
                            <div class="text-dark col-md-7">
                                <p class="text-dark" style="text-align: right; position: relative; background: aliceblue; width: 100%; float: right; padding: 10px 9px; border-radius: 5px;">
                                    <span style="position: absolute; left: 10px; top: 10px;">{{ verta($admin->created_at)->formatDifference() }}</span>
                                    <span style="color: black;">متن شما :</span> <br><br> {{ $admin->description }}
                                </p>
                            </div>
                        @endif
                    @endforeach

                </div>

            </div>

            @if ($ticket->ticket_status == 1)
            <div class="card my-3 p-3 shadow-sm">
                <form action="{{ route('home.ticket.reply' , $ticket->slug) }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="row"><!-- start dashboard icons -->
                        @if(count($errors) > 0)
                            <div class="mb-3">
                                @foreach($errors->all() as $error)
                                    @php
                                    Alert::error($error);
                                    @endphp
                                @endforeach
                            </div>
                        @endif

                        <div class="col-lg-12 mb-3">
                            <label class="mb-3">پاسخ به تیکت</label>
                            <textarea name="description" cols="30" rows="10" class="form-control"></textarea>
                        </div>

                        <div class="col-lg-6 mt-3">
                            <button type="submit" style="width: auto;" class="rounded">پاسخ به تیکت</button>
                        </div>

                    </div><!-- end dashboard icons -->
                </form>
            </div>
            @endif

        </div>

    </div>

</div>


@include('home.layouts.footer')
