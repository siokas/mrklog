 <header class="intro-header" style="background-image: url({{asset('img/bc1.jpg')}})">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="site-heading">
                    @if($page == "create")
                        <h1><span style="font-family: 'Molle', cursive; color: #559dee;">Create New Post</span></h1>
                    @elseif($page == "edit")
                        <h1><span style="font-family: 'Molle', cursive; color: #559dee;">Update Post</span></h1>
                    @elseif($page == "main")
                        <img src="{{ asset('img/logo_beta.png') }}" width="320" style="margin-bottom: 5px;">
                        <div class="searchform cf">
                          <input type="text" v-model="keywords" name="keywords" id="keywords" placeholder="keywords, authors or tags" v-on:click="fetchPosts(0)">
                        </div>
                    @elseif($page == "article")
                        <span style="font-family: 'Molle', cursive; color: #559dee;">
                            {{-- {!! Markdown::convertToHtml($post->title) !!} --}}
                            <h1>{{ $title }}</h1>
                        </span>
                        <span class="meta">Posted by <a href="{{ url('user/'.  $post->author) }}">{{ $post->author }}</a>@if($post->user_id>0)<i class="fa fa-certificate" style="color: #F5D76E;"></i>@endif on {{$post->created_at}}</span>
                    @elseif ($page == 'about')
                        <h1><span style="font-family: 'Molle', cursive; color: #559dee;">About</span></h1>
                    @elseif ($page == 'contact')
                        <h1><span style="font-family: 'Molle', cursive; color: #559dee;">Contact</span></h1>
                    @elseif ($page == 'terms')
                        <h1><span style="font-family: 'Molle', cursive; color: #559dee;">Terms and Conditions</span></h1>
                    @endif
                </div>
            </div>
        </div>
    </div>
</header>