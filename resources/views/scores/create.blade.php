@extends('layouts.app')
@section('content')
    @if(count($scores) > 0)
        @foreach($scores as $score)
		<div class="well">
			{{$score->user->name}} | {{$score->high_score}} | {{$score->created_at}}
		</div>
        @endforeach
    @else
      <p>No scores found</p>
    @endif
@endsection