<?php

namespace App\Http\Controllers\Admin;

use App\Models\Article;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.articles.index', [
            'articles' => Article::orderBy('created_at', 'desc')->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.articles.create', [
            'article'    => [],
            'categories' => Category::with('children')->where('parent_id', '0')->get(),
            'delimiter'  => ''
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $article = Article::create($request->except('photo', 'categories'));

        //Categories
        if ($request->input('categories')) :
            $article->categories()->attach($request->input('categories'));
        endif;

        // Image
        if ($request->file('photo') != null) {
            $article->image = $request->file('photo')->store('article-image', 'public');
            $article->save();
        }

        return redirect()->route('admin.article.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('admin.articles.show', [
            'article' => $article
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('admin.articles.edit', [
            'article'    => $article,
            'categories' => Category::with('children')->where('parent_id', '0')->get(),
            'delimiter'  => ''
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $article->update($request->except('slug', 'categories', 'photo'));

        //Categories
        $article->categories()->detach();
        if ($request->input('categories')) :
            $article->categories()->attach($request->input('categories'));
        endif;

        // Image
        if ($request->file('photo') != null) {
            Storage::delete($article->image);
            $article->image = $request->file('photo')->store('article-image', 'public');
            $article->save();
        }

        // Delete the cache
        self::forgetArticleCache($article);
        
        return redirect()->route('admin.article.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        // Delete the cache
        self::forgetArticleCache($article);
        
        Storage::delete($article->image);
        $article->categories()->detach();
        $article->delete();

        return redirect()->route('admin.article.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function image_delete(Article $article)
    {
        Storage::disk('public')->delete($article->image);

        $article->update(['image' => null]);

        return redirect()->route('admin.article.edit', $article);
    }

    /**
     * Forget the articles cache
     * 
     * @param  \App\Article  $article
     */
    public static function forgetArticleCache(Article $article)
    {
        cache()->forget('article-query-'.$article->slug);
        cache()->forget('article-'.$article->slug);
    }
}
