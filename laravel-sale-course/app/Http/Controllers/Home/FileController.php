<?php

namespace App\Http\Controllers\Home;

use App\Models\Course;
use App\Models\CourseVideo;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class FileController extends Controller
{
    public function download(CourseVideo $video_course , Course $course)
    {
        $parsedUrl = parse_url($_SERVER['REQUEST_URI']);
        $lastSegment = basename($parsedUrl['path']);
        $user_video_course = CourseVideo::where('video_url' , $lastSegment)->get();
        if(isset($user_video_course[0]->course_id)) {
            $user_course = Course::where('id' , $user_video_course[0]->course_id)->get();
        } else {
            Alert::error('لینک وجود ندارد');
            return redirect()->back();
        }

        $file = public_path('course_video/' . $lastSegment);
        $transaction = Transaction::where('course_id' , $user_course[0]->id)->where('user_id' , auth()->check() ? auth()->user()->id : '')->where('status' , 1)->get();

        if($user_video_course[0]->course_id == $user_course[0]->id) {
            foreach($transaction as $user_transaction) {
            if($user_transaction->user_id == auth()->user()->id) {
                return response()->download($file);
            } else {
                Alert::warning('شما دوره را خریداری نکرده اید');
                return redirect()->back();
            }
        }
        } else {
            Alert::warning('شما دوره را خریداری نکرده اید');
            return redirect()->back();
        }

        Alert::warning('شما دوره را خریداری نکرده اید');
        return redirect()->back();

    }


    public function access()
    {
        $parsedUrl = parse_url($_SERVER['REQUEST_URI']);
        $lastSegment = basename($parsedUrl['path']);
        $file = public_path('course_video/' . $lastSegment);
        $user_video_course = CourseVideo::where('video_url' , $lastSegment)->get();

        if (Auth::guest()) {
            return redirect('/login');
        }

        if(isset($user_video_course[0])) {
            if($user_video_course[0]->type == 'رایگان') {
                return response()->download($file);
            }
            Alert::error('لینک وجود ندارد');
            return redirect()->back();
        }

        Alert::error('لینک وجود ندارد');
        return redirect()->back();
    }
}
