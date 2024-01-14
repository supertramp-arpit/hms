@extends('Backend.Layouts.Main')
@section('content')
    <div class="sb2-2">
        <div class="sb2-2-2">
            <ul>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block" style="background-color: rgb(37, 134, 7); color: white; float: right;">
                        <button type="button" class="close" data-dismiss="alert" style="color: #fff">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
                @if ($message = Session::get('error'))
                    <div class="alert alert-danger alert-block" style="background-color: red; color: white; float: right;">
                        <button type="button" class="close" data-dismiss="alert" style="color: #fff">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
                @if ($errors->has('stars'))
    <div class="alert alert-danger">
        {{ $errors->first('stars') }}
    </div>
@endif

            </ul>
        </div>
        <div class="sb2-2-add-blog sb2-2-1">
            <h2>Add Room Details</h2>
            <ul class="nav nav-tabs tab-list">
                <li class="active"><a data-toggle="tab" href="#home"><i class="fa fa-info" aria-hidden="true"></i> <span>Detail</span></a></li>
                <li><a data-toggle="tab" href="#menu2"><i class="fa fa-picture-o" aria-hidden="true"></i> <span>Photo Gallery</span></a></li>
            </ul>
            <form class="text-center" method="post" action="{{ url('add-room') }}" enctype="multipart/form-data">
                @csrf
                <div class="tab-content">
                    <div id="home" class="tab-pane fade in active">
                        <div class="box-inn-sp">
                            <div class="bor">
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="room-no" type="text" class="validate" name="room_no" value="{{ old('room_no') }}">
                                        <label for="room-no">Room Number</label>
                                        @error('room_no')
                                            <span class="error-text">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s6">
                                        <select name="meal" id="meal">
                                            <option value="" disabled selected>Choose Category</option>
                                            <option value="1">Free Breakfast</option>
                                            <option value="2">Free Dinner</option>
                                            <option value="3">Free Breakfast & Dinner</option>
                                            <option value="4">Free Welcome Drink</option>
                                            <option value="5">No Food</option>
                                        </select>
                                        <label>Meal</label>
                                    </div>
                                    <div class="input-field col s6">
                                        <select name="room_type_id" id="room_type_id">
                                            <option value="" disabled selected>Choose Room Type</option>
                                            @foreach ($roomTypes as $roomType)
                                                <option value="{{ $roomType->id }}">{{ $roomType->name }}</option>
                                            @endforeach
                                        </select>
                                        <label>Room Type</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="telephone" type="text" class="validate" name="telephone" min="1" max="9"value="{{ old('telephone') }}">
                                        <label for="telephone">Room Telephone</label>
                                        @error('telephone')
                                            <span class="error-text">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="menu2" class="tab-pane fade">
                        <div class="inn-title">
                            <h4>Photo Gallery</h4>
                            <p>Airtport Hotels The Right Way To Start A Short Break Holiday</p>
                        </div>
                        <div class="bor">
                            <div class="file-field input-field">
                                <div class="btn">
                                    <span>File</span>
                                    <input type="file" name="images[]" accept="image/png, image/gif, image/jpeg" multiple>
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text" placeholder="Upload one or more files">
                                </div>
                            </div>
                            @error('images')
                                <span class="error-text">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <button type="submit" class="waves-effect waves-light btn-large">Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
