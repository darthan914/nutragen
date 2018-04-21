@extends('backend.layout.master')

@section('title')
	Create User
@endsection

@section('script')
<script type="text/javascript">
	$(function() {
		$('select[name=id_role]').select2({
			placeholder: "Select Role",
			allowClear: true
		});

		$('select[name=leader]').select2({
			placeholder: "Select Leader",
			allowClear: true
		});
	});
</script>

@endsection

@section('content')

	<h1>Create User</h1>
	<div class="x_panel">
	<form class="form-horizontal form-label-left" action="{{ route('backend.user.store') }}" method="post" enctype="multipart/form-data">

		<div class="form-group">
			<label for="email" class="control-label col-md-3 col-sm-3 col-xs-12">Email <span class="required">*</span>
			</label>
			<div class="col-md-9 col-sm-9 col-xs-12">
				<input type="text" id="email" name="email" class="form-control {{$errors->first('email') != '' ? 'parsley-error' : ''}}" value="{{ old('email') }}">
				<ul class="parsley-errors-list filled">
					<li class="parsley-required">{{ $errors->first('email') }}</li>
				</ul>
			</div>
		</div>

		<div class="form-group">
			<label for="password" class="control-label col-md-3 col-sm-3 col-xs-12">Password <span class="required">*</span>
			</label>
			<div class="col-md-9 col-sm-9 col-xs-12">
				<input type="password" id="password" name="password" class="form-control {{$errors->first('password') != '' ? 'parsley-error' : ''}}">
				<ul class="parsley-errors-list filled">
					<li class="parsley-required">{{ $errors->first('password') }}</li>
				</ul>
			</div>
		</div>

		<div class="form-group">
			<label for="password_confirmation" class="control-label col-md-3 col-sm-3 col-xs-12">Password Confirmation <span class="required">*</span>
			</label>
			<div class="col-md-9 col-sm-9 col-xs-12">
				<input type="password" id="password_confirmation" name="password_confirmation" class="form-control {{$errors->first('password_confirmation') != '' ? 'parsley-error' : ''}}">
				<ul class="parsley-errors-list filled">
					<li class="parsley-required">{{ $errors->first('password_confirmation') }}</li>
				</ul>
			</div>
		</div>

		<div class="form-group">
			<label for="name" class="control-label col-md-3 col-sm-3 col-xs-12">Name <span class="required">*</span>
			</label>
			<div class="col-md-9 col-sm-9 col-xs-12">
				<input type="text" id="name" name="name" class="form-control {{$errors->first('name') != '' ? 'parsley-error' : ''}}" value="{{ old('name') }}">
				<ul class="parsley-errors-list filled">
					<li class="parsley-required">{{ $errors->first('name') }}</li>
				</ul>
			</div>
		</div>

		@can('role-user')
		<div class="form-group">
			<label for="id_role" class="control-label col-md-3 col-sm-3 col-xs-12">Role <span class="required">*</span>
			</label>
			<div class="col-md-9 col-sm-9 col-xs-12">
				<select id="id_role" name="id_role" class="form-control {{$errors->first('id_role') != '' ? 'parsley-error' : ''}}">
					
					<option value=""></option>

					@if (in_array(Auth::user()->id_role, explode(', ', $super_admin_role->value)) || in_array(Auth::id(), explode(', ', $super_admin_user->value)))
					@foreach($super_admin as $list)
					<option value="{{ $list->id }}" @if(old('id_role') == $list->id) selected @endif data-id_role="{{ $list->code }}">{{ $list->name }}</option>
					@endforeach
					@endif

					@foreach($role as $list)
					<option value="{{ $list->id }}" @if(old('id_role') == $list->id) selected @endif data-id_role="{{ $list->code }}">{{ $list->name }}</option>
					@endforeach
				</select>
				<ul class="parsley-errors-list filled">
					<li class="parsley-required">{{ $errors->first('id_role') }}</li>
				</ul>
			</div>
		</div>
		@endcan

		@can('level-user')
		<div class="form-group">
			<label for="level" class="control-label col-md-3 col-sm-3 col-xs-12">Level
			</label>
			<div class="col-md-9 col-sm-9 col-xs-12">
				<input type="text" id="level" name="level" class="form-control {{$errors->first('level') != '' ? 'parsley-error' : ''}}" value="{{ old('level') }}">
				<ul class="parsley-errors-list filled">
					<li class="parsley-required">{{ $errors->first('level') }}</li>
				</ul>
			</div>
		</div>
		@endcan

		<div class="form-group">
			<label for="leader" class="control-label col-md-3 col-sm-3 col-xs-12">Leader
			</label>
			<div class="col-md-9 col-sm-9 col-xs-12">
				<select id="leader" name="leader" class="form-control {{$errors->first('leader') != '' ? 'parsley-error' : ''}}">
					<option value=""></option>
					@foreach($leader as $list)
					<option value="{{ $list->id }}" @if(old('leader', Auth::id()) == $list->id) selected @endif>{{ $list->name }}</option>
					@endforeach
				</select>
				<ul class="parsley-errors-list filled">
					<li class="parsley-required">{{ $errors->first('leader') }}</li>
				</ul>
			</div>
		</div>

		@can('active-user')
		<div class="form-group">
			<label for="active" class="control-label col-md-3 col-sm-3 col-xs-12">Active 
			</label>
			<div class="col-md-9 col-sm-9 col-xs-12">
				<select id="active" name="active" class="form-control {{$errors->first('active') != '' ? 'parsley-error' : ''}}">
					<option value="0" @if(old('active') == '0') selected @endif>Inactive</option>
					<option value="1" @if(old('active') == '1') selected @endif>Active</option>
					<option value="-1" @if(old('active') == '-1') selected @endif>Inactive, (Can impersonate)</option>
				</select>
				<ul class="parsley-errors-list filled">
					<li class="parsley-required">{{ $errors->first('active') }}</li>
				</ul>
			</div>
		</div>
		@endcan

		<div class="form-group">
			<label for="avatar" class="control-label col-md-3 col-sm-3 col-xs-12">Avatar
			</label>
			<div class="col-md-9 col-sm-9 col-xs-12">
				<input type="file" id="avatar" name="avatar" class="form-control {{$errors->first('avatar') != '' ? 'parsley-error' : ''}}">
				<ul class="parsley-errors-list filled">
					<li class="parsley-required">{{ $errors->first('avatar') }}</li>
				</ul>
			</div>
		</div>

		<div class="form-group">
			<label for="password_user" class="control-label col-md-3 col-sm-3 col-xs-12">Password User<span class="required">*</span>
			</label>
			<div class="col-md-9 col-sm-9 col-xs-12">
				<input type="password" id="password_user" name="password_user" class="form-control {{$errors->first('password_user') != '' ? 'parsley-error' : ''}}">
				<ul class="parsley-errors-list filled">
					<li class="parsley-required">{{ $errors->first('password_user') }}</li>
				</ul>
			</div>
		</div>

		<div class="ln_solid"></div>
		<div class="form-group">
			<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
				{{ csrf_field() }}
				<a class="btn btn-primary" href="{{ route('backend.user') }}">Cancel</a>
				<button type="submit" class="btn btn-success">Submit</button>
			</div>
		</div>

	</form>
	</div>

@endsection