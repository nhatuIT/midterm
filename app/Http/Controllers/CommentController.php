<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Thread;

class CommentController extends Controller
{
    public function index($thread_id){
        $thread = Thread::with('comment.children', 'like.user')->find($thread_id);
        return response()->json($thread, 200);
    }
}
