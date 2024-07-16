@section('title')
ویرایش سطح دسترسی
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
                                    <form role="form" action="{{ route('admin.permissions.update' , ['permission' => $permission->id]) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                        			<div class="row">

                        				<div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">نام انگلیسی</label>
                                                <input type="text" name="name" class="form-control" id="exampleInputEmail1" value="{{ $permission->name }}">
                                            </div>
                        				</div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">نام نمایشی فارسی</label>
                                                <input type="text" name="display_name" class="form-control" id="exampleInputEmail1" value="{{ $permission->display_name }}">
                                            </div>
                        				</div>

                                        <div class="col-md-12" style="margin-top: 20px;">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">ویرایش سطح</button>
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
