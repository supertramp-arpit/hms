
@extends('layouts.main4')
<style>
    /* Set the image size and border radius */
    .card img {
        width: 100%;
        height: 270px; /* Adjust the height as needed */
        object-fit: cover;
        border-radius: 15px; /* Apply rounded corners */
    }
    .view-more-btn {
        color: rgb(250, 75, 0);
        text-decoration: none;
        border: none;
        background-color: transparent;
        cursor: pointer;
    }

    /* Remove underline when hovered */
    .view-more-btn:hover {
        text-decoration: none;
    }

</style>


@section('main-container')

       <div class="container-fluid ">
       <div class="row">
       <div class="col-lg-3 col-md-3 col-sm-auto  p-4 mt-5 " style="border-radius:15px;">
       <div class="card ps-4 p-3 mt-2">
       <p style="font-size:18px;font-weight:500;">FILTER BY</p>
      <div class="progress">
  <div class="progress-bar bg-danger" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
</div>
       <hr>
       <p style="font-size:18px;font-weight:600;">Review Score</p>
       <label class="my-1"><input type="checkbox"  name="cb5" class="chb" value="5"/> 5 &nbsp;<span class="fa fa-solid fa-star" style="color: #d13F21;"></span></label>
       <label class="my-1"><input type="checkbox" name="cb4" class="chb" value="4" /> 4 &nbsp;<span class="fa fa-solid fa-star" style="color: #d13F21;"></span></label>
       <label class="my-1"><input type="checkbox" name="cb3" class="chb" value="3" /> 3 &nbsp;<span class="fa fa-solid fa-star" style="color: #d13F21;"></span></label>
       <label class="my-1"><input type="checkbox" name="cb2" class="chb" value="2"/> 2 &nbsp;<span class="fa fa-solid fa-star" style="color: #d13F21;"></span></label>
       <label class="my-1"><input type="checkbox" name="cb1" class="chb" value="1"/> 1 &nbsp;<span class="fa fa-solid fa-star" style="color: #d13F21;"></span></label>
       <hr>
       <p style="font-size:18px;font-weight:600;">Facilities & Services</p>
       <label class="my-1"><input type="checkbox" name="cb1" class="cha" /> Free Internet </label>
       <label class="my-1"><input type="checkbox" name="cb2" class="cha" /> Parking </label>
       <label class="my-1"><input type="checkbox" name="cb3" class="cha" /> Swimming Pool </label>
       <label class="my-1"><input type="checkbox" name="cb4" class="cha" /> Transfer </label>
       <label class="my-1"><input type="checkbox" name="cb4" class="cha" /> Gyam </label>
       <label class="my-1"><input type="checkbox" name="cb4" class="cha" /> Spa </label>
       <p style="font-size:15px;font-weight:500;color:red;">More</p>
       <hr>
       <p style="font-size:18px;font-weight:600;">Discount</p>
       <label class="my-1"><input type="checkbox" name="cb1" class="chc" /> 5% </label>
       <label class="my-1"><input type="checkbox" name="cb2" class="chc" /> 5-10% </label>
       <label class="my-1"><input type="checkbox" name="cb3" class="chc" /> 10-15% </label>
       <label class="my-1"><input type="checkbox" name="cb4" class="chc" /> 15-20% </label>
       <label class="my-1"><input type="checkbox" name="cb4" class="chc" /> 30% or more </label>
       <hr>
       <p style="font-size: 18px; font-weight: 600;">States</p>
       <div class="states-container">
        @php
            $stateCount = 0;
        @endphp
        @foreach($states as $state)
            @if($stateCount < 10)
                <div class="state-checkbox mb-2">
                    <input type="checkbox" name="states[]" class="chd" value="{{ $state->id }}" id="state_{{ $state->id }}" />
                    <label for="state_{{ $state->id }}" class="ms-2">{{ $state->name }}</label>
                </div>
            @else
                <div class="state-checkbox state-hidden" style="display: none;">
                    <input type="checkbox" name="states[]" class="chd" value="{{ $state->id }}" id="state_{{ $state->id }}" />
                    <label for="state_{{ $state->id }}" class="ms-2">{{ $state->name }}</label>
                </div>
            @endif
            @php
                $stateCount++;
            @endphp
        @endforeach
        @if(count($states) > 10)
            <button class="view-more-btn"><strong>View More</strong></button>
        @endif
    </div>
    <script>
        // Function to toggle visibility of hidden states and apply spacing
        $('.view-more-btn').click(function() {
            $('.state-hidden').toggle().toggleClass('mb-2'); // Add or remove the margin-bottom class

            $(this).text(function(i, text){
                return text === "View More" ? "View Less" : "View More";
            });
        });
    </script>

    </div>
       </div>

       <div class="col-lg-9 col-md-9 col-sm-auto mt-5 ">
       <div class="row ">
        @if(count($hotels) > 0)
        @foreach($hotels as $hotel)
        <div class="col-lg-4 col-md-4 col-sm-12">
            <input type="hidden" class="state-id" value="{{ $hotel->state }}" />

               <div class="card border-0 mt-5">
                <a href="{{ route('hotel.singal', ['id' => $hotel->id]) }}">
             <img src="{{ asset($hotel->images->first()->image_path) }}"  style="width:100% height:100%;"alt="best-service"></a>
             <div class="" id="slide">
                <div class="heart bg-light p-2" style="border-radius:50%;">
                    @if(in_array($hotel->id, $userWishlist))
                        <i class="fa fa-heart rounded-circle bg-light p-1 like-button liked" data-hotel-id="{{ $hotel->id }}" aria-hidden="true"></i>
                    @else
                        <i class="fa fa-heart-o rounded-circle bg-light p-1 like-button" data-hotel-id="{{ $hotel->id }}" aria-hidden="true"></i>
                    @endif
                </div>

             </div>
               </div>
         <a href="{{ route('hotel.singal', ['id' => $hotel->id]) }}" class="mt-5" style="text-decoration: none; color: inherit;">
            <p>{{ ucwords($hotel->name) }}, {{ \App\Models\City::find($hotel->city)->name }}</p>
        </a>


         <div class="d-flex align-items-center mt-3">
             <div>
                 <button type="button" class="btn" style="background-color:#FE3400;color: white;">{{$hotel->stars}}.0</button>
             </div>

             <div class="ms-2">
                 <h6>Execellent<span class="text-muted"> 4 Reviews</span></h6>
             </div>
         </div>


         <div class="mt-2">
             <h5>Starting from <span style="color:#FE3400;font-weight: bold;">₹ 600</span></h5>
         </div>
           </div>

          @endforeach
          @else
          <!-- No Hotels Available Card -->
          <div class="col-lg-12">
              <div class="card border-0 mt-5">
                  <div class="card-body text-center">
                      <h5>No hotels available in this state.</h5>
                      <!-- You can add additional content or suggestions here -->
                  </div>
              </div>
          </div>
      @endif

         </div>
       </div>


                     <!-- IMAGE END -->

         </div>
       </div>


              <!-- IMAGE END -->

         </div>
       </div>

     </div>
   </div>




      </div>
      </div>



	 </body>
	 <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
	 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
     <script src="js/bootstrap.bundle.js"></script>
<!-- Add this script at the end of your HTML file, inside the <script> tags -->

    <script>
        // Function to filter hotels based on selected states
        function filterHotels() {
            var selectedStates = []; // Array to store selected state IDs

            // Loop through all checkboxes with the class 'chd'
            $('.chd').each(function() {
                if ($(this).is(':checked')) {
                    // If checkbox is checked, add the state ID to the selectedStates array
                    selectedStates.push($(this).val());
                }
            });

            // If no checkboxes are selected, show all hotels
            if (selectedStates.length === 0) {
                $('.col-lg-4').show();
            } else {
                // Hide all hotels initially
                $('.col-lg-4').hide();

                // Loop through each hotel
                $('.col-lg-4').each(function() {
                    // Get the state ID associated with the hotel
                    var hotelState = $(this).find('.state-id').val();

                    // If the hotel's state ID is in the selectedStates array, show the hotel
                    if (selectedStates.includes(hotelState.toString())) {
                        $(this).show();
                    }
                });
            }
        }

        // Attach change event listener to state checkboxes
        $('.chd').change(function() {
            filterHotels(); // Call the filterHotels function when a checkbox changes

            // Uncheck other checkboxes when one is checked
            if ($(this).is(':checked')) {
                $('.chd').not(this).prop('checked', false);
            }
        });

        // Initial call to filterHotels function to show hotels based on initial checkbox state
        filterHotels();
    </script>

	<script>
	$(".toggle-password").click(function() {
  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});

$(".chb").change(function() {
    $(".chb").prop('checked', false);
    $(this).prop('checked', true);
});
$(".cha").change(function() {
    $(".cha").prop('checked', false);
    $(this).prop('checked', true);
});
$(".chc").change(function() {
    $(".chc").prop('checked', false);
    $(this).prop('checked', true);
});
$(".chd").change(function() {
    $(".chd").prop('checked', false);
    $(this).prop('checked', true);
});
	// It checks to see if the span id #heart has "liked" class, if not it run the else statement and adds the "liked" class, on a 2nd click it see that it has the "liked" class so it replaces the ihherHTML and removes class, on 3rd click it runs the else statement again cause there is no "liked" class(remomved on 2nd click).




// Assuming jQuery is being used
$('.like-button').click(function() {
    $(this).toggleClass('liked');
    const heartIcon = $(this).find('i');
    if ($(this).hasClass('liked')) {
        heartIcon.removeClass('fa-heart-o').addClass('fa-heart');
        // Here, you can add logic to communicate with the backend to update the like status
    } else {
        heartIcon.removeClass('fa-heart').addClass('fa-heart-o');
        // Logic to remove the like from the backend if necessary
    }
});





	</script>



<script>
    // Function to filter hotels based on selected star ratings
    function filterByStars(stars) {
        $('.col-lg-4').hide(); // Hide all hotels initially

        // Loop through each hotel
        $('.col-lg-4').each(function() {
            var hotelRating = parseFloat($(this).find('.btn').text()); // Get the hotel's star rating from the appropriate element (assuming it's a button)

            // Show hotels with matching or higher star ratings
            if (hotelRating >= stars) {
                $(this).show();
            }
        });
    }

    // Attach click event listener to star rating checkboxes
    $('.chb').change(function() {
        var selectedRating = parseFloat($(this).val()); // Get the selected star rating
        if ($(this).is(':checked')) {
            filterByStars(selectedRating); // Call the filterByStars function with the selected rating
        } else {
            // If unchecked, show all hotels if no star rating is selected
            var checkedStars = $('.chb:checked');
            if (checkedStars.length === 0) {
                $('.col-lg-4').show();
            } else {
                // Get the highest selected star rating
                var maxRating = Math.max.apply(
                    null,
                    checkedStars.map(function() {
                        return parseFloat($(this).val());
                    }).get()
                );
                filterByStars(maxRating); // Filter based on the highest selected star rating
            }
        }
    });

    // Initial call to filter hotels based on initial checkbox state
    $('.chb:checked').each(function() {
        var selectedRating = parseFloat($(this).val()); // Get the initially checked star rating
        filterByStars(selectedRating); // Call the filterByStars function with the initial rating
    });
</script>


	 </html>
	@endsection
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
