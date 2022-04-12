<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\UserTag;

class TagsController extends Controller
{
    public function save(Request $request) {
        $data = new UserTag;
        $data->user_id = $request->user_id;
        $data->tag_id = $request->tag_id;
        $data->save();

        return 0;
    }
}
