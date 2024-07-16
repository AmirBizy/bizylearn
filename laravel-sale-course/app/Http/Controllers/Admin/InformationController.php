<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class InformationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        return view('admin.admin_information.admin_information' , compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $user = auth()->user();

        $request->validate([
           'name' => 'required',
        ]);

        if($request->profile !== null) {

            $image_path = public_path('images/'.$user->profile);// Value is not URL but directory file path
            if (file_exists($image_path)) {
                File::delete($image_path);
            }

            $request->validate([
                'profile' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            ]);

            $imageName = time().rand(100000,999999).'.'.$request->profile->extension();

            $request->profile->move(public_path('images'), $imageName);
        }

        if ($request->password && $request->new_password && $request->retype_new_password !== null) {
            $request->validate([
                'password' => 'required|min:8',
                'new_password' => 'required|min:8',
                'retype_new_password' => 'required|min:8|same:new_password',
            ]);
            if (Hash::check($request->password, auth()->user()->password)) {
                $new_password = Hash::make($request->new_password);
            } else {
                Alert::warning('رمز عبور فعلی وارد شده اشتباه است');
                return redirect()->back();
            }
        }

        $query = DB::table('comments')->where('email' , auth()->user()->email)->update(['user_profile' => $request->profile !== null ? $imageName : auth()->user()->profile]);
        $query_article = DB::table('articles')->where('writer')->update(['writer' => auth()->user()->name]);

        $user->update([
            'name' => $request->name,
            'phone_number' => $request->phone_number !== null ? $request->phone_number : null,
            'profile' => $request->profile !== null ? $imageName : auth()->user()->profile,
            'password' => $request->password && $request->new_password && $request->retype_new_password !== null
             ? $new_password : auth()->user()->password
        ]);


        Alert::success('اطلاعات حساب کاربری با موفقیت ویرایش شد');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
