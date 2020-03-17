<nav class="navbar navbar-default navbar-fixed-top mynavbar centerContent">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myHeaderNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      <a class="navbar-brand" href="{{ url('/') }}" style="color:orange;">{{ config('app.name', 'Laravel') }}</a>
    </div>
    <div class="collapse navbar-collapse" id="myHeaderNavbar">
	@guest
	<ul class="nav navbar-nav"> 
        <li><a href="/rules">Home</a></li>
      </ul>
	  
     <ul class="nav navbar-nav navbar-right">
        <li><a href="{{ route('login') }}">{{ __('Login') }}<span class="ui-icon ui-icon-person"></span></a></li>
        <li><a href="{{ route('register') }}">{{ __('Register') }}<span class="ui-icon ui-icon-info">1</span></a></li>
     </ul>
	@else
		<ul class="nav navbar-nav"> 
        <li><a href="/play">Play</a></li>
        <li><a href="/rules">Rules & help</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="/login">{{ Auth::user()->name }}<span class="ui-icon ui-icon-person"></span></a></li>
		<li>		
		<a href="/logout">Logout </a>
		</li>
      </ul>
	  @endguest 
    </div>
  </div>
</nav>