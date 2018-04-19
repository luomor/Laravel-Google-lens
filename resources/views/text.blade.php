@extends('layout')
@section('heading')
Text from Image
@endsection
@section('content')
	<div class="offset-md-2 col-md-8 card file-text">
		<div class="col-md-12 form-group">
			<textarea class="form-control" id="image-text" rows="30">@if($texts){{$texts[0]->description() }}@endif</textarea>
		</div>
	</div>
@endsection