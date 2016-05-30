<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/flexslider.min.js') }}"></script>
<script src="{{ asset('js/smooth-scroll.min.js') }}"></script>
<script src="{{ asset('js/jquery.plugin.min.js') }}"></script>
<script src="{{ asset('js/scripts.js') }}"></script>
<script src="{{ asset('js/marked.min.js') }}"></script>
<script src="{{ asset('js/to-markdown.js') }}"></script>
<script src="{{ asset('js/moment.js') }}"></script>
<script src="{{ asset('js/vue.js') }}"></script>
<script src="{{ asset('js/vue-resource.js') }}"></script>

@if($page == 'edit' || $page == 'create')
    <script src="{{ asset('js/store.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/bootstrap-markdown.js') }}"></script>
	<script src="{{ asset('js/custom.js') }}"></script>
@endif

@if($page == 'main')
	<script src="{{ asset('js/vue-main.js') }}"></script>
	<script src="{{ asset('js/custom.js') }}"></script>
@endif