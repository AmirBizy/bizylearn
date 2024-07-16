<?php

namespace App\Http\Controllers\Admin;

use App\Models\WebSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class WebsiteSettingController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $web_setting = DB::table('web_setting')->first();
        return view('admin.website_setting.index' , compact('user' , 'web_setting'));
    }


    public function update(Request $request)
    {
        $webSetting = WebSetting::find(1);
        if($request->logo !== null) {

            $image_path = public_path('web_images/'.$webSetting->logo);
            if (file_exists($image_path)) {
                File::delete($image_path);
            }

            $request->validate([
                'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            ]);

            $imageName = verta()->format('Y-m-d-H-m-s' . '-' . rand(100000,999999)) . '-' . $request->logo->getClientOriginalName();
            $request->logo->move(public_path('web_images'), $imageName);
        }

        if($request->home_image !== null) {

            $image_path = public_path('web_images/'.$webSetting->home_image);
            if (file_exists($image_path)) {
                File::delete($image_path);
            }

            $request->validate([
                'home_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            ]);

            $home_image = verta()->format('Y-m-d-H-m-s' . '-' . rand(100000,999999)) . '-' . $request->home_image->getClientOriginalName();
            $request->home_image->move(public_path('web_images'), $home_image);
        }

        $request->validate([
            'description' => 'max:135'
        ]);

        DB::table('web_setting')->update([
            'description' => $request->description,
            'phone' => $request->phone,
            'address' => $request->address,
            'email' => $request->email,
            'telegram_link' => $request->telegram_link,
            'github_link' => $request->github_link,
            'instagram_link' => $request->instagram_link,
            'logo' => $request->logo !== null ? $imageName : $webSetting->logo,
            'home_image' => $request->home_image !== null ? $home_image : $webSetting->home_image,
        ]);

        Alert::success('تنظیمات سایت ویرایش شد');
        return redirect()->back();
    }

}
