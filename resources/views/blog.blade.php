@extends('layouts.master')

@section('style')
	<style type="text/css">
	body{
		background: #dddddd;
	}
	</style>
@endsection

<h1>Im outside of section</h1>

@section('content')
	
	@include('partials.header')
	<form action="/blog/post" method="post">
		{!! csrf_field() !!}
		<input type="text" name="title" /> <br>
		<textarea name="content"></textarea> <br>
		<input type="submit" value="submit" />
			
			@if(isset($errors) && count($errors) > 0)
			<hr>
				@foreach($errors->all() as $e)
					{{ dump($e) }}
				@endforeach
			@endif
			<hr>
			{{ '<b>Hello blade</b>' }} <br>
			{!! '<b>Hello blade</b>' !!}

@endsection

@section('content2')
	content 2 is here
@endsection
