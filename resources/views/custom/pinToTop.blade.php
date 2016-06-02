<div class="row">
    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
    <div style="margin-top: 20px;">Pined To Top Post</div>
            <div class="post-preview">
                <a href="/posts/{{ $pinToTop->id }}">
                    <h2 class="post-title">{{ $pinToTop->title }}</h2>
                </a>

                <p class="post-meta">Posted by 
                <span><a style="cursor:pointer" v-on:click="to_user($event,1)">{{ $pinToTop->author }}</a> <i class="fa fa-certificate" style="color: #F5D76E;"></i></span>
              
                on {{ $pinToTop->created_at }}
                </p>
                
            </div>
           {{-- ADD TAGS HERE --}}
           @foreach ($pinToTop->tags as $tag)
             <div style="display: inline;">  
                <div style="cursor:pointer" class="tagMain" v-on:click="to_tag($event,1)">{{ $tag->name }}</div> 
             </div>
           @endforeach
           <hr>
           <hr>
           
    </div>
</div>