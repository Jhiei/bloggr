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

        $data['blog_list'] = Blog::where('user_id', $user->id)->orderByDesc('created_at')->get();

        $data['blog_count'] = count($data['blog_list']);

        return view('profile.profile', $data);
    }
}
