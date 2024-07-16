<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Statement;
use App\Models\Course;
use App\Models\Transaction;
use App\Models\User;
use App\Models\WebSetting;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
class AdminController extends Controller
{
    public function index() {
        $users = User::all();
        $courses = Course::all();
        $transactions = Transaction::all();
        $comments = Comment::where('status' , 1)->orderBy('created_at' , 'desc')->get()->take(8);
        $web_setting = WebSetting::all()->first();
        $limit_courses = Course::orderBy('id' , 'desc')->take(5)->get();
        return view('admin.index' , compact('limit_courses' , 'users' , 'courses' , 'transactions' , 'comments' , 'web_setting'));
    }

    public function statement_edit()
    {
        $statement = Statement::find(1);
        return view('admin.statement.edit' , compact('statement'));
    }

    public function statement_update(Request $request)
    {
        $statement = Statement::find(1);

        $statement->update([
           'status' => $request->status,
           'color' => $request->color,
           'expire_date' => $request->expire_date,
           'text' => $request->text,
        ]);

        Alert::success('بیانیه با موفقیت ویرایش شد')->autoClose(4000);
        return redirect()->back();
    }
}
