<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$articles = Article::latest()->get();//dal piu recente
        //$articles = Article::oldest()->get(); //dal piu vecchio
        //$articles = Article::all();
        if (auth()->user()->is_admin) {
            $articles = Article::withTrashed()->get();
        } else {
            $articles = Article::where('user_id', '=', auth()->user()->id)->get();
        }

        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $path_image = '';
        if ($request->hasFile('image')) {
            $path_image = $request->file('image')->store('/images', 'public');
        }

        Article::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $path_image,
            'user_id' => auth()->user()->id
            //'user_id' => Auth::user()->id
        ]);

        return to_route('articles.index');
        // return redirect()->route('articles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        if (auth()->user()->is_admin || auth()->user()->id == $article->user_id) {
            return view('articles.edit', compact('article'));
        } else {
            abort(401);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        $path_image = $article->image;
        if ($request->hasFile('image')) {
            $path_image = $request->file('image')->store('/images', 'public');
        }

        $article->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $path_image,
            'user_id' => auth()->user()->id
            //'user_id' => Auth::user()->id
        ]);

        return to_route('articles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        if (auth()->user()->is_admin) {
            $article->delete();
            return to_route('articles.index');
        } else {
            abort(401);
        }
    }
}
