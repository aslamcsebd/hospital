@extends('layouts.app')
   @section('title') Patient list @endsection
@section('content')
@include('includes.alertMessage')

<div class="content-wrapper p-3">
   <div class="row justify-content-center">
      <div class="col-md-12">        
         <div class="card">
            <h6 class="card-header bg-success text-center py-1 mx-1">Patient list</h6>
            <div class="card-body p-1">
               <table class="table table-bordered">
                  <thead class="bg-info">
                     <th>Sl</th>
                     <th>Name</th>
                     <th>Mobile</th>
                     <th>Gender</th>
                     <th>Action</th>
                  </thead>
                  <tbody>
                     @php $si=1;@endphp
                     @foreach($patients as $patient2)
                        @foreach($patient2->take(1) as $patient)
                           <tr>
                              <td width="30">{{$si}}</td> @php $si++;@endphp
                              <td>
                                 <img src="{{asset('')}}/{{$patient->patient->photo ?? 'images/default.jpg'}}" class="img-thumbnail" alt="No Image found" width="60">
                                 <br>
                                 <span>{!!$patient->user2->name!!}</span>
                              </td>                        
                              <td>{!!$patient->user2->phone!!}</td>
                              <td>{!!$patient->patient->gender!!}</td>
                              <td width="auto">
                                 <div class="btn-group">
                                       <a href="{{ url('patient-report', [$patient->patient_id]) }}" class="btn btn-sm btn-info py-1">View</a>
                                 </div>
                              </td>
                           </tr>
                        @endforeach
                     @endforeach
                  </tbody>
               </table>
            </div>                   
         </div>
      </div>
   </div>
</div>

@endsection

@section('js')
@endsection
