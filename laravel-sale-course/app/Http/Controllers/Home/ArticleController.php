<?php

namespace App\Http\Controllers\Home;

use App\Models\Course;
use App\Models\Article;
use App\Models\Category;
use App\Models\WebSetting;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ArticleComment;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Lang;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;

class ArticleController extends Controller
{
    public function article_page(Article $article)
    {
        $categories = Category::with('parent')->whereNull('parent')->where('status' , '1')->get();
        $subcategories = Category::with('parent')->whereNotNull('parent')->get();
        $valed_categories = Category::with('parent')->whereNull('parent')->where('status' , '0')->get();
        $web_setting = WebSetting::first();
        $article_comments = ArticleComment::where('article_id' , $article->id)->where('status' , '1')->orderBy('id' , 'DESC')->paginate(20);
        $related_article = Article::where('category' , $article->category)->where('id' , '!=' , $article->id)->take(3)->get();
        $related_course = Course::where('category' , $article->category)->where('id' , '!=' , $article->id)->take(5)->get();
        $random_category = Category::all()->random(5);

        SEOMeta::setTitle($article->title);
        SEOMeta::setDescription(Str::words($article->description, '100'));
        SEOMeta::addMeta('article:published_time', verta($article->created_at), 'property');
        SEOMeta::addMeta('article:category', $article->categoryName->name, 'property');
        SEOMeta::addKeyword([$article->title, $article->creatorArticle->name, $article->categoryName->name]);

        OpenGraph::setTitle($article->title);
        OpenGraph::setUrl(route('home.article' , ['article' => $article->slug]));
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addProperty('locale', 'fa-en');
        OpenGraph::addProperty('locale:alternate', ['fa-ir', 'en-us']);
        OpenGraph::addImage(url('articles_image/'.$article->thumbnail));

        return view('home.article' , compact('random_category','related_course' , 'related_article' , 'article_comments' , 'valed_categories' , 'subcategories' ,'web_setting' , 'article' , 'categories'));
    }


    public function articles()
    {
        $articles = Article::latest()->paginate(12);
        $categories = Category::with('parent')->whereNull('parent')->where('status' , '1')->get();
        $subcategories = Category::with('parent')->whereNotNull('parent')->get();
        $valed_categories = Category::with('parent')->whereNull('parent')->where('status' , '0')->get();
        $web_setting = WebSetting::first();
        return view('home.articles' , compact('valed_categories' , 'subcategories' ,'web_setting' , 'articles' , 'categories'));
    }
}
