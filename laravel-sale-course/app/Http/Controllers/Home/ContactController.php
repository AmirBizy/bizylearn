<?php

namespace App\Http\Controllers\Home;

use App\Models\Category;
use App\Models\WebSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function index()
    {
        $categories = Category::with('parent')->whereNull('parent')->where('status' , '1')->get();
        $subcategories = Category::with('parent')->whereNotNull('parent')->get();
        $valed_categories = Category::with('parent')->whereNull('parent')->where('status' , '0')->get();
        $web_setting = WebSetting::first();
        return view('home.contact-me' , compact('valed_categories' , 'subcategories' , 'categories' , 'web_setting'));
    }
}
