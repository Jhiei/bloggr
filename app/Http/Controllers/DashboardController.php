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

        $data['tags'] = Tag::inRandomOrder()->take(20)->get();

        $data['rand_blogs'] = Blog::orderByDesc('created_at')->get();

        $all_topics = Tag::all();
        $all_blogs = Blog::all();

        foreach ($user_interest as $interest) {
            $res = Blog::where('tag_id', $interest->tag_id)->orderByDesc('created_at')->get();
            $interests[] = $res;
        }

        $blogs = Blog::where('user_id', Auth::user()->id)->orderByDesc('created_at')->get();
        $interests[] = $blogs;

        $data['interest_blogs'] = collect($interests);
        $data['interest_blogs']->sortByDesc('created_at');

        $arr_list = [];

        foreach ($all_topics as $t) {
            $count = 0;

            foreach ($all_blogs as $blog) {

                if ($t->id == $blog->tag_id) {
                    $count++;
                }
            }

            $arr_list[] = [
                'id' => $t->id, 
                'label' => $t->tag_label, 
                'count' => $count
            ];
        }

        $coll = collect($arr_list);
        $data['trending'] = $coll->sortByDesc('count')->take(10);
        $data['trending']->values()->all();

        return view('dashboard', $data);
    }
}
