@section('title')
    لیست تیکت ها
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
                            <div class="row table-responsive">

                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">عنوان تیکت</th>
                                        <th scope="col">اولویت</th>
                                        <th scope="col">وضعیت</th>
                                        <th scope="col">تاریخ ارسال</th>
                                        <th scope="col">تنظیمات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($tickets as $key => $ticket)
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>{{ \Illuminate\Support\Str::of($ticket->title)->words(6, ' ...') }}</td>
                                            <td>
                                                @if($ticket->priority == 1)
                                                    <span class="text-info">معمولی</span>
                                                @elseif($ticket->priority == 2)
                                                    <span class="text-primary">مهم</span>
                                                @elseif($ticket->priority == 3)
                                                    <span class="text-danger">فوری</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($ticket->status == 1)
                                                    <span class="text-success">پاسخ داده شده</span>
                                                @elseif($ticket->status == 0)
                                                    <span class="text-warning">در انتظار پاسخ</span>
                                                @elseif($ticket->tikcet_status == 0)
                                                    <span class="text-dark">تیکت بسته شده</span>
                                                @endif
                                            </td>
                                            <td>{{ verta($ticket->created_at)->formatDifference() }}</td>
                                            <td style="display: flex;">
                                                @if($ticket->ticket_status == 1)
                                                    <a class="btn btn-success" style="margin-left: 10px;" href="{{ route('admin.get.reply.ticket' , ['ticket' => $ticket->slug]) }}">پاسخ تیکت</a>
                                                    <a class="btn btn-primary" href="{{ route('admin.tickets.edit' , ['ticket' => $ticket->id]) }}">ویرایش</a>
                                                    <form action="{{ route('admin.tickets.destroy', ['ticket' => $ticket->id]) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <!-- Button trigger modal -->
                                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#staticBackdrop-{{ $key + 1 }}" style="margin-right: 10px;">
                                                            حذف
                                                        </button>

                                                        <!-- Modal -->
                                                        <div class="modal fade" id="staticBackdrop-{{ $key + 1 }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close" style="font-size: 30px;" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <b><span style="font-size: 20px;">برای حذف مطمئن هستید؟</span></b>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">انصراف</button>
                                                                        <button type="submit" class="btn btn-danger">حذف</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                @else
                                                    <span>بسته شده</span>
                                                    <a class="btn btn-warning" style="margin-right: 10px;" href="{{ route('admin.get.reply.ticket' , ['ticket' => $ticket->slug]) }}">دیدن تیکت</a>
                                                    <form action="{{ route('admin.tickets.destroy', ['ticket' => $ticket->id]) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <!-- Button trigger modal -->
                                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#staticBackdrop-{{ $key + 1 }}" style="margin-right: 10px;">
                                                            حذف
                                                        </button>

                                                        <!-- Modal -->
                                                        <div class="modal fade" id="staticBackdrop-{{ $key + 1 }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close" style="font-size: 30px;" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <b><span style="font-size: 20px;">برای حذف مطمئن هستید؟</span></b>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">انصراف</button>
                                                                        <button type="submit" class="btn btn-danger">حذف</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                {{ $tickets->links() }}
                                <div class="d-flex justify-content-center mt-5">
{{--                                    {{ $users->links() }}--}}
                                </div>

                            </div><!-- end row -->
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
