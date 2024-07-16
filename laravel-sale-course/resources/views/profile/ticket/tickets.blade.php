@section('title')
    تیکت ها
@endsection

@include('home.layouts.header')

<div class="container" id="responsive-nav-menu-pc">

    <div class="row p-1 mb-5 pb-5">

        @include('profile.sidebar')

        <div class="col-lg-9 mt-4">

            <a href="{{ route('home.ticket.create') }}" id="custom_primary_btn">ایجاد تیکت جدید</a>

            <div class="card my-3 p-3 shadow-sm">
                <div class="row table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">عنوان تیکت</th>
                            <th scope="col">وضعیت</th>
                            <th scope="col">وضعیت تیکت</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tickets as $key => $ticket)
                            <tr>
                                <th scope="row">{{ $tickets->firstItem() + $key }}</th>
                                <td>{{ \Illuminate\Support\Str::of($ticket->title)->words(6, ' ...') }}</td>
                                <td>
                                    @if($ticket->status == 1)
                                        <span class="text-success">پاسخ داده شده</span>
                                    @else
                                        <span class="text-warning">در انتظار پاسخ</span>
                                    @endif
                                </td>
                                <td>
                                    @if($ticket->ticket_status == 1)
                                        @if($ticket->slug !== null)
                                            <a href="{{ route('home.ticket.show' , ['ticket' => $ticket->slug]) }}" class="btn btn-sm btn-primary">مشاهده تیکت</a>
                                        @endif
                                    @else
                                        <a href="{{ route('home.ticket.show' , ['ticket' => $ticket->slug]) }}" class="btn btn-sm btn-warning">بسته شده</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                    {{ $tickets->links() }}
                </div>
            </div>

        </div>

    </div>

</div>


@include('home.layouts.footer')
