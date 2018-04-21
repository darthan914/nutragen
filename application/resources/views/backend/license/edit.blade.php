@extends('backend.layout.master')

@section('name')
	Edit License
@endsection

@section('script')
<script type="text/javascript">
	$(function() {
	});

</script>

@endsection

@section('content')

	<h1>Edit License</h1>
	<div class="x_panel">
	<form class="form-horizontal form-label-left" action="{{ route('backend.license.update', $index->id) }}" method="post" enctype="multipart/form-data">

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
			<label for="image_height" class="control-label col-md-3 col-sm-3 col-xs-12">Image Height
			</label>
			<div class="col-md-9 col-sm-9 col-xs-12">
				<input type="text" id="image_height" name="image_height" class="form-control {{$errors->first('image_height') != '' ? 'parsley-error' : ''}}" value="{{ old('image_height', $index->image_height) }}" placeholder="default: 100">
				<ul class="parsley-errors-list filled">
					<li class="parsley-required">{{ $errors->first('image_height') }}</li>
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
				<a class="btn btn-primary" href="{{ route('backend.license') }}">Cancel</a>
				<button type="submit" class="btn btn-success">Submit</button>
			</div>
		</div>

	</form>
	</div>

@endsection