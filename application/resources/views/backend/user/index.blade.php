@extends('backend.layout.master')

@section('title')
	User List
@endsection

@section('script')
<script src="{{ asset('backend/vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('backend/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script type="text/javascript">
	$(function() {
		var table = $('#datatable').DataTable({
			processing: true,
			serverSide: true,
			ajax: {
				url: "{{ route('backend.user.datatables') }}",
				type: "post",
				data: {
			    	f_role : $('*[name=f_role]').val(),
			    	f_active   : $('*[name=f_active]').val(),
				},
			},
			columns: [
				{data: 'check', orderable: false, searchable: false},
				{data: 'email'},
				{data: 'name'},
				{data: 'role'},
				{data: 'level'},
				{data: 'leader'},
				{data: 'active'},
				{data: 'grant'},
				{data: 'denied'},
				{data: 'action', orderable: false, searchable: false, sClass: 'nowarp-cell'},
			],
			initComplete: function () {
				this.api().columns().every(function () {
					var column = this;
					var input = document.createElement("input");
					$(input).appendTo($(column.footer()).empty())
					.on('keyup', function () {
						column.search($(this).val(), false, false, true).draw();
					});
				});
			},
			scrollY: "400px",
			// scrollX: true,
			
		});

		$(".check-all").click(function(){
			if ($(this).is(':checked'))
			{
				$('.' + $(this).attr('data-target')).prop('checked', true);
			}
			else
			{
				$('.' + $(this).attr('data-target')).prop('checked', false);
			}
		});

		$('#datatable').on('click', '.delete-user', function(){
			$('#delete-user input[name=id]').val($(this).data('id'));
		});
		$('#datatable').on('click', '.impersonate-user', function(){
			$('#impersonate-user input[name=id]').val($(this).data('id'));
		});
		$('#datatable').on('click', '.active-user', function(){
			$('#active-user input[name=id]').val($(this).data('id'));
		});
		$('#datatable').on('click', '.inactive-user', function(){
			$('#inactive-user input[name=id]').val($(this).data('id'));
		});

		@if(Session::has('delete-user-error'))
		$('#delete-user').modal('show');
		@endif

		@if(Session::has('impersonate-user-error'))
		$('#impersonate-user').modal('show');
		@endif

		@if(Session::has('active-user-error'))
		$('#active-user').modal('show');
		@endif

		@if(Session::has('inactive-user-error'))
		$('#inactive-user').modal('show');
		@endif
	});
</script>
@endsection

@section('css')
<link href="{{ asset('backend/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('backend/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}" rel="stylesheet">
<style type="text/css">
	.nowarp-cell{
		white-space: nowrap;
	}
</style>
@endsection

@section('content')

	<h1>User List</h1>
	@can('delete-user')
	{{-- Delete User --}}
	<div id="delete-user" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<form class="form-horizontal form-label-left" action="{{ route('backend.user.delete') }}" method="post" enctype="multipart/form-data">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Delete User?</h4>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label for="password" class="control-label col-md-3 col-sm-3 col-xs-12">Password User<span class="required">*</span>
							</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<input type="password" id="password" name="password" class="form-control {{$errors->first('password') != '' ? 'parsley-error' : ''}}">
								<ul class="parsley-errors-list filled">
									<li class="parsley-required">{{ $errors->first('password') }}</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						{{ csrf_field() }}
						<input type="hidden" name="id" value="{{old('id')}}">
						<button type="submit" class="btn btn-danger">Delete</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	@endcan

	@can('impersonate-user')
	{{-- Impersonate User --}}
	<div id="impersonate-user" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<form class="form-horizontal form-label-left" action="{{ route('backend.user.impersonate') }}" method="post" enctype="multipart/form-data">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Password for Impersonate User</h4>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label for="password" class="control-label col-md-3 col-sm-3 col-xs-12">Password User<span class="required">*</span>
							</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<input type="password" id="password" name="password" class="form-control {{$errors->first('password') != '' ? 'parsley-error' : ''}}">
								<ul class="parsley-errors-list filled">
									<li class="parsley-required">{{ $errors->first('password') }}</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						{{ csrf_field() }}
						<input type="hidden" name="id" value="{{old('id')}}">
						<button type="submit" class="btn btn-success">Impersonate</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	@endcan

	@can('active-user')
	{{-- Active User --}}
	<div id="active-user" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<form class="form-horizontal form-label-left" action="{{ route('backend.user.active') }}" method="post" enctype="multipart/form-data">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Active User?</h4>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label for="password" class="control-label col-md-3 col-sm-3 col-xs-12">Password User<span class="required">*</span>
							</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<input type="password" id="password" name="password" class="form-control {{$errors->first('password') != '' ? 'parsley-error' : ''}}">
								<ul class="parsley-errors-list filled">
									<li class="parsley-required">{{ $errors->first('password') }}</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						{{ csrf_field() }}
						<input type="hidden" name="id" value="{{old('id')}}">
						<button type="submit" class="btn btn-success">Active</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	{{-- Inactive User --}}
	<div id="inactive-user" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<form class="form-horizontal form-label-left" action="{{ route('backend.user.active') }}" method="post" enctype="multipart/form-data">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Inactive User?</h4>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label for="password" class="control-label col-md-3 col-sm-3 col-xs-12">Password User<span class="required">*</span>
							</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<input type="password" id="password" name="password" class="form-control {{$errors->first('password') != '' ? 'parsley-error' : ''}}">
								<ul class="parsley-errors-list filled">
									<li class="parsley-required">{{ $errors->first('password') }}</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						{{ csrf_field() }}
						<input type="hidden" name="id" value="{{old('id')}}">
						<button type="submit" class="btn btn-dark">Inactive</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	@endcan

	{{-- Action User --}}
	<div id="action-user" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Apply selected?</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="password" class="control-label col-md-3 col-sm-3 col-xs-12">Password User<span class="required">*</span>
						</label>
						<div class="col-md-9 col-sm-9 col-xs-12">
							<input type="password" id="password" name="password" class="form-control {{$errors->first('password') != '' ? 'parsley-error' : ''}}" form="action">
							<ul class="parsley-errors-list filled">
								<li class="parsley-required">{{ $errors->first('password') }}</li>
							</ul>
						</div>
					</div>
				</div>
				<div style="clear: both;"></div>
				<div class="modal-footer">
					{{ csrf_field() }}
					<button type="submit" class="btn btn-success" form="action">Apply</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				</div>
			</div>
		</div>
	</div>

	<div class="x_panel" style="overflow: auto;">
				

		<div class="row">
			<div class="col-md-6">
				<form class="form-inline" method="get">
					<select class="form-control" name="f_role" onchange="this.form.submit()">
						<option value="all" {{ $request->f_role == 'all' ? 'selected' : '' }}>All Role</option>
						@foreach($role as $list)
						<option value="{{ $list->id }}" {{ $request->f_role == $list->id ? 'selected' : '' }}>{{ $list->name }}</option>
						@endforeach
					</select>
					<select class="form-control" name="f_active" onchange="this.form.submit()">
						<option value="" {{ $request->f_active == '' ? 'selected' : '' }}>All Status Active</option>
						<option value="1" {{ $request->f_active === '1' ? 'selected' : '' }}>Active</option>
						<option value="0" {{ $request->f_active === '0' ? 'selected' : '' }}>Inactive</option>
					</select>
				</form>
			</div>
			<div class="col-md-6">
				<form method="post" id="action" action="{{ route('backend.user.action') }}" class="form-inline text-right" onsubmit="return confirm('Are you sure to take this action?')">
					@can('create-user')
					<a href="{{ route('backend.user.create') }}" class="btn btn-default">Create</a>
					@endcan
					<select class="form-control" name="action">
						<option value="enable">Enable</option>
						<option value="disable">Disable</option>
						<option value="delete">Delete</option>
					</select>
					<button type="button" class="btn btn-success" data-toggle="modal" data-target="#action-user">Apply Selected</button>
				</form>
			</div>
		</div>
		
		<div class="ln_solid"></div>

		<table class="table table-striped table-bordered" id="datatable">
			<thead>
				<tr>
					<th>
						<label class="checkbox-inline"><input type="checkbox" data-target="check" class="check-all" id="check-all">S</label>
					</th>

					<th>Email</th>
					<th>Name</th>

					<th>Role</th>

					<th>Level</th>
					<th>Leader</th>
					<th>Active</th>

					<th>Grant</th>
					<th>Denied</th>
					<th>Action</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<td></td>

					<td></td>
					<td></td>

					<td></td>

					<td></td>
					<td></td>
					<td></td>

					<td></td>
					<td></td>
					<td></td>

				</tr>
			</tfoot>
		</table>
	</div>
	

@endsection