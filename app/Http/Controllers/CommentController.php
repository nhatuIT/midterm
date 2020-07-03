<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Thread;
use App\Like;
use App\Comment;
class CommentController extends Controller
{
    public function index($thread_id){
        $thread = Thread::with('comment.children.like.user','comment.like.user', 'like.user')->find($thread_id);
        return response()->json($thread, 200);
    }


    public function likecomment(Request $request){

        $comment_id = $request->input('comment_id');
        $user_id = $request->input('user_id');

        $exist = Like::whereCommentId($comment_id)->whereUserId($user_id)->first();
        if($exist){
            $exist->state = 1;
            $exist->save();
        }else{
            $exist = Like::create(['comment_id'=>$comment_id,'user_id'=> $user_id,'state'=>1,'type'=>'comment']);
        }
        return $exist;
    }

    public function dislikecomment(Request $request){
        $comment_id = $request->input('comment_id');
        $user_id = $request->input('user_id');

        $exist = Like::whereCommentId($comment_id)->whereUserId($user_id)->first();
        if($exist){
            $exist->state = 0;
            $exist->save();
        }
        return $exist;
    }

    public function likethread(Request $request){

        $thread_id = $request->input('thread_id');
        $user_id = $request->input('user_id');

        $exist = Like::whereThreadId($thread_id)->whereUserId($user_id)->first();
        if($exist){
            $exist->state = 1;
            $exist->save();
        }else{
            $exist = Like::create(['thread_id'=>$thread_id,'user_id'=> $user_id,'state'=>1,'type'=>'thread']);
        }
        return $exist;
    }

    public function dislikethread(Request $request){
        $thread_id = $request->input('thread_id');
        $user_id = $request->input('user_id');

        $exist = Like::whereThreadId($thread_id)->whereUserId($user_id)->first();//tim kiem cac like co data phu hop
        if($exist){
            $exist->state = 0;
            $exist->save();
        }
        return $exist;
    }
    
}
