

@extends('layouts.main4')
<style>
    /* CSS for the carousel images */
    .carousel-item img {
            width: 100%;
            height: 400px; /* Set a fixed height for uniformity */
            object-fit: cover; /* Ensures the image covers the entire container */
            border-radius: 15px; /* Apply rounded corners */
        }

        /* Set a fixed height for the carousel inner container */
        .carousel-inner {
            height: 600px; /* Adjust this value as needed */
         }
         .rounded-square-img {
    width:380px;
    height: 260px; /* Adjust height to match the width for a perfect square */
    overflow: hidden;
    border-radius: 12px;
}

</style>

@section('main-container')
<div class="container-fluid p-4 mt-4">
	<div class="d-flex justify-content-center">
		<div class="row col-12 d-flex align-items-center">
			<div class="col-lg-2 col-md-3 col-sm-12 my-auto" style="align-items: center;" id="se">
                @foreach($hotel->images as $image)
				<div class="my-2" style="height: 23%; width: 95%; overflow: hidden; border-radius: 15px;">
                    <img src="{{ asset($image->image_path) }}" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                {{-- <div class=" my-2" style="height:15%;width: 95%;">
					<img src="{{asset('user/img/pic/m3.png')}}" style="width:100%;height:100%;">
				</div>
				<div class="my-2" style="height:15%;width: 95%;">
					<img src="{{asset('user/img/pic/m4.png')}}" style="width:100%;height:100%;">
				</div>
				<div class="my-2" style="height:15%;width: 95%;">
					<img src="{{asset('user/img/pic/m5.png')}}" style="width:100%;height:100%;">
				</div> --}}
                @endforeach
			</div>

			<div class="col-lg-10 col-md-9 col-sm-12" style="height:auto;">
				<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        @foreach($hotel->images as $key => $item)
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{ $key }}" @if($key === 0) class="active" aria-current="true" @endif aria-label="Slide {{ $key + 1 }}"></button>
                        @endforeach
                    </div>
                    <div class="carousel-inner">
                        @foreach($hotel->images as $key => $item)
                        <div class="carousel-item @if($key === 0) active @endif" style="height: 100%;">
                            <img src="{{ asset($item->image_path) }}" class="d-block w-100" alt="..." style="height: 100%;">
                            <div class="box-cirle" id="slide">
                                <div class="d-flex align-items-center">

                                <div>
                                    <span class="bg-light p-2" style="border-radius:50%;"><i class="fa fa-share-alt rounded-circle bg-light p-1" aria-hidden="true" style="font-size:20px;"></i></span>
                                     </div>


                                  <div class="ms-2">
                                    <span id ="heart" class="bg-light p-2" style="border-radius:50%;"><i class="fa fa-heart-o rounded-circle bg-light p-1" aria-hidden="true" ></i> </span>
                                   </div>
                                <!-- Your content for each carousel item -->
                                </div>
                            </div>
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev" style="color:white;">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next" style="color:white;">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>

			</div>

		</div>
	</div>
</div>


<!-- Slider End -->

<div class="container-flui p-5 mt-3">
  <h1>{{ucwords($hotel->name)}}</h1>
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

  <div>
    <a class="navbar-brand " href="#" style="font-size:21px;">
      <i class="fa fa-map-marker" aria-hidden="true"&nbsp> </i> {{ \App\Models\City::find($hotel->city)->name }},{{ \App\Models\State::find($hotel->state)->name }}</a> <br/>
{{ucwords($hotel->address)}}
  </div>

  <div class="d-flex align-items-center">
    <div class="bg-light p-1 mt-3">
      <h5 id="ar">Free cancellation (24 Hours Prior)</h5>
    </div>
    <div class="bg-light p-1 mt-3 ms-4">
      <h5 id="ar">Instant confirmation</h5>
    </div>
  </div>

<div class="d-flex align-items-center mt-2">
    <div class="mt-3 p-2" id="en">
      <h5>TRENDING</h5>
    </div>
    <div class="p-2 mt-3 ms-4" id="en">
      <h5>OFFER ENDING SOON</h5>
    </div>
  </div>
</div>
 </div>
 <div class="d-flex justify-content-arround">
 	<div class="container-fluid p-5 mt-3">
 		<h3>Highlites</h3>
 		<p style="font-size: 22px;">Overview</p>
 		<div class="row">
 			<p id="arp">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris purus dui, bibendum placerat dignissim vitae, accumsan vel lacus. Maecenas sit amet leo nec eros lobortis commodo in sed ante. Etiam cursus, ligula ut tempus ultricies, ligula quam vehicula nibh, sed varius lacus tellus ut magna. Duis dignissim dolor a orci blandit mollis.</p>
 		</div>
 		<p style="font-size: 22px;font-weight: bold;">Highlites</p>
 		<div class="row">
 			<li class="mt-2" id="arp">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris purus dui, bibendum placerat dignissim vitae, accumsan vel lacus. </li>
 			<li class="mt-2" id="arp">Maecenas sit amet leo nec eros lobortis commodo in sed ante. Etiam cursus, ligula ut tempus ultricies, ligula quam vehicula nibh, sed varius lacus tellus ut magna.</li>
 			<li class="mt-2" id="arp">Duis dignissim dolor a orci blandit mollis. Aenean quis tortor eget neque commodo pellentesque ac non risus. Maecenas sed dapibus ante. </li>
 			<li class="mt-2" id="arp">In lacus libero, sodales vitae viverra ut, imperdiet feugiat sapien. Etiam metus turpis, aliquet ut massa in, maximus convallis eros. Nam vitae nisi mattis, malesuada neque nec, pulvinar velit.</li>
 			<li class="mt-2" id="arp">Aliquam fringilla dolor vitae lorem condimentum dapibus. Suspendisse condimentum turpis nibh, vel egestas velit vestibulum eu. Integer consequat gravida ultricies. </li>
 		</div>
 		<p class="mt-2" style="font-size: 22px;font-weight: bold;">What to bring</p>
 		<li>A valid Identity Proof</li>

 		<p class="mt-2" style="font-size: 22px;font-weight: bold;">Inclusive of</p>
 		<li>Lorem Ipsum</li>
 		<li>Lorem Ipsum</li>
 		<li>Lorem Ipsum</li>

 		<p class="mt-2" style="font-size: 22px;font-weight: bold;">NonInclusive of</p>
 		<li>Lorem Ipsum</li>
 		<li>Lorem Ipsum</li>
 		<li>Lorem Ipsum</li>

 		<p class="mt-2" style="font-size: 22px;font-weight: bold;">Taxes :</p>
 		<li style="font-size:15px;" id="arp">Rates are subject to 10% service charge, 6% tourism fee, 4% municipality fee and  destination fee per night per room are payable to the resort upon check-in</li>

 		<p class="mt-2" style="font-size: 22px;font-weight: bold;">Conditions:</p>
 		<li>Valid until 30 September, 2023.</li>
 		<li>Not valid on public holidays & special events.</li>
 		<li id="arp">For availability & bookings please WhatsApp Cobone reservations team on +97145562099, daily between 10:30 am to 07:30 pm</li>


 	</div>
 </div>

   <!-- C A R D -->

   	<div class="d-flex justify-content-center">
   		<div class="container mt-5">
   			<div class="container ">
          <h2>Reviews & Feedback</h2>
   			<div class="card p-3 mt-4">
   			<div class="row col-12 mx-auto">
   				<div class="col-lg-4 col-md-4 col-sm-12 ">
            <div class="d-flex align-items-center">
              <div class="text-center ">
              <button type="button" class="btn " style="background-color:#FE3400; color:white;font-size: 20px;">4.5  <img src="{{asset('user/img/pic/Star.png')}}"></button>
            </div>
            </div>

            <div class="mt-2 mx-auto">
              <h5>Execellent</h5>
            </div>

            <div class="mt-2">
              <p style="color:#FE3400;font-weight: bold;">(1.5K reviews)</p>
            </div>


             <div class="d-flex vr ms-auto" style="height:25vh;margin-top:-115px;margin-right: 180px;"></div>
   				</div>
   				<div class="col-lg-8 col-md-8 col-sm-12">


   					<div class="row d-flex col-12 mt-2">
   						<div class="col-lg-2 col-md-3">
   							<h6>Execellent</h6>
   						</div>
   						<div class="col-lg-9 col-md-8">
   							<div class="progress">
                 <div class="progress-bar " role="progressbar" style="width:50%;background: #2ECC71;border-radius: 10px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
   						</div>

   						<div class="col-lg-1 col-md-1 col-sm-1">
   							<h6>1</h6>
   						</div>
   					</div>

   					<div class="row d-flex col-12 mt-2">
   						<div class="col-lg-2 col-md-3">
   							<h6>Very Good</h6>
   						</div>
   						<div class="col-lg-9 col-md-8">
   							<div class="progress">
                 <div class="progress-bar " role="progressbar" style="width:50%;background: #2ECC71;border-radius: 10px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
   						</div>

   						<div class="col-lg-1 col-md-1 col-sm-1">
   							<h6>1</h6>
   						</div>
   					</div>

   					<div class="row d-flex col-12 mt-2">
   						<div class="col-lg-2 col-md-3">
   							<h6>Average</h6>
   						</div>
   						<div class="col-lg-9 col-md-8">
   							<div class="progress">
  <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
</div>
   						</div>

   						<div class="col-lg-1 col-md-1 col-sm-1">
   							<h6>0</h6>
   						</div>
   					</div>

   					<div class="row d-flex col-12 mt-2">
   						<div class="col-lg-2 col-md-3">
   							<h6>Poor</h6>
   						</div>
   						<div class="col-lg-9 col-md-8">
   							<div class="progress">
  <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
</div>
   						</div>

   						<div class="col-lg-1 col-md-1 col-sm-1">
   							<h6>0</h6>
   						</div>
   					</div>

   					<div class="row d-flex col-12 mt-2">
   						<div class="col-lg-2 col-md-3">
   							<h6>Terrible</h6>
   						</div>
   						<div class="col-lg-9 col-md-8">
   							<div class="progress">
  <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
</div>
   						</div>

   						<div class="col-lg-1 col-md-1 col-sm-1">
   							<h6>0</h6>
   						</div>
   					</div>



   				</div>
   			</div>
   		</div>
   	</div>
   	</div>
   </div>

   <!--  N E W Section -->

   <div class="container-fluid p-4 mx-auto">
     <div class="d-flex align-items-center">
       <div>
         <img src="{{asset('user/img/icon/avatar.png')}}" height="70vh" alt="">
       </div>

             <div>
            <h6 class="mb-0 ms-2 pb-0">Patel Bhaiii</h6>
            <div class="d-inline d-flex mt-0 ms-2 pt-0">
              <div>
                <img src="{{asset('user/img/icon/star-shape.png')}}">
            </div>
                <div class="ms-1">
                    <img src="{{asset('user/img/icon/star-shape.png')}}">
            </div>
            <div class="ms-1">
                <img src="{{asset('user/img/icon/star-shape.png')}}">
            </div>
            <div class="ms-1">
                <img src="{{asset('user/img/icon/star-shape.png')}}">
            </div>
            <div class="ms-1">
                <img src="{{asset('user/img/icon/star-shape.png')}}">
            </div>

            <div class="ms-2">
              <h5>4.0</h5>
            </div>
            </div>
          </div>



        </div>
        <div class="text-end pt-0 mb-0">
            <h6>1 Day ago</h6>
          </div>

          <div class="container-fluid mt-2 border-bottom">
  <h5>Good location, quality should be better</h5>
    <p id="arp">Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te</p>
 </div>
      </div>


      <!-- NEW SECTION End -->



      <!-- section 2 -->

      <div class="container-fluid p-4 mx-auto">
     <div class="d-flex align-items-center">
       <div>
         <img src="{{asset('user/img/icon/avatar.png')}}" height="70vh" alt="">
       </div>

             <div>
            <h6 class="mb-0 ms-2 pb-0">Patel Bhaiii</h6>
            <div class="d-inline d-flex mt-0 ms-2 pt-0">
              <div>
                <img src="{{asset('user/img/icon/star-shape.png')}}">
            </div>
                <div class="ms-1">
                    <img src="{{asset('user/img/icon/star-shape.png')}}">
            </div>
            <div class="ms-1">
                <img src="{{asset('user/img/icon/star-shape.png')}}">
            </div>
            <div class="ms-1">
              <img src="{{asset('user/img/icon/star-shape.png')}}">
            </div>
            <div class="ms-1">
                <img src="{{asset('user/img/icon/star-shape.png')}}"style="opacity:0.3">
            </div>

            <div class="ms-2">
              <h5>4.0</h5>
            </div>
            </div>
          </div>



        </div>
        <div class="text-end pt-0 mb-0">
            <h6>1 Day ago</h6>
          </div>

          <div class="container-fluid mt-2 border-bottom">
  <h5>Good location, quality should be better</h5>
    <p id="arp">Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te</p>
 </div>
      </div>

      <!-- section end -->


      <!-- section 1 -->

      <div class="container-fluid p-4 mx-auto">
     <div class="d-flex align-items-center">
       <div>
         <img src="{{asset('user/img/icon/avatar.png')}}" height="70vh" alt="">
       </div>

             <div>
            <h6 class="mb-0 ms-2 pb-0">Patel Bhaiii</h6>
            <div class="d-inline d-flex mt-0 ms-2 pt-0">
              <div>
                <img src="{{asset('user/img/icon/star-shape.png')}}">
            </div>
                <div class="ms-1">
                    <img src="{{asset('user/img/icon/star-shape.png')}}">
            </div>
            <div class="ms-1">
                <img src="{{asset('user/img/icon/star-shape.png')}}">
            </div>
            <div class="ms-1">
                <img src="{{asset('user/img/icon/star-shape.png')}}">
            </div>
            <div class="ms-1">
                <img src="{{asset('user/img/icon/star-shape.png')}}" style="opacity:0.3">
            </div>

            <div class="ms-2">
              <h5>4.0</h5>
            </div>
            </div>
          </div>



        </div>
        <div class="text-end pt-0 mb-0">
            <h6>1 Day ago</h6>
          </div>

          <div class="container-fluid mt-2 border-bottom">
  <h5>Good location, quality should be better</h5>
    <p id="arp">Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te</p>
 </div>
      </div>

      <!-- section 2 end -->







   <!--- DEALS -->

   <div class="d-flex justify-content-center mt-4">
    <div class="container-fluid p-3">
       <div class="row col-12 mx-auto">
        <div>
         <h2>Our Rooms</h2>
    <p>Daily Adventures, Daily Savings</p>
       </div>

       @foreach($roomTypes as $roomType)

           <div class="col-lg-4 col-md-4 col-sm-12">
               <div class="card border-0 mt-4">

                <a href="{{ route('room', ['id' => $roomType->id]) }}" class="mt-5" style="text-decoration: none; color: inherit;">
                <img src="{{ asset('Cms/Roomimage/' . $roomType->roomImages->first()->images) }}" alt="best-service" class="rounded-square-img"></a>



         </div>

          <div class="mt-3">
            <a href="{{ route('room', ['id' => $roomType->id]) }}" class="mt-5" style="text-decoration: none; color: inherit;">

            <h5>{{ucwords( $roomType->name)}}</h5>
            </a>
    {{-- <a class="navbar-brand " href="#" style="font-size:21px;">

      <i class="fa fa-map-marker" aria-hidden="true"></i> Lucknow</a> --}}
  </div>

         <div class="d-flex align-items-center mt-3">
             <div>
                 <h6><span class="p-1" id="hom" style="background: linear-gradient(180deg, #FE9000 0%, #FF3500 100%);width: 30%;border-radius:6px;color: white;"> 4.2 <img src="{{asset('user/img/pic/Star.png')}}"></span></h6>
             </div>

             <div class="ms-2">
                 <h6>Execellent<span class="text-muted"> 4 Reviews</span></h6>
             </div>
         </div>

         <div class="mt-3">
             <h4>₹ {{$roomType->rent_per_night}} <span class="p-1 ms-2" style="background: linear-gradient(180deg, #FE9000 0%, #FF3500 100%);border-radius:6px;color: white;font-size: 14px;"> 23 % OFF</span></h4>
         </div>
           </div>
@endforeach





           {{-- <div class="col-lg-4 col-md-4 col-sm-12">
               <div class="card border-0 mt-4">
             <img src="{{asset('user/img/pic/a1.png')}}"  style="width:100% height:100%;"alt="best-service">
             <div class="" id="slide">
        <span id ="heart" class="bg-light p-2" style="border-radius:50%;"><i class="fa fa-heart-o rounded-circle bg-light p-1" aria-hidden="true" ></i> </span>
       </div>
         </div>

         <div class="mt-3">
    <a class="navbar-brand " href="#" style="font-size:21px;">
      <i class="fa fa-map-marker" aria-hidden="true"></i> Lucknow</a>
  </div>

         <div class="d-flex align-items-center mt-3">
             <div>
                 <h6><span class="p-1" id="hom" style="background: linear-gradient(180deg, #FE9000 0%, #FF3500 100%);width: 30%;border-radius:6px;color: white;"> 4.2 <img src="{{asset('user/img/pic/Star.png')}}"></span></h6>
             </div>

             <div class="ms-2">
                 <h6>Execellent<span class="text-muted"> 4 Reviews</span></h6>
             </div>
         </div>

         <div class="mt-3">
             <h4>₹ 1800 <span class="p-1 ms-2" style="background: linear-gradient(180deg, #FE9000 0%, #FF3500 100%);border-radius:6px;color: white;font-size: 14px;"> 23% OFF</span></h4>
         </div>


           </div>


           <div class="col-lg-4 col-md-4 col-sm-12">
          <div class="card border-0 mt-4">
             <img src="{{asset('user/img/pic/a2.png')}}"  style="width:100% height:100%;"alt="best-service">
             <div class="" id="slide">
        <span id ="heart" class="bg-light p-2" style="border-radius:50%;"><i class="fa fa-heart-o rounded-circle bg-light p-1" aria-hidden="true" ></i> </span>
       </div>
         </div>

          <div class="mt-3">
    <a class="navbar-brand " href="#" style="font-size:21px;">
      <i class="fa fa-map-marker" aria-hidden="true"></i> Lucknow</a>
  </div>

         <div class="d-flex align-items-center mt-3">
             <div>
                 <h6><span class="p-1" id="hom" style="background: linear-gradient(180deg, #FE9000 0%, #FF3500 100%);width: 30%;border-radius:6px;color: white;"> 4.2 <img src="{{asset('user/img/pic/Star.png')}}"></span></h6>
             </div>

             <div class="ms-2">
                 <h6>Execellent<span class="text-muted"> 4 Reviews</span></h6>
             </div>

         </div>

         <div class="mt-3">
             <h4>₹ 1800 <span class="p-1 ms-2" style="background: linear-gradient(180deg, #FE9000 0%, #FF3500 100%);border-radius:6px;color: white;font-size: 14px;"> 23 % OFF</span></h4>
         </div> --}}


           </div>



       </div>
    </div>
</div>







 <script>

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

    </script>

@endsection






