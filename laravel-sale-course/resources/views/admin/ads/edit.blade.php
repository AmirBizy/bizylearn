@section('title')
ویرایش تبلیغ
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
                                    <form role="form" action="{{ route('admin.ads.update' , ['ad' => $ad->id]) }}" enctype="multipart/form-data" method="POST">
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
                                                <label for="exampleInputEmail1">تصویر تبلیغ</label>
                                                <input type="file" name="image" class="form-control" id="exampleInputEmail1" placeholder="ایمیل خود  را وارد کنید">
                                                @if($ad->image)
                                                    <img width="60px" height="40px" src="{{ url('ad_image/'.$ad->image) }}" alt="">
                                                @endif
                                            </div>
                        				</div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">لینک</label>
                                                <input type="text" name="link" value="{{ $ad->link }}" class="form-control" id="exampleInputPassword1" placeholder="مثال: https://amirbizy.ir">
                                            </div>
                        				</div>

                                        <div class="col-md-12" style="margin-top: 20px;">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">ویرایش تبلیغ</button>
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
