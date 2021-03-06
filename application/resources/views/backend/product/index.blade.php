@extends('backend.layout.master')

@section('title')
	Product
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
				url: "{{ route('backend.product.datatables') }}",
				type: "post",
				data: {
			    	f_publish : $('*[name=f_publish]').val(),
				},
			},
			columns: [
				{data: 'check', orderable: false, searchable: false},
				{data: 'flag_publish'},

				{data: 'name'},
				{data: 'short_description'},

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

	    $('#datatable').on('click', '.delete-product', function(){
			$('#delete-product input[name=id]').val($(this).data('id'));
		});
		$('#datatable').on('click', '.publish-product', function(){
			$('#publish-product input[name=id]').val($(this).data('id'));
		});
		$('#datatable').on('click', '.unpublish-product', function(){
			$('#unpublish-product input[name=id]').val($(this).data('id'));
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

	<h1>Product</h1>

	@can('delete-product')
	{{-- Delete product --}}
	<div id="delete-product" class="modal fade" product="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<form class="form-horizontal form-label-left" action="{{ route('backend.product.delete') }}" method="post" enctype="multipart/form-data">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Delete Product?</h4>
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

	@can('publish-product')
	{{-- Read product --}}
	<div id="publish-product" class="modal fade" product="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<form class="form-horizontal form-label-left" action="{{ route('backend.product.publish') }}" method="post" enctype="multipart/form-data">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Set Publish?</h4>
					</div>
					<div class="modal-body">
					</div>
					<div class="modal-footer">
						{{ csrf_field() }}
						<input type="hidden" name="id" value="{{old('id')}}">
						<button type="submit" class="btn btn-success">Publish</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	{{-- Unpublish product --}}
	<div id="unpublish-product" class="modal fade" product="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<form class="form-horizontal form-label-left" action="{{ route('backend.product.publish') }}" method="post" enctype="multipart/form-data">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Set Unpublish?</h4>
					</div>
					<div class="modal-body">
					</div>
					<div class="modal-footer">
						{{ csrf_field() }}
						<input type="hidden" name="id" value="{{old('id')}}">
						<button type="submit" class="btn btn-dark">Unpublish</button>
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
					<select class="form-control" name="f_publish" onchange="this.form.submit()">
						<option value="" {{ $request->f_publish == '' ? 'selected' : '' }}>All Status Publish</option>
						<option value="1" {{ $request->f_publish === '1' ? 'selected' : '' }}>Publish</option>
						<option value="0" {{ $request->f_publish === '0' ? 'selected' : '' }}>Unpublish</option>
					</select>
				</form>
			</div>
			<div class="col-md-6">
				<form method="post" id="action" action="{{ route('backend.product.action') }}" class="form-inline text-right">
					@can('create-product')
					<a href="{{ route('backend.product.create') }}" class="btn btn-default">Create</a>
					@endcan
					<select class="form-control" name="action">
						<option value="publish">Set As Publish</option>
						<option value="unpublish">Set As Unpublish</option>
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
					<th>Flag Publish</th>
					<th>Name</th>

					<th>Short Description</th>

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
				</tr>
			</tfoot>
		</table>
	</div>
	

@endsection