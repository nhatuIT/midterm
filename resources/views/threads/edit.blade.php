@extends('layouts.layout')

@section('content')
    
<form action="{{ action('ThreadController@update', ['thread' => $thread]) }}" method="POST">
    @method('PUT')
    @include('threads.form')
    <div>
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
</form>

@endsection