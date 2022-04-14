<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\UserTag;
use App\Models\Tag;
use App\Models\Blog;

use Auth;

class DashboardController extends Controller
{
    public function create() {
        $user_interest = UserTag::where('user_id', Auth::user()->id)->get();
        $data['interests'] = $user_interest;

        $data['tags'] = Tag::take(20)->get();

        $data['rand_blogs'] = Blog::orderByDesc('created_at')->get();

        foreach ($user_interest as $interest) {
            $res = Blog::where('tag_id', $interest->tag_id)->orderByDesc('created_at')->get();
            $data['interest_blogs'][] = $res;
        }

        // return $data['tags'];
        return view('dashboard', $data);
    }
}
