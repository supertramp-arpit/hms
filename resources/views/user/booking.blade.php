@extends('layouts.main4')

@section('main-container')
<div class="container mt-5">
<h4>My Account</h4>
</div>
<div class="container d-flex justify-content-center mt">
    <div class="row col-12 mx-auto">
        <div class="col-lg-4 col-md-4 col-sm-12">
            <ul class="mb-0 px-0 mt-2" id="ram1" style="width:50%;border-radius: 6px;">
                <a href="{{ route('profile.edit') }}" class="btn p-1 sm-12 border-0">My Profile</a>
            </ul>

            <ul class="mb-0 px-0 mt-2" id="ram2" style="width:50%;border-radius: 6px;">
                <a href="{{ route('booking.history') }}" class="btn p-1 sm-12 border-0">My Booking</a>
            </ul>

            <ul class="mb-0 px-0 mt-2" id="ram3" style="width:50%;border-radius: 6px;">
                <a href="#" class="btn p-1 sm-12 border-0">Manage Payment</a>
            </ul>

            <ul class="mb-0 px-0 mt-2" id="ram5" style="width:50%;border-radius: 6px;">
                <a href="{{ route('logout') }}"onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn p-1 sm-12 border-0"  role="button">Logout</a>
            </ul>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
                       </form>
        </div>
        <script>
            // Get the current page URL
            const currentUrl = window.location.href;

            // Get all the sidebar links
            const sidebarLinks = document.querySelectorAll('#ram1 a, #ram2 a, #ram3 a, #ram5 a');

            // Loop through the links and check if the href matches the current URL
            sidebarLinks.forEach(link => {
                if (link.getAttribute('href') === currentUrl) {
                    link.parentElement.classList.add('activate');
                }
            });
        </script>
        <div class="col-lg-8 col-md-8 col-sm-12 mx-auto mt-3">
            <div class="d-flex align-items-center">
                <div class="d-inline  my-3">
                    <button type="button" class="button1 btn activate" id="btn1" style="border: solid 1px lightgrey; color:grey;">Upcoming</button>
                    <button type="button" class="button2 btn" id="btn2" style="border: solid 1px lightgrey; color:grey;">Past</button>
                </div>
            </div>

            <div id="tab1" style="display: block;">
                @if(count($upcomingBookings) > 0)
                @foreach($upcomingBookings as $booking)
                <div class="card mt-3 p-3 border-0" style="background: #F3F3F3;border-radius: 12px;">
                    <div class="row col-12">

                        <div class="col-lg-6 col-md-6 col-sm-12">

							<div class="row col-12 d-flex justify-content-center">
								<div class="col-lg-4 col-md-4 col-sm-12">
									<div class="text-center mt-2" style="width: 100px; height: 100px; overflow: hidden; border-radius: 10px;">
                                        <img src="{{ asset('user/img/icon/pro1.png') }}" alt="" style="width: 100%; height: 100%; object-fit: cover;">
                                    </div>

								</div>
								<div class="col-lg-8 col-md-6 col-sm-12">
									<div class="mt-2">
									<h6 style="font-size:20px;" > {{ucwords($booking->roomType->hotel->name) }}</h6>
                                    @php
                                    $checkInDate = \Carbon\Carbon::parse($booking->check_in_date);
                                    $checkOutDate = \Carbon\Carbon::parse($booking->check_out_date);
                                    $dateRange = \Carbon\CarbonPeriod::create($checkInDate, $checkOutDate);
                                @endphp

                                <p class="text-muted my-1" style="font-size:11px;font-weight: bold;">DATE:
                                    <span>
                                        @foreach ($dateRange as $date)
                                            {{ $date->format('j M') }}
                                            @if (!$loop->last)
                                                {{', '}}
                                            @endif
                                        @endforeach
                                        ({{ $checkInDate->diffInDays($checkOutDate) }} nights)
                                    </span>
                                </p>


                                <p class="text-muted my-1" style="font-size:13px;font-weight: bold;">TIME: <span>10 PM to 9 AM</span></p>

                                <p class="text-muted my-1" style="font-size:14px;font-weight: bold;">Room Type: <span>{{ucwords($booking->room_type)}}</span></p>

                                <div class="mt-4 d-inline d-flex">
                                	<img src="{{asset('user/img/icon/star-shape.png')}}" class="ms-0">
                                	<img src="{{asset('user/img/icon/star-shape.png')}}" class="ms-3">
                                	<img src="{{asset('user/img/icon/star-shape.png')}}" class="ms-3">
                                	<img src="{{asset('user/img/icon/star-shape.png')}}" class="ms-3">
                                	<img src="{{asset('user/img/icon/star-shape.png')}}" class="ms-3">
                                </div>

                            </div>
								</div>
							</div>


									</div>
						<div class="col-lg-6 col-md-6 col-sm-12">
							<div class="text-end">
							<a class="navbar-brand" href="#" style="font-size:15px;">
                                <i class="fa fa-map-marker" aria-hidden="true"></i> {{\App\Models\City::find($booking->roomType->hotel->city)->name }},{{\App\Models\State::find($booking->roomType->hotel->state)->name }}</a>
                               </div>

                               <div style="list-style: none;" class="mt-2">
                                <li><span class="text-muted">Booking Date: </span>{{$booking->created_at}}</li>
                                <li><span class="text-muted">Transaction ID:</span> EG_a0dc4f14454</li>
                                <li><span class="text-muted">Total Ammount:</span> ₹ {{$booking->total_price}}</li>
                               </div>
                               <div class="mt-3 text-end ">
							<h5 style="color:red;">Add Review</h5>
						       </div>
						</div>


						</div>

					</div>


                @endforeach
                @else
                <p>No upcoming bookings available.</p>
            @endif

            </div>

            <div id="tab2" style="display: none;">
                @if(count($pastBookings) > 0)

                @foreach($pastBookings as $booking)
                <div class="card mt-3 p-3 border-0" style="background: #F3F3F3;border-radius: 12px;">
                    <div class="row col-12">
                        <!-- Content for Past Bookings -->
                        <div class="col-lg-6 col-md-6 col-sm-12">

							<div class="row col-12 d-flex justify-content-center">
								<div class="col-lg-4 col-md-4 col-sm-12">
									<div class="text-center mt-2" style="width: 100px; height: 100px; overflow: hidden; border-radius: 10px;">
                                        <img src="{{ asset('user/img/icon/pro1.png') }}" alt="" style="width: 100%; height: 100%; object-fit: cover;">
                                    </div>

								</div>
								<div class="col-lg-8 col-md-6 col-sm-12">
									<div class="mt-2">
									<h6 style="font-size:20px;" > {{ucwords($booking->roomType->hotel->name) }}</h6>
                                    @php
                                    $checkInDate = \Carbon\Carbon::parse($booking->check_in_date);
                                    $checkOutDate = \Carbon\Carbon::parse($booking->check_out_date);
                                    $dateRange = \Carbon\CarbonPeriod::create($checkInDate, $checkOutDate);
                                @endphp

                                <p class="text-muted my-1" style="font-size:11px;font-weight: bold;">DATE:
                                    <span>
                                        @foreach ($dateRange as $date)
                                            {{ $date->format('j M') }}
                                            @if (!$loop->last)
                                                {{', '}}
                                            @endif
                                        @endforeach
                                        ({{ $checkInDate->diffInDays($checkOutDate) }} nights)
                                    </span>
                                </p>

                                <p class="text-muted my-1" style="font-size:13px;font-weight: bold;">TIME: <span>10 PM to 9 AM</span></p>

                                <p class="text-muted my-1" style="font-size:14px;font-weight: bold;">Room Type: <span>{{ucwords($booking->room_type)}}</span></p>

                                <div class="mt-4 d-inline d-flex">
                                	<img src="{{asset('user/img/icon/star-shape.png')}}" class="ms-0">
                                	<img src="{{asset('user/img/icon/star-shape.png')}}" class="ms-3">
                                	<img src="{{asset('user/img/icon/star-shape.png')}}" class="ms-3">
                                	<img src="{{asset('user/img/icon/star-shape.png')}}" class="ms-3">
                                	<img src="{{asset('user/img/icon/star-shape.png')}}" class="ms-3">
                                </div>

                            </div>
								</div>
							</div>


									</div>
						<div class="col-lg-6 col-md-6 col-sm-12">
							<div class="text-end">
							<a class="navbar-brand" href="#" style="font-size:15px;">
                                <i class="fa fa-map-marker" aria-hidden="true"></i> {{\App\Models\City::find($booking->roomType->hotel->city)->name }},{{\App\Models\State::find($booking->roomType->hotel->state)->name }}</a>
                               </div>

                               <div style="list-style: none;" class="mt-2">
                                <li><span class="text-muted">Booking Date: </span>{{$booking->created_at}}</li>
                                <li><span class="text-muted">Transaction ID:</span> EG_a0dc4f14454</li>
                                <li><span class="text-muted">Total Ammount:</span> ₹ {{$booking->total_price}}</li>
                               </div>
                               <div class="mt-3 text-end ">
							<h5 style="color:red;">Add Review</h5>
						       </div>
						</div>


						</div>

					</div>
                @endforeach
                                @else
                    <p>No past bookings available.</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const btn1 = document.getElementById('btn1');
        const btn2 = document.getElementById('btn2');
        const tab1 = document.getElementById('tab1');
        const tab2 = document.getElementById('tab2');

        btn1.addEventListener('click', function() {
            tab1.style.display = 'block';
            tab2.style.display = 'none';
            btn1.classList.add('activate');
            btn2.classList.remove('activate');
        });

        btn2.addEventListener('click', function() {
            tab1.style.display = 'none';
            tab2.style.display = 'block';
            btn1.classList.remove('activate');
            btn2.classList.add('activate');
        });
    });
</script>
