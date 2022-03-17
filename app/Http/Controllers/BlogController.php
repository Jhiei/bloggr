<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function create() {
        return view('blog.create');
    }

    public function saveDetails() {
        // make blog model first

        return redirect(route('blog-create'));
    }
}
