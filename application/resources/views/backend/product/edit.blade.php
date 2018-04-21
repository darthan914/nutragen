@extends('backend.layout.master')

@section('name')
	Edit Product
@endsection

@section('script')
<script src="{{ asset('backend/vendors/ckeditor/ckeditor.js') }}"></script>
<script type="text/javascript">
	CKEDITOR.replace( 'description' );
	$(function() {
	});

</script>

@endsection

@section('content')

	<h1>Edit Product</h1>
	<div class="x_panel">
	<form class="form-horizontal form-label-left" action="{{ route('backend.product.update', $index->id) }}" method="post" enctype="multipart/form-data">

		<div class="form-group">
			<label for="name" class="control-label col-md-3 col-sm-3 col-xs-12">Name <span class="required">*</span>
			</label>
			<div class="col-md-9 col-sm-9 col-xs-12">
				<input type="text" id="name" name="name" class="form-control {{$errors->first('name') != '' ? 'parsley-error' : ''}}" value="{{ old('name', $index->name) }}">
				<ul class="parsley-errors-list filled">
					<li class="parsley-required">{{ $errors->first('name') }}</li>
				</ul>
			</div>
		</div>

		<div class="form-group">
			<label for="short_description" class="control-label col-md-3 col-sm-3 col-xs-12">Short Description <span class="required">*</span>
			</label>
			<div class="col-md-9 col-sm-9 col-xs-12">
				<textarea type="text" id="short_description" name="short_description" class="form-control {{$errors->first('short_description') != '' ? 'parsley-error' : ''}}">{{ old('short_description', $index->short_description) }}</textarea>
				<ul class="parsley-errors-list filled">
					<li class="parsley-required">{{ $errors->first('short_description') }}</li>
				</ul>
			</div>
		</div>

		<div class="form-group">
			<label for="description" class="control-label col-md-3 col-sm-3 col-xs-12">Description <span class="required">*</span>
			</label>
			<div class="col-md-9 col-sm-9 col-xs-12">
				<textarea type="text" id="description" name="description" class="form-control {{$errors->first('description') != '' ? 'parsley-error' : ''}}">{{ old('description', $index->description) }}</textarea>
				<ul class="parsley-errors-list filled">
					<li class="parsley-required">{{ $errors->first('description') }}</li>
				</ul>
			</div>
		</div>

		<div class="form-group">
			<label for="image_logo" class="control-label col-md-3 col-sm-3 col-xs-12">Image Logo
			</label>
			<div class="col-md-9 col-sm-9 col-xs-12">
				<input type="file" id="image_logo" name="image_logo" class="form-control {{$errors->first('image_logo') != '' ? 'parsley-error' : ''}}">
				<img src="{{ asset($index->image_logo) }}" style="width: 100px;" alt="{{$index->image_logo}}">
				<ul class="parsley-errors-list filled">
					<li class="parsley-required">{{ $errors->first('image_logo') }}</li>
				</ul>
			</div>
		</div>

		<div class="form-group">
			<label for="image_logo_height" class="control-label col-md-3 col-sm-3 col-xs-12">Image Logo Height
			</label>
			<div class="col-md-9 col-sm-9 col-xs-12">
				<input type="text" id="image_logo_height" name="image_logo_height" class="form-control {{$errors->first('image_logo_height') != '' ? 'parsley-error' : ''}}" value="{{ old('image_logo_height', $index->image_logo_height) }}" placeholder="default: 100">
				<ul class="parsley-errors-list filled">
					<li class="parsley-required">{{ $errors->first('image_logo_height') }}</li>
				</ul>
			</div>
		</div>

		<div class="form-group">
			<label for="image_product" class="control-label col-md-3 col-sm-3 col-xs-12">Image Product
			</label>
			<div class="col-md-9 col-sm-9 col-xs-12">
				<input type="file" id="image_product" name="image_product" class="form-control {{$errors->first('image_product') != '' ? 'parsley-error' : ''}}">
				<img src="{{ asset($index->image_product) }}" style="width: 100px;" alt="{{$index->image_product}}">
				<ul class="parsley-errors-list filled">
					<li class="parsley-required">{{ $errors->first('image_product') }}</li>
				</ul>
			</div>
		</div>

		<div class="form-group">
			<label for="image_product_height" class="control-label col-md-3 col-sm-3 col-xs-12">Image Product Height
			</label>
			<div class="col-md-9 col-sm-9 col-xs-12">
				<input type="text" id="image_product_height" name="image_product_height" class="form-control {{$errors->first('image_product_height') != '' ? 'parsley-error' : ''}}" value="{{ old('image_product_height', $index->image_product_height) }}" placeholder="default: autowidth">
				<ul class="parsley-errors-list filled">
					<li class="parsley-required">{{ $errors->first('image_product_height') }}</li>
				</ul>
			</div>
		</div>

		<div class="form-group">
			<label for="flag_publish" class="control-label col-md-3 col-sm-3 col-xs-12">Publish 
			</label>
			<div class="col-md-9 col-sm-9 col-xs-12">
				<select id="flag_publish" name="flag_publish" class="form-control {{$errors->first('flag_publish') != '' ? 'parsley-error' : ''}}">
					<option value="0" @if(old('flag_publish', $index->flag_publish) == '0') selected @endif>Unpublish</option>
					<option value="1" @if(old('flag_publish', $index->flag_publish) == '1') selected @endif>Publish</option>
				</select>
				<ul class="parsley-errors-list filled">
					<li class="parsley-required">{{ $errors->first('flag_publish') }}</li>
				</ul>
			</div>
		</div>

		<div class="ln_solid"></div>

		<div class="form-group">
			<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
				{{ csrf_field() }}
				<input type="hidden" name="version" value="{{ old('version', $index->version) }}">
				<a class="btn btn-primary" href="{{ route('backend.product') }}">Cancel</a>
				<button type="submit" class="btn btn-success">Submit</button>
			</div>
		</div>

	</form>
	</div>

@endsection