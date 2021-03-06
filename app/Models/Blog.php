<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $table = "blogs";

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function tag() {
        return $this->belongsTo(Tag::class);
    }

    public function comment() {
        return $this->hasMany(Comment::class);
    }

    public function report() {
        return $this->hasMany(Report::class);
    }
}
