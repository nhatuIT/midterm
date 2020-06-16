<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    protected $fillable = [
        'title', 
        'body',
    ];
    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function comment(){
        return $this->hasMany(Comment::class, 'thread_id');
    }

    public function like(){
        return $this->hasMany(Like::class, 'thread_id');
    }
}
