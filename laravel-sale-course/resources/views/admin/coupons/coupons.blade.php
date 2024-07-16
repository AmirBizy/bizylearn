@section('title')
لیست کد های تخفیف
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
                        			<div class="row table-responsive">

                        				<table class="table table-bordered">
                                            <thead>
                                              <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">کد</th>
                                                <th scope="col">درصد تخفیف</th>
                                                <th scope="col">انقضا کد</th>
                                                <th scope="col">تنظیمات</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($coupons as $key => $coupon)
                                                <tr>
                                                    <th scope="row">1</th>
                                                    <td>{{ $coupon->code }}</td>
                                                    <td>{{ $coupon->percent_off . '%' }}</td>
                                                    <td>{{ $coupon->expires_at == null ? 'ندارد' : $coupon->expires_at }}</td>
                                                    <td style="display: flex;">
                                                        <form action="{{ route('admin.coupons.destroy', ['coupon' => $coupon->id]) }}" method="POST">
                                                            <a class="btn btn-primary" href="{{ route('admin.coupons.edit' , ['coupon' => $coupon->id]) }}">ویرایش</a>
                                                            @csrf
                                                            @method('DELETE')
                                                            <!-- Button trigger modal -->
                                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#staticBackdrop-{{ $key + 1 }}" style="margin-right: 5px;">
                                                                حذف
                                                            </button>

                                                            <!-- Modal -->
                                                            <div class="modal fade" id="staticBackdrop-{{ $key + 1 }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <button type="button" class="close" style="font-size: 30px;" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <b><span style="font-size: 20px;">برای حذف مطمئن هستید؟</span></b>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">انصراف</button>
                                                                            <button type="submit" class="btn btn-danger">حذف</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                          </table>
                                        {{ $coupons->links() }}
                        			</div><!-- end row -->
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
