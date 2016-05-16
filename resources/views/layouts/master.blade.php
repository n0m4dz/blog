<!DOCTYPE html>
<html>
<head>
	<title>{{ $pageTitle or 'Blog web' }}</title>

	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css">

	<!-- tuhain huudasnii stylesheet -->
	@yield('style')
	
</head>
<body>
<h1 style="color:red;">
	{{ $master or 'master variable doesn\'t exist' }}
</h1>

	@yield('content')

	<hr>

	@yield('content2')
	
	<!-- tuhain huudasnii script -->
	@yield('script')
</body>
</html>