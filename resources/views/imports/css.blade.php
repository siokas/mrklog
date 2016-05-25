@if($page == 'edit' || $page=='create')
    <link href="{{ asset('css/todo.css') }}" rel="stylesheet" type="text/css">
@endif

@if($page == 'article')
	<link href="{{ asset('css/themify-icons.css') }} " rel="stylesheet" type="text/css" media="all" />
	<link href="{{ asset('css/flexslider.min.css') }} " rel="stylesheet" type="text/css" media="all"/>
	<link href="{{ asset('css/lightbox.min.css') }}" rel="stylesheet" type="text/css" media="all"/>
	<link href="{{ asset('css/theme.css') }}" rel="stylesheet" type="text/css" media="all"/>
	<link href="{{ asset('css/tags.css') }}" rel="stylesheet" type="text/css" media="all"/>
@endif

@if($page == 'main')
	<link href="{{ asset('css/search.css') }}" rel="stylesheet" type="text/css" media="all"/>
	<link href="{{ asset('css/tags.css') }}" rel="stylesheet" type="text/css" media="all"/>
@endif

<link href="{{ asset('css/pe-icon-7-stroke.css') }}" rel="stylesheet" type="text/css" media="all">
<link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" media="all"/>
<link href="{{ asset('css/bootstrap-markdown.min.css') }}" rel="stylesheet" type="text/css" media="all">

<link href="{{ asset('css/clean-blog.css') }}" rel="stylesheet">

<style>
	@font-face{
	    font-family: Molle; 
		src: url({{asset('fonts/Molle-Regular.ttf')}});
	}
</style>

