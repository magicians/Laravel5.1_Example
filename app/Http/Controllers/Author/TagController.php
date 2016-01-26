<?php

namespace App\Http\Controllers\Author;

use App\Tag;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware('checkAdmin:0');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all();
        return view('author.tag.index')->withTags($tags);
    }
}
