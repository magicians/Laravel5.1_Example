<?php

namespace App\Http\Controllers\Author;

use App\Tag;

use App\Http\Requests;
use App\Http\Requests\TagCreateUpdateRequest;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('author');
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
