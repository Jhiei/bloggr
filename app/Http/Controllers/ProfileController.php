<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Blog;

use Auth;
use Storage;
use Str;

class ProfileController extends Controller
{
    public function create($name, $id) {
        $user = User::find($id);

        $data['user_id'] = $id;

        $data['blog_list'] = Blog::where('user_id', $user->id)->get();

        return view('profile.profile', $data);
    }

    public function store_img(Request $request) {
        $user = User::find($request->user_id);

        $user_token = $user->user_token;

        if ($request->hasFile('profile_img')) {
            $img_name = $request->file('profile_img')->getClientOriginalName();
            $img_ext = $request->file('profile_img')->getClientOriginalExtension();

            $file = pathinfo($img_name, PATHINFO_FILENAME);

            $storeFile = $file . '_' . $user_token . '_' . time() . '_' . Str::random(35) . '.' . $img_ext;

            $request->file('profile_img')->storeAs('public/profile', $storeFile);

            if (isset($user->profile_img_path)) {
                Storage::delete('public/profile/' . $user->profile_img_path);
            }

            $user->profile_img_path = $storeFile;

            $user->save();
        }

        return redirect()->back();
    }
}
