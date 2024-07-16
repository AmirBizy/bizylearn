<?php

namespace App\Http\Controllers\Home;

use App\Models\User;
use App\Models\Course;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\ArticleComment;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class CommentController extends Controller
{
    public function send_comment(Request $request , Course $course)
    {

        if(auth()->check()) {

            if(empty($request->text)) {
                Alert::warning('فیلد متن نباید خالی باشد')->autoClose(5000);
                return redirect()->back();
            }

            if(strlen($request->text) < 4) {
                Alert::warning('فیلد متن نباید کمتر از 4 کاراکتر باشد')->autoClose(5000);
                return redirect()->back();
            }
        }

        if (auth()->guest()) {
            Alert::error('برای ارسال دیدگاه ابتدا وارد حساب کاربری خود شوید')->autoClose(5000);
            return redirect()->back();
        }

        Comment::create([
           'username' => auth()->check() ? auth()->user()->id : 'کاربر',
           'email' => auth()->check() ? auth()->user()->email : null,
           'text' => $request->text,
           'user_profile' => auth()->user()->profile !== null ? auth()->user()->profile : null,
           'course_id' => $course->id
        ]);

        Alert::success('دیدگاه شما ارسال شد و بعد از تایید مدیر در سایت قرار میگیرد')->autoClose(5000);
        return redirect()->back();

    }

    public function sendArticleComment(Request $request , Article $article) {
  
        if(auth()->check()) {

            if(empty($request->text)) {
                Alert::warning('فیلد متن نباید خالی باشد')->autoClose(5000);
                return redirect()->back();
            }

            if(strlen($request->text) < 4) {
                Alert::warning('فیلد متن نباید کمتر از 4 کاراکتر باشد')->autoClose(5000);
                return redirect()->back();
            }
        }

        if (auth()->guest()) {
            Alert::error('برای ارسال دیدگاه ابتدا وارد حساب کاربری خود شوید')->autoClose(5000);
            return redirect()->back();
        }

        ArticleComment::create([
            'article_id' => $article->id,
            'user_id' => auth()->check() ? auth()->user()->id : 'کاربر',
            'text' => $request->text,
        ]);

         Alert::success('دیدگاه شما ارسال شد و بعد از تایید مدیر در سایت قرار میگیرد')->autoClose(5000);
         return redirect()->back();

    }
}
