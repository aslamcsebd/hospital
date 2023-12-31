@extends('layouts.app2')
@section('title')
    Patient Appointment Form
@endsection
@section('content')   
    <nav id="navbar_top" class="navbar navbar-expand-md navbar-light navbar-muted shadow-sm">
        @php
            $hospitalInfo = App\Models\HospitalInfo::first();
        @endphp
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ $hospitalInfo->name ?? 'Add hospital name' }}
        </a>
        <button class="navbar-toggler text-primary" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    {{-- @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif --}}
                @else
					<li class="nav-item">
						<a class="nav-link" href="{{ url('/home') }}">{{ __('Dashboard') }}</a>
					</li>
                @endguest
            </ul>
        </div>
    </nav>
 	@include('includes.alertMessage')
	<div class="vh-100 gradient-custom">
		<div class="row justify-content-center align-items-center h-75 pt-4">
			<div class="col-md-10">
				<div class="card bg-dark text-white" style="border-radius: 1rem;">
					<h4 class="card-header border-bottom border-white">Patient Appointment Form</h4>
					<form action="{{ Route('appointment.create') }}" method="post" enctype="multipart/form-data">
						@csrf
						<div class="card-body">
							<div class="row">
								<div class="form-group col-md-4 col-sm-12">
									<label for="name">Full name*</label>
									<input type="text" class="form-control mt-1" name="name" id="name" value="{{ old('name') }}" placeholder="Enter name" required>
								</div>
								<div class="form-group col-md-4 col-sm-12">
									<label for="email">Email*</label>
									<input type="email" class="form-control mt-1" name="email" id="email" value="{!! old('email') !!}" placeholder="Enter email" autocomplete="email" required>
								</div>
								<div class="form-group col-md-4 col-sm-12">
									<label for="phone">Mobile number*</label>
									<input type="number" class="form-control mt-1" name="phone" id="phone" placeholder="Enter phone number" required>
								</div>
							</div>
	
							<div class="row">
								<div class="form-group col-md-3 col-sm-12">
									<label for="age">Age</label>
									<div class="input-group mt-1">
										<input type="text" class="form-control border-right-0" name="age" id="age" placeholder="Age number" required>
										<div class="input-group-prepend">
										  <span class="input-group-text rounded-right">years old</span>
										</div>
									</div>
								</div>
								<div class="form-group col-md-3 col-sm-12">
									@php
										$sources = array('Facebook', 'Instagram', 'Youtube', 'Google', 'Other',);
									@endphp
									<label for="source">Source of information</label>
									<div class="input-group mt-1">
										<select class="form-control" name="source" id="source">
											<option value="">Select source</option>
											@foreach($sources as $source)
												<option value="{{$source}}">{{$source}}</option>
											@endforeach
										</select>
									</div>		
								</div>		
								<div class="form-group col-md-3 col-sm-12">
									<label for="doctor">Doctor name</label>
									<select class="form-control mt-1" name="doctor_id" id="doctor" required>
										<option value="">Select doctor</option>
										@foreach ($doctors as $doctor)
											<option value="{{ $doctor->user_id }}">{{ $doctor->user->name }}</option>
										@endforeach
									</select>
								</div>
								<div class="form-group col-md-3 col-sm-12">
									<label for="appointment_date">Appointment date</label>
									<input type="text" class="form-control datepicker2 mt-1" name="appointment_date" id="appointment_date" placeholder="Day-Month-Year" required>
								</div>
							</div>
	
							<div class="row">
								<div class="form-group col-md-6 col-sm-12">
									<label for="diseases_info">Diseases details:*</label>
									<textarea class="form-control mt-1" name="diseases_info" id="diseases_info" rows="3" required></textarea>
								</div>
								<div class="form-group col-md-6 col-sm-12">
									<label for="address">Address:*</label>
									<textarea class="form-control mt-1" name="address" id="address" rows="3" required></textarea>
								</div>
							</div>
							<div class="row justify-content-center">
								<div class="form-group col-md-auto col-sm-12">
									<div class="form-check">
										<input class="form-check-input" type="checkbox" name="remember" id="remember"
											{{ old('remember') ? 'checked' : '' }} style="width: unset" required>
										<label class="form-check-label" for="remember">
											I consent to having this website store my submitted information so they can respond to my inquiry.
										</label>
									</div>									
								</div>
							</div>	
							<div class="row justify-content-md-center mt-2 mb-0">
								<button type="submit" class="btn btn-success col-md-4 rounded-pill">Book Appointment</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	@include('includes.footer')
@endsection
