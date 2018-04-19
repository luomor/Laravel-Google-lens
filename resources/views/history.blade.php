@extends('layout')
@section('heading')
Text from Image
@endsection
@section('content')
	<div class="row" style="margin-bottom: 20px;">
		<div class="col-md-12">
			<strong> Showing {{($texts->currentpage()-1)*$texts->perpage()+1}} to {{$texts->currentpage()*$texts->perpage()}}
		    of  {{$texts->total()}} entries </strong>
		</div>
	</div>
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
	<div class="row" style="margin-top: : 20px;">
		<div class="col-md-12">
			{{ $texts->links() }}
		</div>
	</div>
@endsection