<!DOCTYPE html>
<html>
<head>
	<title>Elixir</title>
	<link rel="stylesheet" type="text/css" href="/css/vendor.css">
	<link rel="stylesheet" type="text/css" href="{{ elixir('css/style.css') }}">
</head>
<body>

<h1>Hello Elixir</h1>

<div id="jqueryDiv">
	{{ bcrypt('pass123') }}
	<i class="fa fa-heart"> I like gulp</i>

</div>

	<script type="text/javascript" src="{{ URL::asset('js/vendor.js') }}"></script>
	<script type="text/javascript" src="{{ elixir('js/blog.js') }}"></script>
</body>
</html>