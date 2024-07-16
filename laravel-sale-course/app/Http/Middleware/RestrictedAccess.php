<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\CourseVideo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RestrictedAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        // $video_url = substr($_SERVER['REQUEST_URI'], 9, );
        // $file = public_path('course_video/' . $video_url);
        // $user_video_course = CourseVideo::where('video_url' , $video_url)->get();

        // if (Auth::guest()) {
        //     return redirect('/login');
        // }

        // if($user_video_course[0]) {
        //     if($user_video_course[0]->type == 'رایگان') {
        //         return response()->download($file);
        //     }
        // }

        return $next($request);
    }
}
