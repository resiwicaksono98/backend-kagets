<?php

namespace App\Http\Controllers\Kagets;

use App\Models\News;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Http\Requests\NewsRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{

    public function table(User $user)
    {
        if (Auth::user()->hasRole('admin')) {
            $news = News::latest()->paginate(10);
        } else {
            $news = Auth::user()->news()->latest()->paginate(10);
        }
        return view('news.table', compact('news'));
    }
    public function create()
    {
        return view('news.create', [
            'news' => new News(),
            'category' => Category::get()
        ]);
    }

    public function store(NewsRequest $request)
    {
        $news = Auth::user()->news()->create([
            'title' => $request->title,
            'slug' => Str::slug($request->title . '-' . Str::random(6)),
            'description' => $request->description,
            'rate' => $request->rate,
            'picture_path' => $request->file('picture_path')->store('images/news'),
        ]);

        $news->categories()->sync(request('category'));

        return redirect(route('news.table'))->with('success', 'News Was Created!');
    }

    public function edit(News $news)
    {
        $this->authorize('update', $news);
        return view('news.edit', [
            'news' => $news,
            'category' => Category::get()
        ]);
    }

    public function update(NewsRequest $request, News $news)
    {
        if ($request->picture_path) {
            Storage::delete($news->picture_path);
            $picture_path = $request->file('picture_path')->store('images/news');
        } else {
            $picture_path = $news->picture_path;
        }

      
        $news->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title . '-' . Str::random(6)),
            'description' => $request->description,
            'rate' => $request->rate,
            'picture_path' => $picture_path
        ]);
        $news->categories()->sync(request('category'));
        
        return redirect(route('news.table'))->with('success', 'Data berhasil di Update');
    }

    public function destroy(News $news)
    {
        Storage::delete($news->picture_path);
        $news->categories()->detach();
        $news->delete();

        return redirect(route('news.table'))->with('success', 'News Berhasil Di Hapus');
    }
}
