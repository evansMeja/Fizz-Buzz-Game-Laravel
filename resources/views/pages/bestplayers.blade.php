@extends('layouts.app')
@section('content')
<h1 class="jumbotron">Pro Players <a href="/play" class="btn btn-link">Back</a></h1>
@if(count($users) > 0)
<table style="width:100%">
	<tr>
		<th>Players</th>
		<th>Points</th>
		<th>Created</th>
	</tr>
<hr/>
	@foreach($users as $user)
	<tr>
		<td>{{$user->name}} </td>
		<td>{{$user->user_high_score}}</td>
		<td>{{$user->created_at}}</td>
	</tr>
	@endforeach
</table>
@else
	 <p>No User found</p>

@endif
@endsection