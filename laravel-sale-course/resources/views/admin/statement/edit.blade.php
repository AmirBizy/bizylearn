@section('title')
    ویرایش بیانیه
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
                        <form role="form" action="{{ route('admin.statement.update') }}" method="POST">
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

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">وضعیت</label>
                                            <select class="form-control" name="status" value="{{ old('status') }}">
                                                <option value="1" {{ $statement->status == '1' ? 'selected' : '' }}>فعال</option>
                                                <option value="0" {{ $statement->status == '0' ? 'selected' : '' }}>غیرفعال</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">رنگ باکس</label>
                                            <select class="form-control" name="color" value="{{ old('color') }}">
                                                <option value="green" {{ $statement->color == 'green' ? 'selected' : '' }}>سبز</option>
                                                <option value="yellow" {{ $statement->color == 'yellow' ? 'selected' : '' }}>زرد</option>
                                                <option value="red" {{ $statement->color == 'red' ? 'selected' : '' }}>قرمز</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label> تاریخ انقضا بیانیه </label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="تاریخ انقضا را انتخاب کنید" id="expireInput" name="expire_date" value="{{ $statement->expire_date }}">
                                            <span class="input-group-addon" style="cursor: pointer" id="expireDate">انتخاب تاریخ</span>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <style>
                                                .cke_editor_data {
                                                    background-color: #272727 !important;
                                                }
                                            </style>
                                            <label for="exampleInputEmail1">توضیحات بیانیه</label>
                                            <textarea name="text" value="{{ old('text') }}" id="content" class="ckeditor" rows="6">{{ $statement->text }}</textarea>
                                            <script type="text/javascript">
                                                CKEDITOR.replace('content', {
                                                    language: 'fa',
                                                });
                                            </script>

                                        </div>
                                    </div>

                                    <div class="col-md-12" style="margin-top: 20px;">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">ویرایش بیانیه</button>
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
