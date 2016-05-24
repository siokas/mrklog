@extends('layouts.app')

@section('content')
	<section style="padding: 0;">

		{!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'patch', 'enctype' => 'multipart/form-data']) !!}

			<textarea id="article" name="article" data-role="none" name="content" data-provide="markdown" rows="25">{{ $post->article }}</textarea>
				
				<div class="container">
					<div class="row" style="margin-top: 30px;">
						<div class="col-sm-12 text-center">
							<h2>Tags</h2>
							@include('sections.tags')
						</div>
					</div>
				</div>

				<div class="container">
					<div class="row" style="margin-top: 3px">
						<div class="col-sm-12 text-center">
							
						</div>
					</div>
				</div>

				<div class="row" style="margin-top: 30px; margin-bottom: 10px;">
					<div class="col-sm-12 text-center">

						<button type="submit" style="border-color: transparent;" class="btn btn-success">SAVE CHANGES</button>
					</div>
				</div>
			{!! Form::close() !!}

			<div class="row" style="margin-top: 30px; margin-bottom: 10px;">
					<div class="col-sm-12 text-center">

					{!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'delete']) !!}
	                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">DELETE ARTICLE</button>
	                {!! Form::close() !!}
						
					</div>
			</div>

			
			<input type="hidden" id="pre_tags" value="{{ $tags }}" />
	</section>
@endsection

