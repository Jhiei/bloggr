<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTag extends Model
{
    use HasFactory;

    protected $table = "user_tags";

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function tag() {
        return $this->belongsTo(Tag::class);
    }
}
