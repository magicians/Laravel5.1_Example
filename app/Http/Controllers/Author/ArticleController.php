<?php

namespace App\Http\Controllers\Author;

use Carbon\Carbon;

use App\Article;
use App\Tag;

use App\Http\Requests;
use App\Http\Requests\ArticleCreateRequest;
use App\Http\Requests\ArticleUpdateRequest;
use App\Http\Controllers\Controller;
use Auth;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('checkAdmin:0');
        $this->middleware('owner', ['except' => ['index', 'create', 'store']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('author.article.index')
            ->withArticles(Article::where('user_id', Auth::id())
                ->select('id', 'title', 'intro', 'published_at', 'is_checked')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $when = Carbon::now()->addHour();
        $fields['publish_date'] = $when->format('M-j-Y');
        $fields['publish_time'] = $when->format('H:i');
        $allTags = Tag::lists('id', 'name');
        return view('author.article.create', compact('fields'))->with('allTags', $allTags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ArticleCreateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleCreateRequest $request)
    {
        $article = Article::create($request->articleFillData());
        $article->syncTags($request->input('tags', []));
        return redirect()
            ->route('author.article.index')
            ->withSuccess("New Article '$article->title' Successfully Created.");
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
        return view('author.article.show')->withArticle($article);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::findOrFail($id);
        if ($article->is_checked === 1) {
            abort(403);
        }

        // Before being fed to the textarea of CKEditor '&'=>'&amp;'
        $article->content = str_replace('&', '&amp;', $article->content);

        $tags = $article->tags()->lists('tag_id')->all();
        $allTags = Tag::lists('id', 'name')->all();

        return view('author.article.edit', compact('article', 'tags', 'allTags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ArticleUpdateRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleUpdateRequest $request, $id)
    {
        $article = Article::findOrFail($id);
        $article->fill($request->articleFillData());
        $article->save();
        $article->syncTags($request->get('tags', []));

        if ($request->action === 'continue') {
            return redirect()
                ->back()
                ->withSuccess(' article saved.');
        }

        return redirect()
            ->route('author.article.index')
            ->withSuccess('article <' . $article->title . '> saved.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->tags()->detach();
        $article->delete();

        return redirect()
            ->route('author.article.index')
            ->withSuccess("Article '$article->title' deleted");
    }
}
