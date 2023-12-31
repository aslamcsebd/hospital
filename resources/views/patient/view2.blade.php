@extends('layouts.app')
@section('title')
    Single doctor
@endsection
@section('content')
    @include('includes.alertMessage')
    <div class="content-wrapper p-3 ">
        <div class="row justify-content-center">           

            <div class="col-md-12 view">
                <div class="card">
                    <h6 class="card-header bg-success text-center py-2">Single doctor</h6>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <td colspan="2">
                                    <div class="text-center">
                                        <img src="{{ asset('') }}/{{ $doctor->photo ?? 'images/default.jpg' }}"
                                            class="img-thumbnail" alt="No Image found" width="100">
                                        <br>
                                        <span>{{ $doctor->user->name }}</span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td width="20%">
                                    <label class="capitalize">Email</label>
                                </td>
                                <td>{{ $doctor->user->email }}</td>
                            </tr>
                            <tr>
                                <td width="20%">
                                    <label class="capitalize">Phone</label>
                                </td>
                                <td>{{ $doctor->user->phone }}</td>
                            </tr>
                            <tr>
                                <td width="20%">
                                    <label class="capitalize">Gender</label>
                                </td>
                                <td>{{ $doctor->gender }}</td>
                            </tr>
                            <tr>
                                <td width="20%">
                                    <label class="capitalize">Blood group</label>
                                </td>
                                <td>{{ $doctor->blood }}</td>
                            </tr>
                            <tr>
                                <td width="20%">
                                    <label class="capitalize">Date of birth</label>
                                </td>
                                <td>{{ $doctor->dob }}</td>
                            </tr>
                            <tr>
                                <td width="20%">
                                    <label class="capitalize">Qalification</label>
                                </td>
                                <td class="mb-0">{!! $doctor->qualification !!}</td>
                            </tr>
                            <tr>
                                <td width="20%">
                                    <label class="capitalize">Services</label>
                                </td>
                                <td>{!! $doctor->service !!}</td>
                            </tr>
                            @if ($route == 'appointment.list')
                                <tr>
                                    <td width="25%" class="bg-warning">
                                        <label for="date" class="capitalize">Fixed Appointment</label>
                                    </td>
                                    <td class="row p-0 m-0">
                                        <input type="text" class="form-control col-4 ml-2" name="date" id="date"
                                            placeholder="Day-Month-Year" value="{{ $appointmentDate->date }}" readonly />
                                        @include('patient.time')
                                    </td>
                                </tr>
                            @endif
                        </table>
                    </div>
                    <div class="card-footer row justify-content-center">
                        <a href="{{ route($route) }}" class="btn btn-primary col-auto">
                            <i class="fas fa-arrow-circle-left nav-icon"></i> &nbsp;
                            Back previous page
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('js')
@endsection
