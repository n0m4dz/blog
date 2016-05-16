@inject('helper', 'Helper\MyHelper')

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

	<div style="background: #ababab; font-size: 28px;">
		{{ $helper->myStrReplace($pageTitle) }}
	</div>		

	<hr>

	<h2>{{ $title or 'not existed' }}</h2>

	<h2>{{ $second or "second doesn't existed" }}</h2>

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
