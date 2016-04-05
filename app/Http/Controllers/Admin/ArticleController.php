<?php

namespace App\Http\Controllers\Admin;

use App\Article;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('checkAdmin:1');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.article.index')
            ->withArticles(Article::where('is_draft', false)
                ->select('id', 'user_id', 'title', 'intro', 'is_carousel', 'published_at', 'is_checked')->get());
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view('admin.article.show')->withArticle($article);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);

        if ($request->action === 'approved') {
            $article->is_checked = 1;
        } elseif ($request->action === 'unapproved') {
            $article->is_checked = 2;
        } elseif ($request->action === 'review') {
            $article->is_checked = 0;
        }

        if ($request->carousel == '1') {
            $article->is_carousel = true;
        } elseif ($request->carousel == '0') {
            $article->is_carousel = false;
        }
        $article->save();
        return redirect()
            ->route('admin.article.index')
            ->withSuccess($article->title . 'has been changed');
    }
}
