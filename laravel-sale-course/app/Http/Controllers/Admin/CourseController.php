<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Course;
use App\Models\Category;
use App\Models\SideCourse;
use App\Models\CourseVideo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::latest()->paginate(20);
        return view('admin.courses.courses' , compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.courses.create' , compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request , Course $course)
    {
        $request->validate([
            'title' => 'required|unique:courses,title,'. $course->id,
            'status' => 'required',
            'course_status' => 'required',
            'image' => 'required',
            'category' => 'required',
            'description' => 'required',
            'type' => 'required'
        ]);

        if($request->price !== null) {
            $request->validate([
                'price' => 'required',
            ]);
        }

        if($request->sale_price !== null) {
            $request->validate([
                'sale_price' => 'lt:price',
            ]);
        }

        if($request->image !== null) {
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            ]);

            $imageName = time().'.'.$request->image->extension();

            $request->image->move(public_path('course_image'), $imageName);
        }

        Course::create([
            'title' => $request->title,
            'status' => $request->status,
            'price' => $request->price !== null ? $request->price : '0',
            'sale_price' => $request->sale_price !== null ? $request->sale_price : null,
            'author' => auth()->user()->id,
            'course_status' => $request->course_status,
            'image' => $imageName,
            'category' => $request->category,
            'description' => $request->description,
            'type' => $request->type
        ]);

        Alert::success('دوره با موفقیت ایجاد شد')->autoClose(2000);
        return redirect()->route('admin.courses.index');
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
    public function edit(Request $request , Course $course)
    {
        $categories = Category::all();
        return view('admin.courses.edit' , compact('course' , 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request , Course $course)
    {
        $request->validate([
            'title' => 'required|unique:courses,title,'. $course->id,
            'slug' => 'unique:courses,slug,'. $course->id,
            'status' => 'required',
            'course_status' => 'required',
            'category' => 'required',
            'description' => 'required',
        ]);

        if($request->price !== null) {
            $request->validate([
                'price' => 'required',
            ]);
        }

        if($request->sale_price !== null) {
            $request->validate([
                'sale_price' => 'lt:price',
            ]);
        }

        if($request->image !== null) {

            $image_path = public_path('course_image/'.$course->image);// Value is not URL but directory file path
            if (file_exists($image_path)) {
                File::delete($image_path);
            }

            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            ]);

            $imageName = time().'.'.$request->image->extension();

            $request->image->move(public_path('course_image'), $imageName);
        }

        $course->update([
            'title' => $request->title,
            'slug' => $request->slug,
            'status' => $request->status,
            'price' => $request->price !== null ? $request->price : '0',
            'sale_price' => $request->sale_price !== null ? $request->sale_price : null,
            'author' => auth()->user()->id,
            'course_status' => $request->course_status,
            'image' => $request->image !== null ? $imageName : $course->image,
            'category' => $request->category,
            'description' => $request->description,
            'type' => $request->type
        ]);

        Alert::success('دوره با موفقیت ویرایش شد')->autoClose(2000);
        return redirect()->route('admin.courses.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        $deleteCourse = Course::findOrFail($course->id);
        $deleteCourse->delete();
        Alert::success('دوره با موفقیت حذف شد')->autoClose(5000);
        return redirect()->route('admin.courses.index');
    }


    public function managment(Request $request , Course $course , CourseVideo $courseVideo)
    {
        $courses_video = CourseVideo::where('course_id' , $course->id)->get();
        $num_row = 1;
        return view('admin.courses.managment-video' , compact('course' , 'courses_video' , 'num_row' , 'courseVideo'));
    }

    public function managment_store(Request $request , Course $course , CourseVideo $courseVideo)
    {
        $request->validate([
            'video_time' => 'required',
            'type' => 'required'
        ]);

        if($request->video_url !== null) {

            $request->validate([
                'video_url' => 'required|mimes:mp4,mov,ogg,wmv',
            ]);

            $hex = bin2hex(rand(100000,999999));
            $videoName = time().$hex.'.'.$request->video_url->getClientOriginalExtension();
            $request->video_url->move(public_path('course_video'), $videoName);
        }

        $courseVideo->create([
           'video_url' => $videoName,
           'video_time' => $request->video_time,
           'type' => $request->type,
           'description' => $request->description !== null ? $request->description : null,
           'course_id' => $course->id,
        ]);

        Alert::success('جلسه با موفقیت ایجاد شد')->autoClose(2000);
        return redirect()->back();
    }


    public function managment_edit(Course $course , CourseVideo $courseVideo)
    {
        return view('admin.courses.edit' , compact('course' , 'courseVideo'));
    }


    public function managment_edit_video(Course $course , CourseVideo $courseVideo , $id)
    {
        $courses_video = CourseVideo::findOrFail($id);
        $title_course = Course::where('id' , $courses_video->course_id)->first()->title;
        return view('admin.courses.edit-video' , compact('course' , 'courseVideo' , 'courses_video' , 'id' , 'title_course'));
    }


    public function managment_update_video(Request $request , $id)
    {
        $courses_video = CourseVideo::findOrFail($id);

        $request->validate([
            'video_time' => 'required',
            'type' => 'required'
        ]);

        if($request->video_url !== null) {

            $video_path = public_path('course_video/'.$courses_video->video_url);
            if (file_exists($video_path)) {
                File::delete($video_path);
            }

            $request->validate([
                'video_url' => 'required|mimes:mp4,mov,ogg,wmv',
            ]);

            $hex = bin2hex(rand(100000,999999));
            $videoName = time().$hex.'.'.$request->video_url->getClientOriginalExtension();
            $request->video_url->move(public_path('course_video'), $videoName);
        }

        $courses_video->update([
            'video_url' => $request->video_url !== null ? $videoName : $courses_video->video_url,
            'video_time' => $request->video_time,
            'type' => $request->type,
            'description' => $request->description !== null ? $request->description : null,
        ]);

        Alert::success('جلسه با موفقیت ویرایش شد')->autoClose(2000);
        return redirect()->route('admin.courses.index');

    }


    public function managment_delete($id)
    {
        $courses_video = CourseVideo::findOrFail($id);
        $courses_video->delete();
        Alert::success('جلسه مورد نظر با موفقیت حذف شد')->autoClose(2000);
        return redirect()->back();
    }


    public function sidebar(Course $course) {
        $side_courses = SideCourse::where('course_id' , $course->id)->get();
        $row_count = 1;
        return view('admin.courses.sidebar' , compact('course' , 'side_courses' , 'row_count'));
    }


    public function addSidebar(Request $request , Course $course) {
        $request->validate([
            'description' => 'required'
        ]);

        SideCourse::create([
            'course_id' => $course->id,
            'description' => $request->description
        ]);

        Alert::success('سایدبار با موفقیت ایجاد شد')->autoClose(2000);
        return redirect()->back();
    }


    public function editSidebar(Course $course , SideCourse $sideCourse) {
        $side_course = SideCourse::where('id' , $course->id)->get()->first();
        return view('admin.courses.edit-sidebar' , compact('side_course' , 'course' , 'sideCourse'));
    }


    public function updateSidebar(Request $request , Course $course , SideCourse $sideCourse) {
        $side_course = SideCourse::where('id' , $course->id)->get()->first();
        $request->validate([
            'description' => 'required'
        ]);

        $side_course->update([
            'description' => $request->description
        ]);

        Alert::success('سایدبار با موفقیت ویرایش شد')->autoClose(2000);
        return redirect()->back();
    }


    public function deleteSidebar(Course $course) {
        $side_course = SideCourse::findOrFail($course->id);
        $side_course->delete();
        Alert::success('سایدبار مورد نظر حذف شد')->autoClose(2000);
        return redirect()->back();
    }
}
