<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Comment;

use Auth;

class CommentsController extends Controller
{
    public function store(Request $request) {
        $data = new Comment;
        $data->comment_text = $request->comment;
        $data->blog_id = $request->blog_id;
        $data->user_id = Auth::user()->id;
        $data->save();

        return redirect()->back();
    }
}
