<?php

namespace App\Http\Controllers;

use App\Thread;
use Illuminate\Http\Request;

class ThreadController extends Controller
{

    public function index()
    {
      
        $threads = Thread::all();

        return view('threads.index', compact('threads')); 
    }

    public function create()
    {
        $thread = new Thread();
        return view('threads.create', compact('thread'));
    }

    /**
     * Store post
     */
    public function store(Request $request)
    {
        $request-> validate([
            'title'=> 'required',
            'body'=> 'required'
        ]);
        Thread::create($request->input());
        // return 
        return redirect()->action('ThreadController@index');
    }

    public function edit(Thread $thread)
    {
        return view('threads.edit', compact('thread'));
    }

    public function update(Request $request, Thread $thread)
    {
        $request-> validate([
            'title'=> 'required',
            'body'=> 'required'
        ]);
        $thread->update($request->input());
        return redirect()->action('ThreadController@index');
    }

    public function destroy(Thread $thread)
    {
        $thread->delete();
        return redirect()->action('ThreadController@index');
    }
}
