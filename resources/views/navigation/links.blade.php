<li>
	@if(\Request::route()->getName() == "posts.show")
		@if(Auth::check()) 
			@if(Auth::user()->id == $post->user_id)
    			<a href="{{ url('posts/'. $post->id.'/edit') }}">Update Post</a>
    		@endif
		@else
			@if(!$post->certified)
				<a href="{{ url('posts/'. $post->id.'/edit') }}">Update Post</a>
			@endif
		@endif

    @else
    	<a href="{{ url('posts/create') }}">Create New Post</a>
    @endif
</li>
<li>
    <a href="{{ url('about') }}">About</a>
</li>
<li>
    <a href="{{ url('contact') }}">Contact</a>
</li>

@if(Auth::check())
	<li>
		<a href="{{ url('settings') }}">Settings</a>
	</li>
	<li>
		<a href="{{ url('logout') }}">Logout</a>
	</li>
@else
	<li>
		<a href="{{ url('login') }}">Login</a>
	</li>
@endif