<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;

use Carbon\Carbon;

use Storage;
use Auth;
use File;
use Input;
use Validator;
use Response;

class InfoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function uploadImage()
    {
        $input = Input::all();
        $rules = array(
            'upload' => 'image|max:3000',
        );
        $validation = Validator::make($input, $rules);
        if ($validation->fails()) {
            return $validation->errors()->first();
        }
        $image = $input['upload'];
        $CKEditorFuncNum = $input['CKEditorFuncNum'];

        $now = Carbon::now();
        $uploadDirectory = '/uploads/' . Auth::id() . '/' . $now->year . '/' . $now->month . '/';
        $uploadDestination = public_path() . $uploadDirectory;

        $imageName = $now->timestamp . '.' . $image->getClientOriginalExtension();
        $image->move($uploadDestination, $imageName);
        $imagePath = $uploadDirectory . $imageName;
        return "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum,'$imagePath');</script>";
    }

    public function uploadPageImage()
    {
        $input = Input::all();

        $rules = array(
            'image' => 'image|max:3000',
        );

        $image = $input['image'];
        $validation = Validator::make($input, $rules);
        if ($validation->fails()) {
            return Response::json(['success' => false, 'errors' => $validation->errors()->first()]);
        }

        $now = Carbon::now();
        $uploadDirectory = '/uploads/' . Auth::id() . '/' . $now->year . '/' . $now->month . '/';
        $uploadDestination = public_path() . $uploadDirectory;
        $imageName = $now->timestamp . '.' . $image->getClientOriginalExtension();
        $image->move($uploadDestination, $imageName);
        $imagePath = $uploadDirectory . $imageName;
        return Response::json(['success' => true, 'file' => $imagePath]);
    }
}
