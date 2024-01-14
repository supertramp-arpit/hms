@extends('Backend.Layouts.Main')

@section('content')

<style type="text/css">
/* Updated styles for the table */
.container {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 20px;
}

.calendar {
    width: 70%;
    margin-top: 20px;
}

.table {
    width: 100%;
    border-collapse: collapse;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1); /* Adding a box-shadow for a subtle effect */
}

.table th,
.table td {
    padding: 12px;
    text-align: center;
}

.table th {
    background-color: #343a40;
    color: #ffffff;
}

.table tbody tr:nth-child(even) {
    background-color: #f8f9fa; /* Alternate row background color */
}

.text-success {
    color: #28a745;
}

.text-danger {
    color: #dc3545;
}

/* Custom styles for status */
.status-booked {
    color: #dc3545; /* Red for 'Booked' status */
}

.status-available {
    color: #28a745; /* Green for 'Available' status */
}

/* Pagination styles */
</style>

<div class="container">
    <div class="calendar">
        <h1 class="text-center">Room Schedule - {{ $room->room_no }}</h1>

        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($paginatedSchedule as $date => $status)
                    <tr>
                        <td>{{ $date }}</td>
                        <td class="{{ $status === 'Booked' ? 'status-booked' : 'status-available' }}">{{ $status }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @if($totalPages > 1)
            <ul class="pagination">
                @for($i = 1; $i <= $totalPages; $i++)
                    <li class="{{ $i == $currentPage ? 'active' : '' }}">
                        <a href="{{ route('room.schedule', ['roomId' => $room->id, 'page' => $i]) }}">{{ $i }}</a>
                    </li>
                @endfor
            </ul>
        @endif
    </div>
</div>

@endsection
