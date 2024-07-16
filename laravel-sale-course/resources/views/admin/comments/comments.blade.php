@section('title')
لیست دیدگاه ها
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
                                                <th scope="col">نام کاربری</th>
                                                <th scope="col">متن</th>
                                                <th scope="col">وضعیت</th>
                                                <th scope="col">تاریخ</th>
                                                <th scope="col">تنظیمات</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($comments as $key => $comment)
                                              <tr>
                                                <th scope="row">{{ $comments->firstItem() + $key }}</th>
                                                <td>{{ $comment->userComment->name }}</td>
                                                <td>{{ \Illuminate\Support\Str::of(strip_tags($comment->text))->words(5, ' ...') }}</td>
                                                <td>
                                                    @if($comment->status == 1)
                                                        <span class="text-success">فعال</span>
                                                    @else
                                                        <span class="text-danger">غیرفعال</span>
                                                    @endif
                                                </td>
                                                  <td>{{ verta($comment->created_at)->formatDifference() }}</td>
                                                  <td style="display: flex;">
                                                      @if($comment->status == 1)
                                                          <a href="{{ route('admin.no-approve-status' , ['comment' => $comment->id]) }}" class="btn btn-success btn-sm">تایید شده</a>
                                                      @else
                                                          <a href="{{ route('admin.approve-status' , ['comment' => $comment->id]) }}" class="btn btn-warning btn-sm">در انتظار تایید</a>
                                                      @endif
                                                          <a href="{{ route('admin.reply-comment' , ['comment' => $comment->id]) }}" style="margin-right: 10px;" class="btn btn-warning btn-sm">پاسخ دادن</a>
                                                          <a href="{{ route('admin.comments.edit' , ['comment' => $comment->id]) }}" style="margin-right: 10px;" class="btn btn-primary btn-sm">ویرایش</a>

                                                          <form action="{{ route('admin.comments.destroy', ['comment' => $comment->id]) }}" method="POST">
                                                          @csrf
                                                          @method('DELETE')
                                                          <!-- Button trigger modal -->
                                                              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#staticBackdrop-{{ $key + 1 }}" style="margin-right: 10px;">
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
                                        {{ $comments->links() }}
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
