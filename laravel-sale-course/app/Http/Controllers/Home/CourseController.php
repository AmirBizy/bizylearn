<?php

namespace App\Http\Controllers\Home;

use App\Models\Cart;
use App\Models\Role;
use App\Models\User;
use App\Models\Course;
use App\Models\Article;
use App\Models\Comment;
use App\Models\Category;
use App\Models\SideCourse;
use App\Models\WebSetting;
use App\Models\CourseVideo;
use App\Models\Transaction;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;

class CourseController extends Controller
{
    public function course_page(Course $course , User $user , Category $category)
    {
        $count_video = CourseVideo::where('course_id' , $course->id)->get()->count();
        $course_videos = CourseVideo::where('course_id' , $course->id)->get();
        $categories = Category::with('parent')->whereNull('parent')->where('status' , '1')->get();
        $subcategories = Category::with('parent')->whereNotNull('parent')->get();
        $valed_categories = Category::with('parent')->whereNull('parent')->where('status' , '0')->get();
        $numb_row = 1;
        $comments = Comment::where('course_id' , '=' , $course->id)->where('status' , 1)->orderBy('id' , 'DESC')->paginate(20);
        $course_cart = Cart::where('course_id' , $course->id)->where('user_id' , auth()->check() ? auth()->user()->id : '')->get();
        $related_course = Course::where('category' , $course->category)->where('id' , '!=' , $course->id)->take(3)->get();
        $web_setting = WebSetting::first();
        $transaction = Transaction::where('course_id' , $course->id)->where('user_id' , auth()->check() ? auth()->user()->id : '')->where('status' , 1)->get();
        $side_courses = SideCourse::where('course_id' , $course->id)->get();
        $related_article = Article::where('category' , $course->category)->where('id' , '!=' , $course->id)->take(5)->get();
        $random_category = Category::all()->random(5);

        SEOMeta::setTitle($course->title);
        SEOMeta::setDescription(Str::words($course->description, '100'));
        SEOMeta::addMeta('course:published_time', verta($course->created_at), 'property');
        SEOMeta::addMeta('course:category', $course->categoryName->name, 'property');
        SEOMeta::addKeyword([$course->title, $course->creatorCourse->name, $course->categoryName->name]);

        OpenGraph::setTitle($course->title);
        OpenGraph::setUrl(route('home.course' , ['course' => $course->slug]));
        OpenGraph::addProperty('type', 'course');
        OpenGraph::addProperty('locale', 'fa-en');
        OpenGraph::addProperty('locale:alternate', ['fa-ir', 'en-us']);
        OpenGraph::addImage(url('course_image/'.$course->image));

        return view('home.course' , compact('random_category','related_article' , 'user' , 'side_courses' , 'valed_categories' , 'subcategories' , 'transaction' , 'web_setting' , 'related_course' , 'course_cart' , 'course_videos' , 'count_video' , 'course' , 'categories' , 'numb_row' , 'comments'));
    }


    public function index()
    {
        $courses = Course::latest()->paginate(9);
        $categories = Category::with('parent')->whereNull('parent')->where('status' , '1')->get();
        $subcategories = Category::with('parent')->whereNotNull('parent')->get();
        $valed_categories = Category::with('parent')->whereNull('parent')->where('status' , '0')->get();
        $web_setting = WebSetting::first();
        return view('home.courses' , compact('valed_categories' , 'subcategories' , 'web_setting' , 'courses' , 'categories'));
    }
}
