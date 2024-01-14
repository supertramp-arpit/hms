@extends('layouts.main4')

@section('main-container')

<div class="d-flex justify-content-center mt-4">
    <div class="container">
        <div class="row col-12 mx-auto">
            <div class="mt-2">
                <h3>My Wishlist</h3>
            </div>

            @foreach($wishlistWithHotels as $wishlistItem)
                <div class="col-lg-3 col-md-3 col-sm-12">
                    <div class="card border-0 mt-3">
                        <div class="rounded-square">
                            <a href="{{ route('hotel.singal', ['id' => $wishlistItem->hotel->id]) }}" class="mt-5" style="text-decoration: none; color: inherit;">

                            <img src="{{ asset($wishlistItem->hotel->images->first()->image_path) }}" class="equal-size rounded-square-img" alt="best-service">
                            </a>
                        </div>
                        <div class="" id="slide">
                            <div class="heart bg-light p-2" style="border-radius:50%;">
                                @if(in_array($wishlistItem->hotel->id, $userWishlist))
                                    <i class="fa fa-heart rounded-circle bg-light p-1 like-button liked" data-hotel-id="{{ $wishlistItem->hotel->id }}" aria-hidden="true"></i>
                                @else
                                    <i class="fa fa-heart-o rounded-circle bg-light p-1 like-button" data-hotel-id="{{$wishlistItem->hotel->id }}" aria-hidden="true"></i>
                                @endif
                            </div></div>
                    </div>
                    <a href="{{ route('hotel.singal', ['id' => $wishlistItem->hotel->id]) }}" class="mt-5" style="text-decoration: none; color: inherit;">

                    <h5 class="mt-3">{{ucwords( $wishlistItem->hotel->name )}}</h5>
                    <p class="mt-1">{{ \App\Models\City::find($wishlistItem->hotel->city)->name }}</p>
                    </a>
                    <div class="d-flex align-items-center mt-3">
                        <div>
                            <button type="button" class="btn" style="background-color:#FE3400;color: white;">{{ $wishlistItem->hotel->stars }}.0</button>
                        </div>

                        <div class="ms-2">
                            <h6>Excellent<span class="text-muted"> 4 Reviews</span></h6>
                        </div>
                    </div>

                    <div class="mt-2">
                        <h5>Starting from <span style="color:#FE3400;font-weight: bold;">₹ 4000</span></h5>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</div>

<style>
    .rounded-square {
        overflow: hidden;
        border-radius: 15px;
        width: 100%;
        height: 250px; /* Adjust the desired height */
    }

    .equal-size {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .rounded-square-img {
        border-radius: 15px; /* To round the image corners */
    }
</style>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    // Function to add or remove hotel from wishlist
   // Function to add or remove hotel from wishlist
function toggleWishlist(hotelId) {
    $.ajax({
        url: '/wishlist/add', // Replace with your route for adding/removing from wishlist
        type: 'POST',
        data: {
            hotel_id: hotelId,
            _token: '{{ csrf_token() }}'
        },
        success: function(response) {
            if (response.success) {
                alert(response.success); // Display success message
                // Update UI or perform any necessary actions after success

                // Example: Change the button text or style
                var likeButton = $('[data-hotel-id="' + hotelId + '"]');
                if (likeButton.hasClass('liked')) {
                    likeButton.removeClass('liked');
                } else {
                    likeButton.addClass('liked');
                }

                // Reload the page after a successful operation
                location.reload(); // This line reloads the page
            } else if (response.error) {
                alert(response.error); // Display error message
            }
        },
        error: function(xhr) {
            alert('Error occurred while adding/removing from wishlist');
        }
    });
}

// Event listener for like button click
$(document).on('click', '.like-button', function() {
    var hotelId = $(this).data('hotel-id');

    // Call the toggleWishlist function with the hotel ID
    toggleWishlist(hotelId);
});

</script>

@endsection
