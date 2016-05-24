@extends('layouts.app')

@section('content')
  <div class="container">
      <div class="row">
          <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
              <div id="mark" v-for="post in list  | filterBy keywords in 'article' 'tags' ">
                  <div class="post-preview">
                      <a href="/posts/@{{ post.id }}">
                          <h2 class="post-title" v-html="post.title | marked"></h2>
                      </a>

                      <p class="post-meta">Posted by 
                      <span v-if="post.user_id > 0"><a style="cursor:pointer" v-on:click="to_user($event,1)">@{{ post.author }}</a> <i class="fa fa-certificate" style="color: #559dee;"></i></span>
                      <span v-else>@{{ post.author }}</span>
                      

                      on @{{ post.created_at | moment }}
                      </p>
                      <p style="font-family: 'Roboto', sans-serif; margin-top: -30px;">
                        <i class="fa fa-eye" aria-hidden="true"></i> @{{ post.views }}
                      </p>

                      
                  </div>
                 {{-- ADD TAGS HERE --}}
                 @if($settings['tags'])
                   <div style="display: inline;" v-for="tag in post.tags">  
                      <div style="cursor:pointer" class="tagMain" v-on:click="to_tag($event,1)">@{{ tag.name }}</div> 
                   </div>
                 @endif
                  <hr>
              </div>
          </div>
      </div>

      @if($settings['pagination_type'])
        @include('navigation.paginationWithNumbers')
      @else
        @include('navigation.paginationSimple')
      @endif

  </div>

  <input type="hidden" id="content" value="{{ $content }}" />
  <input type="hidden" id="tagName" value="{{ $tag }}" />
  <input type="hidden" id="userName" value="{{ $user }}" />
  <input type="hidden" id="dateFormat" value="{{ $settings['date_format'] }}" />
@endsection