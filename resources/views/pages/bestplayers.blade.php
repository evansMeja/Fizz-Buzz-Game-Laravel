@extends('layouts.app')
@section('content')
<h1 class="jumbotron">Pro Players</h1>
@if(count($users) > 0)
        @foreach($users as $user)
	<hr/>
	{{$user->name}} | {{$user->user_high_score}} Points | record set on{{$user->created_at}} 
	<hr/>
        @endforeach
	<a href="/play" class="btn btn-link">Back</a>
    @else
      <p>No User found</p>
@endif
@endsection