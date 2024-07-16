@section('title')
لیست تبلیغات
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

                        				<table class="table table-bordered">
                                            <thead>
                                              <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">تصویر</th>
                                                <th scope="col">لینک</th>
                                                <th scope="col">تنظیمات</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($ads as $key => $ad)
                                              <tr>
                                                <th scope="row">{{ $ads->firstItem() + $key }}</th>
                                                <td><img width="60px" height="40px" src="{{ url('ad_image/'.$ad->image) }}" alt=""></td>
                                                <td><a href="{{ $ad->link }}" target="_blank">{{ $ad->link }}</a></td>
                                                  <td style="display: flex; border-bottom: none;">
                                                      <a href="{{ route('admin.ads.edit' , ['ad' => $ad->id]) }}" class="btn btn-primary">ویرایش</a>
                                                      <form action="{{ route('admin.ads.destroy' , ['ad' => $ad->id]) }}" method="POST">
                                                          @csrf
                                                          @method('DELETE')
                                                          <button type="submit" class="btn btn-danger" style="margin-right: 10px; display: none;">حذف</button>
                                                      </form>

                                                      <form action="{{ route('admin.ads.destroy', ['ad' => $ad->id]) }}" method="POST">
                                                          @csrf
                                                          {{ method_field('DELETE')}}
                                                          <button style="margin-right: 10px;" class="btn btn-danger" type="submit">حذف</button>
                                                      </form>
                                                  </td>
                                              </tr>
                                            @endforeach
                                            </tbody>
                                          </table>

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
