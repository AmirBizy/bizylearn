@section('title')
ویرایش کد تخفیف
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
                                    <form role="form" action="{{ route('admin.coupons.update' , ['coupon' => $coupon->id]) }}" method="POST">
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
                                                <label for="exampleInputEmail1">کد تخفیف</label>
                                                <input type="text" name="code" value="{{ $coupon->code }}" class="form-control" id="exampleInputEmail1" placeholder="کد تخفیف را وارد کنید">
                                            </div>
                        				</div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">درصد تخفیف</label>
                                                <input type="text" name="percent_off" value="{{ $coupon->percent_off }}" class="form-control" id="exampleInputEmail1" placeholder="درصد تخفیف را وارد کنید">
                                            </div>
                        				</div>

                                        <div class="form-group col-md-6">
                                            <label> تاریخ انقضا کد تخفیف </label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="تاریخ انقضا را انتخاب کنید" id="expireInput" name="expires_at" value="{{ $coupon->expires_at }}">
                                                <span class="input-group-addon" style="cursor: pointer" id="expireDate">انتخاب تاریخ</span>
                                            </div>
                                        </div>

                                        <div class="col-md-12" style="margin-top: 20px;">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">ویرایش کد تخفیف</button>
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
