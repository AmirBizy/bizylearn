<?php

namespace App\Http\Controllers\Admin;

use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coupons = Coupon::latest()->paginate(10);
        return view('admin.coupons.coupons' , compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.coupons.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request , Coupon $coupon)
    {
        $request->validate([
            'code' => 'required|unique:coupons,code,'.$coupon->code,
            'percent_off' => 'required|integer|min:1|max:100',
        ]);

        Coupon::create([
            'code' => $request->code,
            'percent_off' => $request->percent_off,
            'expires_at' => $request->expires_at !== null ? $request->expires_at : null,
        ]);

        Alert::success('کد تخفیف با موفقیت ایجاد شد');
        return redirect()->route('admin.coupons.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request , Coupon $coupon)
    {
        return view('admin.coupons.edit' , compact('coupon'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Coupon $coupon)
    {
        $request->validate([
            // 'code' => 'required|unique:coupons',
            'code' => Rule::unique('coupons')->ignore($coupon->id),
            'percent_off' => 'required|integer|min:1|max:100',
        ]);

        $coupon->update([
            'code' => $request->code,
            'percent_off' => $request->percent_off,
            'expires_at' => $request->expires_at !== null ? $request->expires_at : null,
        ]);

        Alert::success('کد تخفیف با موفقیت ویرایش شد');
        return redirect()->route('admin.coupons.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Coupon $coupon)
    {
        $coupon_delete = Coupon::findOrFail($coupon->id)->delete();
        Alert::success('کد تخفیف با موفقیت حذف شد');
        return redirect()->route('admin.coupons.index');
    }

}
