<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Blog;
use App\Models\User;

use Str;
use Auth;
use Hash;
use Storage;

class BlogsController extends Controller
{
    public function create($token, $id) {
        $blog = Blog::find($id);

        $data['user'] = User::find($blog->user_id);

        $data['this_blog'] = $blog;
        
        return view('blog.create', $data);
    }

    public function store(Request $request) {
        $file_name = $request->file('blog_tnail')->getClientOriginalName();
        $file_ext = $request->file('blog_tnail')->getClientOriginalExtension();
        $file_size = $request->file('blog_tnail')->getSize();

        $user_token = Auth::user()->user_token;

        if ($request->hasFile('blog_tnail')) {
            $file = pathinfo($file_name, PATHINFO_FILENAME);

            $storeFile = $file . '_' . $user_token . '_' . time() . '_' . Str::random(35) . '.' . $file_ext;

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
        $data->blog_status = "Draft";
        $data->save();

        return redirect(route('blog-create', [$data->blog_token, $data->id]));
    }

    public function update(Request $request) {
        $blog = Blog::find($request->blog_id);
        
        if ($request->hasFile('blog_tnail')) {
            $file_name = $request->file('blog_tnail')->getClientOriginalName();
            $file_ext = $request->file('blog_tnail')->getClientOriginalExtension();
            $file_size = $request->file('blog_tnail')->getSize();

            $file = pathinfo($file_name, PATHINFO_FILENAME);

            $storeFile = $file . '_' . $user_token . '_' . time() . '_' . Str::random(35) . '.' . $file_ext;

            $request->file('blog_tnail')->storeAs('public/thumbnail', $storeFile);

            Storage::delete('public/thumbnail/' . $blog->blog_tnail_path);

            $blog->blog_tnail_ext = $file_ext;
            $blog->blog_tnail_size = $file_size;
            $blog->blog_tnail_path = $storeFile;
        }

        $blog->blog_title = $request->blog_title;
        $blog->blog_desc = $request->blog_desc;
        $blog->blog_html = $request->blog_html;
        $blog->save();

        return redirect(route('dashboard'));
    }

    public function view($id, $title) {
        return view('blog.view_blog');
    }
}
