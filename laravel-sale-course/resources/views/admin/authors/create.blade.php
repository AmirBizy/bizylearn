@section('title')
ایجاد نویسنده
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
                                    <form role="form">
                        			<div class="row">

                        				<div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">نام کاربری</label>
                                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="ایمیل خود  را وارد کنید">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">ایمیل</label>
                                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="پسورد">
                                            </div>
                        				</div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">شماره موبایل</label>
                                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="ایمیل خود  را وارد کنید">
                                            </div>
                        				</div>

                        				<div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">سطح دسترسی</label>
                                                <select class="form-control">
                                                    <option value="1">نویسنده</option>
                                                    <option value="0">کاربر معمولی</option>
                                                </select>
                                            </div>
                        				</div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">وضعیت حساب کاربری</label>
                                                <select class="form-control">
                                                    <option value="1">فعال</option>
                                                    <option value="0">غیرفعال</option>
                                                    <option value="2">مسدود</option>
                                                </select>
                                            </div>
                        				</div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">تصویر پروفایل</label>
                                                <input type="file" class="form-control" id="exampleInputEmail1" placeholder="ایمیل خود  را وارد کنید">
                                            </div>
                        				</div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">رمز عبور</label>
                                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="ایمیل خود  را وارد کنید">
                                            </div>
                        				</div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">درباره نویسنده</label>

                                                <textarea name="text" id="content" class="ckeditor" rows="6"></textarea>
                                                <script type="text/javascript">
                                                CKEDITOR.replace('content', {
                                                // Load the German interface.
                                                language: 'fa'
                                                });
                                                </script>

                                            </div>
                        				</div>

                                        <div class="col-md-12" style="margin-top: 20px;">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">ایجاد کاربر</button>
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
