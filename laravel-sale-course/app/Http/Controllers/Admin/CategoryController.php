<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::latest()->paginate(20);
        $categories_2 = Category::where('parent' , '!=' , null)->get();
        $valed_categories = Category::with('parent')->get();
        $parent_categories = Category::with('parent')->whereNotNull('parent')->get();

        return view('admin.categories.categories' , compact('categories_2' , 'categories' , 'parent_categories' , 'valed_categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::where('parent' , null)->get();
        return view('admin.categories.create' , compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request , Category $category)
    {
        $request->validate([
            'name' => 'required|unique:category,name,'. $category->id,
            'status' => 'required',
        ]);

        Category::create([
            'name' => $request->name,
            'status' => $request->status,
            'parent' => $request->parent == 0 ? null : $request->parent,
        ]);

        Alert::success('دسته بندی با موفقیت ایجاد شد')->autoClose(2000);
        return redirect()->route('admin.categories.index');
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
    public function edit(Category $category)
    {
        $categories = Category::where('parent' , null)->get();
        return view('admin.categories.edit' , compact('category' , 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request , Category $category)
    {
        $request->validate([
            'name' => 'required|unique:category,name,'. $category->id,
            'status' => 'required',
        ]);

        $category->update([
            'name' => $request->name,
            'slug' => str_replace(' ' , '-' , $request->name),
            'status' => $request->status,
            'parent' => $request->parent == 0 ? null : $request->parent,
        ]);

        Alert::success('دسته بندی با موفقیت ویرایش شد')->autoClose(2000);
        return redirect()->route('admin.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category = Category::findOrFail($category->id);
        $category->delete();
        Alert::success('دسته بندی مورد نظر با موفقیت حذف شد')->autoClose(2000);
        return redirect()->back();
    }
}
