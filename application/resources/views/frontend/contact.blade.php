@extends('frontend._layout.master')

@section('title')
	Nutragen - Contact
@endsection

@section('style')
	<style type="text/css">
		.breakpoint
		{
			background-color: white;
			margin: 0;
			padding: 0;
		}

		::-webkit-input-placeholder { /* Chrome/Opera/Safari */
		  font-family: 'Nunito';
		}
		::-moz-placeholder { /* Firefox 19+ */
		  font-family: 'Nunito';
		}
		:-ms-input-placeholder { /* IE 10+ */
		  font-family: 'Nunito';
		}
		:-moz-placeholder { /* Firefox 18- */
		  font-family: 'Nunito';
		}

		/*Partner*/
        .partners
        {
            margin: 0;
            padding: 0;
            background-color: white;
        }

        .partners p > img
        {
            padding: 30px 30px;
        }
        /*end Partner*/

	</style>
@endsection

@section('script')

@endsection

@section('content')
	<div class="content">
		<div class="contact bootstrap mini-spacing">
			<div class="container">
				@if (Session::has('messages'))
				<h2 class="heading-underline text-center white-color">
					{{ Session::get('messages') }}
				</h2>
				@else
				<h2 class="heading-underline text-center white-color">
					Be Our Partner
				</h2>
				<p class="mini-spacing">
					If you share the same belief as us, let’s work together and create a history of how our healthy products can reach millions of people in the world and change their lifestyles for the better. Every big change needs only one simple step. Together we can be the change.
				</p>
				@endif
			
			
				<form action="{{ route('frontend.contact.send') }}" method="post">
					<div class="row">
						<div class="form-group col-md-4">
							<input class="form-control {{$errors->first('name') != '' ? 'is-invalid' : ''}}" name="name" id="name" type="text" placeholder="Name" value="{{ old('name') }}"></input>
							<div class="invalid-feedback">{{ $errors->first('name') }}</div> 
						</div>
						<div class="form-group col-md-4">
							<input class="form-control {{$errors->first('email') != '' ? 'is-invalid' : ''}}" name="email" id="email" type="email" placeholder="Email" value="{{ old('email') }}"></input>
							<div class="invalid-feedback">{{ $errors->first('email') }}</div>
						</div>
						<div class="form-group col-md-4">
							<input class="form-control {{$errors->first('subject') != '' ? 'is-invalid' : ''}}" name="subject" id="subject" type="text" placeholder="Subject" value="{{ old('subject') }}"></input>
							<div class="invalid-feedback">{{ $errors->first('subject') }}</div>
						</div>
					</div>

					<div class="row">
						<div class="form-group col-md-12">
							<textarea class="form-control {{$errors->first('messages') != '' ? 'is-invalid' : ''}}" name="messages" id="name" type="text" placeholder="Your Messages" rows="5">{{ old('messages') }}</textarea>
							<div class="invalid-feedback">{{ $errors->first('messages') }}</div>
						</div>
					</div>
					
					<div class="text-center">
						{{ csrf_field() }}
						<button class="button" type="submit">
							Submit
						</button>
					</div>
					
				</form>
			</div>
		</div>

		<div class="breakpoint">
			<img src="{{ asset('frontend/images/bottom-round-shape.png') }}" width="100%">
		</div>

		<div class="partners container-fluid bootstrap">
            <h2 class="heading-underline-orange text-center red-color spacing">
                Pick, Click, Enjoy!
            </h2>
            <div class="container">
                <p class="text-center">
                    @foreach($partner as $list)
                    <img src="{{ asset($list->image_logo) }}" height="{{ $list->image_height ?? 100 }}">
                    @endforeach
                </p>
            </div>
        </div>

	</div>
@endsection