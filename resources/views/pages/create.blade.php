@extends('layouts.app')

@section('content')
	<section style="padding: 0;">

	    {!! Form::open(['route' => 'posts.store', 'enctype' => 'multipart/form-data']) !!}

			<textarea id="article" name="article" data-role="none" name="content" rows="25"></textarea>
				
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

						<button type="submit" style="border-color: transparent;" class="btn btn-success">Save</button>
					</div>
				</div>
		{!! Form::close() !!}
	</section>
@endsection

