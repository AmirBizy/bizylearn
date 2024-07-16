@section('title')
لیست دسته بندی ها
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
                                                <th scope="col">نام دسته بندی</th>
                                                <th scope="col">والد</th>
                                                <th scope="col">وضعیت</th>
                                                <th scope="col">تنظیمات</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($valed_categories as $key => $category)
                                                <tr>
                                                    <th scope="row">{{ $categories->firstItem() + $key }}</th>
                                                    <td>{{ $category->name }}</td>
                                                    <td>
                                                    @if ($category->parent == null)
                                                        <span>بدون والد</span>
                                                        @else
                                                            @if ($category->parentName->id = $category->parent)
                                                            <span class="text-primary">{{ $category->parentName->name }}</span>
                                                            @endif
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($category->status == 1)
                                                            <span style="color: #272727;">متغیر</span>
                                                        @else
                                                            <span class="text-secondary">ثابت</span>
                                                        @endif
                                                    </td>
                                                    <td style="display: flex;">
                                                        <a class="btn btn-primary" href="{{ route('admin.categories.edit' , ['category' => $category->id]) }}">ویرایش</a>
                                                        <form action="{{ route('admin.categories.destroy', ['category' => $category->id]) }}" method="POST">
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

                                          {{ $categories->links() }}

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
