@extends('layout')
@section('custom_css')
<style type="text/css">
</style>
@endsection
@section('heading')
Text from Image
@endsection
@section('content')
	<div class="row">
		<div class="offset-md-7 col-md-2 download" style="margin-bottom: 20px;">
			<a href="{{ route('download',$text->id) }}" class="btn btn-success">Download</a>
		</div>
		<div class="col-md-2 download" style="margin-bottom: 20px;">
			<a href="{{ route('editText',$text->id) }}" class="btn btn-success">Edit Text</a>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4 single-history-image">
			<img src="{{ Storage::url($text->image_file_path) }}" class="img-fluid">
		</div>
		<div class="col-md-7 card single-history-text">
			<p>{{$text->image_file_content}}</p>
		</div>
	</div>
@endsection