
<!doctype html>
<html lang="en">
    <head>
    	{{-- IMPORT META TAGS --}}
        @include('imports.meta')

        <title>Marklog</title>

        {{-- IMPORT CSS STYLES --}}
        @include('imports.css')

        <script src="{{ asset('js/marked.js') }}"></script>

        {{-- PRE-IMPORT NEEDED JS SCRIPTS --}}
        @if($page == 'create' || $page == 'edit')
            
            <script src="{{ asset('js/jquery.min.js') }}"></script>
            <script src="{{ asset('js/prevent_submit_on_enter.js') }}"></script>
        @endif
    </head>

    <body>
		{{-- INCLUDE NAVIGATION BAR --}}
		@include('navigation.bar')

        {{-- Vue JS Binder  --}}  
        <div id="main-app">  
        
    		{{-- INCLUDE HEADER --}}
    		@if($page != 'article')
    			@include('sections.header')
    		@endif

            {{-- INCLUDE THE FALSH MESSAGES --}}
            @include('flash::message')

    		{{-- YIELD THE CONTENT --}}
            @yield('content')

        </div>

        <hr>
        
        {{-- INCLUDE FOOTER --}}
		@include('sections.footer')

        {{-- INCLUDE THE JAVASCRIPT IMPORTS --}}
        @include('imports.js')

    </body>


</html>

				