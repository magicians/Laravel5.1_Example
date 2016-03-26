<?php

namespace App\Http\Controllers\User;

use App\Article;
use App\Tag;

use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all();
        $carousel_news = Article::select('id', 'title', 'page_image')->where('is_checked',
            true)->where('is_carousel', true)->orderBy('published_at', 'desc')->get();
        return view('front.index')->withTags($tags)->with('carousel_news', $carousel_news);
    }
}
