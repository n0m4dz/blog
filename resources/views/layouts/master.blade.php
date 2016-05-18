<!DOCTYPE html>
<html>
<head>
	<title>{{ $pageTitle or 'Blog web' }}</title>

	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css">

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
	
	<!-- tuhain huudasnii script -->
	@yield('script')
</body>
</html>