<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

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
}
