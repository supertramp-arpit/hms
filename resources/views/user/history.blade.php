@extends('layouts.main2')

@section('main-container')
<div class="head_panel mb-5">
    <div style="background-image: url('{{ asset('assets/images/page-head-5.jpg') }}')" class="full_width_photo transparent_film">
        <div class="container">
            <div class="caption">
                <h1> My Bookings</h1>
                <span>You are our trusted partner</span>
            </div>
        </div>
    </div>
</div>

<div class="container mt-1">
    @if ($bookings->isEmpty())
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card booking-card">
                    <div class="card-body text-center">
                        <h5 class="card-title">You haven't made any bookings yet.</h5>
                        <p class="card-text">Explore our rooms now.</p>
                        <a href="{{ route('room-list') }}" class="btn btn-primary">View Our Rooms</a>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="row">
            @foreach ($bookings as $booking)
                <div class="col-md-6 mb-4">
                    <div class="card booking-card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $booking->room_type }}</h5>
                            <p class="card-text">Booking ID: {{ $booking->id }}</p>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><strong>Check-In Date:</strong> {{ $booking->check_in_date }}</li>
                                <li class="list-group-item"><strong>Check-Out Date:</strong> {{ $booking->check_out_date }}</li>
                                <li class="list-group-item"><strong>Total Price:</strong> ₹{{ $booking->total_price }}</li>
                            </ul>
                            <form id="cancelForm_{{ $booking->id }}" action="{{ route('cancel-booking', $booking->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger mt-3" onclick="confirmCancellation({{ $booking->id }})">Cancel Booking</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
<script>
    function confirmCancellation(bookingId) {
        if (confirm('Are you sure you want to cancel this booking?')) {
            document.getElementById('cancelForm_' + bookingId).submit();
        }
    }
</script>

<style>
    .head_panel {
        margin-bottom: 30px;
    }

    .booking-card {
        border: 2px solid #eee;
        border-radius: 10px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        transition: transform 0.2s;
    }

    .booking-card:hover {
        transform: translateY(-5px);
    }

    .card-title {
        font-size: 24px;
        color: #333;
    }

    .card-text {
        font-size: 18px;
        color: #777;
    }

    .list-group-item {
        font-size: 16px;
        color: #555;
    }
</style>



@endsection
