<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = Comment::latest()->paginate(50);
        return view('admin.comments.comments' , compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function edit(Request $request , Comment $comment)
    {
//        dd($comment->getCourseNameAttribute[0]->title);
        return view('admin.comments.edit' , compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request , Comment $comment)
    {
        $request->validate([
           'username' => 'required',
           'email' => 'required',
           'status' => 'required',
           'text' => 'required',
        ]);

        $comment->update([
           'username' => $comment->userComment->id,
           'email' => $request->email,
           'status' => $request->status,
           'text' => $request->text,
        ]);

        Alert::success('دیدگاه مورد نظر با موفقیت ویرایش شد');
        return redirect()->route('admin.comments.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        $delete_comment = Comment::findOrFail($comment->id);
        $delete_comment->delete();
        Alert::success('دیدگاه مورد نظر با حذف تایید شد');
        return redirect()->route('admin.comments.index');
    }


    public function approve_status(Comment $comment)
    {
        $comment->update([
           'status' => 1
        ]);

        Alert::success('دیدگاه مورد نظر با موفقیت تایید شد');
        return redirect()->route('admin.comments.index');
    }

    public function no_approve_status(Comment $comment)
    {
        $comment->update([
            'status' => 0
        ]);

        Alert::success('دیدگاه مورد نظر با موفقیت غیرفعال شد');
        return redirect()->route('admin.comments.index');
    }

    public function reply_comment(Comment $comment)
    {
        return view('admin.comments.reply' , compact('comment'));
    }

    public function reply_comment_post(Request $request , Comment $comment)
    {
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
        return redirect()->route('admin.comments.index');
    }
}
