<?php

namespace App\Http\Controllers\Admin;

use App\Tag;

use App\Http\Requests;
use App\Http\Requests\TagCreateUpdateRequest;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
    protected $name = '';

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
        $tags = Tag::all();
        return view('admin.tag.index')->withTags($tags);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = old($this->name);
        return view('admin.tag.create')->with('name', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  TagCreateUpdateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagCreateUpdateRequest $request)
    {
        $tag = Tag::create($request->tagFillData());
        return redirect('/admin/tag')
            ->withSuccess("The tag '$tag->name' was created.");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag = Tag::findOrFail($id);
        $data = ['id' => $id, 'name' => $tag->name, 'show_index' => $tag->show_index];
        return view('admin.tag.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  TagCreateUpdateRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(TagCreateUpdateRequest $request, $id)
    {
        $tag = Tag::findOrFail($id);
        $tag->fill($request->tagFillData());
        $tag->save();
        return redirect('/admin/tag')
            ->withSuccess("Changes saved.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = Tag::findOrFail($id);
        $tag->delete();
        return redirect('/admin/tag')
            ->withSuccess("The '$tag->name' tag has been deleted");
    }
}
