<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class AdController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ads = Ad::latest()->paginate(10);
        return view('admin.ads.ads' , compact('ads'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.ads.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $ads = Ad::all();

        if($ads->count() <= 3) {

        $request->validate([
           'image' => 'required',
           'link' => 'required'
        ]);

        if($request->image !== null) {
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            ]);

            $imageName = time().rand(100000,999999).'.'.$request->image->extension();

            $request->image->move(public_path('ad_image'), $imageName);
        }

        $ads = Ad::create([
           'image' => $imageName,
           'link' => $request->link,
        ]);

        Alert::success('تبلیغ با موفقیت ایجاد شد')->autoClose(4000);
        return redirect()->route('admin.ads.index');

        } else {
            Alert::warning('حداکثر 4 تبلیغ میتوانید بسازید')->autoClose(4000);
            return redirect()->route('admin.ads.index');
        }
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
    public function edit(Ad $ad)
    {
        return view('admin.ads.edit' , compact('ad'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ad $ad)
    {
        $request->validate([
            'link' => 'required'
        ]);

        if($request->image !== null) {

            $image_path = public_path('ad_image/'.$ad->image);// Value is not URL but directory file path
            if (file_exists($image_path)) {
                File::delete($image_path);
            }

            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            ]);

            $imageName = time().rand(100000,999999).'.'.$request->image->extension();

            $request->image->move(public_path('ad_image'), $imageName);
        }

        $ad->update([
            'image' => $request->image !== null ? $imageName : $ad->image,
            'link' => $request->link,
        ]);

        Alert::success('تبلیغ با موفقیت ویرایش شد')->autoClose(2000);
        return redirect()->route('admin.ads.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ad $ad)
    {
        $image_path = public_path('ad_image/'.$ad->image);// Value is not URL but directory file path
        if (file_exists($image_path)) {
            File::delete($image_path);
        }

        $ad = Ad::findOrFail($ad->id);
        $ad->delete();
        Alert::success('تبلیغ مورد نظر با موفقیت حذف شد')->autoClose(2000);
        return redirect()->back();
    }
}
