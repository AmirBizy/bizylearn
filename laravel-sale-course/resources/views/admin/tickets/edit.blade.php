@section('title')
ویرایش تیکت کاربر
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
                                    <form role="form" action="{{ route('admin.tickets.update' , ['ticket' => $ticket->id]) }}" enctype="multipart/form-data" method="POST">
                                        @csrf
                                        @method('PUT')
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
                                                <label for="exampleInputEmail1">عنوان تیکت کاربر</label>
                                                <input type="text" name="title" class="form-control" value="{{ $ticket->title }}">
                                            </div>
                                        </div>

                        				<div class="col-md-12">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">متن تیکت کاربر</label>
                                                <textarea name="description" class="form-control" rows="10">{{ $ticket->description }}</textarea>
                                            </div>
                        				</div>

                                        <div class="col-md-12" style="margin-top: 20px;">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">ویرایش تیکت کاربر</button>
                                            </div>
                        				</div>


                        			</div><!-- end row -->
                                    </form>
                        		</div>
                        	</div><!-- end col -->
                        </div>
                        <!-- end row -->

                    </div> <!-- container -->

                </div> <!-- content -->

                <footer class="footer">
بیزی لرن                </footer>

            </div>



            <!-- End Right content here -->



@include('admin.layouts.footer')
