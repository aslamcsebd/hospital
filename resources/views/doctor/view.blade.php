@extends('layouts.app')
   @section('title') Single appointment @endsection
@section('content')
@include('includes.alertMessage')
<div class="content-wrapper p-3 view">
   <div class="row justify-content-center">
      <div class="col-md-10">
         <div class="card">
            <h6 class="card-header bg-success text-center py-2">Single patient</h6>
            <div class="card-body">
               <table class="table table-bordered">                  
                  <tr>
                     <td colspan="2">
                        <div class="text-center">
                           <img src="{{asset('')}}/{{$appointment->user2->photo ?? 'images/default.jpg'}}" class="img-thumbnail" alt="No Image found" width="100">
                           <br>
                           <span>{{$appointment->user2->name}}</span>                         
                        </div>
                     </td>
                  </tr>
                  <tr>
                     <td width="20%">
                        <label class="capitalize">Email</label>
                     </td>
                     <td>{{$appointment->user2->email}}</td>
                  </tr>
                  <tr>
                     <td width="20%">
                        <label class="capitalize">Phone</label>
                     </td>
                     <td>{{$appointment->user2->phone}}</td>
                  </tr>
                  <tr>
                     <td width="20%">
                        <label class="capitalize">Gender</label>
                     </td>
                     <td>{{$appointment->patient->gender}}</td>
                  </tr>
                  <tr>
                     <td width="20%">
                        <label class="capitalize">Blood group</label>
                     </td>
                     <td>{{$appointment->patient->blood}}</td>
                  </tr>
                  <tr>
                     <td width="20%">
                        <label class="capitalize">Date of birth</label>
                     </td>
                     <td>{{date('d-M-Y', strtotime($appointment->patient->dob))}}</td>
                  </tr>
                    <tr>
                        <td width="25%">
                            <label for="date" class="capitalize">Appointment request</label>
                        </td>
                        <td>
                            <form action="{{ route('appointment.accept') }}" method="post" enctype="multipart/form-data" class="row p-0 m-0">
                                @csrf
                                <input type="hidden" name="id" value="{{$appointment->id}}">
                                <input type="datetime-local" name="date" class="form-control col-md-6" value="{{date('Y-m-d\TH:i', strtotime($appointment->date . $appointment->time))}}" required/>
                                <button type="submit" class="btn btn-success ml-2 col-auto {{$appointment->status == 1 ? 'hide' : ''}}">
                                    <i class="fas fa-calendar-plus nav-icon"></i> &nbsp; Accept request
                                </button>
                            </form>
                        </td>
                    </tr>
               </table>             
            </div>
            <div class="card-footer row justify-content-center">               
               <a href="{{ route('appointment.request') }}" class="btn btn-primary col-auto">
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