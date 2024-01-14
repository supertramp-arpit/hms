@extends('Backend.Layouts.Main')

@section('content')
<div class="sb2-2" style="height: 120%">
    <div class="sb2-2-2">
        <ul>
            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block" style="color: white; float: right;">
                <button type="button" class="close" data-dismiss="alert" style="color: #fff">×</button>
                <strong>{{ $message }}</strong>
            </div>
            @endif
            @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-block" style="color: white; float: right;">
                <button type="button" class="close" data-dismiss="alert" style="color: #fff">×</button>
                <strong>{{ $message }}</strong>
            </div>
            @endif
        </ul>
    </div>
    <div class="row sb3-2-add-blog">
        <div class="col s9">
            <div class="card">
                <div class="card-content">
                    <h2>Edit Room Type</h2>
                    <div class="bor">
                        <form method="POST" action="{{ route('update-room-type', $roomType->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="input-field col s6">
                                    <input id="name" type="text" class="validate" name="name" value="{{ $roomType->name }}">
                                    <label for="name">Name</label>
                                </div>
                                <div class="input-field col s6">
                                    <select name="capacity">
                                        <option value="" disabled selected>Bed Capacity</option>
                                        <option value="1" {{ $roomType->capacity == 1 ? 'selected' : '' }}>1</option>
                                        <option value="2" {{ $roomType->capacity == 2 ? 'selected' : '' }}>2</option>
                                        <option value="3" {{ $roomType->capacity == 3 ? 'selected' : '' }}>3</option>
                                        <option value="4" {{ $roomType->capacity == 4 ? 'selected' : '' }}>4</option>
                                        <option value="5" {{ $roomType->capacity == 5 ? 'selected' : '' }}>5</option>
                                        <option value="6" {{ $roomType->capacity == 6 ? 'selected' : '' }}>6</option>
                                        <option value="7" {{ $roomType->capacity == 7 ? 'selected' : '' }}>7</option>
                                        <option value="8" {{ $roomType->capacity == 8 ? 'selected' : '' }}>8</option>
                                        <option value="9" {{ $roomType->capacity == 9 ? 'selected' : '' }}>9</option>
                                        <option value="10" {{ $roomType->capacity == 10 ? 'selected' : '' }}>10</option>
<!-- Add options for other capacities -->
                                    </select>
                                    <label>Capacity</label>
                                </div>
                                <div class="row">
                                    <div class="input-field col s6">
                                        <input id="rent_per_night" type="number" class="validate" name="rent_per_night" value="{{ $roomType->rent_per_night }}">
                                        <label for="rent_per_night">Rent Per Night</label>
                                    </div>
                                    <div class="input-field col s6">
                                        <input id="description" type="text" class="validate" name="description" value="{{ $roomType->description }}">
                                        <label for="description">Description</label>
                                    </div> </div>
                                <div class="input-field col s12">
                                    <button type="submit" class="btn">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- ... (existing code) -->
    </div>
</div>
@endsection
