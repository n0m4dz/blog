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

	<h3>{{ Auth::user()->name }}</h3>

	<form id="postFrm" action="{{ URL::route('ORM::store') }}" method="post">
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

@section('script')
	<script type="text/javascript">
		
		$(function(){

			$('#postFrm').submit(function(e){
				e.preventDefault(0);

				var data = $(this).serialize();
				//console.log(data);

				$.ajax({
					type: 'POST',
					url: '/orm/store',
					data: data,
					success: function(resp){
						console.log(resp);
						if(resp.status){
							alert('successfully');
						}
					},
					error: function(resp){

					}
				});
			})

		})

	</script>
@endsection


