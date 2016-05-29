{{-- <nav class="navbar navbar-default navbar-custom navbar-fixed-top" style="{{ $page=='article' ? 'background:#559dee;' : '' }}"> --}}
<nav class="navbar navbar-default navbar-custom navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('/') }}">
            {{-- <span style="font-family: 'Molle', cursive; color: {{ $page=='article' ? 'background:#fff;' : '#559dee;' }}">#mrklog</span> --}}
            <span style="font-family: 'Molle', cursive; color: #559dee;">#mrklog</span>
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                @include('navigation.links')
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>