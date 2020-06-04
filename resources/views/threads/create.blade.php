@extends('layouts.layout')

@section('content')

<div class = "container">
  
    <form method="POST" action="{{ action('ThreadController@store') }}">
      @include('threads.form')
     
      <button type="submit" class="btn btn-primary">ADD</button> 
    </form>  
    
</div>