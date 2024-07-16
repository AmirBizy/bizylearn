@section('title')
    تراکنش ها
@endsection

@include('admin.layouts.header')
<div class="content">
    <div class="breadcrumb">
        <ul>
            <li><a href="index.html">پیشخوان</a></li>
            <li><a href="courses.html" class=""> دوره ها</a></li>
            <li><a href="transactions.html" class="is-active">تراکنش ها</a></li>
        </ul>
    </div>
    <div class="main-content font-size-13">
        <div class="row no-gutters  margin-bottom-10">
            <div class="col-3 padding-20 border-radius-3 bg-white margin-left-10 margin-bottom-10">
                <p>کل فروش ۳۰ روز گذشته  سایت </p>
                <p>2,500,000 تومان</p>
            </div>
            <div class="col-3 padding-20 border-radius-3 bg-white margin-left-10 margin-bottom-10">
                <p>درامد خالص ۳۰ روز گذشته سایت</p>
                <p>2,500,000 تومان</p>
            </div>
            <div class="col-3 padding-20 border-radius-3 bg-white margin-left-10 margin-bottom-10">
                <p>کل فروش سایت</p>
                <p>2,500,000 تومان</p>
            </div>
            <div class="col-3 padding-20 border-radius-3 bg-white margin-bottom-10">
                <p> کل درآمد خالص سایت</p>
                <p>2,500,000 تومان</p>
            </div>
        </div>
        <div class="row no-gutters border-radius-3 font-size-13">
            <div class="col-12 bg-white padding-30 margin-bottom-20">
                محل نمودار درامد سی روز گذاشته
            </div>

        </div>
        <div class="d-flex flex-space-between item-center flex-wrap padding-30 border-radius-3 bg-white">
            <p class="margin-bottom-15">همه تراکنش ها</p>
            <div class="t-header-search">
                <form action="" onclick="event.preventDefault();">
                    <div class="t-header-searchbox font-size-13">
                        <input type="text" class="text search-input__box font-size-13" placeholder="جستجوی تراکنش">
                        <div class="t-header-search-content ">
                            <input type="text" class="text"  placeholder="شماره کارت / بخشی از شماره کارت">
                            <input type="text"  class="text"  placeholder="ایمیل">
                            <input type="text"  class="text"  placeholder="مبلغ به تومان">
                            <input type="text"  class="text" placeholder="شماره">
                            <input type="text"  class="text" placeholder="از تاریخ : 1399/10/11">
                            <input type="text" class="text margin-bottom-20"  placeholder="تا تاریخ : 1399/10/12">
                            <btutton class="btn btn-netcopy_net">جستجو</btutton>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="table__box">
            <table width="100%" class="table">
                <thead role="rowgroup">
                <tr role="row" class="title-row">
                    <th>شناسه پرداخت</th>
                    <th>نام و نام خانوادگی</th>
                    <th>ایمیل پرداخت کننده</th>
                    <th>شماره کارت</th>
                    <th>مبلغ (تومان)</th>
                    <th>درامد شما</th>
                    <th>درامد سایت</th>
                    <th>نام دوره</th>
                    <th>تاریخ و ساعت</th>
                    <th>وضعیت</th>
                    <th>عملیات</th>
                </tr>
                </thead>
                <tbody>
                <tr role="row">
                    <td><a href=""> 1</a></td>
                    <td><a href="">توفیق حمزه ای</a></td>
                    <td><a href="">admin@netcopy.ir</a></td>
                    <td><a href="">6037691581560950</a></td>
                    <td><a href="">600,000</a></td>
                    <td><a href="">400,000</a></td>
                    <td><a href="">400,000</a></td>
                    <td><a href="">خرید دوره - دوره متخصص php سطح مقدماتی</a></td>
                    <td><a href=""> 22:14:48 1399/02/23</a></td>
                    <td><a href="" class="text-success">پرداخت موفق</a></td>
                    <td>
                        <a href="" class="item-delete mlg-15"></a>
                        <a href="edit-transaction.html" class="item-edit"></a>
                    </td>
                </tr>
                <tr role="row">
                    <td><a href=""> 1</a></td>
                    <td><a href="">توفیق حمزه ای</a></td>
                    <td><a href="">admin@netcopy.ir</a></td>
                    <td><a href="">admin@netcopy.ir</a></td>
                    <td><a href="">600,000</a></td>
                    <td><a href="">400,000</a></td>
                    <td><a href="">400,000</a></td>
                    <td><a href="">خرید دوره - دوره متخصص php سطح مقدماتی</a></td>
                    <td><a href=""> 22:14:48 1399/02/23</a></td>
                    <td><a href="" class="text-error">پرداخت ناموفق</a></td>
                    <td>
                        <a href="" class="item-delete mlg-15"></a>
                        <a href="edit-transaction.html" class="item-edit"></a>
                    </td>
                </tr>
                <tr role="row">
                    <td><a href=""> 1</a></td>
                    <td><a href="">توفیق حمزه ای</a></td>
                    <td><a href="">admin@netcopy.ir</a></td>
                    <td><a href="">6037691581560950</a></td>
                    <td><a href="">600,000</a></td>
                    <td><a href="">400,000</a></td>
                    <td><a href="">400,000</a></td>
                    <td><a href="">خرید دوره - دوره متخصص php سطح مقدماتی</a></td>
                    <td><a href=""> 22:14:48 1399/02/23</a></td>
                    <td><a href="" class="text-success">پرداخت موفق</a></td>
                    <td>
                        <a href="" class="item-delete mlg-15"></a>
                        <a href="edit-transaction.html" class="item-edit"></a>
                    </td>
                </tr>
                <tr role="row">
                    <td><a href=""> 1</a></td>
                    <td><a href="">توفیق حمزه ای</a></td>
                    <td><a href="">admin@netcopy.ir</a></td>
                    <td><a href="">admin@netcopy.ir</a></td>
                    <td><a href="">600,000</a></td>
                    <td><a href="">400,000</a></td>
                    <td><a href="">400,000</a></td>
                    <td><a href="">خرید دوره - دوره متخصص php سطح مقدماتی</a></td>
                    <td><a href=""> 22:14:48 1399/02/23</a></td>
                    <td><a href="" class="text-error">پرداخت ناموفق</a></td>
                    <td>
                        <a href="" class="item-delete mlg-15"></a>
                        <a href="edit-transaction.html" class="item-edit"></a>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@include('admin.layouts.footer')
