<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Blog;

use Str;
use Auth;
use Hash;

class BlogsController extends Controller
{
    public function create($token, $id) {
        $blog = Blog::find($id);

        return view('blog.create');
    }

    public function store(Request $request) {
        $file_name = $request->file('blog_tnail')->getClientOriginalName();
        $file_ext = $request->file('blog_tnail')->getClientOriginalExtension();
        $file_size = $request->file('blog_tnail')->getSize();

        $user_token = Auth::user()->user_token;

        if ($request->hasFile('blog_tnail')) {
            $file = pathinfo($file_name, PATHINFO_FILENAME);

            $storeFile = $file . '_' . $user_token . '.' . $file_ext;

            $request->file('blog_tnail')->storeAs('public/thumbnail', $storeFile);
        }

        $data = new Blog();
        $data->blog_title = $request->blog_title;
        $data->blog_desc = $request->blog_desc;
        $data->blog_tnail_path = $storeFile;
        $data->blog_token = Str::random(50);
        $data->user_id = Auth::user()->id;
        $data->blog_tnail_ext = $file_ext;
        $data->blog_tnail_size = $file_size;
        $data->save();

        return redirect(route('blog-create', [$data->blog_token, $data->id]));
    }
}
