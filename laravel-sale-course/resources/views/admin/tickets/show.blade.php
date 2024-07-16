@section('title')
پاسخ تیکت کاربر
@endsection

@include('admin.layouts.header')


            <!-- Start right Content here -->

            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <div class="row">
                            <div class="">
                                <div class="card-box">
                                    <span class="font-bold">تیکت کاربر و پاسخ های شما</span>
                                    <div style="margin-top: 30px;">
                                            @foreach($admin_reply as $admin)
                                            @if($admin->reply == 1)
                                                <div class="text-dark col-md-12">
                                                    <p class="text-primary" style="text-align: right; margin-right: auto; position: relative; background: #efefef; padding: 10px 9px; border-radius: 5px;">
                                                        <span style="position: absolute; left: 10px; top: 10px;">{{ verta($admin->created_at)->formatDifference() }}</span>
                                                      <span style="color: black;">{{ $admin->admin_name }}</span> <br> {{ $admin->description }}
                                                    </p>
                                                </div>
                                            @else
                                                <div class="text-dark col-md-12">
                                                    <p style="text-align: right; position: relative; background: aliceblue; padding: 10px 9px; border-radius: 5px;">
                                                        <span class="text-primary">{{ verta($admin->created_at)->formatDifference() }}</span>
                                                        <br>
                                                        {{ $admin->description }}
                                                    </p>
                                                </div>
                                            @endif
                                            @endforeach
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" class="text-white">تیکت کاربر و پاسخ های شما</label>
                                    </div>
                                </div>
                            </div><!-- end col -->
                        </div>

                        @if ($ticket->ticket_status == 1)
                        <div class="row">
                        	<div class="col-sm-12">
                        		<div class="card-box">
                                    <form role="form" action="{{ route('admin.reply.ticket' , ['ticket' => $ticket->slug]) }}" method="POST">
                                    @csrf
                                    @method('POST')
                        			<div class="row">
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

                        				<div class="col-md-12">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">متن پاسخ شما</label>
                                                <textarea name="description" class="form-control" rows="10"></textarea>
                                            </div>
                        				</div>

                                        <div class="col-md-12" style="margin-top: 20px;">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">پاسخ به تیکت کاربر</button>
                                                <a style="float: left;" href="{{ route('admin.change.status.ticket' , ['ticket' => $ticket->id]) }}" class="btn btn-danger">بستن تیکت</a>
                                            </div>
                        				</div>

                        			</div><!-- end row -->
                                    </form>
                        		</div>
                        	</div><!-- end col -->
                        </div>
                        <!-- end row -->
                        @endif

                    </div> <!-- container -->

                </div> <!-- content -->

                <footer class="footer">
بیزی لرن                </footer>

            </div>



            <!-- End Right content here -->



@include('admin.layouts.footer')
