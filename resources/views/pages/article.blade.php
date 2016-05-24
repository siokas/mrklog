@extends('layouts.app')

@section('content')

	<div id="fb-root"></div>
	<script>
		(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.6&appId=953726907994585";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
	</script>

	<section class="article-wrapper">
		@include('flash::message')
			<div class="container">
				<div class="row">
					<div class="col-md-2 col-sm-3 text-center">
						@if($post->certified == 1)
							<img alt="Author Avatar" class="avatar" src="/img/cert.png">
						@endif
						<span>Posted by </span>
						<span class="alt-font uppercase author-name">
							<a href="/user/{{ $post->author }}"> {{ $post->author }} </a>
						</span>
						<br />
						@foreach($post->tags as $tag)
						<ul class="tags">
							<li><a href="/tag/{{ $tag->name }}" class="tag">{{ $tag->name }}</a></li>
						</ul>
						@endforeach
						<br />
						<div class="fb-share-button" data-href="http://mrklog.com/posts/{{ $post->id }}" data-layout="button" data-mobile-iframe="true"></div>
						<div style="margin-top: 20px; margin-bottom: 20px;">
							<a href="https://twitter.com/share" class="twitter-share-button" data-hashtags="mrklog">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
						</div>

						<!-- Place this tag in your head or just before your close body tag. -->
						<script src="https://apis.google.com/js/platform.js" async defer></script>

						<!-- Place this tag where you want the share button to render. -->
						<div class="g-plus" data-action="share" data-annotation="none"></div>

						</div>

					<div class="col-md-8 col-sm-9">
						<div class="article-single">							
							{!! $article !!}
						</div>
					</div>
				</div>
			</div>
	</section>
@endsection