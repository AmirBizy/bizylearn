@section('title')
ویرایش دسته بندی
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
                                    <form role="form" action="{{ route('admin.categories.update' , ['category' => $category->id]) }}" method="POST">
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
                                                <label for="exampleInputEmail1">نام دسته بندی</label>
                                                <input type="text" name="name" value="{{ $category->name }}" class="form-control" id="exampleInputEmail1" placeholder="نام دسته بندی را وارد کنید">
                                            </div>
                        				</div>

                        				<div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">دسته پدر</label>
                                                <select class="form-control" name="parent">
                                                    <option value="0" {{ $category->name == null ? 'selected' : '' }}>بدون دسته</option>
                                                    @foreach ($categories as $cat)
                                                    <option value="{{ $cat->id }}" {{ $cat->id == $category->parent ? 'selected' : '' }}>{{ $cat->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                        				</div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">وضعیت</label>
                                                <select class="form-control" name="status">
                                                    <option value="1" {{ $category->status == 1 ? 'selected' : '' }}>متغیر</option>
                                                    <option value="0" {{ $category->status == 0 ? 'selected' : '' }}>ثابت</option>
                                                </select>
                                            </div>
                        				</div>

                                        <div class="col-md-12" style="margin-top: 20px;">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">ویرایش دسته بندی</button>
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
