<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
	@include('inc.css')
	@include('inc.js')
</head>
<body>
	<div class="container maincontainer">
		@include('inc.navbar')        
		@yield('content')
		@include('inc.footer')
	</div>
</body>     
</html>
