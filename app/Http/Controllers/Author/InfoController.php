<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;

use Carbon\Carbon;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

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

        if (!File::exists($uploadDestination)) {
            Storage::makeDirectory($uploadDestination);
        }

        $imageName = $now->timestamp . '.' . $image->getClientOriginalExtension();
        $image->move($uploadDestination, $imageName);
        $imagePath = $uploadDirectory . $imageName;
        return "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum,'$imagePath');</script>";
    }
}
