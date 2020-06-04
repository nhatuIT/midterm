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
}
