<ul>
	<li class=" {{ Request::is('list') ? 'active' : '' }}">
		<a href="{{ URL::route('blog.list') }}"> Мэдээ </a>
	</li>

	<li class=" {{ Request::segment(1) === 'blog' ? 'active' : ''}} ">
		<a href="{{ url('blog') }}"> Мэдээ оруулах </a>
	</li>
</ul>