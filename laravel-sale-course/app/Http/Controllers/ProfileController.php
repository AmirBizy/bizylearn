<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\View\View;
use App\Models\WebSetting;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $categories = Category::with('parent')->whereNull('parent')->where('status' , '1')->get();
        $subcategories = Category::with('parent')->whereNotNull('parent')->get();
        $valed_categories = Category::with('parent')->whereNull('parent')->where('status' , '0')->get();
        $web_setting = WebSetting::first();
        $courses = Course::latest()->where('status' , '!=' , 0)->get()->take(2);
        $courses_count = Course::latest()->where('status' , '!=' , 0)->count();
        $user_courses = DB::table('transactions')->where('user_id' , auth()->user()->id)
        ->join('courses' , 'courses.id' , '=' , 'transactions.course_id')
        ->select('courses.*')->get();
        return view('profile.profile', compact('valed_categories' , 'subcategories' , 'courses_count' , 'user_courses' , 'web_setting' , 'categories' , 'courses') , [
            'user' => $request->user(),
        ]);
    }


    public function information()
    {
        $categories = Category::with('parent')->whereNull('parent')->where('status' , '1')->get();
        $subcategories = Category::with('parent')->whereNotNull('parent')->get();
        $valed_categories = Category::with('parent')->whereNull('parent')->where('status' , '0')->get();
        $courses = Course::latest()->where('status' , '!=' , 0)->get()->take(2);
        $web_setting = WebSetting::first();
        return view('profile.information' , compact('valed_categories' , 'subcategories' , 'web_setting' , 'categories' , 'courses'));
    }


    public function information_update(Request $request)
    {

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

        $request->validate([
           'name' => 'required'
        ]);

        if($request->profile !== null) {

            $request->validate([
                'profile' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            ]);

            $image_path = public_path('images/'.auth()->user()->profile);// Value is not URL but directory file path
            if (file_exists($image_path)) {
                File::delete($image_path);
            }

            $imageName = time().rand(100000,999999).'.'.$request->profile->extension();

            $request->profile->move(public_path('images'), $imageName);
        }



        $user = auth()->user();
        $query = DB::table('comments')->where('email' , auth()->user()->email)->update(['user_profile' => $request->profile !== null ? $imageName : auth()->user()->profile]);

        $user->update([
           'name' => $request->name,
           'profile' => $request->profile !== null ? $imageName : auth()->user()->profile,
           'password' => $request->password && $request->new_password && $request->retype_new_password !== null
            ? $new_password : auth()->user()->password
        ]);

        Alert::success('حساب کاربری با موفقیت بروزرسانی شد');
        return redirect()->back();
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }


    public function my_courses()
    {
        $user_courses = DB::table('transactions')->where('user_id' , auth()->user()->id)
        ->join('courses' , 'courses.id' , '=' , 'transactions.course_id')
        ->select('courses.*')->get();
        $web_setting = WebSetting::first();
        $categories = Category::with('parent')->whereNull('parent')->where('status' , '1')->get();
        $subcategories = Category::with('parent')->whereNotNull('parent')->get();
        $valed_categories = Category::with('parent')->whereNull('parent')->where('status' , '0')->get();
        return view('profile.user_courses' , compact('valed_categories' , 'subcategories' , 'user_courses' , 'web_setting' , 'categories'));
    }
}
