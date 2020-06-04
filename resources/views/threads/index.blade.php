@extends('layouts.layout')

@section('content')

<div>
    <a href="{{ action('ThreadController@create') }}">
        <button type="button" class="btn btn-primary">Create</button>
    </a>
</div>
<br />
<table class="table table-striped">
    <tr>
        <td>STT</td>
        <td>Title</td>
        <td>Body</td>
        <td>Category</td>
        <td>User ID</td>
        
        <td>Actions</td>
    </tr>

    @php($i = 1)

    @foreach ($threads as $thread)
        <tr>
            <td>{{ $i }}</td>
            <td>{{ $thread->title }}</td>
            <td>{{ $thread->body }}</td>
            <td>{{ $thread->category->name}}</td>
            <td>{{ $thread->user_id}}</td>
            <td>
                <a href="{{ action('ThreadController@edit', ['thread' => $thread]) }}">
                    <button class="btn btn-warning">Edit</button>
                </a>

                <a href="javascript:void(0)" onclick="document.getElementById('thread-delete-{{ $thread->id }}').submit()">
                    <button class="btn btn-danger">Delete</button>
                </a>

                <form method="POST" id="thread-delete-{{ $thread->id }}" action="{{ action('ThreadController@destroy', ['thread'=>$thread]) }}">
                    @csrf
                    @method('DELETE')
                </form>
            </td>
        </tr>
        @php($i++)
    @endforeach
</table>

<style>
    a {
        text-decoration: none;
    }
</style>

@endsection