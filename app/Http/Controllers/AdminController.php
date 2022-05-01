<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Blog;
use App\Models\Comment;
use App\Models\Follow;
use App\Models\Like;
use App\Models\Report;

use Auth;

class AdminController extends Controller
{
    public function create() {
        return view('admin.dashboard');
    }

    public function users() {
        $data['users'] = User::where('id', '!=', Auth::user()->id)->get();

        return view('admin.users', $data);
    }

    public function remove_user(Request $request) {
        $blogs = Blog::where('user_id', $request->user_id)->get();
        foreach ($blogs as $blog) {
            $blog->delete();
        }

        $comments = Comment::where('user_id', $request->user_id)->get();
        foreach ($comments as $comment) {
            $comment->delete();
        }

        $reports = Report::where('user_id', $request->user_id)->get();
        foreach ($reports as $report) {
            $report->delete();
        }

        $follows = Follow::where('auth_user_id', $request->user_id)->get();
        foreach ($follows as $follow) {
            $follow->delete();
        }

        $likes = Like::where('user_id', $request->user_id)->get();
        foreach ($likes as $like) {
            $like->delete();
        }

        $user = User::find($request->user_id);
        $user->delete();

        return redirect()->back();
    }

    public function report() {
        $data['user_reports'] = Report::where('report_type', 'User')->get();
        $data['all_users'] = User::all();

        $data['blog_reports'] = Report::where('report_type', 'Blog')->get();

        return view('admin.reports', $data);
    }
}
