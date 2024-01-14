
@extends('Backend.Layouts.Main')
<style>

    .pagination {
        margin-top: 20px;
        text-align: center;
    }

    .pagination a {
        display: inline-block;
        padding: 5px 10px;
        margin: 0 2px;
        border: 1px solid #ccc;
        text-decoration: none;
        color: #333;
        border-radius: 3px;
    }

    .pagination a.active {
        background-color: #007bff;
        color: #fff;
        border: 1px solid #007bff;
    }

    .pagination a:hover {
        background-color: #eee;
    }

    .action-buttons {
    display: flex;
    justify-content: space-around; /* Adjust as needed */
}

.action-buttons a {
    margin-right: 5px; /* Adjust as needed */
    color: black; /* Update button colors if needed */
    font-size: 18px;
}
.action-buttons .delete-button  {
        color: red; /* Set the color to red for the delete button icon */
    }
</style>
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
        <div class="col s6">
            <div class="card">
                <div class="card-content">
                    <h2>Create Room Type</h2>
                    <div class="bor">
                        <form method="POST" action="{{ route('create-room-type') }}">
                            @csrf
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="name" type="text" class="validate" name="name" value="{{ old('name') }}">
                                    <label for="name"> Room Type Name</label>
                                    @error('name')
                                    <span style="color: red; float: left;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <select name="hotel_id">
                                        <option value="" disabled selected>Select Hotel</option>
                                        @foreach ($hotels as $hotel)
                                            <option value="{{ $hotel->id }}">{{ $hotel->name }}</option>
                                        @endforeach
                                    </select>
                                    <label>Select Hotel</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <select name="capacity" value="{{ old('capacity') }}">
                                        <option value="" disabled selected>Bed Capacity</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                    </select>
                                    <label>Capacity</label>
                                </div>
                                <div class="input-field col s12">
                                    <input id="rent_per_night" type="number" class="validate" name="rent_per_night" value="{{ old('rent_per_night') }}">
                                    <label for="rent_per_night">Rent Per Night</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="description" type="text" class="validate" name="description">
                                    <label for="description">Description</label>
                                </div>
                            </div>
                            <button type="submit" class="btn">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col s6">
            <div class="card">
                <div class="card-content">
                    <h2>Room Types</h2>
                    <div class="table-responsive table-desi">
                        <table class="table table-hover table-bordered" id="example">

                        <thead>
                            <tr>
                                <th>Room Type</th>
                                <th>Hotel</th>
                                <th>Rent Per Night</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($roomTypesPaginated  as $roomType)
                            <tr>
                                <td>{{ucwords ($roomType->name )}}</td>
                                <td>{{ ucwords($roomType->hotel->name) }} </td>
                                <td>{{ $roomType->rent_per_night }}</td>
                                <td>

                                    <div class="action-buttons">
                                        <a href="{{ route('edit-room-type', $roomType->id) }}"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                        <!-- Add a JavaScript confirmation dialog before deleting -->
                                        <a href="#" onclick="confirmDelete('{{ route('delete-room-type', ['id' => $roomType->id]) }}')" class="delete-button">
                                            <i class="fa fa-trash delete-icon" style="color: red;" aria-hidden="true"></i>
                                        </a>

                                    </div>

                                </td>
                            </tr>
                            @endforeach
                        </div>
                        </tbody>

                    </table>
<!-- Assuming $paginationData is available in the view -->
@php
    $currentPage = $paginationData['current_page'];
    $lastPage = $paginationData['last_page'];
@endphp

<!-- Pagination links -->
<div class="pagination">
    @if($currentPage > 1)
        <a href="?page={{ $currentPage - 1 }}">Previous</a>
    @endif

    @for($i = 1; $i <= $lastPage; $i++)
        <a href="?page={{ $i }}" @if($i === $currentPage) class="active" @endif>{{ $i }}</a>
    @endfor


</div>

                                   </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript to display a confirmation dialog -->
<script>
    function confirmDelete(deleteUrl) {
        if (confirm('Are you sure you want to delete this room type?')) {
            window.location.href = deleteUrl;
        }
    }
</script>

@endsection
