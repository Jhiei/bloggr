<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Report;
use App\Models\Warning;
use App\Models\User;
use App\Models\Blog;
use App\Models\Comment;
use App\Models\Follow;
use App\Models\Like;

use Auth;

class ReportController extends Controller
{
    public function report(Request $request) {
        $data = new Report;
        $data->report_text = $request->report_text;
        $data->report_type = $request->report_type;
        $data->user_id = $request->user_id;
        $data->reporter_id = Auth::user()->id;

        if ($request->report_type == "Blog") {
            $data->blog_id = $request->blog_id;
        }
        else {
            $data->blog_id = null;
        }

        $data->save();

        return redirect(route('dashboard'))->with('msg', 'Your report has been successfully submitted.');
    }

    public function acknowledge_user(Request $request) {
        $report = Report::find($request->report_id);
        $user = User::find($report->user_id);

        $data = new Warning;
        $data->user_id = $user->id;
        $data->save();

        $warning_count = count(Warning::where('user_id', $user->id)->get());
        if ($warning_count >= 7) {
            $blogs = Blog::where('user_id', $user->id)->get();
            foreach ($blogs as $blog) {
                $blog->delete();
            }
    
            $comments = Comment::where('user_id', $user->id)->get();
            foreach ($comments as $comment) {
                $comment->delete();
            }
    
            $reports = Report::where('user_id', $user->id)->get();
            foreach ($reports as $report) {
                $report->delete();
            }
    
            $follows = Follow::where('auth_user_id', $user->id)->get();
            foreach ($follows as $follow) {
                $follow->delete();
            }
    
            $likes = Like::where('user_id', $user->id)->get();
            foreach ($likes as $like) {
                $like->delete();
            }
            $user->delete();
        }

        return redirect()->back()->with('ack_msg', 'User report has been acknowledged.');
    }

    public function acknowledge_blog(Request $request) {
        $report = Report::find($request->report_id);
        $user = User::find($report->user_id);
        $blog = Blog::find($report->blog_id);

        $data = new Warning;
        $data->user_id = $user->id;
        $data->save();

        $report_count = 5;

        $warning_count = count(Warning::where('user_id', $user->id)->get());
        if ($warning_count >= $report_count) {
            $blogs = Blog::where('user_id', $user->id)->get();
            foreach ($blogs as $blog) {
                $blog->delete();
            }
    
            $comments = Comment::where('user_id', $user->id)->get();
            foreach ($comments as $comment) {
                $comment->delete();
            }
    
            $reports = Report::where('user_id', $user->id)->get();
            foreach ($reports as $report) {
                $report->delete();
            }
    
            $follows = Follow::where('auth_user_id', $user->id)->get();
            foreach ($follows as $follow) {
                $follow->delete();
            }
    
            $likes = Like::where('user_id', $user->id)->get();
            foreach ($likes as $like) {
                $like->delete();
            }

            $user->delete();
        }

        $blog->delete();

        return redirect()->back()->with('ack_msg', 'Blog report has been acknowledged.');
    }

    public function dismiss(Request $request) {
        $report = Report::find($request->report_id);
        $report->delete();

        return redirect()->back()->with('dismiss_msg', 'Report has been dismissed.');
    }
}
