@extends('layout')
@section('heading')
Upload Image
@endsection
@section('content')
<div class="offset-md-2 col-md-8 card file-upload-div">
	<h4>Upload Image </h4>
	<div class="col-md-12">
		<form method="post" action="{{ route('scanText') }}"  enctype="multipart/form-data">
			@csrf
			<div class="form-group">
				<div class="custom-file">
				  <input type="file" class="custom-file-input" name="image-file" id="image-file">
				  <label class="custom-file-label" for="image-file">Select Image file for Text conversion</label>
				</div>
			</div>
			<button type="submit" name="submit" class="btn btn-success">Upload Image</button>
		</form>
	</div>
</div>
@endsection
