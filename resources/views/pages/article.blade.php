
@extends('layouts.app')

@section('content')
<div id="fb-root"></div>
	<article>
		@include('flash::message')
	    <div class="container">
	        <div class="row">
	            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
	               {!! $article !!}
	            </div>
	        </div>
	        <div class="row">
	            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
		            <ul class="tags">
		               @foreach($post->tags as $tag)
							<li><a href="/tag/{{ $tag->name }}" class="tag">{{ $tag->name }}</a></li>
						@endforeach
					</ul>
					
					@include('imports.social_links')
	            </div>
	        </div>
	    </div>
	</article>
@endsection