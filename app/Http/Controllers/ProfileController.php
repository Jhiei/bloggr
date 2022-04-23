<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Blog;
use App\Models\Follow;
use App\Models\Comment;

use Auth;
use Storage;
use Str;

class ProfileController extends Controller
{
    public function create($name, $id) {
        $user = User::find($id);

        $data['user_id'] = $id;

        $data['blog_list'] = Blog::where('user_id', $user->id)->orderByDesc('created_at')->get();

        $data['blog_count'] = count($data['blog_list']);

        $data['follow_count'] = count(Follow::where('user_id', $id)->get());

        $data['following_count'] = count(Follow::where('auth_user_id', $id)->get());

        $data['all_comments'] = Comment::get();

        return view('profile.profile', $data);
    }

    public function other_user_view($name, $id) {
        $data['user'] = User::find($id);

        $data['user_id'] = $id;

        $data['blog_list'] = Blog::where('user_id', $data['user']->id)->orderByDesc('created_at')->get();

        $data['blog_count'] = count($data['blog_list']);

        $data['follow_exists'] = Follow::where([
            ['auth_user_id', Auth::user()->id],
            ['user_id', $id]
        ])->first();

        $data['follow_count'] = count(Follow::where('user_id', $id)->get());

        $data['following_count'] = count(Follow::where('auth_user_id', $id)->get());

        $data['all_comments'] = Comment::get();

        return view('profile.other_profile', $data);
    }

    public function follow(Request $request) {
        $data = new Follow;
        $data->auth_user_id = $request->auth_user_id;
        $data->user_id = $request->user_id;
        $data->save();

        return 0;
    }

    public function unfollow(Request $request) {
        $follow = Follow::where([
            ['auth_user_id', $request->auth_user_id],
            ['user_id', $request->user_id]
        ])->delete();

        return 0;
    }
}
