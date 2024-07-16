<?php

namespace App\Http\Controllers\Home;

use App\Models\Coupon;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\CouponForUser;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class CouponController extends Controller
{
    public function applyCoupon(Request $request)
    {
        $coupon = Coupon::where('code', $request->code)->first();
        $amount = \Cart::getTotal();
        $userID = auth()->user()->id;
        foreach(\Cart::getContent() as $item);

        if (!$coupon) {
            Alert::error('کد تخفیف وجود ندارد');
            return redirect()->back();
        }

        if ($coupon->expires_at < verta('+5 hours -30 minute')) {
            Alert::warning('انقضای این کد تخفیف گذشته');
            Alert::warning(' انقضای این کد تخفیف ' . verta($coupon->expires_at)->formatDifference('-621 year -3 month +10 day +4 hours +29 minute +30 second') . ' گذشته است ');
            return redirect()->back();
        }

        $subtotal = \Cart::getSubTotal();
        $newTotal = ($subtotal * $coupon->percent_off) / 100;

        $couponForUser = CouponForUser::where('user_id' , $userID)->where('code' , $coupon->code)->first();

        if($couponForUser) {
            Alert::error('شما قبلا از این کد تخفیف استفاده کردید');
            return redirect()->back();
        }

        foreach(\Cart::getContent() as $rowId => $item) {
            \Cart::update($rowId , [
                'price' => ($item->price/100)*(100-$coupon->percent_off)
            ]);
        }

        CouponForUser::create([
            'user_id' => $userID,
            'code' => $coupon->code
        ]);

        Alert::success(' کد تخفیف ' .  $coupon->percent_off  . ' درصدی برای شما اعمال شد ' );
        return redirect()->back();
    }
}
