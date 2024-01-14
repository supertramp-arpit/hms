@extends('Backend.Layouts.Main')


@section('content')
    <div class="sb2-2">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4>Edit Room</h4>
            </div>
            <div class="panel-body">
                <div class="col-md-12">
                    <form method="post" action="{{ route('update_room', ['id' => $data->id]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-6">
                                <!-- Room Number -->
                                <div class="form-group">
                                    <label for="room_no">Room Number:</label>
                                    <input type="text" name="room_no" id="room_no" class="form-control" value="{{ $data->room_no }}" required>
                                </div>

                                <!-- Meal -->
                                <div class="form-group">
                                    <label for="meal">Meal:</label>
                                    <input type="text" name="meal" id="meal" class="form-control" value="{{ $data->meal }}" required>
                                </div>

                                <!-- AC/Non-AC -->
                                <div class="input-field col s6">
                                    <select name="ac_non_ac" id="ac_non_ac">
                                        <option value="" disabled selected>AC/Non-AC</option>
                                        <option value="1" {{ $data->ac_non_ac == 1 ? 'selected' : '' }} class="ac-option">AC</option>
                                        <option value="0" {{ $data->ac_non_ac == 0 ? 'selected' : '' }} class="non-ac-option">Non AC</option>
                                        <!-- Add options for other AC types if needed -->
                                    </select>
                                    <label>AC/Non-AC</label>
                                </div>
                                <div class="input-field col s6">
                                    <select name="status" id="status">
                                        <option value="" disabled selected>Status</option>
                                        <option value="1" {{ $data->status == 1 ? 'selected' : '' }} class="ac-option">active</option>
                                        <option value="0" {{ $data->status == 0 ? 'selected' : '' }} class="non-ac-option">inactive</option>
                                        <!-- Add options for other AC types if needed -->
                                    </select>
                                    <label>Status</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <!-- Room Telephone -->
                                <div class="form-group">
                                    <label for="telephone">Room Telephone:</label>
                                    <input type="text" name="telephone" id="telephone" class="form-control" value="{{ $data->telephone }}" required>
                                </div>

                                <!-- Room Images -->
                                <div class="form-group">
                                    <label for="room_images">Room Images:</label>
                                    <input type="file" name="room_images[]" id="room_images" class="form-control" multiple accept="image/*">
                                </div>

                                <!-- Existing Images with Delete Icon -->
                                <div class="form-group">
                                    <label for="existing_images">Existing Images:</label>
                                    <div class="row" style="display: flex; flex-wrap: nowrap; overflow-x: auto;">
                                        @foreach($data['roomType']['roomImages'] as $img)
                                            <div class="col-md-3" style="position: relative; display: flex; flex-direction: column;">
                                                <img src="{{ asset('Cms/Roomimage') }}/{{ $img->images }}" class="img-responsive" alt="Room Image" style="width: 90%; height: 120px; object-fit: cover;">
                                                <a href="{{ route('delete-image', ['imageId' => $img->id]) }}" onclick="return confirm('Are you sure you want to delete this image?')" title="Delete" style="position: absolute; bottom: 5px; right: 5px; color: red;">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- Save Button -->
                        <div class="form-group text-center" style="margin-top: 20px;">
                            <button type="submit" class="btn btn-primary">Update Room</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <style>
        /* Custom CSS styles for the form */
        .form-group label {
            font-weight: bold;
        }
        .form-group select {
            width: 100%;
        }
        /* Add more styles as needed */
    </style>

    @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
    @endif
@endsection
