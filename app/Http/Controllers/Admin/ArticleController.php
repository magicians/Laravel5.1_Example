<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Article;

use App\Http\Requests;
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
            ->withArticles(Article::where('is_draft', false)->published()
                ->select('id', 'user_id', 'title', 'intro', 'published_at', 'is_checked')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
            $article->save();
            return redirect()
                ->route('admin.article.index')
                ->withSuccess($article->title . 'is approved');
        } elseif ($request->action === 'unapproved') {
            $article->is_checked = 2;
            $article->save();
            return redirect()
                ->route('admin.article.index')
                ->withSuccess($article->title . ' unapprove');
        } else {
            $article->is_checked = 0;
            $article->save();
            return redirect()
                ->route('admin.article.index')
                ->withSuccess($article->title . ' has been changed status');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
