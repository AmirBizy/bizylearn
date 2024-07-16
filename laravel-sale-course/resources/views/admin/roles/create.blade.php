@section('title')
ایجاد نقش
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
                                    <form role="form" action="{{ route('admin.roles.store') }}" method="POST">
                                    @csrf
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
                                                <label for="exampleInputEmail1">نام انگلیسی</label>
                                                <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="نام انگلیسی را وارد کنید" {{ old('name') }}>
                                            </div>
                        				</div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">نام نمایشی فارسی</label>
                                                <input type="text" name="display_name" class="form-control" id="exampleInputEmail1" placeholder="نام نمایشی فارسی را وارد کنید" {{ old('display_name') }}>
                                            </div>
                        				</div>

                                            <div class="form-group col-md-12">
                                                <div class="accordion" id="accordionExample" style="direction: rtl;">
                                                    <div class="card" style="box-shadow: 0 0 4px -1px; border-radius: 5px;">
                                                        <div class="card-header" id="headingOne">
                                                            <h2 class="mb-0">
                                                                <button style="text-decoration: none; font-size: 17px;" class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                    سطوح دسترسی
                                                                </button>
                                                            </h2>
                                                        </div>

                                                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                                            <div class="card-body row">
                                                                @foreach($permissions as $permission)
                                                                    <div class="form-group form-check col-md-2" style="margin-right: 15px; margin-left: -50px;">
                                                                        <label class="form-check-label" for="exampleCheck1-{{ $permission->id }}">{{ $permission->display_name }}</label>
                                                                        <input type="checkbox" class="form-check-input" id="exampleCheck1-{{ $permission->id }}"
                                                                               name="{{ $permission->name }}" value="{{ $permission->name }}"
                                                                        >
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        <div class="col-md-12" style="margin-top: 20px;">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">ایجاد نقش</button>
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
