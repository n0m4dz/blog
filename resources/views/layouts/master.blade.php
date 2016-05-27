<!DOCTYPE html>
<html>
<head>
	<title>{{ $pageTitle or 'Blog web' }}</title>

	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="/css/vendor.css">
		<link rel="stylesheet" type="text/css" href="{{ elixir('css/style.css') }}">

	<!-- tuhain huudasnii stylesheet -->
	@yield('style')
	<style type="text/css">
		.active a{
			font-weight:bold;
			color: #f92343;
		}
	</style>
	
</head>
<body>
	@include('partials.header')

	@yield('content')

	<hr>

	@yield('content2')
		


	<script type="text/javascript" src="{{ URL::asset('js/vendor.js') }}"></script>
	<script type="text/javascript" src="{{ elixir('js/blog.js') }}"></script>		
	<!-- tuhain huudasnii script -->
	@yield('script')
</body>
</html>