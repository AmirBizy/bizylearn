<?php

namespace App\Http\Controllers\Home;

use App\Models\Cart;
use App\Models\Coupon;
use App\Models\Course;
use App\Models\Category;
use App\Models\WebSetting;
use Illuminate\Http\Request;
use App\Models\CouponForUser;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class CartController extends Controller
{

    public function index(Request $request , Coupon $my_coupon)
    {
        $categories = Category::with('parent')->whereNull('parent')->where('status' , '1')->get();
        $subcategories = Category::with('parent')->whereNotNull('parent')->get();
        $valed_categories = Category::with('parent')->whereNull('parent')->where('status' , '0')->get();
        $web_setting = WebSetting::first();
        $userId = auth()->user()->id;
        $couponForUser = CouponForUser::where('user_id' , $userId)->first();
        return view('profile.carts' , compact('valed_categories' , 'subcategories' , 'couponForUser' , 'web_setting' , 'categories'));
    }


    public function add(Request $request , $course)
    {

        if($_SERVER["REQUEST_METHOD"] == "POST") {

        $course_detail = Course::where('id' , $course)->get();
        $course_cart = Cart::where('course_id' , $course)->where('user_id' , auth()->check() ? auth()->user()->id : '')->get()->count();

        if (auth()->guest()) {
            return redirect(route('login'));
        }

        if(\Cart::get($course) == null) {
        \Cart::add(array(
            'id' => $course,
            'user_id' => auth()->user()->id,
            'name' => $course_detail[0]->title,
            'price' => $course_detail[0]->sale_price !== null ? $course_detail[0]->sale_price : $course_detail[0]->price,
            'quantity' => 1,
            'attributes' => array(
                'image' => $course_detail[0]->image,
                'slug' => route('home.course' , $course_detail[0]->slug),
                'user_id' => auth()->user()->id,
                'status' => '0'
            ),
            'associatedModel' => $course,

        )); } else {
            Alert::warning('دوره قبلا به سبد خرید اضافه شده است!')->showConfirmButton('فهمیدم', '#3085d6');
            return redirect()->back();
        }

        Alert::success('دوره به سبد خرید اضافه شد');
        return redirect()->back();

        } else {
            Alert::error('افزودن به سبد خرید با خطا مواجه شد');
            return redirect()->back();
        }
    }



    public function destroy($course)
    {
        \Cart::remove($course);
        $userId = auth()->user()->id;
        if(\Cart::getContent()->first() == null) {
            $couponForUser = CouponForUser::where('user_id' , $userId)->delete();
        }
        Alert::success('دوره از سبد خرید حذف شد');
        return redirect()->back();
    }
}
