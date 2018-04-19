@extends('layout')
@section('content')
	<h3>Your Recent Conversion</h3>
	<div class="row">
		@foreach($texts as $text)
		{{-- <a href="{{ route('getHistory',$text->id) }}"> --}}
			<div class="col-md-5 card history-card">
				<div class="row">
					<div class="col-md-3 history-image">
						<a href="{{ route('getHistory',$text->id) }}">
							<img src="{{ Storage::url($text->image_file_path) }}" class="img-fluid">
						</a>
					</div>
					<div class="col-md-9 history-text">
						<p>{!! str_limit($text->image_file_content, $limit = 200, $end = '...') !!}</p>
					</div>
				</div>
			</div>
		{{-- </a> --}}
		@endforeach
	</div>
@endsection