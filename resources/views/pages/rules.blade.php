@extends('layouts.app')
@section('content')
<h1 class="jumbotron">Welcome to User</h1>
<blockquote>
Random numbers between 1 and 100 will appear on your screen.

If the number is divisible by 3, click on the Fizz button. If it's divisible by 5, click on the Buzz button. If it's divisible by both 3 and 5, click on the FizzBuzz button. If none of these options apply, click on the i button.

If you get 10 misses, it's game over. Have fun.

Press 'Start Game' to play.
</blockquote>

<div class="centerContent">
<a href="/play" class="btn btn-info">Start Game</a>
</div>
<hr/>
@endsection