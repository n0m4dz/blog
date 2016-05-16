@extends('layouts.master')

@section('style')
	<style type="text/css">
	body{
		background: #f6f6f6;
		color:#464646;
	}
	</style>
@endsection

@section('content')
	<h1>Blog-n jagsaalt end bna</h1>
	<ul>
	@foreach($mydata as $md)
		<li>
			<strong>{{ $md['title'] }}</strong>
			<br/>
			{{ $md['content'] }}
			<hr/>
		</li>

	@endforeach
	</ul>

@endsection