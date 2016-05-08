<?php

namespace App\Http\Controllers\User;

use App\Ad;
use App\Article;
use App\Tag;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display the home page.
     */
    public function index()
    {
        $carousel_news = Article::select('id', 'title', 'page_image')
            ->where('is_checked', true)
            ->where('is_carousel', true)
            ->published()
            ->get();
        $latest_news = Article::select('id', 'title', 'intro', 'page_image')
            ->where('is_checked', true)
            ->published()
            ->orderBy('published_at', 'desc')
            ->take(4)->get();
        $ads = Ad::select('url', 'name', 'image_path')
            ->orderBy('created_at', 'desc')
            ->take(2)->get();
        // get the index article
        $tags = Tag::select('id', 'name')
            ->where('show_index', true)
            ->get();
        $index_articles = array();
        foreach ($tags as $tag) {
            $tag['articles'] = $tag->articles()
                ->select('article_id', 'title', 'intro', 'page_image')
                ->where('is_checked', true)
                ->published()
                ->orderBy('published_at', 'desc')
                ->take(3)->get();
            $index_articles[] = $tag;
        }

        return view('front.index')
            ->with('carousel_news', $carousel_news)
            ->with('latest_news', $latest_news)
            ->with('ads', $ads)
            ->with('index_articles', $index_articles);
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

    /**
     * Display the home page.
     *
     * @param Request $requests
     *
     */
    public function scopeSearch(Request $requests)
    {
        $keyword = $requests->get('q');
        $results = null;
        if (isset($keyword) && trim($keyword) != "") {
            $results = Article::select('id', 'title', 'intro', 'page_image')
                ->where('title', 'LIKE', '%' . $keyword . '%')
                ->where('is_checked', true)
                ->published()
                ->get();
        }
        return view('front.search')->with('articles', $results);
    }
}
