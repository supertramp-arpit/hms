
@extends('layouts.main4')

@section('main-container')

<div class="d-flex justify-content-center mt-4">

<div class="container">
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


<div class="card p-3 mx-auto">
    <div class="row ">
        <div class="col-lg-3 col-md-4 col-sm-12 mt-3">
            <div class="text-center">
            <img src="{{asset('user/img/pic/p1.png')}}" width="100%" height="100%">
           </div>
        </div>
        <div class="col-lg-9 col-md-8 col-sm-12 mt-3">
            <div>
                <h4>{{ $hotel->name }}</h4>
                <div class="d-flex align-items-center">
                 <div class="">
                 <img src="{{asset('user/img/icon/star-shape.png')}}">
                </div>
                    <div class=" ms-2">
                       <img src="{{asset('user/img/icon/star-shape.png')}}">
                    </div>
                     <div class=" ms-2">
                        <img src="{{asset('user/img/icon/star-shape.png')}}">
                      </div>
                    <div class="ms-2">
                        <img src="{{asset('user/img/icon/star-shape.png')}}">
                    </div>
                     <div class="ms-2">
                      <h6 class="my-2">Execellent <span class="text-muted">(4 Reviews)</span></h6>
                      </div>
                     </div>

                     <div class="mt-1">
                        <a class="navbar-brand " href="#" style="font-size:21px;">
                        <i class="fa fa-map-marker" aria-hidden="true"></i> {{ \App\Models\City::find($hotel->city)->name }}</a>
                    </div>

                     {{-- <div class="mt-2">
                         <h4 class="text-muted"><span style="color:#FE3400;font-weight: bold;">₹ 2000</span> /person</h4>
                     </div> --}}


    <form id="form" action="{{ route('booking.store') }}" method="post">
        @csrf

        <div class="row mx-auto mt-2">
    <div class="col-lg-6 col-md-6 col-sm-6 mt-2">
            <h5>Check in</h5>
            <input type="date" name="check_in_date" class="form-control shadow-none p-2" placeholder=" " aria-label="Check-in date" style="width:100%;"required>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 mt-2">
            <h5>Check out</h5>
            <input type="date" name="check_out_date" class="form-control shadow-none p-2" placeholder=" " aria-label="Check-out date" style="width:100%;"required>
    </div>
</div>

<div class="row mx-auto mt-4">
    <div class="col-lg-6 col-md-6 col-sm-12 position-relative">
        <h5>Apply Promocode</h5>
        <div class="input-group">
            <input type="text" name="promo_code" id="promoCodeInput" class="form-control shadow-none p-2" style="width:100%;">
            <button type="button" id="applyPromoButton" class="btn border-0" style="color:#FE3400;font-weight: bold;font-size:18px; position: absolute; right: 10px; top: 50%; transform: translateY(-50%);">Apply</button>
        </div>
    </div>
<div class="col-lg-6 col-md-6 col-sm-6 mt-2">
    <h5>Room Type</h5>
    <select name="room_type" class="form-control shadow-none p-2" style="width: 100%;"required>
        <option value="">Select Room Type</option>
        @foreach($hotel->roomTypes as $roomType)
            <option value="{{ $roomType->name }}">{{ $roomType->name }}</option>
        @endforeach
    </select>
</div>
</div>
</div>
<!-- Add this input field inside your form -->
<input type="hidden" name="total_price" id="totalPriceInput" value="0">

<h5 class="text-muted mt-4">Pricing</h5>

<div class="card border-0 p-2 mt-4" style="border-radius: 12px;background: #EFF4FF;">
    <div class="row mt-2">
        <div class="col-lg-3 col-md-2">
             <h6 class="text-muted">Sub Total</h6>
         </div>
         <div class="col-lg-9 col-md-10">
            <h5 id="totalAmount" class="text-end" style="margin-top:0px">₹ 0.00</h5>
         </div>
    </div>

    <div class="row mt-2">
        <div class="col-lg-3 col-md-2">
             <h6 class="text-muted">Promo code</h6>
         </div>
         <div class="col-lg-9 col-md-10">
            <h5 id="promoCodeDiscount" class="text-end" style="color: red;">₹ 0.00</h5>
         </div>
    </div>

    <div class="row mt-2">
        <div class="col-lg-3 col-md-2">
             <h6 class="text-muted">Total Saving</h6>
         </div>
         <div class="col-lg-9 col-md-10">
            <h5 id="totalSavings" class="text-end" style="color: red;">₹ 0.00</h5>
         </div>
    </div>

    <div class="row mt-2">
        <div class="col-lg-3 col-md-2">
             <h6 class="text-muted">TAX</h6>
         </div>
         <div class="col-lg-9 col-md-10">
            <h5 id="taxAmount" class="text-end">₹ 0.00</h5>
         </div>
    </div>

    <div class="divider border-bottom"></div>

    <div class="row mt-2">
        <div class="col-lg-3 col-md-2">
             <h6 class="text-muted">Total</h6>
         </div>
         <div class="col-lg-9 col-md-10">
            <h5 id="subTotal" class="text-end">₹ 0.00</h5>
         </div>
    </div>
</div>

<h5 class="mt-4">Select your payment method</h5>

<!-- Inside the payment method section -->
<!-- Inside the payment method section -->
<div class="card border-0 p-2 mt-4" style="border-radius: 12px; background: #EFF4FF;">
    {{-- <div class="row mt-2"> --}}
        {{-- <div class="col-lg-3 col-md-2">
            <input type="radio" id="creditCard" name="paymentMethod" value="creditCard">
            <label for="creditCard">
                <div class="mt-1">
                    <a class="navbar-brand text-muted" href="#" style="font-size:18px;font-weight: 500;">
                        <img src="{{asset('user/img/icon/image 7.png')}}"> Credit Card</a>
                </div>
            </label>
        </div> --}}
        {{-- <div class="col-lg-9 col-md-10 my-2">
            <h5 class="text-end"><i class="fa fa-chevron-right" aria-hidden="true"></i></h5>
        </div> --}}
    {{-- </div> --}}
    <!-- Add radio buttons for other payment methods -->
    <div class="row mt-2">
        <div class="col-lg-3 col-md-2">
            <input type="radio" id="online" name="paymentMethod" value="online">
            <label for="online">
                <div class="mt-1">
                    <a class="navbar-brand text-muted" href="#" style="font-size:18px;font-weight: 500;">
                        <img src="{{asset('user/img/icon/image 7.png')}}"> Online</a>
                </div>
            </label>
        </div>
        <div class="col-lg-9 col-md-10 my-2">
            <h5 class="text-end"><i class="fa fa-chevron-right" aria-hidden="true"></i></h5>
        </div>
    </div>
    <input type="hidden" name="payment_method" id="paymentMethodInput" value="">
    <div class="row mt-2">


        <div class="col-lg-3 col-md-2">
            <input type="radio" id="cashOnArrival" name="paymentMethod" value="cashOnArrival">
            <label for="cashOnArrival">
                <div class="mt-1">
                    <a class="navbar-brand text-muted" href="#" style="font-size:18px;font-weight: 500;">
                        <img src="{{asset('user/img/icon/image 7.png')}}"> Cash on Arrival</a>
                </div>
            </label>
        </div>
        <div class="col-lg-9 col-md-10 my-2">
            <h5 class="text-end"><i class="fa fa-chevron-right" aria-hidden="true"></i></h5>
        </div>
    </div>
</div>

</div>

<div class="text-end mt-4">
<button type="submit" class="btn text-white " style="background:#FE3400;">Continue</button>
</div>
</form>

        </div>
    </div>
</div>
</div>


</div>
</div>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    const roomTypeSelect = document.querySelector('select[name="room_type"]');
    const checkInDateInput = document.querySelector('input[name="check_in_date"]');
    const checkOutDateInput = document.querySelector('input[name="check_out_date"]');
    const promoCodeInput = document.querySelector('input[name="promo_code"]');
    const totalAmountElement = document.getElementById('totalAmount');
    const promoCodeDiscountElement = document.getElementById('promoCodeDiscount');
    const totalSavingsElement = document.getElementById('totalSavings');
    const taxAmountElement = document.getElementById('taxAmount');
    const subTotalElement = document.getElementById('subTotal');

    roomTypeSelect.addEventListener('change', updateTotalAmount);
    checkInDateInput.addEventListener('change', updateTotalAmount);
    checkOutDateInput.addEventListener('change', updateTotalAmount);
    promoCodeInput.addEventListener('input', updateTotalAmount);
// Inside the script
const onlineRadioButton = document.querySelector('input[name="paymentMethod"][value="online"]');
const cashOnArrivalRadioButton = document.querySelector('input[name="paymentMethod"][value="cashOnArrival"]');

onlineRadioButton.addEventListener('change', () => {
    document.getElementById('paymentMethodInput').value = 'online';
});

cashOnArrivalRadioButton.addEventListener('change', () => {
    document.getElementById('paymentMethodInput').value = 'cashOnArrival';
});

    function updateTotalAmount() {

    const selectedRoomTypeName = roomTypeSelect.value; // Get the selected room type name
    const roomTypes = @json($hotel->roomTypes);
    const selectedRoomTypeData = roomTypes.find(roomType => roomType.name === selectedRoomTypeName);
    const rentPerNight = selectedRoomTypeData ? parseFloat(selectedRoomTypeData.rent_per_night) : 0;

        const checkInDate = new Date(checkInDateInput.value);
        const checkOutDate = new Date(checkOutDateInput.value);
        const daysDifference = (checkOutDate - checkInDate) / (1000 * 3600 * 24);

        const promoCode = promoCodeInput.value;
        let promoCodeDiscount = 0;
        if (promoCode === 'ANMOL') {
            // Apply a discount if the promo code is 'ROAMIO10'
            promoCodeDiscount = 200; // Assuming a fixed discount of ₹200
        }

        let totalAmount = daysDifference * rentPerNight;
        const gstRate = 0.12;
        const taxAmount = totalAmount * gstRate;

        totalAmount -= promoCodeDiscount; // Apply the promo code discount directly

        const totalSavings = promoCodeDiscount;
        const grandTotal = totalAmount + taxAmount;

        totalAmountElement.textContent = `₹ ${totalAmount.toFixed(2)}`;
        promoCodeDiscountElement.textContent = `₹ ${promoCodeDiscount.toFixed(2)}`;
        totalSavingsElement.textContent = `₹ ${totalSavings.toFixed(2)}`;
        taxAmountElement.textContent = `₹ ${taxAmount.toFixed(2)}`;
        subTotalElement.textContent = `₹ ${grandTotal.toFixed(2)}`;
        const totalPrice = grandTotal;
        document.getElementById('totalPriceInput').value = totalPrice.toFixed(2);

    }
    // ... (previous code remains unchanged)

document.addEventListener("DOMContentLoaded", function () {
    const today = new Date().toISOString().split("T")[0];
    const checkInInput = document.querySelector('input[name="check_in_date"]');
    const checkOutInput = document.querySelector('input[name="check_out_date"]');

    checkInInput.setAttribute("min", today);
    checkOutInput.setAttribute("min", today);

    checkInInput.addEventListener("change", function () {
        const checkInDate = this.value;
        checkOutInput.setAttribute("min", checkInDate);
        if (checkInDate >= checkOutInput.value) {
            checkOutInput.value = "";
        }
    });

    checkOutInput.addEventListener("change", function () {
        const checkOutDate = this.value;
        if (checkOutDate <= checkInInput.value) {
            this.value = "";
        }
    });
});


document.getElementById('form').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent the default form submission

    const paymentMethodValue = document.getElementById('paymentMethodInput').value;

    if (paymentMethodValue === 'online') {
        initiateRazorpay(); // Call function to initiate Razorpay payment
    } else if (paymentMethodValue === 'cashOnArrival') {
        // For 'Cash on Arrival', submit the form directly without Razorpay
        this.submit();
    } else {
        // Handle other payment methods if required
        alert('Please select a payment method.');
        // Add your logic here for other payment methods
    }
});

function initiateRazorpay() {
    const totalAmount = parseFloat(document.getElementById('subTotal').textContent.replace('₹ ', ''));

    const options = {
        key: 'rzp_test_nC5kxY1iKaQcLp', // Replace with your actual Razorpay key
        amount: totalAmount * 100, // Amount in paisa or the smallest currency unit
        currency: 'INR',
        name: 'Your Hotel Name',
        description: 'Payment for booking',
        handler: function(response) {
            // Handle successful payment response (optional)
            alert('Razorpay Payment Successful: ' + JSON.stringify(response));
            document.getElementById('form').submit(); // Submit the form after successful payment
        },
        // Add a function to handle modal closure (optional)
        closed: function() {
            alert('Razorpay modal closed without payment.');
        },
        // Add error handling function (optional)
        prefill: {
            // Add pre-filled customer details if needed
        },
    };

    try {
        const rzp = new Razorpay(options);

        // Open the Razorpay payment modal
        rzp.open();
    } catch (error) {
        console.error('Error initializing Razorpay:', error);
        alert('Error initializing Razorpay: ' + error.message);
    }
}
</script>
@endsection
