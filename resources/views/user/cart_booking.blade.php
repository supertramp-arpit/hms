
@extends('layouts.main2')
<!-- Add jQuery and Bootstrap scripts -->

<style>
    .popup {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.7);
        z-index: 999;
    }

    .popup-content {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        text-align: center;
    }

    .close-popup {
        position: absolute;
        top: 10px;
        right: 10px;
        cursor: pointer;
    }
</style>
@section('main-container')
<!-- Modal for Success Message -->

<div id="success-popup" class="popup">
    <div class="popup-content">
        <span class="close-popup" onclick="closeSuccessPopup()">&times;</span>
        <h2>Booking Successful!</h2>
        <p>Your booking has been confirmed. Thank you!</p>
    </div>
</div>

<!-- END======================== HEADER ==========================-->
<div class="head_panel">
    <div style="background-image: url('{{ asset('assets/images/page-head-5.jpg') }}')" class="full_width_photo transparent_film">
        <div class="container">
            <div class="caption">
                <h1>BOOKING</h1>
                <span>Book your trip with us</span>
            </div>
        </div>
    </div>
</div>

 </div>

<div class="main">
    <section class="light_section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-left">
                    <ul class="breadcrumb">
                        <li><a href="{{ url('/') }}">HOME</a></li>
                        <li><span>BOOKING</span></li>
                    </ul>
                    <div class="col-md-4">
                     <div style="background-image: url('{{ asset('assets/images/book-widget-bg-2.jpg') }}')" class="widget widget_book background_cover widget_no_line featured">
                        <span>DOUBLE ROOM</span>
                        <h2>WEEKEND 50% OFF</h2>
                        <p>$ 99 / DAY</p>
                        <div><i class="icon icon-TV"></i><i class ="icon icon-Espresso"></i><i class="icon icon-Signal"></i></div>
                        <a href="#!" class="btn btn-white">VIEW THE ROOM</a>
                     </div>
                     <div style="background-image: url('{{ asset('assets/images/book-widget-bg.jpg') }}')" class="widget widget_book background_cover widget_no_line">
                        <span>KING SUITE</span>
                        <h2>WINTER OFFER</h2>
                        <p>$ 199 / DAY</p>
                        <a href="#!" class="btn btn-white">VIEW THE ROOM</a>
                     </div>

                </div>

                <div class="col-md-8">
                    <form id="bookingForm" method="POST">
                        @csrf


                        <input type="hidden" id="guest_id" name="guest_id" value="{{ auth()->user()->id }}">                        <div class="form-group">
                            <label for="check_in_date">Check-in Date</label>
                            <input type="date" id="check_in_date" name="check_in_date" class="form-control" value="{{ $cart->check_in_date ?? '' }}" min="{{ date('Y-m-d') }}" required readonly>

                            @error('check_in_date')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="check_out_date">Check-out Date</label>
                            <input type="date" id="check_out_date" name="check_out_date" class="form-control" value="{{ $cart->check_out_date ?? '' }}" required min="{{ date('Y-m-d', strtotime('+1 day')) }}" oninput="setMinCheckOutDate(this.value)"readonly>

                            @error('check_out_date')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                        @endif

                        @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif

                        <div class="form-group">
                            <label for="room_type">Room Type</label>
                            <select id="room_type" name="room_type" class="form-control" required readonly>
                                <option value="{{ $cart->room_type ?? '' }}">{{ $cart->room_type ?? '' }}</option>
                                {{-- @foreach($roomTypes as $room)
                                    <option data-price="{{ $room->rent_per_night }}" value="{{ $room->name }}">{{ $room->name }}</option>
                                @endforeach --}}
                            </select>
                            @error('room_type')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        {{-- <div class="form-group">
                            <label for="promo_code">Promo Code</label>
                            <div class="form-group">
                                <input type="text" id="promo_code" name="promo_code" class="form-control" >

                                <button class="btn btn-outline-secondary" type="button" onclick="applyPromoCode()">Check</button>
                            </div>
                            <span id="promo_error" class="text-danger" style="display: none">Invalid promo code</span>
                        </div> --}}
                        <label for="total_price">Total Price</label>
                        <input type="text" id="total_price" name="total_price" class="name form-control" value="{{ $cart->total_price ?? ''}}" required readonly>

                        <button type="button" onclick="submitToDatabaseOne()" class="btn btn-primary">Submit </button>

                        <!-- Second submit button for the second action -->
                        {{-- <button type="button" onclick="submitToDatabaseTwo()" class="btn btn-danger">Add to Cart</button> --}}
                    </form>

                    <script>
                        function submitToDatabaseOne() {
                            document.getElementById('bookingForm').action = "{{ route('booking.store') }}"; // Set action to the first route
                            document.getElementById('bookingForm').submit(); // Submit the form
                        }

                        function submitToDatabaseTwo() {
                            document.getElementById('bookingForm').action = "{{ route('cart') }}"; // Set action to the second route
                            document.getElementById('bookingForm').submit(); // Submit the form
                        }
                    </script>
                    {{-- <div class="payment-summary">
                     <h3>Payment Summary</h3>
                     <p>Subtotal: <span id="subtotal">0.00</span></p>
                     <p>GST (12%): <i class="fas fa-rupee-sign    "></i><span id="gst">0.00</span></p>
                     <p>Promo Code Discount: <i class="fa fa-rupee" aria-hidden="true"></i><span id="promo_discount">0.00</span></p> --}}
                     {{-- <p>Total: <i class="fas fa-rupee-sign    "></i><span id="total_price">0.00</span></p> --}}
                 {{-- </div> --}}
                 <script>
                        window.onload = function() {

                     // Get the room type from the URL query parameter
                     const urlParams = new URLSearchParams(window.location.search);
const roomType = urlParams.get('room_type');
const checkInDate = urlParams.get('check_in_date');
const checkOutDate = urlParams.get('check_out_date');

// Preselect the room type and set the check-in and check-out dates in the form fields
if (roomType) {
 const roomTypeSelect = document.getElementById('room_type');
 for (let i = 0; i < roomTypeSelect.options.length; i++) {
     if (roomTypeSelect.options[i].value === roomType) {
         roomTypeSelect.selectedIndex = i;
         // Trigger the change event to recalculate the total price
         roomTypeSelect.dispatchEvent(new Event('change'));
         break;
     }
 }
}

// Set the check-in and check-out date values in the input fields
if (checkInDate) {
 document.getElementById('check_in_date').value = checkInDate;
}

if (checkOutDate) {
 document.getElementById('check_out_date').value = checkOutDate;
}
                     // Add event listeners to calculate total price, GST, and apply promo code
                     document.getElementById('room_type').addEventListener('change', calculateTotalPrice);
                     document.getElementById('check_in_date').addEventListener('change', calculateTotalPrice);
                     document.getElementById('check_out_date').addEventListener('change', calculateTotalPrice);
                     document.getElementById('check_promo_code').addEventListener('click', checkPromoCode);
                     document.getElementById('promo_code').addEventListener('input', function () {
                         // Clear promo code discount and update the total when promo code is modified
                         document.getElementById('promo_discount').textContent = '0.00';
                         updateTotalWithDiscount();
                     });

                     // Calculate the total price when the page loads
                     calculateTotalPrice();

                     // Calculate total price function
                     function calculateTotalPrice() {
                         var roomTypeSelect = document.getElementById('room_type');
                         var checkInDateInput = document.getElementById('check_in_date');
                         var checkOutDateInput = document.getElementById('check_out_date');
                         var totalPriceInput = document.getElementById('total_price');
                         var paymentSummaryTotal = document.getElementById('final_total');

                         var roomTypePrice = parseFloat(roomTypeSelect.options[roomTypeSelect.selectedIndex].getAttribute('data-price'));
                         var checkInDate = new Date(checkInDateInput.value);
                         var checkOutDate = new Date(checkOutDateInput.value);
                         var today = new Date();

                         // Ensure check-in date is not in the past
                         if (checkInDate < today) {
                             alert("Check-in date cannot be in the past.");
                             return;
                         }

                         // Ensure check-in date is earlier than check-out date
                         if (checkInDate >= checkOutDate) {
                             alert("Check-in date must be earlier than check-out date.");
                             return;
                         }

                         var numberOfDays = (checkOutDate - checkInDate) / (1000 * 60 * 60 * 24); // Calculate the number of days

                         var grandTotal = roomTypePrice * numberOfDays;

                         var gstRate = 0.12;
                         var gstAmount = grandTotal * gstRate;

                         // Update the payment summary
                         document.getElementById('subtotal').textContent = grandTotal.toFixed(2);
                         document.getElementById('gst').textContent = gstAmount.toFixed(2);
                         updateTotalWithDiscount();

                         // Update the total price input field
                         totalPriceInput.value = grandTotal.toFixed(2);

                         // Update the paymentSummaryTotal
                         paymentSummaryTotal.textContent = (grandTotal + gstAmount).toFixed(2);
                     }

                     // Check promo code function
                     function checkPromoCode() {
                         var promoCode = document.getElementById('promo_code').value;

                         // Simulate promo code validation (replace this with your actual logic)
                         if (promoCode === 'ANMOL') {
                             applyPromoCode();
                         } else {
                             // Display an error or message if the promo code is invalid
                             alert('Invalid promo code');
                             // Clear the promo code field and reset the discount
                             document.getElementById('promo_code').value = '';
                             document.getElementById('promo_discount').textContent = '0.00';
                             updateTotalWithDiscount();
                         }
                     }

                     // Apply promo code function
                     function applyPromoCode() {
                         var promoCode = document.getElementById('promo_code').value;
                         var promoDiscount = 0;

                         // Implement your promo code logic here
                         // For example, you can check if the promo code is valid and apply a discount
                         if (promoCode === 'ANMOL') {
                             promoDiscount = 50; // Adjust the value as needed
                         }

                         // Update the payment summary with the promo code discount
                         document.getElementById('promo_discount').textContent = promoDiscount.toFixed(2);
                         updateTotalWithDiscount();
                     }

                     // Update the total with discount
                     function updateTotalWithDiscount() {
                         var subtotal = parseFloat(document.getElementById('subtotal').textContent);
                         var gst = parseFloat(document.getElementById('gst').textContent);
                         var promoDiscount = parseFloat(document.getElementById('promo_discount').textContent);
                         var total = subtotal + gst - promoDiscount;

                         // Update the total price input field
                         document.getElementById('total_price').value = total.toFixed(2);
                     }};
                 </script>


                </div>
            </div>
        </div>
    </section>
</div>
<!-- ============================ FOOTER ============================-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function openSuccessPopup() {
        $("#success-popup").show();
    }

    function closeSuccessPopup() {
        $("#success-popup").hide();
    }

    // Show the popup when the form is successfully submitted
    @if(session('success'))
    openSuccessPopup();
    @endif
</script>
<!-- Add this script at the end of your booking page -->
<script>
        window.onload = function() {

 // Get the room type from the URL query parameter
     // Get the room type from the URL query parameter
     const urlParams = new URLSearchParams(window.location.search);
 const roomType = urlParams.get('room_type');

 // Preselect the room type in the dropdown if it exists
 if (roomType) {
     const roomTypeSelect = document.getElementById('room_type');
     for (let i = 0; i < roomTypeSelect.options.length; i++) {
         if (roomTypeSelect.options[i].value === roomType) {
             roomTypeSelect.selectedIndex = i;
             // Trigger the change event to recalculate the total price
             roomTypeSelect.dispatchEvent(new Event('change'));
             break;
         }
     }
 }
        };
</script>

<!-- Your Blade view file -->

<!-- Displaying error messages for the fields -->
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
@endsection
