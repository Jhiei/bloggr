<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Storage;
use Str;
use Auth;

class SettingsController extends Controller
{
    public function create() {
        return view('settings.settings');
    }

    public function update(Request $request) {
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

        $user->fname = $request->profile_name;
        $user->lname = $request->profile_lname;
        $user->username = $request->profile_username;

        if (isset($request->profile_bio)) {
            $user->bio = $request->profile_bio;
        }

        if (isset($request->profile_link)) {
            $user->website_url = $request->profile_link;
        }

        $user->email = $request->profile_email;
        $user->save();

        return redirect(route('profile-view', [Auth::user()->username, Auth::user()->id]));
    }
}
