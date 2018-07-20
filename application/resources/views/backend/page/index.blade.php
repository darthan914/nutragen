@extends('backend.layout.master')

@section('title')
	Page Management
@endsection

@section('headscript')

@endsection

@section('script')
<script src="{{ asset('backend/vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('backend/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('backend/vendors/ckeditor/ckeditor.js') }}"></script>

<script type="text/javascript">
	CKEDITOR.replace('ckeditor');

	$(function() {
		

		$('.modal-event').click(function(event) {
			$('input[name=for]').val($(this).data('for'));
			$('.modal-title').html($(this).data('for'));
			$('input[name=type]').val($(this).data('type'));
			$('input[name=null]').val($(this).data('null'));
			$.post('{{ route('backend.page.get') }}', {
				for   : $(this).data('for'),
			}, function(data) {
				$('*[name=value]:not([type=file])').val(data);

				CKEDITOR.instances['ckeditor'].setData(data);
		        $('textarea#ckeditor').val(data);
			});
		});

		$('select').select2({
		});

		@if(Session::has('modal-input-error'))
		$('#modal-input').modal('show');
		@endif
		@if(Session::has('modal-textarea-error'))
		$('#modal-textarea').modal('show');
		@endif
		@if(Session::has('modal-ckeditor-error'))
		$('#modal-ckeditor').modal('show');
		@endif
	});


</script>
@endsection

@section('css')
<link href="{{ asset('backend/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('backend/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}" rel="stylesheet">
@endsection

@section('content')

	<div id="modal-input" class="modal fade" news="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<form class="form-horizontal form-label-left" action="{{ route('backend.page.update') }}" method="post" enctype="multipart/form-data">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title"></h4>
					</div>
					<div class="modal-body">
						<input type="text" id="value" name="value" class="form-control {{$errors->first('value') != '' ? 'parsley-error' : ''}}" value="{{ old('value') }}">
					</div>
					<div class="modal-footer">
						{{ csrf_field() }}
						<input type="hidden" name="for" value="{{old('for')}}">
						<input type="hidden" name="type" value="{{old('type')}}">
						<input type="hidden" name="null" value="{{old('null')}}">
						<input type="hidden" name="modal" value="modal-input">
						<button type="submit" class="btn btn-primary">Update</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<div id="modal-file" class="modal fade" news="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<form class="form-horizontal form-label-left" action="{{ route('backend.page.update') }}" method="post" enctype="multipart/form-data">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title"></h4>
					</div>
					<div class="modal-body">
						<input type="file" id="value" name="value" class="form-control {{$errors->first('value') != '' ? 'parsley-error' : ''}}">
						<label class="checkbox-inline"><input type="checkbox" name="remove_value" value="1" @if(old('remove_value') == 1) checked @endif>Remove File</label>
					</div>
					<div class="modal-footer">
						{{ csrf_field() }}
						<input type="hidden" name="for" value="{{old('for')}}">
						<input type="hidden" name="type" value="{{old('type')}}">
						<input type="hidden" name="null" value="{{old('null')}}">
						<input type="hidden" name="modal" value="modal-file">
						<button type="submit" class="btn btn-primary">Update</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<div id="modal-textarea" class="modal fade" news="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<form class="form-horizontal form-label-left" action="{{ route('backend.page.update') }}" method="post" enctype="multipart/form-data">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title"></h4>
					</div>
					<div class="modal-body">
						<textarea id="value" name="value" class="form-control {{$errors->first('value') != '' ? 'parsley-error' : ''}}">{{ old('value') }}</textarea>
					</div>
					<div class="modal-footer">
						{{ csrf_field() }}
						<input type="hidden" name="for" value="{{old('for')}}">
						<input type="hidden" name="type" value="{{old('type')}}">
						<input type="hidden" name="null" value="{{old('null')}}">
						<input type="hidden" name="modal" value="modal-textarea">
						<button type="submit" class="btn btn-primary">Update</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<div id="modal-ckeditor" class="modal fade" news="dialog">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<form class="form-horizontal form-label-left" action="{{ route('backend.page.update') }}" method="post" enctype="multipart/form-data">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title"></h4>
					</div>
					<div class="modal-body">
						<textarea type="text" id="ckeditor" name="value" class="form-control {{$errors->first('value') != '' ? 'parsley-error' : ''}}">{{ old('value') }}</textarea>
					</div>
					<div class="modal-footer">
						{{ csrf_field() }}
						<input type="hidden" name="for" value="{{old('for')}}">
						<input type="hidden" name="type" value="{{old('type')}}">
						<input type="hidden" name="null" value="{{old('null')}}">
						<input type="hidden" name="modal" value="modal-ckeditor">
						<button type="submit" class="btn btn-primary">Update</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<h1>Page Management</h1>

	<div class="x_panel" style="overflow: auto;">
		<table class="table table-striped table-bordered" id="datatable">
			<thead>
				<tr>
					<th>Key</th>
					<th>Value</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th colspan="3">Global Page</th>
				</tr>
				<tr>
					<td>global_website_name</td>
					<td>
						{{ $global_website_name->value }}
					</td>
					<td>
						<button class="btn btn-xs btn-warning modal-event" data-toggle="modal" data-target="#modal-input" data-for="global_website_name" data-type="text" data-null="Y"><i class="fa fa-pencil"></i> Edit</button>
					</td>
				</tr>
				<tr>
					<td>global_footer_address_1</td>
					<td>
						{{ $global_footer_address_1->value }}
					</td>
					<td>
						<button class="btn btn-xs btn-warning modal-event" data-toggle="modal" data-target="#modal-ckeditor" data-for="global_footer_address_1" data-type="text" data-null="Y"><i class="fa fa-pencil"></i> Edit</button>
					</td>
				</tr>
				<tr>
					<td>global_footer_address_2</td>
					<td>
						{{ $global_footer_address_2->value }}
					</td>
					<td>
						<button class="btn btn-xs btn-warning modal-event" data-toggle="modal" data-target="#modal-ckeditor" data-for="global_footer_address_2" data-type="text" data-null="Y"><i class="fa fa-pencil"></i> Edit</button>
					</td>
				</tr>
				<tr>
					<td>global_footer_phone</td>
					<td>
						{{ $global_footer_phone->value }}
					</td>
					<td>
						<button class="btn btn-xs btn-warning modal-event" data-toggle="modal" data-target="#modal-ckeditor" data-for="global_footer_phone" data-type="text" data-null="Y"><i class="fa fa-pencil"></i> Edit</button>
					</td>
				</tr><tr>
					<td>global_footer_inqury</td>
					<td>
						{{ $global_footer_inqury->value }}
					</td>
					<td>
						<button class="btn btn-xs btn-warning modal-event" data-toggle="modal" data-target="#modal-ckeditor" data-for="global_footer_inqury" data-type="text" data-null="Y"><i class="fa fa-pencil"></i> Edit</button>
					</td>
				</tr>
				<tr>
					<td>global_footer_export</td>
					<td>
						{{ $global_footer_export->value }}
					</td>
					<td>
						<button class="btn btn-xs btn-warning modal-event" data-toggle="modal" data-target="#modal-ckeditor" data-for="global_footer_export" data-type="text" data-null="Y"><i class="fa fa-pencil"></i> Edit</button>
					</td>
				</tr>
				
				<tr>
					<th colspan="3">Home Page</th>
				</tr>
				<tr>
					<td>home_meta_name</td>
					<td>
						{{ $home_meta_name->value }}
					</td>
					<td>
						<button class="btn btn-xs btn-warning modal-event" data-toggle="modal" data-target="#modal-input" data-for="home_meta_name" data-type="text" data-null="Y"><i class="fa fa-pencil"></i> Edit</button>
					</td>
				</tr>
				<tr>
					<td>home_meta_description</td>
					<td>
						{{ $home_meta_description->value }}
					</td>
					<td>
						<button class="btn btn-xs btn-warning modal-event" data-toggle="modal" data-target="#modal-textarea" data-for="home_meta_description" data-type="text" data-null="Y"><i class="fa fa-pencil"></i> Edit</button>
					</td>
				</tr>
				<tr>
					<td>home_meta_url</td>
					<td>
						{{ $home_meta_url->value }}
					</td>
					<td>
						<button class="btn btn-xs btn-warning modal-event" data-toggle="modal" data-target="#modal-input" data-for="home_meta_url" data-type="text" data-null="Y"><i class="fa fa-pencil"></i> Edit</button>
					</td>
				</tr>
				<tr>
					<td>home_meta_image</td>
					<td>
						@if($home_meta_image->value)
						<img src="{{ asset($home_meta_image->value) }}" height="50" alt="{{ asset($home_meta_image->value) }}">
						@endif
					</td>
					<td>
						<button class="btn btn-xs btn-warning modal-event" data-toggle="modal" data-target="#modal-file" data-for="home_meta_image" data-type="image" data-null="Y"><i class="fa fa-pencil"></i> Edit</button>
					</td>
				</tr>

				<tr>
					<th colspan="3">About Page</th>
				</tr>
				<tr>
					<td>about_meta_name</td>
					<td>
						{{ $about_meta_name->value }}
					</td>
					<td>
						<button class="btn btn-xs btn-warning modal-event" data-toggle="modal" data-target="#modal-input" data-for="about_meta_name" data-type="text" data-null="Y"><i class="fa fa-pencil"></i> Edit</button>
					</td>
				</tr>
				<tr>
					<td>about_meta_description</td>
					<td>
						{{ $about_meta_description->value }}
					</td>
					<td>
						<button class="btn btn-xs btn-warning modal-event" data-toggle="modal" data-target="#modal-textarea" data-for="about_meta_description" data-type="text" data-null="Y"><i class="fa fa-pencil"></i> Edit</button>
					</td>
				</tr>
				<tr>
					<td>about_meta_url</td>
					<td>
						{{ $about_meta_url->value }}
					</td>
					<td>
						<button class="btn btn-xs btn-warning modal-event" data-toggle="modal" data-target="#modal-input" data-for="about_meta_url" data-type="text" data-null="Y"><i class="fa fa-pencil"></i> Edit</button>
					</td>
				</tr>
				<tr>
					<td>about_meta_image</td>
					<td>
						@if($about_meta_image->value)
						<img src="{{ asset($about_meta_image->value) }}" height="50" alt="{{ asset($about_meta_image->value) }}">
						@endif
					</td>
					<td>
						<button class="btn btn-xs btn-warning modal-event" data-toggle="modal" data-target="#modal-file" data-for="about_meta_image" data-type="image" data-null="Y"><i class="fa fa-pencil"></i> Edit</button>
					</td>
				</tr>

				<tr>
					<th colspan="3">Product Page</th>
				</tr>
				<tr>
					<td>product_meta_name</td>
					<td>
						{{ $product_meta_name->value }}
					</td>
					<td>
						<button class="btn btn-xs btn-warning modal-event" data-toggle="modal" data-target="#modal-input" data-for="product_meta_name" data-type="text" data-null="Y"><i class="fa fa-pencil"></i> Edit</button>
					</td>
				</tr>
				<tr>
					<td>product_meta_description</td>
					<td>
						{{ $product_meta_description->value }}
					</td>
					<td>
						<button class="btn btn-xs btn-warning modal-event" data-toggle="modal" data-target="#modal-textarea" data-for="product_meta_description" data-type="text" data-null="Y"><i class="fa fa-pencil"></i> Edit</button>
					</td>
				</tr>
				<tr>
					<td>product_meta_url</td>
					<td>
						{{ $product_meta_url->value }}
					</td>
					<td>
						<button class="btn btn-xs btn-warning modal-event" data-toggle="modal" data-target="#modal-input" data-for="product_meta_url" data-type="text" data-null="Y"><i class="fa fa-pencil"></i> Edit</button>
					</td>
				</tr>
				<tr>
					<td>product_meta_image</td>
					<td>
						@if($product_meta_image->value)
						<img src="{{ asset($product_meta_image->value) }}" height="50" alt="{{ asset($product_meta_image->value) }}">
						@endif
					</td>
					<td>
						<button class="btn btn-xs btn-warning modal-event" data-toggle="modal" data-target="#modal-file" data-for="product_meta_image" data-type="image" data-null="Y"><i class="fa fa-pencil"></i> Edit</button>
					</td>
				</tr>

				<tr>
					<th colspan="3">Distribution Page</th>
				</tr>
				<tr>
					<td>distribution_meta_name</td>
					<td>
						{{ $distribution_meta_name->value }}
					</td>
					<td>
						<button class="btn btn-xs btn-warning modal-event" data-toggle="modal" data-target="#modal-input" data-for="distribution_meta_name" data-type="text" data-null="Y"><i class="fa fa-pencil"></i> Edit</button>
					</td>
				</tr>
				<tr>
					<td>distribution_meta_description</td>
					<td>
						{{ $distribution_meta_description->value }}
					</td>
					<td>
						<button class="btn btn-xs btn-warning modal-event" data-toggle="modal" data-target="#modal-textarea" data-for="distribution_meta_description" data-type="text" data-null="Y"><i class="fa fa-pencil"></i> Edit</button>
					</td>
				</tr>
				<tr>
					<td>distribution_meta_url</td>
					<td>
						{{ $distribution_meta_url->value }}
					</td>
					<td>
						<button class="btn btn-xs btn-warning modal-event" data-toggle="modal" data-target="#modal-input" data-for="distribution_meta_url" data-type="text" data-null="Y"><i class="fa fa-pencil"></i> Edit</button>
					</td>
				</tr>
				<tr>
					<td>distribution_meta_image</td>
					<td>
						@if($distribution_meta_image->value)
						<img src="{{ asset($distribution_meta_image->value) }}" height="50" alt="{{ asset($distribution_meta_image->value) }}">
						@endif
					</td>
					<td>
						<button class="btn btn-xs btn-warning modal-event" data-toggle="modal" data-target="#modal-file" data-for="distribution_meta_image" data-type="image" data-null="Y"><i class="fa fa-pencil"></i> Edit</button>
					</td>
				</tr>

				<tr>
					<th colspan="3">Service Page</th>
				</tr>
				<tr>
					<td>service_meta_name</td>
					<td>
						{{ $service_meta_name->value }}
					</td>
					<td>
						<button class="btn btn-xs btn-warning modal-event" data-toggle="modal" data-target="#modal-input" data-for="service_meta_name" data-type="text" data-null="Y"><i class="fa fa-pencil"></i> Edit</button>
					</td>
				</tr>
				<tr>
					<td>service_meta_description</td>
					<td>
						{{ $service_meta_description->value }}
					</td>
					<td>
						<button class="btn btn-xs btn-warning modal-event" data-toggle="modal" data-target="#modal-textarea" data-for="service_meta_description" data-type="text" data-null="Y"><i class="fa fa-pencil"></i> Edit</button>
					</td>
				</tr>
				<tr>
					<td>service_meta_url</td>
					<td>
						{{ $service_meta_url->value }}
					</td>
					<td>
						<button class="btn btn-xs btn-warning modal-event" data-toggle="modal" data-target="#modal-input" data-for="service_meta_url" data-type="text" data-null="Y"><i class="fa fa-pencil"></i> Edit</button>
					</td>
				</tr>
				<tr>
					<td>service_meta_image</td>
					<td>
						@if($service_meta_image->value)
						<img src="{{ asset($service_meta_image->value) }}" height="50" alt="{{ asset($service_meta_image->value) }}">
						@endif
					</td>
					<td>
						<button class="btn btn-xs btn-warning modal-event" data-toggle="modal" data-target="#modal-file" data-for="service_meta_image" data-type="image" data-null="Y"><i class="fa fa-pencil"></i> Edit</button>
					</td>
				</tr>

				<tr>
					<th colspan="3">News Page</th>
				</tr>
				<tr>
					<td>news_meta_name</td>
					<td>
						{{ $news_meta_name->value }}
					</td>
					<td>
						<button class="btn btn-xs btn-warning modal-event" data-toggle="modal" data-target="#modal-input" data-for="news_meta_name" data-type="text" data-null="Y"><i class="fa fa-pencil"></i> Edit</button>
					</td>
				</tr>
				<tr>
					<td>news_meta_description</td>
					<td>
						{{ $news_meta_description->value }}
					</td>
					<td>
						<button class="btn btn-xs btn-warning modal-event" data-toggle="modal" data-target="#modal-textarea" data-for="news_meta_description" data-type="text" data-null="Y"><i class="fa fa-pencil"></i> Edit</button>
					</td>
				</tr>
				<tr>
					<td>news_meta_url</td>
					<td>
						{{ $news_meta_url->value }}
					</td>
					<td>
						<button class="btn btn-xs btn-warning modal-event" data-toggle="modal" data-target="#modal-input" data-for="news_meta_url" data-type="text" data-null="Y"><i class="fa fa-pencil"></i> Edit</button>
					</td>
				</tr>
				<tr>
					<td>news_meta_image</td>
					<td>
						@if($news_meta_image->value)
						<img src="{{ asset($news_meta_image->value) }}" height="50" alt="{{ asset($news_meta_image->value) }}">
						@endif
					</td>
					<td>
						<button class="btn btn-xs btn-warning modal-event" data-toggle="modal" data-target="#modal-file" data-for="news_meta_image" data-type="image" data-null="Y"><i class="fa fa-pencil"></i> Edit</button>
					</td>
				</tr>

				<tr>
					<th colspan="3">Contact Us Page</th>
				</tr>
				<tr>
					<td>contact_meta_name</td>
					<td>
						{{ $contact_meta_name->value }}
					</td>
					<td>
						<button class="btn btn-xs btn-warning modal-event" data-toggle="modal" data-target="#modal-input" data-for="contact_meta_name" data-type="text" data-null="Y"><i class="fa fa-pencil"></i> Edit</button>
					</td>
				</tr>
				<tr>
					<td>contact_meta_description</td>
					<td>
						{{ $contact_meta_description->value }}
					</td>
					<td>
						<button class="btn btn-xs btn-warning modal-event" data-toggle="modal" data-target="#modal-textarea" data-for="contact_meta_description" data-type="text" data-null="Y"><i class="fa fa-pencil"></i> Edit</button>
					</td>
				</tr>
				<tr>
					<td>contact_meta_url</td>
					<td>
						{{ $contact_meta_url->value }}
					</td>
					<td>
						<button class="btn btn-xs btn-warning modal-event" data-toggle="modal" data-target="#modal-input" data-for="contact_meta_url" data-type="text" data-null="Y"><i class="fa fa-pencil"></i> Edit</button>
					</td>
				</tr>
				<tr>
					<td>contact_meta_image</td>
					<td>
						@if($contact_meta_image->value)
						<img src="{{ asset($contact_meta_image->value) }}" height="50" alt="{{ asset($contact_meta_image->value) }}">
						@endif
					</td>
					<td>
						<button class="btn btn-xs btn-warning modal-event" data-toggle="modal" data-target="#modal-file" data-for="contact_meta_image" data-type="image" data-null="Y"><i class="fa fa-pencil"></i> Edit</button>
					</td>
				</tr>

			</tbody>
		</table>
	</div>
	

@endsection