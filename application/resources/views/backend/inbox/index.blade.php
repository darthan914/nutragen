@extends('backend.layout.master')

@section('title')
	Inbox
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
				url: "{{ route('backend.inbox.datatables') }}",
				type: "post",
				data: {
			    	f_read : $('*[name=f_read]').val(),
				},
			},
			columns: [
				{data: 'check', orderable: false, searchable: false},
				{data: 'read'},
				{data: 'created_at'},

				{data: 'name'},
				{data: 'email'},
				{data: 'subject'},

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

	    $('#datatable').on('click', '.delete-inbox', function(){
			$('#delete-inbox input[name=id]').val($(this).data('id'));
		});
		$('#datatable').on('click', '.read-inbox', function(){
			$('#read-inbox input[name=id]').val($(this).data('id'));
		});
		$('#datatable').on('click', '.unread-inbox', function(){
			$('#unread-inbox input[name=id]').val($(this).data('id'));
		});
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

	<h1>Inbox</h1>

	@can('delete-inbox')
	{{-- Delete inbox --}}
	<div id="delete-inbox" class="modal fade" inbox="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<form class="form-horizontal form-label-left" action="{{ route('backend.inbox.delete') }}" method="post" enctype="multipart/form-data">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Delete Inbox?</h4>
					</div>
					<div class="modal-body">
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

	@can('read-inbox')
	{{-- Read inbox --}}
	<div id="read-inbox" class="modal fade" inbox="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<form class="form-horizontal form-label-left" action="{{ route('backend.inbox.read') }}" method="post" enctype="multipart/form-data">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Set as readed?</h4>
					</div>
					<div class="modal-body">
					</div>
					<div class="modal-footer">
						{{ csrf_field() }}
						<input type="hidden" name="id" value="{{old('id')}}">
						<button type="submit" class="btn btn-success">Readed</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	{{-- Unread inbox --}}
	<div id="unread-inbox" class="modal fade" inbox="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<form class="form-horizontal form-label-left" action="{{ route('backend.inbox.read') }}" method="post" enctype="multipart/form-data">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Set as unreaded?</h4>
					</div>
					<div class="modal-body">
					</div>
					<div class="modal-footer">
						{{ csrf_field() }}
						<input type="hidden" name="id" value="{{old('id')}}">
						<button type="submit" class="btn btn-dark">Unread</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	@endcan

	<div class="x_panel" style="overflow: auto;">
		

		<div class="row">
			<div class="col-md-6">
				<form class="form-inline" method="get">
					<select class="form-control" name="f_read" onchange="this.form.submit()">
						<option value="" {{ $request->f_read == '' ? 'selected' : '' }}>All Status Read</option>
						<option value="1" {{ $request->f_read === '1' ? 'selected' : '' }}>Readed</option>
						<option value="0" {{ $request->f_read === '0' ? 'selected' : '' }}>Unread</option>
					</select>
				</form>
			</div>
			<div class="col-md-6">
				<form method="post" id="action" action="{{ route('backend.inbox.action') }}" class="form-inline text-right">
					<select class="form-control" name="action">
						<option value="read">Set As Readed</option>
						<option value="unread">Set As Unread</option>
						<option value="delete">Delete</option>
					</select>
					<button type="submit" class="btn btn-success">Update Selected</button>
				</form>
			</div>
		</div>

		<table class="table table-striped table-bordered" id="datatable">
			<thead>
				<tr>
					<th nowrap>
						<label class="checkbox-inline"><input type="checkbox" data-target="check" class="check-all" id="check-all">All</label>
					</th>
					<th>Read</th>
					<th>Time Post</th>

					<th>Name</th>
					<th>Email</th>
					<th>Subject</th>

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
				</tr>
			</tfoot>
		</table>
	</div>
	

@endsection