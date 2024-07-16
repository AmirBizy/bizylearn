@section('title')
لیست مقالات
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
                                                <th scope="col">تصویر شاخص</th>
                                                <th scope="col">عنوان</th>
                                                <th scope="col">نویسنده</th>
                                                <th scope="col">دسته بندی</th>
                                                <th scope="col">وضعیت</th>
                                                <th scope="col">تاریخ ایجاد</th>
                                                <th scope="col">تنظیمات</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($articles as $key => $article)
                                              <tr>
                                                <th scope="row">{{ $articles->firstItem() + $key }}</th>
                                                <td><img style="width: 70px; height: 40px;" src="{{ url('articles_image/'.$article->thumbnail) }}" alt=""></td>
                                                <td>{{ \Illuminate\Support\Str::of($article->title)->words(3, ' ...') }}</td>
                                                <td>{{ $article->creatorArticle->name }}</td>
                                                <td>
                                                    <a href="{{ route('admin.categories.edit' , ['category' =>$article->categoryName->id]) }}" target="_blank">{{ $article->categoryName->name }}</a>
                                                </td>
                                                <td>
                                                    @if($article->status == 1)
                                                        <span class="text-success">فعال</span>
                                                    @else
                                                        <span class="text-danger">غیرفعال</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    {{ verta($article->created_at)->format('Y-m-d') }}
                                                    <span class="text-primary">{{ verta($article->created_at)->formatDifference() }}</span>
                                                </td>
                                                <td style="display: flex; border-bottom: none;">
                                                    <a href="{{ route('admin.articles.edit' , ['article' => $article->id]) }}" class="btn btn-primary">ویرایش</a>
                                                    <form action="{{ route('admin.articles.destroy', ['article' => $article->id]) }}" method="POST">
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
                                        {{ $articles->links() }}
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
