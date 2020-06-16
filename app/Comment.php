<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comment';
    protected $fillable = [
        'body', 'user_id', 'thread_id', 'parent_id'
    ];

    public function thread() {
        return $this->belongsTo(Thread::class);
    }

    public function children(){
        return $this->hasMany(Comment::class, 'parent_id'); 
    }

    public function parent(){
        return $this->belongsTo(Comment::class, 'parent_id');
    }
}
