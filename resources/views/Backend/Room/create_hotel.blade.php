@extends('Backend.Layouts.Main')
<style>
    /* Styles for custom dropdown */
    .custom-dropdow {
            position: relative;
            display: inline-block;
            width: 100%;
        }

        .dropdow-header {
            border: 1px solid #ccc;
            padding: 8px;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            background-color: #f8f8f8; /* Background color */
            color: #333; /* Text color */
            font-size: 16px; /* Font size */
        }

        .dropdow-content {
            display: none;
            position: absolute;
            background-color: #fff;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
            width: 100%;
            max-height: 200px;
            overflow-y: auto;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .dropdow-content div {
            padding: 10px;
            cursor: pointer;
            transition: background-color 0.3s ease; /* Smooth hover effect */
            font-size: 14px; /* Font size */
        }

        .dropdow-content div:hover {
            background-color: #f1f1f1; /* Hover color */
        }
</style>

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
                @if ($errors->has('room_no'))
    <div class="alert alert-danger">
        {{ $errors->first('room_no') }}
    </div>
@endif

            </ul>
            <!-- Alert messages -->
        </div>
        <div class="sb2-2-add-blog sb2-2-1">
            <h2>Add Hotel Details</h2>
            <ul class="nav nav-tabs tab-list">
                <li class="active"><a data-toggle="tab" href="#hotel-info"><i class="fa fa-info" aria-hidden="true"></i> <span>Hotel Info</span></a></li>
                <li><a data-toggle="tab" href="#image-gallery"><i class="fa fa-picture-o" aria-hidden="true"></i> <span>Image Gallery</span></a></li>
                <!-- Tab links -->
            </ul>
            <form class="text-center" method="post" action="{{ url('add-hotels') }}" enctype="multipart/form-data">
                @csrf
                <div class="tab-content">
                    <div id="hotel-info" class="tab-pane fade in active">
                        <div class="box-inn-sp">
                            <div class="bor">

                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="hotel-name" type="text" class="validate" name="name" value="{{ old('hotel_name') }}">
                                        <label for="hotel-name">Hotel Name</label>
                                        @error('hotel_name')
                                            <span class="error-text">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="hotel-address" type="text" class="validate" name="address" value="{{ old('hotel_address') }}">
                                        <label for="hotel-address">Hotel Address</label>
                                        @error('hotel_address')
                                            <span class="error-text">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s6">
                                        <select id="state" name="state">
                                            <option value="" disabled selected>Select State</option>
                                            @foreach($states as $state)
                                                <option value="{{ $state->id }}">{{ $state->name }}</option>
                                            @endforeach
                                        </select>
                                        <label for="state">State</label>
                                        @error('state')
                                            <span class="error-text">{{ $message }}</span>
                                        @enderror
                                    </div>

                                   <div class="input-field col s6">
                                        <div class="custom-dropdow">
                                            <div class="dropdow-header" onclick="toggleCityDropdown()">
                                                <span id="selectedCity">Select City</span>
                                                <i class="fa fa-caret-down" aria-hidden="true"></i>
                                            </div>
                                            <div class="dropdow-content" id="cityDropdown" style="display: none;">
                                                <!-- Options for cities will be populated dynamically using JavaScript -->
                                            </div>
                                        </div>
                                        <input type="hidden" id="selectedCityInput" name="city" value="">
                                        <!-- Error handling -->
                                    </div>


                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="stars" type="number" class="validate" name="stars" min="1" max="5" value="{{ old('hotel_stars') }}">
                                        <label for="stars">Stars</label>
                                        @error('stars')
                                            <span class="error-text">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="image-gallery" class="tab-pane fade">
                        <div class="inn-title">
                            <h4>Image Gallery</h4>
                            <p>Upload multiple images for the hotel</p>
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
