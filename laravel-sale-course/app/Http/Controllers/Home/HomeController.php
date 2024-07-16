<?php

namespace App\Http\Controllers\Home;

use Mail;
use Error;
use App\Models\Ad;
use App\Models\Cart;
use App\Models\User;
use App\Models\Course;
use App\Models\Article;
use App\Models\Comment;
use App\Models\Category;
use App\Mail\ContactEmail;
use App\Models\Categories;
use App\Models\WebSetting;
use App\Models\CourseVideo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;
use Artesaos\SEOTools\Facades\OpenGraph;
use RealRashid\SweetAlert\Facades\Alert;
use Artesaos\SEOTools\Facades\TwitterCard;

class HomeController extends Controller
{
    public function index()
    {
        if(auth()->check()) {
            if(auth()->user()->email_verified_at == null) {
                return redirect()->route('verification.notice');
            }
        }

        $categories = Category::with('parent')->whereNull('parent')->where('status' , '1')->get();
        $subcategories = Category::with('parent')->whereNotNull('parent')->get();
        $valed_categories = Category::with('parent')->whereNull('parent')->where('status' , '0')->get();

        $ads = Ad::orderBy('id' , 'DESC')->take(4)->get();
        $courses = Course::where('status' , '=' , '1')->orderBy('id' , 'DESC')->take(6)->get();
        $comments = Comment::latest()->take(4)->get();
        $articles = Article::latest()->where('status' , '!=' , 0)->take(3)->paginate(3);
        $course_cart = Cart::where('user_id' , auth()->check() ? auth()->user()->id : '')->get();

        $course_detail = DB::table('carts')->join('courses' , 'carts.course_id' , '=' , 'courses.id')
        ->where('user_id' , auth()->check() ? auth()->user()->id : '')->get();
        $course_detail_total = DB::table('carts')->where('user_id' , auth()->check() ? auth()->user()->id : '')
        ->sum('price');
        $course_sale_price = DB::table('carts')->where('user_id' , auth()->check() ? auth()->user()->id : '')
        ->sum('sale_price' , '+' , 'price');
        $total_amount = $course_detail_total + $course_sale_price;

        $web_setting = WebSetting::first();

        SEOMeta::setDescription($web_setting->description !== null ? strip_tags($web_setting->description) : 'آموزش برنامه نویسی
        - بیزی لرن');
        SEOMeta::setCanonical(route('home.index'));

        OpenGraph::setDescription($web_setting->description !== null ? strip_tags($web_setting->description) : 'آموزش برنامه نویسی
        - بیزی لرن' );
        OpenGraph::setTitle('بیزی لرن');
        OpenGraph::setUrl(route('home.index'));
        OpenGraph::addProperty('type', 'بیزی لرن');

        TwitterCard::setTitle('بیزی لرن');
        TwitterCard::setSite('بیزی لرن');

        JsonLd::setTitle('بیزی لرن');
        JsonLd::setDescription($web_setting->description !== null ? strip_tags($web_setting->description) : 'آموزش برنامه نویسی
        - بیزی لرن' );
        JsonLd::addImage('https://codecasts.com.br/img/logo.jpg');

        OpenGraph::setTitle('Book')
        ->setDescription('Some Book')
        ->setType('book')
        ->setBook([
            'author' => 'بیزی لرن',
            'isbn' => 'string',
            'release_date' => 'datetime',
            'tag' => 'بیزی لرن'
        ]);

        return view('home.index' , compact('valed_categories' , 'subcategories' , 'categories' , 'web_setting' , 'total_amount' , 'course_sale_price' , 'course_sale_price' , 'course_detail_total' , 'course_detail' , 'course_cart' , 'ads' , 'courses' , 'comments' , 'articles'));
    }

    public function course_page(Course $course)
    {
        $count_video = CourseVideo::where('course_id' , $course->id)->get()->count();
        $course_videos = CourseVideo::where('course_id' , $course->id)->get();
        return view('home.course' , compact('course' , 'course_videos' , 'count_video'));
    }

    public function login() {

        return view('home.course');

    }


    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        $articles = Article::where('title', 'like', '%' . $keyword . '%')->latest()->skip(0)->take(10)->paginate(10);

        $results = Course::where('title', 'like', '%' . $keyword . '%')
        ->orWhere('description', 'like', '%' . $keyword . '%')
        ->paginate(10);

        $web_setting = WebSetting::first();
        $categories = Category::with('parent')->whereNull('parent')->where('status' , '1')->get();
        $subcategories = Category::with('parent')->whereNotNull('parent')->get();
        $valed_categories = Category::with('parent')->whereNull('parent')->where('status' , '0')->get();

        return view('home.search', ['results' => $results , 'articles' => $articles] , compact('valed_categories' , 'subcategories' , 'web_setting' , 'categories' , 'keyword'));
    }


    public function sendEmail(Request $request)
    {
        $web_setting = WebSetting::first();
        $name = $request->input('name');
        $email = $request->input('email');
        $description = $request->input('description');

        $request->validate([
           'name' => 'required',
           'email' => 'required',
           'description' => 'required',
        ]);

        \Mail::to($web_setting->email)->send(new ContactEmail($name, $email, $description));
        Alert::success('پیام شما با موفقیت ارسال شد جهت بررسی پاسخ، صندوق ورودی ایمیل خود را چک کنید');
        return redirect()->back();
    }
}
