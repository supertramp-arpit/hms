@extends('layouts.main4')

@section('main-container')
<div class="d-flex justify-content-center">
	<div class="container card mt-3 p-2 shadow-sm bg-rounded border-0">
		<div class="row mx-auto">
			<div class="col-lg-6 col-md-6 col-sm-12 mt-4">
				<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel" style="width: 100%; height: 300px; overflow: hidden;">
					<div class="carousel-inner" style="width: 100%; height: 100%;">
						@foreach($roomImages as $key => $roomimage)
						<div class="carousel-item {{ $key === 0 ? 'active' : '' }}" data-bs-interval="2000" style="width: 600px; height: 400px;">
							<img src="{{ asset('Cms/Roomimage/' . $roomimage->images) }}" class="d-block w-100 h-100 rounded-square" alt="Room Image" style="object-fit: cover; border-radius: 12px;">
						</div>
						@endforeach
					</div>
					<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="visually-hidden">Previous</span>
					</button>
					<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="visually-hidden">Next</span>
					</button>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-12 mt-4">
				<div class="card border-0" style="width:100%;height:100%;">
					<h3 style="color: #FF3500;">{{ucwords($roomType->name)}}</h3>
					<div>
						<p style="text-align: justify;">
                            Do you feel the need to visit some of the most historic and artistic hotels in the world, but lack motivation? Worry not, for we have collected some of the best hotel quotes for you. These hotel quotes will inspire you to take that vacation and get a break.
                       </p>
					</div>

					<div style="list-style: none;">
						<li><strong>Max:</strong> {{$roomType->capacity}} Person</li>
						{{-- <li><strong>Size:</strong> 35 m<sup>2</sup> / 299 ft2</li> --}}
						{{-- <li><strong>View:</strong> See</li> --}}
						<li><strong>Bed:</strong> {{$roomType->capacity}}</li>
					</div>

					<div>
							<h5 style="color: #FF3500;">₹ {{$roomType->rent_per_night}} <span class="text-muted">/night</span> </h5>
						</div>

                        <div class="row mt-2">
                            <form class="booking_form_small text-left">
                                <div class="col-lg-6 col-md-6 col-sm-6 mt-2">
                                    <h5>Check in</h5>
                                    <input type="Date" class="form-control shadow-none p-2" placeholder=" "  style="width:100%;" id="check_in_date">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 mt-2">
                                    <h5>Check out</h5>
                                    <input type="Date" class="form-control shadow-none p-2" placeholder=" "  style="width:100%;" id="check_out_date">
                                </div>

                        </div>
                        <div class="d-flex col-12 mt-1 mx-auto">
						<div class="mt-3">

							<button type="button" class="btn" id="checkAvailabilityBtn" style="background-color:#0B214C;"><a  style="text-decoration:none;color:white;">Check Availability</a> </button>
						</div>

                    </form>

						<div class="ms-2 mt-3">
                            @if(auth()->check())
							<button type="button" class="btn" style="background-color:#FF3500;"><a href="{{ route('booking', ['hotelId' => $hotel->id]) }}" style="text-decoration:none;color:white;">Book Now</a> </button>
                            @else
                            <button type="button" id="bookNowBtn" class="btn" style="background-color:#FF3500;"><a style="text-decoration:none;color:white;"> Book Now</a></button>
                            @endif
						</div>

					</div>
                    <br>
                        <span id="availabilityMessage"></span>
                        <br>
                        <br><span id="authError" style="color: red;"></span><br>

				</div>
			</div>
		</div>
	</div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#checkAvailabilityBtn').click(function() {
            var checkInDate = $('#check_in_date').val();
            var checkOutDate = $('#check_out_date').val();
            var roomType = '{{ $roomType->name }}'; // Assuming you're passing $roomType from the backend

            // Make an AJAX request to check room availability
            $.ajax({
                type: 'POST',
                url: '/check-availability', // Replace with your route endpoint
                data: {
                    '_token': '{{ csrf_token() }}',
                    'check_in_date': checkInDate,
                    'check_out_date': checkOutDate,
                    'room_type': roomType
                },
                success: function(response) {
                    if (response.available) {
                        $('#availabilityMessage').text(response.message).css('color', 'green');
                    } else {
                        $('#availabilityMessage').text(response.message).css('color', 'red');
                    }
                },
                error: function(xhr, status, error) {
                    console.error(error);
                    $('#availabilityMessage').text('An error occurred. Please try again.').css('color', 'red');
                }

            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        // Check Availability Button
        // ...

        // Book Now Button (if user is not authenticated)
        $('#bookNowBtn').click(function() {
            // Check if the user is authenticated
            $.ajax({
                type: 'GET',
                url: '/check-authentication', // Modify this endpoint to your authentication check route
                success: function(response) {
                    if (response.authenticated) {
                        // Redirect to the booking page
                        window.location.href = " {{ route('booking', ['hotelId' => $hotel->id]) }}";

                    } else {
                        // Show error message
                        $('#authError').text('Please log in first.').show();
                    }
                },
                error: function(xhr, status, error) {
                    console.error(error);
                    $('#authError').text('An error occurred. Please try again.').show();
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        // Set today's date as the minimum date for check-in
        var today = new Date().toISOString().split('T')[0];
        $('#check_in_date').attr('min', today);

        // When the check-in date changes, set the minimum value for check-out accordingly
        $('#check_in_date').change(function() {
            var checkInDate = $('#check_in_date').val();
            $('#check_out_date').attr('min', checkInDate);

            // If the check-out date is the same as the check-in date, increment the check-out date by one day
            if ($('#check_out_date').val() === checkInDate) {
                var nextDay = new Date(checkInDate);
                nextDay.setDate(nextDay.getDate() + 1);
                var nextDayFormatted = nextDay.toISOString().split('T')[0];
                $('#check_out_date').val(nextDayFormatted);
            }
        });

        // When the check-out date changes, validate it against the check-in date
        $('#check_out_date').change(function() {
            var checkOutDate = $('#check_out_date').val();
            var checkInDate = $('#check_in_date').val();

            if (checkOutDate <= checkInDate) {
                var nextDay = new Date(checkInDate);
                nextDay.setDate(nextDay.getDate() + 1);
                var nextDayFormatted = nextDay.toISOString().split('T')[0];
                $('#check_out_date').val(nextDayFormatted);
            }
        });
    });
</script>


@endsection
