@extends('backend.layout.master')

@section('title')
	Config
@endsection

@section('script')
<script src="{{ asset('backend/vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('backend/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script type="text/javascript">
	$(function() {
		$('.update-config').change(function(event) {
			$.post('{{ route('backend.config.update') }}', {
				for   : $(this).data('for'),
				value : $(this).val(),
				type  : $(this).data('type'),
				null  : $(this).data('null'),
			}, function(data) {
				if(data != '')
				{
					alert(data);
				}
			});
		});

		$('select').select2({
		});
	});
</script>
@endsection

@section('css')
<link href="{{ asset('backend/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('backend/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}" rel="stylesheet">
@endsection

@section('content')

	<h1>Config</h1>

	<div class="x_panel" style="overflow: auto;">
		<table class="table table-striped table-bordered" id="datatable">
			<thead>
				<tr>
					<th>Key</th>
					<th>Value</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th colspan="2">Global</th>
				</tr>
				<tr>
					<td>super_admin_role</td>
					<td>
						<select multiple class="form-control update-config" data-for="super_admin_role" data-type="array" data-null="Y">
							@foreach ($role as $list)
							<option value="{{ $list->id }}" @if(in_array($list->id, explode(', ', $super_admin_role->value))) selected @endif>{{ $list->name }}</option>
							@endforeach
						</select>
					</td>
				</tr>
				<tr>
					<td>super_admin_user</td>
					<td>
						<select multiple class="form-control update-config" data-for="super_admin_user" data-type="array" data-null="Y">
							@foreach ($user as $list)
							<option value="{{ $list->id }}" @if(in_array($list->id, explode(', ', $super_admin_user->value))) selected @endif>{{ $list->name }}</option>
							@endforeach
						</select>
					</td>
				</tr>

			</tbody>
		</table>
	</div>
	

@endsection