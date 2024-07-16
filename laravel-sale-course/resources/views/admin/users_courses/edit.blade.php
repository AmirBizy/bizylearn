@section('title')
ویرایش کاربر شرکت کرده در دوره
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
                                    <form role="form" action="{{ route('admin.users-courses-update' , ['id' => $user_transaction[0]->id]) }}" method="POST">
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
                        				<div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">نام کاربر</label>
                                                <input type="text" disabled value="{{ $transactions->users->name }}" class="form-control">
                                            </div>
                        				</div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">نام دوره</label>
                                                <input type="text" disabled value="{{ $transactions->courses->title }}" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">وضعیت</label>
                                                <select class="form-control" name="status">
                                                    <option class="text-success" value="1" {{ $user_transaction[0]->status == 1 ? 'selected' : '' }}>ثبت نام شده</option>
                                                    <option class="text-danger" value="0" {{ $user_transaction[0]->status == 0 ? 'selected' : '' }}>ناموفق</option>
                                                </select>
                                            </div>
                        				</div>

                                        <div class="col-md-12" style="margin-top: 20px;">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">ویرایش تراکنش کاربر</button>
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
