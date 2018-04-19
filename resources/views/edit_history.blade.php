@extends('layout')
@section('custom_css')
<style type="text/css">
</style>
@endsection
@section('heading')
Edit Text
@endsection
@section('content')
	<form action="{{ route('saveText',$text->id) }}" method="post">
		@csrf
		<div class="row">
			<div class="offset-md-10 col-md-2 download" style="margin-bottom: 20px;">
				<button class="btn btn-success" type="submit">Save</button>
			</div>
		</div>
		<div class="row">
			<div class="col-md-5 single-history-image" style="width: auto;">
				<img src="{{ Storage::url($text->image_file_path) }}" class="img-fluid">
			</div>
			<div class="col-md-7">
				<textarea class="form-control" id="image_file_content" name="image_file_content" rows="15">{{$text->image_file_content}}</textarea>
			</div>
		</div>
	</form>
@endsection