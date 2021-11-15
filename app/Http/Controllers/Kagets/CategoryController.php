<?php

namespace App\Http\Controllers\Kagets;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    public function table()
    {
        $category = Category::withCount('news')->latest()->paginate(10);
        return view('category.table',compact('category'));
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(CategoryRequest $request)
    {
            $request->validate([
                'name' => 'required|unique:categories,name'
            ]);

            Category::create([
                'name' =>  $request->name,
                'slug' => Str::slug($request->name . '-' . Str::random(6)),
            ]);
    
            return back()->with('success','Category Berhasil Dibuat');
        
       

    }

    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }

    public function update(CategoryRequest $request, Category $category)
    {
      
        $category->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name . '-' . Str::random(6)),
        ]);

        return redirect(route('category.table'))->with('success', 'Category Berhasil Di Update');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect(route('problem.table'))->with('success', 'Problem Berhasil Di Hapus');
    }


}
