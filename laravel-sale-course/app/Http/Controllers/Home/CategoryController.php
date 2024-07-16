<?php

namespace App\Http\Controllers\Home;

use App\Models\Course;
use App\Models\Article;
use App\Models\Category;
use App\Models\WebSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function category_page(Category $category)
    {
        $category_courses = Course::where('category' , 'LIKE' , "%$category->id%")->paginate(10);
        $articles = Article::where('category', 'like', "%$category->id%")->paginate(10);
        $categories = Category::with('parent')->whereNull('parent')->where('status' , '1')->get();
        $subcategories = Category::with('parent')->whereNotNull('parent')->get();
        $valed_categories = Category::with('parent')->whereNull('parent')->where('status' , '0')->get();
        $web_setting = WebSetting::first();
        return view('home.category' , compact('articles','valed_categories' , 'web_setting' , 'subcategories' , 'category_courses' , 'categories'));
    }
}
