@extends('layouts.main2')
<script src="https://js.stripe.com/v3/"></script>

@section('main-container')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @elseif (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="container">
        <h1>Make a Payment</h1>
        <form action="{{ route('make.payment') }}" method="POST" id="payment-form">
            @csrf

            <!-- User Information -->
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>

            <!-- Card Information -->
            <div class="form-group">
                <label for="card-element">Card Details</label>
                <div id="card-element">
                    <!-- A Stripe Element will be inserted here. -->
                </div>

                <!-- Used to display form errors. -->
                <div id="card-errors" role="alert"></div>
            </div>

            <button type="submit" class="btn btn-primary">Submit Payment</button>
        </form>
    </div>
    <script>
        var stripe = Stripe("{{ config('services.stripe.key') }}");
        var elements = stripe.elements();

        var card = elements.create("card", {
            style: {
                base: {
                    color: "#32325d",
                }
            }
        });
        card.mount("#card-element");

        var form = document.getElementById("payment-form");

        form.addEventListener("submit", function(event) {
            event.preventDefault();

            // Create a PaymentMethod and confirm the PaymentIntent
            stripe.createPaymentMethod({
                type: 'card',
                card: card,
            }).then(function(result) {
                if (result.error) {
                    var errorElement = document.getElementById("card-errors");
                    errorElement.textContent = result.error.message;
                } else {
                    // PaymentMethod created successfully, submit the form
                    form.submit();
                }
            });
        });
    </script>
@endsection
