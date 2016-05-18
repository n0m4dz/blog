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
	<form action="/blog/search" method="get" class="search-form horizontal-form">
		<div class="form-group">
			<select name="user" class="form-control">
				<option value="">...</option>
				@foreach($users as $user)
					<option value="{{ $user->id }}" 
						@if( $user->id == Request::get('user')) selected @endif
						> 
						{{ $user->email }} 
					</option>
				@endforeach
			</select>
		</div>
		<div class="form-group">
			<input type="text" name="search" class="form-control" 
					value="{{ Request::get('search') }}" />
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-success"> Хайх </button>
		</div>
	</form>

	<h4>
		@if(Session::has('msg'))
			{{ Session::get('msg') }}
		@endif
	</h4>

	<ul>
	@foreach($mydata as $md)
		<li>
			<strong>{{ $md->title }}</strong>
			<br/>
			{{ $md->content }}
			<hr/>
		</li>
	@endforeach
	</ul>

@endsection