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
        foreach ($tags as $tag) {
            $latest_posts_by_tag[] = $tag->articles()->published()->where("is_checked", true)->orderBy('published_at',
                'desc')->take(2)->get();
        }
        return view('front.index')->withTags($tags)->withArticles($latest_posts_by_tag);
    }
}
