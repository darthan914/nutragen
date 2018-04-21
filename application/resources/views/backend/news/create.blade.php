@extends('backend.layout.master')

@section('title')
	Create News
@endsection

@section('script')
<script src="{{ asset('backend/vendors/ckeditor/ckeditor.js') }}"></script>
<script type="text/javascript">
	CKEDITOR.replace( 'content' );

	$(function() {
		$('input[name=title]').change(function(event) {
			$('input[name=slug_url]').val(convertToSlug($(this).val()));
		});
	});

	function convertToSlug(Text)
	{
	    return Text
	        .toLowerCase()
	        .replace(/[^\w ]+/g,'')
	        .replace(/ +/g,'-')
	        ;
	}
</script>

@endsection

@section('content')

	<h1>Create News</h1>
	<div class="x_panel">
	<form class="form-horizontal form-label-left" action="{{ route('backend.news.store') }}" method="post" enctype="multipart/form-data">

		<div class="form-group">
			<label for="title" class="control-label col-md-3 col-sm-3 col-xs-12">Title <span class="required">*</span>
			</label>
			<div class="col-md-9 col-sm-9 col-xs-12">
				<input type="text" id="title" name="title" class="form-control {{$errors->first('title') != '' ? 'parsley-error' : ''}}" value="{{ old('title') }}">
				<ul class="parsley-errors-list filled">
					<li class="parsley-required">{{ $errors->first('title') }}</li>
				</ul>
			</div>
		</div>

		<div class="form-group">
			<label for="slug_url" class="control-label col-md-3 col-sm-3 col-xs-12">Slug URL <span class="required">*</span>
			</label>
			<div class="col-md-9 col-sm-9 col-xs-12">
				<input type="text" id="slug_url" name="slug_url" class="form-control {{$errors->first('slug_url') != '' ? 'parsley-error' : ''}}" value="{{ old('slug_url') }}">
				<ul class="parsley-errors-list filled">
					<li class="parsley-required">{{ $errors->first('slug_url') }}</li>
				</ul>
			</div>
		</div>

		<div class="form-group">
			<label for="description" class="control-label col-md-3 col-sm-3 col-xs-12">Description 
			</label>
			<div class="col-md-9 col-sm-9 col-xs-12">
				<textarea id="description" name="description" class="form-control {{$errors->first('description') != '' ? 'parsley-error' : ''}}">{{ old('description') }}</textarea>
				<ul class="parsley-errors-list filled">
					<li class="parsley-required">{{ $errors->first('description') }}</li>
				</ul>
			</div>
		</div>

		<div class="form-group">
			<label for="author" class="control-label col-md-3 col-sm-3 col-xs-12">Author <span class="required">*</span>
			</label>
			<div class="col-md-9 col-sm-9 col-xs-12">
				<input type="text" id="author" name="author" class="form-control {{$errors->first('author') != '' ? 'parsley-error' : ''}}" value="{{ old('author') }}">
				<ul class="parsley-errors-list filled">
					<li class="parsley-required">{{ $errors->first('author') }}</li>
				</ul>
			</div>
		</div>

		<div class="form-group">
			<label for="content" class="control-label col-md-3 col-sm-3 col-xs-12">Content <span class="required">*</span>
			</label>
			<div class="col-md-9 col-sm-9 col-xs-12">
				<textarea id="content" name="content" class="form-control {{$errors->first('content') != '' ? 'parsley-error' : ''}}">{{ old('content') }}</textarea>
				<ul class="parsley-errors-list filled">
					<li class="parsley-required">{{ $errors->first('content') }}</li>
				</ul>
			</div>
		</div>

		<div class="form-group">
			<label for="flag_publish" class="control-label col-md-3 col-sm-3 col-xs-12">Publish 
			</label>
			<div class="col-md-9 col-sm-9 col-xs-12">
				<select id="flag_publish" name="flag_publish" class="form-control {{$errors->first('flag_publish') != '' ? 'parsley-error' : ''}}">
					<option value="0" @if(old('flag_publish') == '0') selected @endif>Unpublish</option>
					<option value="1" @if(old('flag_publish') == '1') selected @endif>Publish</option>
				</select>
				<ul class="parsley-errors-list filled">
					<li class="parsley-required">{{ $errors->first('flag_publish') }}</li>
				</ul>
			</div>
		</div>

		<div class="form-group">
			<label for="photo" class="control-label col-md-3 col-sm-3 col-xs-12">Photo
			</label>
			<div class="col-md-9 col-sm-9 col-xs-12">
				<input type="file" id="photo" name="photo" class="form-control {{$errors->first('photo') != '' ? 'parsley-error' : ''}}">
				<ul class="parsley-errors-list filled">
					<li class="parsley-required">{{ $errors->first('photo') }}</li>
				</ul>
			</div>
		</div>

		<div class="ln_solid"></div>

		<div class="form-group">
			<label for="meta_title" class="control-label col-md-3 col-sm-3 col-xs-12">Title
			</label>
			<div class="col-md-9 col-sm-9 col-xs-12">
				<input type="text" id="meta_title" name="meta_title" class="form-control {{$errors->first('meta_title') != '' ? 'parsley-error' : ''}}" value="{{ old('meta_title') }}" placeholder="default: Title">
				<ul class="parsley-errors-list filled">
					<li class="parsley-required">{{ $errors->first('meta_title') }}</li>
				</ul>
			</div>
		</div>

		<div class="form-group">
			<label for="meta_url" class="control-label col-md-3 col-sm-3 col-xs-12">Meta URL
			</label>
			<div class="col-md-9 col-sm-9 col-xs-12">
				<input type="text" id="meta_url" name="meta_url" class="form-control {{$errors->first('meta_url') != '' ? 'parsley-error' : ''}}" value="{{ old('meta_url') }}" placeholder="default: Slug URL">
				<ul class="parsley-errors-list filled">
					<li class="parsley-required">{{ $errors->first('meta_url') }}</li>
				</ul>
			</div>
		</div>

		<div class="form-group">
			<label for="meta_description" class="control-label col-md-3 col-sm-3 col-xs-12">Meta Description 
			</label>
			<div class="col-md-9 col-sm-9 col-xs-12">
				<textarea id="meta_description" name="meta_description" class="form-control {{$errors->first('meta_description') != '' ? 'parsley-error' : ''}}" placeholder="default: Description">{{ old('meta_description') }}</textarea>
				<ul class="parsley-errors-list filled">
					<li class="parsley-required">{{ $errors->first('meta_description') }}</li>
				</ul>
			</div>
		</div>

		<div class="form-group">
			<label for="meta_image" class="control-label col-md-3 col-sm-3 col-xs-12">Meta Image
			</label>
			<div class="col-md-9 col-sm-9 col-xs-12">
				<input type="file" id="meta_image" name="meta_image" class="form-control {{$errors->first('meta_image') != '' ? 'parsley-error' : ''}}" placeholder="default: Photo">
				<ul class="parsley-errors-list filled">
					<li class="parsley-required">{{ $errors->first('meta_image') }}</li>
				</ul>
			</div>
		</div>
		

		<div class="ln_solid"></div>

		<div class="form-group">
			<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
				{{ csrf_field() }}
				<a class="btn btn-primary" href="{{ route('backend.news') }}">Cancel</a>
				<button type="submit" class="btn btn-success">Submit</button>
			</div>
		</div>

	</form>
	</div>

@endsection