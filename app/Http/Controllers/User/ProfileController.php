<?php

namespace App\Http\Controllers\User;

use Auth;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        if ($user->is_admin) {
            return view('admin.profile.index')->withUser($user);
        } else {
            return view('author.profile.index')->withUser($user);
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = Auth::user();
        if ($request->password) {
            $this->validate($request, [
                'password' => 'confirmed|min:6'
            ]);
            $user->password = bcrypt($request->password);
        }
        $user->nickname = $request->nickname;
        $user->save();
        return redirect('/system/profile')
            ->with('success', 'Update success')
            ->withUser($user);
    }
}
