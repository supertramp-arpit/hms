@extends('Backend.Layouts.Main')

@section('content')

<div class="sb2-2">
    <div class="sb2-2-2">
        <!-- Alerts if any -->
    </div>

    <div class="sb2-2-3">
        <div class="row">
            <div class="col-md-12">
                <div class="box-inn-sp">
                    <div class="inn-title">
                        <h4>Bookings for {{ $guest->name }}</h4>
                        <!-- Dropdown for actions -->
                    </div>
                    <div class="tab-inn">
                        <div class="table-responsive table-desi">
                            <table class="table table-hover table-bordered" id="bookingTable">
                                <thead>
                                    <tr>
                                        <th>Booking ID</th>
                                        <th>Check-in Date</th>
                                        <th>Check-out Date</th>
                                        <th>Room Type</th>
                                        <th>Room Number</th>
                                        <th>Total Price</th>
                                        <!-- Add other booking details you want to display -->
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($bookings) > 0)
                                        @foreach($bookings as $booking)
                                            <tr>
                                                <td>{{ $booking->id }}</td>
                                                <td>{{ $booking->check_in_date }}</td>
                                                <td>{{ $booking->check_out_date }}</td>
                                                <td>{{ $booking->room_type }}</td>
                                                <td>{{ $booking->room_number }}</td>
                                                <td>{{ $booking->total_price }}</td>
                                                <!-- Add other booking details you want to display -->
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="6">No bookings found for this guest.</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    /* Custom styles for the table */
    .sb2-2-3 .table-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh; /* Adjust height as needed */
    }

    .sb2-2-3 .table {
        width: 100%;
        margin-bottom: 1rem;
        color: #333;
        border-collapse: collapse;
    }

    .sb2-2-3 .table th,
    .sb2-2-3 .table td {
        padding: 0.75rem;
        vertical-align: top;
        border-top: 1px solid #ccc;
    }

    .sb2-2-3 .table th {
        background-color: #f2f2f2;
        font-weight: bold;
        text-align: left;
    }

    .sb2-2-3 .table tbody tr:nth-of-type(odd) {
        background-color: #f9f9f9;
    }

    .sb2-2-3 .table tbody tr:hover {
        background-color: #e9ecef;
    }
</style>
@endsection
