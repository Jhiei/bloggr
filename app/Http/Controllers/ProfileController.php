<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Auth;

class ProfileController extends Controller
{
    public function create($name, $id) {
        $user = User::find($id);

        return view('profile.profile');
    }
}
