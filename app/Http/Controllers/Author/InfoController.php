<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;

use Carbon\Carbon;
use Validator;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;

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

        $image = array_get($input, 'upload');
        $CKEditorFuncNum = array_get($input, 'CKEditorFuncNum');
        $uploadDestination = public_path() . '/uploads/' . Auth::id();
        if (!File::exists($uploadDestination)) {
            File::makeDirectory($uploadDestination);
        }
        $imageName = Carbon::now()->timestamp . '.' . $image->getClientOriginalExtension();
        $image->move($uploadDestination, $imageName);
        $imagePath = '/uploads/' . Auth::id() . '/' . $imageName;
        return "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum,'$imagePath');</script>";
    }
}
