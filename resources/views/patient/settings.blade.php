@extends('layouts.app')
   @section('title') Update patient info @endsection
@section('content')
@include('includes.alertMessage')

<div class="content-wrapper p-3">
   <div class="row justify-content-center">
      <div class="col-md-12">
         <div class="card">
            
            <h6 class="card-header bg-info text-center py-1">Patient information (ID: {{$patientInfo->patient_id}})</h6>
            <form action="{{ route('updatePatientInfo') }}" method="post" enctype="multipart/form-data">
               @csrf
               <div class="card-body">
                    <input type="hidden" name="id" value="{{ $patientInfo->id }}">

                  <div class="row">
                     <div class="form-group col-4">
                        <label for="name">Full name*</label>
                        <input type="text" class="form-control" name="name" id="name"  value="{{ $patientInfo->user->name ?? '' }}" placeholder="Enter name" readonly>
                     </div>
                     <div class="form-group col-4">
                        <label for="email">Email*</label>
                        <input type="email" class="form-control" name="email" id="email" value="{{ $patientInfo->user->email ?? '' }}" placeholder="Enter email" autocomplete="name" readonly>
                     </div>
                     <div class="form-group col-4">
                        <label for="phone">Mobile number*</label>
                        <input type="number" class="form-control" name="phone" id="phone" value="{{ $patientInfo->user->phone ?? '' }}" placeholder="Enter phone" readonly>
                     </div>
                  </div>

                  <div class="row">
                     <div class="form-group col-4">
                        <label for="gender">Gender</label>
                        <select class="form-control" name="gender" id="gender">
                           <option value="">Select gender</option>
                           <option value="Male" {{$patientInfo->gender == 'Male' ? 'selected' : ''}}>Male</option>
                           <option value="Female" {{$patientInfo->gender == 'Female' ? 'selected' : ''}}>Female</option>
                           <option value="Custom" {{$patientInfo->gender == 'Custom' ? 'selected' : ''}}>Custom</option>
                        </select>
                     </div>
                     <div class="form-group col-4">
                        <label for="blood">Blood group</label>
                        <select class="form-control" name="blood" id="blood">
                           <option value="">Select group</option>
                           <option value="O +ve" {{$patientInfo->blood == 'O +ve' ? 'selected' : ''}}>O +ve</option>
                           <option value="O -ve" {{$patientInfo->blood == 'O -ve' ? 'selected' : ''}}>O -ve</option>
                           <option value="A +ve" {{$patientInfo->blood == 'A +ve' ? 'selected' : ''}}>A +ve</option>
                           <option value="A -ve" {{$patientInfo->blood == 'A -ve' ? 'selected' : ''}}>A -ve</option>
                           <option value="B +ve" {{$patientInfo->blood == 'B +ve' ? 'selected' : ''}}>B +ve</option>
                           <option value="B -ve" {{$patientInfo->blood == 'B -ve' ? 'selected' : ''}}>B -ve</option>
                           <option value="AB +ve" {{$patientInfo->blood == 'AB +ve' ? 'selected' : ''}}>AB +ve</option>
                           <option value="AB -ve" {{$patientInfo->blood == 'AB -ve' ? 'selected' : ''}}>AB -ve</option>
                           <option value="Unknown" {{$patientInfo->blood == 'Unknown' ? 'selected' : ''}}>Unknown</option>
                        </select>
                     </div>
                     <div class="form-group col-4">
                        <label for="dob">Date of birth</label>
                        <input type="text" class="form-control datepicker" name="dob" value="{{ date('d-m-Y', strtotime($patientInfo->dob)) ?? '' }}" id="dob" placeholder="Day-Month-Year"/>
                     </div>  
                  </div>

                  <div class="row">
                    <div class="col-8">
                        <div class="row p-0 m-0 border">
                            <div class="form-group col-3">
                               <div class="px-4 pt-2">
                                   <img src="{{asset('')}}/{{$patientInfo->photo ?? 'images/default.jpg'}}" class="img-thumbnail" alt="No Image found" width="60">
                               </div>
                           </div>  
                            <div class="form-group col-9">
                               <label for="photo">Photo</label>
                               <input type="hidden" name="oldPhoto" value="{{ $patientInfo->photo ?? '' }}">
                               <input type="file" class="form-control p-1" name="photo"/>
                               <small class="form-text bg-secondary px-1 rounded font-italic">
                                  <i>Image format: jpeg, png, jpg, gif, svg. Maximum size : 2 MB.</i>
                               </small>
                            </div>
                        </div>
                    </div>
                     <div class="form-group col-4">
                        <label for="source">Source of information</label>
                        <select class="form-control" name="source" id="source">
                           <option value="">Select source</option>
                           <option value="Facebook" {{$patientInfo->source == 'Facebook' ? 'selected' : ''}}>Facebook</option>
                           <option value="Instagram" {{$patientInfo->source == 'Instagram' ? 'selected' : ''}}>Instagram</option>
                           <option value="Youtube" {{$patientInfo->source == 'Youtube' ? 'selected' : ''}}>Youtube</option>
                           <option value="Google" {{$patientInfo->source == 'Google' ? 'selected' : ''}}>Google</option>
                           <option value="Other" {{$patientInfo->source == 'Other' ? 'selected' : ''}}>Other</option>
                        </select>
                     </div>
                  </div>     
                  
                  <div class="row">
                     <div class="form-group col-12">
                        <label for="address">Address*</label>
                        <textarea type="text" class="form-control summernote required" name="address" id="address" >{{ $patientInfo->address ?? '' }}</textarea>
                     </div>
                    
                  </div>

                  <div class="row justify-content-md-center mt-2">
                     <button type="submit" class="btn btn-success col-md-4">Save now</button>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
@endsection