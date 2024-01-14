@extends('Backend.Layouts.Main')
<!-- Example: Include jQuery before your custom script -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<meta name="csrf-token" content="{{ csrf_token() }}">

<style>


table th,
    table td {
        text-transform: capitalize;
    }
    .pagination {
    background-color: transparent; /* Set the background color to transparent */
}

    /* Add colors for active and inactive status */
     /* Add colors for active and inactive status */
     .status-active {
        color: green; /* Set the color for active status */
    }

    .status-inactive {
        color: red; /* Set the color for inactive status */
    }

    .status-toggle {
        cursor: pointer; /* Add pointer cursor for indicating clickability */
    }
 </style>
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
                        <h4>All Room</h4>
                        <form action="{{ route('room-alist') }}" method="GET" class="mt-3">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search by Hotel Name" name="search">
                                <span class="input-group-btn">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-search"></i> <!-- Font Awesome search icon -->
                                    </button>
                                </span>
                            </div>
                        </form>



                        <a class="dropdown-button drop-down-meta" href="#" data-activates="dr-users"><i class="material-icons">more_vert</i></a>
                        <ul id="dr-users" class="dropdown-content">
                            <li><a href="{{ url('add-room') }}">Add New</a></li>
                            <li id="JSON"><a href="#">JSON</a></li>
                            <li id="PDF"><a href="#">PDF</a></li>
                            <li><a href="#!">CSV</a></li>
                        </ul>
                    </div>
                    <div class="tab-inn">
                        <div class="table-responsive table-desi">
                            <table class="table table-hover table-bordered" id="example">
                                <thead>
                                    <tr>
                                        <th>Sr. No.</th>
                                        <th>Image</th>
                                        <th>Room Type</th>
                                        <th>Room Number</th>
                                        <th>Meal</th>
                                        <th>Telephone</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                        <!-- Add more fields here -->
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $serialNumber = 1 @endphp
                                    @foreach ($roomTypes as $roomType)
                                        @foreach ($roomType->rooms as $room)
                                            @php
                                                $roomImage = $roomType->roomImages->first();
                                                $statusClass = ($room->status == 1) ? 'active' : 'inactive';
                                            @endphp
                                            <tr>
                                                <td>{{ $serialNumber++ }}</td>
                                                <td>
                                                    <div class="circle-img">
                                                        @if ($roomImage)
                                                            <img src="{{ asset('Cms/Roomimage') }}/{{ $roomImage->images }}" width="50" height="50" alt="Room Image">
                                                        @else
                                                            N/A
                                                        @endif
                                                    </div>
                                                </td>
                                                <td>{{ $roomType->name }}</td>
                                                <td>{{ $room->room_no }}</td>
                                                <td>{{ $room->meal }}</td>
                                                <td>{{ $room->telephone }}</td>
                                               <!-- Inside your Blade template -->
                                               <!-- Inside your Blade template -->
                                               <td class="status-toggle" data-room-id="{{ $room->id }}" data-status="{{ $room->status }}">
                                                @if ($room->status == 1)
                                                    <img src="{{ asset('images/on.png') }}"  style="width: 50px; height: 50px;">
                                                @else
                                                    <img src="{{ asset('images/off.png') }}"  style="width: 50px; height: 50px;">
                                                @endif
                                            </td>


                                                <td>
                                                    <a href="{{ url('view-room').'/'.$room->id }}"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                    <a href="{{ url('room/schedule').'/'.$room->id }}"><i class="fa fa-calendar-o" aria-hidden="true"></i></a>
                                                    <a href="{{ url('edit-room').'/'.$room->id }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                    <a href="{{ route('remove-room', ['id' => $room->id]) }}" class="delete-confirm"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                                </td>
                                                <!-- Add more fields here -->
                                            </tr>
                                        @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                           <!-- Your existing code -->
<!-- ... -->

<!-- Pagination links -->
<div class="pagination custom-pagination">
    <style>
        /* Use a more specific class */
        .custom-pagination ul.pagination {
            font-size: 480px;
            margin-left: 800px;
            /* Add other styles as needed */
        }
    </style>

    @if($totalPages > 1)
        <ul class="pagination">
            @for($i = 1; $i <= $totalPages; $i++)
                <li class="page-item {{ ($currentPage == $i) ? 'active' : '' }}">
                    <a class="page-link" href="{{ route('room-alist', ['page' => $i]) }}">{{ $i }}</a>
                </li>
            @endfor
        </ul>
    @endif
</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Add this script to handle the click event and update status -->
@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        var csrfToken = $('meta[name="csrf-token"]').attr('content');

        $(document).on('click', '.status-toggle', function () {
            var roomId = $(this).data('room-id');
            var currentStatus = $(this).data('status');
            var newStatus = currentStatus == 1 ? 0 : 1;

            var confirmationMessage = (currentStatus === 1) ? 'Are you sure you want to deactivate this room?' : 'Are you sure you want to activate this room?';
            if (!confirm(confirmationMessage)) {
                return false;
            }

            $.ajax({
                url: '/change-room-status/' + roomId,
                type: 'POST',
                data: {
                    _token: csrfToken,
                    _method: 'PUT',
                    status: newStatus
                },
                success: function (data) {
                    if (data.status == 1) {
                        $('.status-toggle[data-room-id="' + roomId + '"]').removeClass('status-inactive').addClass('status-active');
                    } else {
                        $('.status-toggle[data-room-id="' + roomId + '"]').removeClass('status-active').addClass('status-inactive');
                    }

                    // Disable click events on status toggles
                    $('.status-toggle').off('click');

                    // Reload the page after a slight delay
                    setTimeout(function () {
                        location.reload();
                    }, 1000); // Adjust the delay time as needed
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                    // Handle error response
                }
            });
        });
    });
</script>
@endsection
@yield('scripts')
@endsection
