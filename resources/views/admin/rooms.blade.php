@extends('layouts.app')
   @section('title') Room-seat @endsection
@section('content')
@include('includes.alertMessage')

<div class="content-wrapper p-3">
   <div class="row justify-content-center">
      <div class="col-md-12">       
         <div class="card border border-danger">
            <div class="card-header p-1">
               <ul class="nav nav-pills" id="tabMenu">
                  <li class="nav-item">
                     <button class="btn btn-sm btn-success text-light" data-toggle="modal" data-original-title="test" data-target="#addfloorRoom">Add floor, room, seat</button>
                  </li>
               </ul>
            </div>

            <h6 class="card-header bg-success text-center py-1 mx-1">Cabin/room list</h6>
            <div class="card-body p-1">
               <table class="table table-bordered">
                  <thead class="bg-info">
                        <th>Floor</th>
                        <th>Room no</th>
                        <th>Rent</th>
                  </thead>
                  <tbody>
                     @foreach($floors as $floor)
                        @php $roomCount = $floor->rooms->where('room_type', 'cabin')->count()  @endphp

                        <tr>
                           <td rowspan="{{($roomCount > 1) ? $roomCount+1 : ''}}">{{$floor->floor}}</td>
                           @if($roomCount == 1)
                              @foreach($floor->rooms->where('room_type', 'cabin')->sortBy('room') as $room)
                                    <td>{{$room->room_no}}</td>
                                    <td>{{$room->rent}}</td>
                              @endforeach
                           @endif
                        </tr>
                           @if($roomCount > 1)
                              @foreach($floor->rooms->where('room_type', 'cabin')->sortBy('room') as $room)
                                    <tr>
                                       <td>{{$room->room_no}}</td>
                                       <td>{{$room->rent}}</td>
                                    </tr>     
                              @endforeach
                           @endif
                     @endforeach
                  </tbody>
               </table>
            </div>                   
            
            <h6 class="card-header bg-secondary text-center py-1 mx-1 mt-4">Ward list</h6>
            <div class="card-body p-1">
               <table class="table table-bordered">
                  <thead class="bg-info">
                        <th>Room no</th>
                        <th>Ward no</th>
                        <th>Rent</th>
                  </thead>
                  <tbody>
                     @foreach($roomWards as $room)
                        @php $wardCount = $room->wards->count()  @endphp

                        <tr>
                           <td rowspan="{{($wardCount > 1) ? $wardCount+1 : ''}}">{{$room->room_no}}</td>
                        </tr>
                           @if($wardCount > 1)
                              @foreach($room->wards->sortBy('ward_no') as $ward)
                                    <tr>
                                       <td>{{$ward->ward_no}}</td>
                                       <td>{{$room->rent}}</td>
                                    </tr>     
                              @endforeach
                           @endif
                     @endforeach
                  </tbody>
               </table>
            </div>

            {{-- Add floor & room --}}
            <div class="modal fade" id="addfloorRoom" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
               <div class="modal-dialog" role="document">
                  <div class="modal-content">
                     <div class="modal-header">
                        <h6 class="modal-title text-center" id="exampleModalLabel">Add floor, room, seat</h6>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                     </div>
                     <div class="card-header p-1">
                        <ul class="nav nav-pills">
                           <li class="nav-item">
                                 <a class="nav-link active btn-sm py-1 m-1" data-toggle="pill" href="#addRoomTab">Add room</a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link btn-sm py-1 m-1" data-toggle="pill" href="#addFloor">Add floor</a>
                           </li>
                        </ul>
                     </div>

                     <div class="modal-body">
                        <div class="tab-content" id="pills-tabContent">
                           <div class="tab-pane fade active show" id="addRoomTab">
                              <form action="{{ route('addRoom') }}" method="post" enctype="multipart/form-data" class="needs-validation" >
                                 @csrf
                                    <fieldset class="form-group mb-1 pb-1">
                                       <legend class="mb-0">Select room type</legend>
                                       <div class="radio-toolbar form-check form-check-inline">
                                             <div class="radio">
                                                <input type="radio" id="cabin" name="room_type" value="cabin" checked>
                                                <label for="cabin">Single cabin/room</label>
                                             </div>
                                             <div class="radio ml-4 mt-1">
                                                <input type="radio" id="ward" name="room_type" value="ward">
                                                <label for="ward">Ward (Multiple bed)</label> 
                                             </div>
                                       </div>
                                    </fieldset>

                                    <div class="form-group">
                                       <label for="roomName">Room name*</label>
                                       <input type="text" name="name" class="form-control" id="roomName" placeholder="Ex: Cabin A, Delux Cabin, ICU/CCU, General ward, Ward (4 Bed)" required/>
                                    </div>

                                    <div class="row">
                                       <div class="form-group col-6">
                                             <label for="floor">Floor number*</label>
                                             <select class="form-control" name="floor_id" id="floor" required>
                                                <option value="">Select floor</option>
                                                @foreach($floors as $floor)
                                                   <option value="{{$floor->id}}">{{$floor->floor}}</option>
                                                @endforeach
                                             </select>
                                       </div>
                                       <div class="form-group col-6">
                                             <label for="room_no">Room number*</label>
                                             <input type="text" name="room_no" class="form-control" id="room_no" placeholder="Ex: 101, 201, 301..." required/>
                                       </div>
                                    </div>
                                    
                                    <div class="row">
                                       <div class="hide col-6" id="roomStatus">                                                    
                                             <div class="form-group" data_id="roomAction">
                                                <label for="bedCount">Number of seat/bed*</label>
                                                <input type="number" min="2" name="bedCount" class="form-control" id="bedCount" placeholder="Ex: 4 or 5"/>
                                             </div>
                                       </div>
                                       <div class="form-group col-6">
                                             <label for="rent">Rent*</label>
                                             <input type="number" name="rent" class="form-control" id="rent" placeholder="Ex: 100, 200" required/>
                                       </div>
                                    </div>                                        

                                 <div class="modal-footer">
                                    <div class="btn-group">
                                       <button class="btn btn-sm btn-success">Save</button>
                                       <button class="btn btn-sm btn-secondary" type="button" data-dismiss="modal">Close</button>
                                    </div>
                                 </div>
                              </form>
                           </div>

                           <div class="tab-pane fade show" id="addFloor">
                              <form action="{{ route('addFloor') }}" method="post" enctype="multipart/form-data" class="needs-validation" >
                                 @csrf
                                 <div class="form-group">
                                    <label for="floor">Floor no*</label>
                                    <input type="text" name="floor" class="form-control" id="floor" placeholder="Ex: 1st, 2nd, 3rd..." required/>
                                    <small class="form-text bg-info px-1 rounded font-italic">
                                       Please follow this instruction. Example: 1st, 2nd, 3rd.
                                    </small>
                                 </div>
                                 <div class="modal-footer">
                                    <div class="btn-group">
                                       <button class="btn btn-sm btn-success">Save</button>
                                       <button class="btn btn-sm btn-secondary" type="button" data-dismiss="modal">Close</button>
                                    </div>
                                 </div>
                              </form>                                      
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>                  
         </div>      
      </div>
   </div>
</div>

@endsection

@section('js')
@endsection