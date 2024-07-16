<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::latest()->paginate(20);
        return view('admin.articles.articles' , compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::latest()->get();
        return view('admin.articles.create' , compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request , Article $article)
    {
        $request->validate([
            'title' => 'required|unique:articles,title,'. $article->id,
            'thumbnail' => 'required',
            'category' => 'required',
            'status' => 'required',
            'description' => 'required',
        ]);


        if($request->thumbnail !== null) {
            $request->validate([
                'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            ]);

            $imageName = time().'.'.$request->thumbnail->extension();

            $request->thumbnail->move(public_path('articles_image'), $imageName);
        }

        $article = Article::create([
            'title' => $request->title,
            'thumbnail' => $imageName,
            'category' => $request->category,
            'status' => $request->status,
            'description' => $request->description,
            'writer' => auth()->user()->id
        ]);

        Alert::success('مقاله با موفقیت ایجاد شد')->autoClose(2000);
        return redirect()->route('admin.articles.index');

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
    public function edit(Article $article)
    {
        $categories = Category::latest()->get();
        return view('admin.articles.edit' , compact('article' , 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title' => 'required|unique:articles,title,'. $article->id,
            'slug' => 'unique:articles,slug,'. $article->id,
            'category' => 'required',
            'status' => 'required',
            'description' => 'required',
        ]);


        if($request->thumbnail !== null) {

            $image_path = public_path('articles_image/'.$article->thumbnail);// Value is not URL but directory file path
            if (file_exists($image_path)) {
                File::delete($image_path);
            }

            $request->validate([
                'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            ]);

            $imageName = time().'.'.$request->thumbnail->extension();

            $request->thumbnail->move(public_path('articles_image'), $imageName);
        }

        $article->update([
            'title' => $request->title,
            'slug' => $request->slug,
            'thumbnail' => $request->thumbnail !== null ? $imageName : $article->thumbnail,
            'category' => $request->category,
            'status' => $request->status,
            'description' => $request->description,
            'writer' => auth()->user()->id
        ]);

        Alert::success('مقاله با موفقیت ویرایش شد')->autoClose(2000);
        return redirect()->route('admin.articles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request , Article $article)
    {

        $image_path = public_path('articles_image/'.$article->thumbnail);// Value is not URL but directory file path
        if (file_exists($image_path)) {
            File::delete($image_path);
        }

        $article = Article::findOrFail($article->id);
        $article->delete();
        Alert::success('مقاله مورد نظر با موفقیت حذف شد')->autoClose(2000);
        return redirect()->back();
    }
}
