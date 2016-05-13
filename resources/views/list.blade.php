@extends('layouts.master')

@section('style')
	<style type="text/css">
	body{
		background: #af2423;
		color:#ffffff;
	}
	</style>
@endsection

@section('content')
	<h1>Blog-n jagsaalt end bna</h1>
	<?php $i = 0; ?>
	<ul>
	@while($i < 10)
		<li>
			{{ ++$i }}
		</li>
	@endwhile
	</ul>

@endsection