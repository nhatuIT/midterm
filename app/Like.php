<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $fillable = [
         'user_id', 'thread_id', 'comment_id','state','type'
    ];

    public function thread() {
        return $this->belongsTo(Thread::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function comment() {
        return $this->belongsTo(Comment::class);
    }

}
