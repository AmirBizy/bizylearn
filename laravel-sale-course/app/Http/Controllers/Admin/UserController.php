<?php

namespace App\Http\Controllers\Admin;

use App\Models\Permission;
use App\Models\Role;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(User $user)
    {
        $users = User::latest()->paginate(50);
        return view('admin.users.users' , compact('users' , 'user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(User $user)
    {
        $roles = Role::all();
        return view('admin.users.create' , compact('user' , 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request , User $user)
    {


        if($request->email_verified_at == '1') {
            $request->email_verified_at = Carbon::createFromFormat('Y-m-d H:i:s', now())->format('Y-m-d H:i:s');
        } else {
            $request->email_verified_at = null;
        }

        // dd($request->email_verified_at);
        $request->validate([
            'email' => 'required|unique:users,email,'. $user->id,
            'status' => 'required',
            'password' => 'required|min:8',
        ]);


        if($request->profile !== null) {

            $image_path = public_path('images/'.$user->profile);// Value is not URL but directory file path
            if (file_exists($image_path)) {
                File::delete($image_path);
            }

            $request->validate([
                'profile' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            ]);

            $imageName = time().'.'.$request->profile->extension();

            $request->profile->move(public_path('images'), $imageName);
        }


        if($request->phone_number !== null) {
            $request->validate([
                'phone_number' => 'ir_mobile|unique:users,phone_number,'.$user->id,
            ]);

            $phone_number = $request->phone_number;
        }


        if($request->password !== null) {
            $request->validate([
                'password' => 'required|min:8',
            ]);

            $password = Hash::make($request->password);
        }

        try {
            DB::beginTransaction();

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'status' => $request->status,
            'phone_number' => $request->phone_number !== null ? $phone_number : null,
            'profile' => $request->profile !== null ? $imageName : $user->profile,
            'password' => $request->password !== null ? $password : $user->password,
            'email_verified_at' => $request->email_verified_at,
        ]);

        $user->syncRoles($request->role);

            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            alert()->error('مشکل در ایجاد کاربر', $ex->getMessage())->persistent('حله');
            return redirect()->route('admin.roles.index');
        }

        Alert::success('کاربر با موفقیت ایجاد شد')->autoClose(2000);
        return redirect()->route('admin.users.index');
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
    public function edit(User $user)
    {
        $roles = Role::all();
        $permissions = Permission::all();
        return view('admin.users.edit' , compact('user' , 'roles' , 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'email' => 'required|unique:users,email,'. $user->id,
            'status' => 'required',
        ]);

        if($request->profile !== null) {

            $image_path = public_path('images/'.$user->profile);// Value is not URL but directory file path
            if (file_exists($image_path)) {
                File::delete($image_path);
            }

            $request->validate([
                'profile' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            ]);

            $imageName = time().'.'.$request->profile->extension();

            $request->profile->move(public_path('images'), $imageName);
        }

        if($request->password !== null) {
            $request->validate([
                'password' => 'required|min:8',
            ]);

            $password = Hash::make($request->password);
        }

        if($request->phone_number !== null) {
            $request->validate([
                'phone_number' => 'ir_mobile',
            ]);

            $phone_number = $request->phone_number;
        }

        if($request->email_verified_at == '1') {
            $request->email_verified_at = Carbon::createFromFormat('Y-m-d H:i:s', now())->format('Y-m-d H:i:s');
        } else {
            $request->email_verified_at = null;
        }

        try {
            DB::beginTransaction();

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'status' => $request->status,
            'phone_number' => $request->phone_number !== null ? $phone_number : null,
            'profile' => $request->profile !== null ? $imageName : $user->profile,
            'password' => $request->password !== null ? $password : $user->password,
            'email_verified_at' => $request->email_verified_at,
        ]);

        $user->syncRoles($request->role);
        $permissions = $request->except('_token','display_name','name','role','email','phone_number','status','email_verified_at','profile','password','_method');
        $user->syncPermissions($permissions);

            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            alert()->error('مشکل در ویرایش کاربر', $ex->getMessage())->persistent('حله');
            return redirect()->route('admin.roles.index');
        }

        Alert::success('کاربر مورد نظر با موفقیت ویرایش شد')->autoClose(2000);
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user , Request $request)
    {
        $image_path = public_path('images/'.$user->profile);// Value is not URL but directory file path
        if (file_exists($image_path)) {
            File::delete($image_path);
        }

        $user = User::findOrFail($user->id);
        $user->delete();
        Alert::success('کاربر مورد نظر با موفقیت حذف شد')->autoClose(2000);
        return redirect()->back();
    }


    public function usersCourses() {
        $transactions = Transaction::latest()->paginate(50);
        $count = 1;
        return view('admin.users_courses.users_courses' , compact('transactions' , 'count'));
    }


    public function usersCoursesEdit(Transaction $transaction , $id)
    {
        $user_transaction = Transaction::where('id' , $id)->get();
        $transactions = Transaction::findOrFail($id);
        return view('admin.users_courses.edit' , compact('user_transaction' , 'transactions'));
    }


    public function usersCoursesUpdate(Request $request , $id)
    {
        $transaction = Transaction::findOrFail($id);

        $request->validate([
           'status' => 'required'
        ]);

        $transaction->update([
           'status' => $request->status
        ]);

        Alert::success('تراکنش کاربر با موفقیت ویرایش شد')->autoClose(2000);
        return redirect()->back();
    }
}
