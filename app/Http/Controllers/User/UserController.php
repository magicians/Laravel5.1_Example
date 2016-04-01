<?php

namespace App\Http\Controllers\User;

use App\Article;
use App\Tag;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display the home page.
     */
    public function index()
    {
        $carousel_news = Article::select('id', 'title', 'page_image')->where('is_checked', true)
            ->where('is_carousel', true)->get();
        $latest_news = Article::select('id', 'title', 'intro', 'page_image')->where('is_checked', true)
            ->orderBy('published_at', 'desc')->take(4)->get();
        return view('front.index')
            ->with('carousel_news', $carousel_news)
            ->with('latest_news', $latest_news);
    }

    /**
     * Display the home page.
     *
     * @param int $id category's id
     *
     */
    public function subject($id)
    {
        $tag = Tag::findorfail($id);
        $articles = $tag->articles()->select('article_id', 'title', 'intro', 'page_image')
            ->where('is_checked', true)
            ->published()
            ->orderBy('published_at', 'desc')
            ->paginate(10);
        return view('front.category')->with('articles', $articles);
    }

    /**
     * Display the home page.
     *
     * @param int $id article's id
     *
     */
    public function showArticle($id)
    {
        $article = Article::findorfail($id);
        if ($article->is_checked == false) {
            abort(404);
        }
        return view('front.article')->with('article', $article);
    }
}
