@inject('helper', 'Helper\MyHelper')

@extends('layouts.master')

@section('style')
	<style type="text/css">
	body{
		background: #dddddd;
	}
	</style>
@endsection

@section('content')	
	<form action="/blog/post" method="post">
		{!! csrf_field() !!}
		<input type="text" name="title" class="form-control" value="{{ old('title') }}" /> <br>

		<textarea name="content" class="form-control">{{ old('content') }}</textarea> <br>

		<input type="submit" value="submit" class="btn btn-success" />
			
			@if(isset($errors) && count($errors) > 0)
			<hr>
				@foreach($errors->all() as $e)
					{{ dump($e) }}
				@endforeach
			@endif
			

@endsection
