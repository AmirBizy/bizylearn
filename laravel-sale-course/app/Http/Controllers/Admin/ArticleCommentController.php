<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\ArticleComment;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class ArticleCommentController extends Controller
{
    public function index() {
        $article_comments = ArticleComment::latest()->paginate(50);
        return view('admin.article_comments.comments' , compact('article_comments'));
    }


    public function edit(ArticleComment $comment) {
        return view('admin.article_comments.edit' , compact('comment'));
    }


    public function update(Request $request , ArticleComment $comment) {
        $request->validate([
            'user_id' => 'required',
            'status' => 'required',
            'text' => 'required',
        ]);

        $comment->update([
            'user_id' => $comment->userArticleComment->id,
            'status' => $request->status,
            'text' => $request->text,
        ]);

        Alert::success('دیدگاه مورد نظر با موفقیت ویرایش شد');
        return redirect()->route('admin.article.comments');
    }


    public function delete(ArticleComment $comment) {
        $delete_comment = ArticleComment::findOrFail($comment->id);
        $delete_comment->delete();
        Alert::success('دیدگاه مورد نظر با حذف تایید شد');
        return redirect()->route('admin.article.comments');
    }


    public function approve_status(ArticleComment $comment) {
        $comment->update([
            'status' => '1'
        ]);

        Alert::success('دیدگاه مورد نظر با موفقیت تایید شد');
        return redirect()->back();
    }


    public function no_approve_status(ArticleComment $comment) {
        $comment->update([
            'status' => '0'
        ]);

        Alert::success('دیدگاه مورد نظر با موفقیت غیرفعال شد');
        return redirect()->back();
    }


    public function reply_comment(ArticleComment $comment) {
        return view('admin.article_comments.reply' , compact('comment'));
    }


    public function reply_comment_post(Request $request , ArticleComment $comment) {
        if(auth()->user()->profile) {
            $profile = auth()->user()->profile;
        } else {
            $profile = null;
        }

        $comment->update([
            'admin_name' => auth()->user()->id . ' - ' . '( ' . auth()->user()->roles[0]->display_name . ' )',
            'admin_text' => $request->admin_text,
            'admin_profile' => $profile
        ]);

        Alert::success('پاسخ به دیدگاه کاربر با موفقیت انجام شد');
        return redirect()->route('admin.article.comments');
    }
}
