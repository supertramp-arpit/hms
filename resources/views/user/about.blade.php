
@extends('layouts.main4')

@section('main-container')
<div class="about" id="about2" style="background: url('{{ asset('user/img/pic/abt.png') }}');background-repeat: no-repeat; background-size: cover; height: 60vh; align-items: center;">

	<div class="d-flex justify-content-center">
		<div class="container">
			<div class="row mx-auto mt-3">
				<div class="col-lg-8 col-md-8 col-sm-12">
					<h2 class="text-white mt-5">About Website Name</h2>
					<p class="text-white mt-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris purus dui, bibendum placerat dignissim vitae, accumsan vel lacus. Maecenas sit amet leo nec eros lobortis commodo in sed ante. Etiam cursus, ligula ut tempus ultricies, ligula quam vehicula nibh, sed varius lacus tellus ut magna. Duis dignissim dolor a orci blandit mol</p>

					<p class="mt-2 text-white">
						Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris purus dui, bibendum placerat dignissim vitae, accumsan vel lacus. Maecenas sit amet leo nec eros lobortis commodo in sed ante. Etiam cursus, ligula ut tempus ultricies, ligula quam vehicula varius lacus tellus ut magna. Duis dignissim dolor a orci blandit mollis.
					</p>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-12 text-center">
					<div class="mx-auto " style="margin-top:10vh;" id="about">
						<img src="{{('user/img/pic/abt1.png')}}" width="100%" height="100%">
					</div>
				</div>
			</div>

		</div>
	</div>
</div>

<!-- CARD-->

<div class="mt-5" id="about1">
<div class="d-flex justify-content-center mt-5">
	<div class="container">
		<div class="row mx-auto">
			<div class="col-lg-6 col-md-6 col-sm-12 mt-5">
				<div class="card p-3" style="border-radius: 16px;background: #E8F0FF;width: 100%;height: 100%;">
					<h5 class="mt-2">Our Mission</h5>
					<p class="mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris purus dui, bibendum placerat dignissim vitae, accumsan vel lacus. Maecenas sit amet leo nec eros lobortis commodo in sed ante. Etiam cursus, ligula ut tempus ultricies, ligula quam vehicula nibh, sed varius lacus tellus ut magna. Duis dignissim dolor a orci blandit mollis.</p>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-12 mt-5">
				<div class="card p-3" style="border-radius: 16px;background: #E8F0FF;width: 100%;height: 100%;">
					<h5 class="mt-2">Our Vision</h5>
					<p class="mt-2">
						Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris purus dui, bibendum placerat dignissim vitae, accumsan vel lacus. Maecenas sit amet leo nec eros lobortis commodo in sed ante. Etiam cursus, ligula ut tempus ultricies, ligula quam vehicula nibh, sed varius lacus tellus ut magna. Duis dignissim dolor a orci blandit moll
					</p>
				</div>
			</div>
		</div>

	</div>
</div>


<div class="d-flex justify-content-center mt-5">
	<div class="container">
		<div class="row mx-auto mt-4">
			<div class="col-lg-6 col-md-6 col-sm-12">
				<div class="text-center">
					<img src="{{('user/img/pic/a3.png')}}" width="100%" height="100%">
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-12">
				<h5 class="mt-5">Choose from 20,000+ different Hotels</h5>
				<p class="mt-2" style="text-align: justify;">
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris purus dui, bibendum placerat dignissim vitae, accumsan vel lacus. Maecenas sit amet leo nec eros lobortis commodo in sed ante. Etiam cursus, ligula ut tempus ultricies, ligula quam vehicula nibh, sed varius lacus tellus ut magna. Duis dignissim dolor a orci blandit mollis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris purus dui, bibendum placerat dignissim vitae, accumsan vel lacus. Maecenas sit amet leo nec eros lobortis commodo in sed ante.
				</p>
			</div>
		</div>

	</div>
</div>
</div>


                <!--  B O X  Circle -->

<div class="d-flex justify-content-center mt-5">
	<div class="container mx-auto ">
		<div class="row text-center  mt-4">
			<div class="col-lg-2 col-md-2 col-sm-12">
				<div class="box-circle mx-auto mt-2">
					<img src="{{('user/img/icon/UsersThree.png')}}">
				</div>
				  <div class=" mx-auto mt-2">
						<h6>1000 Employees</h6>
				  </div>
			</div>

			<div class="col-lg-3 col-md-2 col-sm-12">
				<div class="box-circle mx-auto mt-2">
					<img src="{{asset('user/img/icon/user 2.png')}}">
				</div>
				<div class="mt-2 mx-auto">
						<h6>Attract new customers</h6>
					</div>
			</div>

			<div class="col-lg-2 col-md-2 col-sm-12">
				<div class="box-circle mx-auto mt-2">
					<img src="{{asset('user/img/icon/Smiley.png')}}">
				</div>
				<div class="mt-2 mx-auto">
						<h6>4k+ Happy Customers</h6>
					</div>
			</div>

			<div class="col-lg-3 col-md-2 col-sm-12">
				<div class="box-circle mx-auto mt-2">
					<img src="{{asset('user/img/icon/Bed.png')}}">
				</div>
				<div class="mt-2 mx-auto">
						<h6>20k+ Different Hotels</h6>
					</div>
			</div>

			<div class="col-lg-2 col-md-2 col-sm-12">
				<div class="box-circle mx-auto mt-2">
					<img src="{{asset('user/img/icon/customer service.png')}}">
				</div>
				<div class="mt-2 mx-auto">
						<h6>24*7 Customer Suppor</h6>
					</div>
			</div>

		</div>

	</div>
</div>

                <!--  B O X  Circle End -->

<div class="container mt-5">
	<h3>Our Leadership Team</h3>
   <div class="owl-carousel owl-theme mt-5">
    <div class="item">
    	<img src="{{asset('user/img/pic/lea.png')}}" width="100%" height="100%">
    </div>
    <div class="item">
        <img src="{{asset('user/img/pic/lea1.png')}}" width="100%" height="100%">
    </div>
    <div class="item">
    	<img src="{{asset('user/img/pic/lea2.png')}}" width="100%" height="100%">
    </div>
    <div class="item">
        <img src="{{asset('user/img/pic/lea3.png')}}" width="100%" height="100%">
    </div>
    <div class="item">
        <img src="{{asset('user/img/pic/lea4.png')}}" width="100%" height="100%">
    </div>

                        <!-- ITEM 2 -->

    <div class="item">
        <img src="{{asset('user/img/pic/lea.png')}}" width="100%" height="100%">
    </div>
    <div class="item">
        <img src="{{asset('user/img/pic/lea1.png')}}" width="100%" height="100%">
    </div>
    <div class="item">
        <img src="{{asset('user/img/pic/lea2.png')}}" width="100%" height="100%">
    </div>
    <div class="item">
        <img src="{{asset('user/img/pic/lea3.png')}}" width="100%" height="100%">
    </div>
    <div class="item">
    	<img src="{{asset('user/img/pic/lea4.png')}}" width="100%" height="100%">
    </div>

                        <!-- ITEM 2 End-->

</div>
</div>



<script type="text/javascript">
	$('.owl-carousel').owlCarousel({
    loop:true,
    margin:40,
    nav:true,
    autoplay:true,
    autoplayTimeout:1000,
    dots:true,
    stagePadding:100,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
});
</script>



@endsection





