<form action="/blog/post" method="post">
	{!! csrf_field() !!}
	<input type="text" name="title" /> <br>
	<textarea name="content"></textarea> <br>
	<input type="submit" value="submit" />
	<?php
		if(isset($errors) && count($errors) > 0){
			foreach($errors->all() as $e){
				dump($e);
			}
		}
	?>
</form>