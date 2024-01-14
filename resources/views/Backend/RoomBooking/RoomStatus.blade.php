@extends('Backend.Layouts.Main')
@section('content')
<div class="sb2-2">
    <div class="sb2-2-2">
        <ul>
            
            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert" style="color: #fff">×</button>
                <strong>{{ $message }}</strong>
            </div>
            @endif
            @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert" style="color: #fff">×</button>
                <strong>{{ $message }}</strong>
            </div>
            @endif
        </ul>
    </div>
    <div class="sb2-2-3">
        <div class="row">
            <div class="col-md-12">
                <div class="box-inn-sp">
                    <div class="inn-title">
                        <h4>Room Status Update</h4>
                        {{-- <p>Airtport Hotels The Right Way To Start A Short Break Holiday</p> --}}
                        
                    </div>
                    <div class="tab-inn">
                        <form class="text-center" method="post" action="{{url('room-status-update')}}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="room_id" value="{{$roomId->id ?? ''}}">
                            <div class="row">
                                <div class="input-field col s12">
                                    <select name="room_number" value="{{ old('room_number') }}">
                                        <option value="{{$roomId->id ?? ''}}">{{$roomId->room_number ?? ''}}</option>
                                      
                                    </select>
                                    <label for="client_name">Room Number</label>
                                </div> 
                            </div>
                            
                    
                            <div class="row">
                                <div class="input-field col s6">
                                    <select name="status" value="{{ old('status') }}">
                                        
                                        
                                        <option value="1" @if($roomId->status == 1) selected @endif>Occupied</option>
                                        <option value="2" @if($roomId->status == 2) selected @endif>Draft</option>
                                        <option value="3" @if($roomId->status == 3) selected @endif>Unoccupied</option>
                                      
                                    </select>
                                    <label for="client_name">Room Status</label>
                                   
                                </div>
                                {{-- <div class="input-field col s6">
                                    <label for="client_name">End Date</label>
                                    <br>
                                    <input id="email" type="date" name="end_date" class="validate" required>
                                   
                                </div> --}}
                                
                            </div>
                            
                            <div class="row">
                                <div class="input-field col s12">
                                    <button type="submit" class="waves-effect waves-light btn-large">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
