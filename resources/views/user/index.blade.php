
@extends('layouts.newmain')


<style>

     /* Style for input[type=date] */
     input[type=date] {
        /* Your desired styles */
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
        /* Add any other styles you need */
    }
    .image-container {
    width: 300px; /* Set the desired width */
    height: 200px; /* Set the desired height */
    overflow: hidden; /* Hide overflow if images are larger */
}

.equal-size {
    width: 100%;
    height: 100%;
    object-fit: cover; /* Maintain aspect ratio and cover the container */
}
/* Add this to your existing CSS or style block */
.rounded-square {
    overflow: hidden;
    border-radius: 15px; /* Adjust the radius as needed */
    width: 100%;
    height: 270px; /* Set the desired height */
}

.rounded-square img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}


    </style>
    <script>
        // Check for a success message in the session and display an alert if found
        @if(session('success'))
            alert("{{ session('success') }}");
        @endif
    </script>
    <script>
        // Check for a success message in the session and display an alert if found
        @if(session('error'))
            alert("{{ session('error') }}");
        @endif
    </script>

@section('main-container')

 <div class="container p-5" style="margin-top:15vh;">
     <!--<div class="text-center">
        <h2 class="fnt-styl text-white" style="font-size:2.4rem;">Find the Perfect Accommodation</h2>
        <hp class="fnt-styl text-white" style="font-size:1.2rem;">Discover Amazing Places at Exclusive Deals</p>
     </div>-->
     <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators" style="width:2px;height: 2px;">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active" data-bs-interval="1000">
      <div class="text-center">
        <h1 class="fnt-styl text-white">Find the Perfect Accommodation</h1>
        <p class="fnt-styl text-white" style="font-size:1.2rem;">Discover Amazing Places at Exclusive Deals</p>
      </div>
    </div>
    <div class="carousel-item" data-bs-interval="2000">
      <div class="text-center">
        <h1 class="fnt-styl text-white">Find the Perfect Accommodation</h1>
        <p class="fnt-styl text-white" style="font-size:1.2rem;">Discover Amazing Places at Exclusive Deals</p>
      </div>
    </div>
    <div class="carousel-item" data-bs-interval="3000">
      <div class="text-center">
        <h1 class="fnt-styl text-white">Find the Perfect Accommodation</h1>
        <p class="fnt-styl text-white" style="font-size:1.2rem;">Discover Amazing Places at Exclusive Deals</p>
      </div>
    </div>
  </div>

</div>


 </div>
 <div class="container p-5 ">
    <form method="POST" action="/avail"> <!-- Add your route for form submission -->
        @csrf <!-- Add CSRF token for security -->
        <div class="btn-group">
            <button class="btn text-white shd-bg px-4 rounded py-2 fs-5" id="btn-status1">
                <img src="{{asset('user/img/icon/Hotel.png')}}" class="me-2">Hotel
            </button>
        </div>
        <!-- first Tab-->
        <div class="container-fluid p-4 rounded text-center" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5),rgba(0,0,0,0.5))" id="status1">
            <!-- Form content -->
            <div class="row col-12">
                <div class="col-lg-3 col-md-3 col-sm-3 col-12">
                    <h4 class="text-white">Location</h4>
                    <p class="text-secondary">Where are you going ?</p>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-12">
                    <h4 class="text-white">Check In</h4>
                    <input type="date" class="form-control" name="check_in_date" id="check_in_date" required>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-12">
                    <h4 class="text-white">Check Out</h4>
                    <input type="date" class="form-control" name="check_out_date" id="check_out_date" required>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-12">
                    <button type="submit" class="btn btn-lg text-white mt-2" style="background-color:#FE3400;">
                        <img src="{{('user/img/icon/MagnifyingGlass.png')}}"> Search
                    </button>
                </div>
            </div>
            <!-- End of form content -->
        </div>
    </form>
     <!--second Tab-->
   {{-- <div class="container-fluid p-4 rounded text-center" style=" display:none; background-image: linear-gradient(rgba(0, 0, 0, 0.5),rgba(0,0,0,0.5)) " id="status2">
      <div class="row col-12">
          <div class="col-lg-3 col-md-3 col-sm-3 col-12">
             <h4 class="text-white ">Location</h4>
             <p class="text-secondary">Where are you going ?</p>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-3 col-12">
          <h4 class="text-white">Check In-Out</h4>
             <p class="text-secondary">05/02/2023 - 05/03/2023</p>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-3 col-12">
          <h4 class="text-white">Guests</h4>
             <p class="text-secondary">1 Adult - 0 Child</p>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-3 col-12">
          <button class="btn btn-lg text-white mt-2" style="background-color:#d13F21;">
           <img src="{{asset('user/img/icon/MagnifyingGlass.png')}}"> Find
          </button>
          </div>
      </div>
   </div> --}}
 </div>
</section>
<!--Head section End-->

<div class="d-flex justify-content-center mt-4">
    <div class="container-fluid ">
       <div class="row col-12 mx-auto">
        <div>
         <h1>Hotels Near You</h1>
         <p>Discover Nearby Hotels For You Perfect Stay</p>
       </div>

@foreach($hotels as $hotel)
           <div class="col-lg-3 col-md-3 col-sm-12">
               <div class="card border-0 mt-5">
                <div class="image-container rounded-square">
                    <a href="{{ route('hotel.singal', ['id' => $hotel->id]) }}">
                        <img src="{{ asset($hotel->images->first()->image_path) }}" class="equal-size" alt="best-service">
                    </a>
                    </div>

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

                             <a href="{{ route('hotel.singal', ['id' => $hotel->id]) }}"class="mt-3"  style="text-decoration: none; color: inherit;">
                                <p> {{ ucwords($hotel->name) }}, {{ \App\Models\City::find($hotel->city)->name }}</p>
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
       </div>
    </div>
</div>


                                           <!--Popular hotels-->



<div class="d-flex justify-content-center mt-4">
    <div class="container-fluid ">
       <div class="row col-12 mx-auto">
        <div>
         <h1>Popular Hotels</h1>
         <p>Discover Nearby Hotels For You Perfect Stay</p>
       </div>

@foreach($hotels as $hotel)
           <div class="col-lg-3 col-md-3 col-sm-12">
               <div class="card border-0 mt-5">
                <div class="image-container rounded-square">
                    <a href="{{ route('hotel.singal', ['id' => $hotel->id]) }}">
                        <img src="{{ asset($hotel->images->first()->image_path) }}" class="equal-size" alt="best-service">
                    </a>                </div>

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
         <a href="{{ route('hotel.singal', ['id' => $hotel->id]) }}"  style="text-decoration: none; color: inherit;">
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
       </div>
    </div>
</div>





<!-- DEALS-->

<div class="d-flex justify-content-center mt-5">
    <div class="container-fluid p-3">
     <div class="row col-12 mx-auto">
        <div>
         <h2>Deals of the Day</h2>
     <p>Daily Adventures, Daily Savings</p>
       </div>
           <div class="col-lg-4 col-md-4 col-sm-12">
               <div class="card border-0 mt-4">
             <img src="{{asset('user/img/pic/a3.png')}} " style="width:100% height:100%;"alt="best-service">
             <div class="" id="slide">
                <span class="heart bg-light p-2" style="border-radius:50%;"><i class="fa fa-heart-o rounded-circle bg-light p-1" aria-hidden="true"></i></span>
            </div>

         </div>
         <p class="mt-3">Lucknow</p>

         <div class="d-flex align-items-center mt-3">
             <div>
                 <button type="button" class="btn" style="background-color:#FE3400;color: white;">4.8</button>
             </div>

             <div class="ms-2">
                 <h6>Execellent<span class="text-muted"> 4 Reviews</span></h6>
             </div>
         </div>

         <div class="mt-2">
             <h5>Starting from <span style="color:#FE3400;font-weight: bold;">₹ 600</span></h5>
         </div>


           </div>

           <div class="col-lg-4 col-md-4 col-sm-12">
               <div class="card border-0 mt-4">
             <img src="{{asset('user/img/pic/a1.png')}} " style="width:100% height:100%;"alt="best-service">
             <div class="" id="slide">
                <span class="heart bg-light p-2" style="border-radius:50%;"><i class="fa fa-heart-o rounded-circle bg-light p-1" aria-hidden="true"></i></span>
            </div>

         </div>
         <p class="mt-3">Lucknow</p>

         <div class="d-flex align-items-center mt-3">
             <div>
                 <button type="button" class="btn" style="background-color:#FE3400;color: white;">4.8</button>
             </div>

             <div class="ms-2">
                 <h6>Execellent<span class="text-muted"> 4 Reviews</span></h6>
             </div>
         </div>

         <div class="mt-2">
             <h5>Starting from <span style="color:#FE3400;font-weight: bold;">₹ 600</span></h5>
         </div>
           </div>



           <div class="col-lg-4 col-md-4 col-sm-12">
               <div class="card border-0 mt-4">
             <img src="{{asset('user/img/pic/a2.png')}} "  style="width:100% height:100%;"alt="best-service">
             <div class="" id="slide">
                <span class="heart bg-light p-2" style="border-radius:50%;"><i class="fa fa-heart-o rounded-circle bg-light p-1" aria-hidden="true"></i></span>
            </div>

         </div>
         <p class="mt-3">Lucknow</p>

         <div class="d-flex align-items-center mt-3">
             <div>
                 <button type="button" class="btn" style="background-color:#FE3400;color: white;">4.8</button>
             </div>

             <div class="ms-2">
                 <h6>Execellent<span class="text-muted"> 4 Reviews</span></h6>
             </div>
         </div>

         <div class="mt-2">
             <h5>Starting from <span style="color:#FE3400;font-weight: bold;">₹ 600</span></h5>
         </div>
           </div>


     </div>

    </div>
</div>




                   <!-- C A R D -->

<div class="container-fluid p-5 mt-5" style="background: #0B214C;">
    <div class="">
        <div class="container d-flex justify-content-center">
        <div class="row col-12">
            <div class="col-lg-8 col-md-8 col-sm-12 mx-auto">
                <div class="">
                <h1 class="text-white">What Our Customers are Saying Us ?</h1>
                <p class="text-white" style="font-size:20px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam urna purus, convallis ac augue vulputate, dictum consequat velit. Sed fermentum feugiat diam, vel suscipit enim</p>

                <div class="row mt-3">
                    <div class="col-lg-6 col-md-6 col-sm-12 text-white">
                        <h5>13M+</h5>
                        <p>Happy Customers</p>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 text-white">
                        <h5>5.0</h5>
                        <div class="d-flex flex-wrap">

                            <img src="{{asset('user/img/pic/Star.png')}}">
                            <img src="{{asset('user/img/pic/Star.png')}}">
                            <img src="{{asset('user/img/pic/Star.png')}}">
                            <img src="{{asset('user/img/pic/Star.png')}}">
                            <img src="{{asset('user/img/pic/Star.png')}}">
                        </div>
                        <p class="mt-2">Overall Rating</p>
                    </div>
                </div>



                  </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 ">
                <div class="card p-2 mx-auto " >
                    <p class="p-2 mx-auto" style="font-size:14px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam urna purus, convallis ac augue vulputate, dictum consequat velit. Sed fermentum feugiat diam, vel suscipit enim</p>

    <div class="logo-box d-flex flex-wrap  align-items-center">
        <div>
            <img src="{{asset('user/img/pic/Ellipse 2.png')}}"  alt="">
        </div>
        <div class="ms-4">
            <h4 class="mb-0 pb-0">Amaan Black</h4>
            <h6 class="mt-0 pt-0">UI/UX Designer</h6>
        </div>
    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>






    <div class="container p-5 mt-2">
        <div class="d-flex justify-content-center">
        <div class="row col-12 text-center">
            <div class="col-lg-4 col-md-4 col-sm-12">
                <img src="{{asset('user/img/icon/Group 2608635.png')}}">
                <div class="mt-3">
                <h6>Best Price Guarantee</h6>
                <p style="font-size:14px;">Best Recommendations according to your Interest</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <img src="{{asset('user/img/icon/Group 2608636.png')}}">
                <div class="mt-3">
                <h6>Best Price Guarantee</h6>
                <p style="font-size:14px;">Best Recommendations according to your Interest</p>
            </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <img src="{{asset('user/img/icon/Group 2608634.png')}}">
                <div class="mt-3">
                <h6>Best Price Guarantee</h6>
                <p style="font-size:14px;">Best Recommendations according to your Interest</p>
                  </div>
            </div>
        </div>
    </div>
</div>



<div class="container-fluid mt-3">
    <div class="container-fluid d-flex justify-content-center p-4">
        <div class="row col-12">
            <div class="">
    <h3 style="font-size:30px;font-weight: bold;">Get Inspiration for your Next Trip</h3>
        <p>Find Inspirations here</p>
    </div>
            <div class="col-lg-4 col-md-4 col-sm-12 mt-2">
                <img src="{{('user/img/pic/p6.png')}}" style="width:100%;height:auto;" class="text-center">
                <div class="mt-2 p-2">
                    <h6>Booking Travel during Corona: Good Advice in an uncertain time</h6>
                    <p class="text-muted">05/02/2023</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 mt-2">
                <img src="{{('user/img/pic/p8.png')}}" style="border-radius:12px;width:100%;height:auto;" class="text-center">
                <div class="mt-2 p-2">
                    <h6>The Best Time & Places to see the Northern Lights in Iceland</h6>
                    <p class="text-muted">05/02/2023</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 mt-2">
                <img src="{{('user/img/pic/p7.png')}}" style="width:100%;height:auto;" class="text-center">
                <div class="mt-2 p-2">
                    <h6>10 European ski destinations you should visit this winter</h6>
                    <p class="text-muted">05/02/2023</p>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        var today = new Date().toISOString().split('T')[0];
        document.getElementById('check_in_date').setAttribute('min', today);
        document.getElementById('check_out_date').setAttribute('min', today);

        document.getElementById('check_in_date').addEventListener('change', function() {
            document.getElementById('check_out_date').setAttribute('min', this.value);

            // Reset check-out date if it's the same as or before check-in date
            if (document.getElementById('check_out_date').value <= this.value) {
                var nextDay = new Date(this.value);
                nextDay.setDate(nextDay.getDate() + 1);
                var nextDayFormatted = nextDay.toISOString().split('T')[0];
                document.getElementById('check_out_date').value = nextDayFormatted;
            }
        });

        document.getElementById('check_out_date').addEventListener('change', function() {
            if (this.value <= document.getElementById('check_in_date').value) {
                var nextDay = new Date(document.getElementById('check_in_date').value);
                nextDay.setDate(nextDay.getDate() + 1);
                var nextDayFormatted = nextDay.toISOString().split('T')[0];
                this.value = nextDayFormatted;
            }
        });
    });
</script>

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
            location.reload();
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

      <script>

	 $(document).ready(function() {
            $("#btn-status1").click(function() {
                $("#btn-status1").addClass("shd-bg");
                $("#btn-status2").removeClass("shd-bg");
                $("#status1").show();
                $("#status2").hide();
            });
            $("#btn-status2").click(function() {
                $("#btn-status1").removeClass("shd-bg");
                $("#btn-status2").addClass("shd-bg");
                $("#status2").show();
                $("#status1").hide();
            });
        })

     $(document).ready(function(){
  $("#heart").click(function(){
    if($("#heart").hasClass("liked")){
      $("#heart").html('<i class="fa fa-heart-o" aria-hidden="true"></i>');
      $("#heart").removeClass("liked");
    }else{
      $("#heart").html('<i class="fa fa-heart" aria-hidden="true"></i>');
      $("#heart").addClass("liked");
    }
  });
});

$('a.like-link').click(function() {
    var post = $(this).closest('.post');
    var id = post.attr('id');
    var oauth = post.attr('rel').slice(-8);
    var like = 'http://www.tumblr.com/like/'+oauth+'?id='+id;
    $('#likeit').attr('src', like);
    $(this).addClass('liked'); return
false;})


$(document).ready(function() {
    $(".heart").click(function() {
        if ($(this).hasClass("liked")) {
            $(this).html('<i class="fa fa-heart-o rounded-circle bg-light p-1" aria-hidden="true"></i>');
            $(this).removeClass("liked");
        } else {
            $(this).html('<i class="fa fa-heart rounded-circle bg-light p-1" aria-hidden="true"></i>');
            $(this).addClass("liked");
        }
    });
});



</script>

@endsection

