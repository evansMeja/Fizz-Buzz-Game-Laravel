<nav class="navbar navbar-inverse navbar-fixed-top">
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
        <li><a href="/about">Home</a></li>
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
		<li><a class="dropdown-item" href="" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Logout') }}</a></li>
      </ul>
	@endguest 
    </div>
  </div>
</nav>



<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm" style="text-align:center">
	<div class="container">
		<a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name', 'Laravel') }}</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			
			@guest			
			<!-- Right Side Of Navbar -->
			<ul class="navbar-nav ml-auto">
				<!-- Authentication Links -->
					<li class="nav-item">
						<a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
					</li>
					@if (Route::has('register'))
						<li class="nav-item">
							<a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
						</li>
					@endif
			</ul>
				@else
			<!-- Left Side Of Navbar -->
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a class="nav-link" href="/play">Play</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="/rules">Rules & Help</a>
				</li>
			</ul>
			
			<!-- Right Side Of Navbar -->
			<ul class="navbar-nav ml-auto">
					<li class="nav-item dropdown">
						<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
							{{ Auth::user()->name }} <span class="caret"></span>
						</a>

						<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="{{ route('logout') }}"
							   onclick="event.preventDefault();
											 document.getElementById('logout-form').submit();">
								{{ __('Logout') }}
							</a>

							<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
								@csrf
							</form>
						</div>
					</li>
			</ul>
				@endguest
		</div>
	</div>
</nav>