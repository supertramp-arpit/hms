@extends('layouts.main2')
@section('main-container')
   <!-- END======================== HEADER ==========================-->
   </div>
   <div class="main">
      <div class="head_panel">
         <div style="background-image: url('{{ asset('assets/images/home-packages.jpg') }}')" class="bg-primary py-4 d-flex justify-content-center align-items-center">
            <div class="container">
               <div class="row">
                  <div class="col-md-8 col-md-offset-2 text-center">
                     <div class="caption caption_elegant">
                        <div class="inner">
                           <div class="t3 uppercase"> XENIA'S ACTIVITIES</div>
                           <div class="t1">SPORTS &AMP; ACTIVITIES</div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <section class="light_section text-center">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="section_header elegant">
                     <h1>TONS OF ACTIVITIES</h1>
                     <p>FROM SPORTS TO SIGHTSEEING, WE HAVE IT ALL</p>
                     <img src="{{ asset('assets/images/decoration-1.png') }}" alt="Image">
                  </div>
               </div>
            </div>
            <div class="row vcenter margin_top_half">
               <div class="col-md-6 text-left">
                  <div class="text_block activities"><span>SPORTS</span>
                     <h3>ATTRACTIONS</h3>
                     <p>Discover everything we can provide you. Our courts and our sport facilities. Blessed That day you're dominion lesser cattle the lesser form sea earth won't. Morning made. Can't she'd days sixth beast spirit likeness. Also face Kind fowl so in seas.</p>
                     <div class="col-md-4 col-sm-6">
                        <div class="row"><i class="icon icon-Soccer"></i>
                           <h4>Soccer</h4>
                           <p>A soccer court for everyone to play.</p>
                        </div>
                     </div>
                     <div class="col-md-4 col-sm-6">
                        <div class="row"><i class="icon icon-TennisBall"></i>
                           <h4>TENNIS</h4>
                           <p>4 tennis courts inside the resort.</p>
                        </div>
                     </div>
                     <div class="col-md-4 col-sm-6">
                        <div class="row"><i class="icon icon-Bicycle"></i>
                           <h4>BIKE ROAD</h4>
                           <p>Private roads to bike your bicycle.</p>
                        </div>
                     </div>
                     <div class="col-md-4 col-sm-6">
                        <div class="row"><i class="icon icon-Pool"></i>
                           <h4>POOL</h4>
                           <p>Pool tabled for crazy shots</p>
                        </div>
                     </div>
                     <div class="col-md-4 col-sm-6">
                        <div class "row"><i class="icon icon-Footbal"></i>
                           <h4>FOOTBALL</h4>
                           <p>A football court for everyone.</p>
                        </div>
                     </div>
                     <div class="col-md-4 col-sm-6">
                        <div class="row"><i class="icon icon-Headset"></i>
                           <h4>TRACK</h4>
                           <p>A track for everyone to run.</p>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-md-6 margin_bottom_half">
                  <img src="{{ asset('assets/images/vacation-package-3.jpg') }}" class="small_screen_margin_top">
               </div>
            </div>
         </div>
      </section>
      <section style="background-image: url('{{ asset('assets/images/packages-banner-1.jpg') }}');" class="dark_section text-center background_cover bg_vbottom transparent_film">
         <div class="container">
            <div class="col-md-8 col-md-offset-2 margin_top_half">
               <div class="text_block">
                  <h2>FREE SPORTS FOR ALL</h2>
                  <p>You can book your room online, and automatically reserve a seat for all the sports activities in our 5-star sports fields. So do not wait, book your room now!</p>
                  <a href="{{ route('booking') }}" class="btn btn-white">BOOK NOW</a>
               </div>
            </div>
         </div>
      </section>
      <section class="white_section text-center">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="section_header elegant">
                     <h1>MOUNTAIN TRIP</h1>
                     <p>EXPLORE THE NATURAL BEAUTY</p>
                     <img src="{{ asset('assets/images/decoration-1.png') }}" alt="Image">
                  </div>
               </div>
            </div>
            <div class="row vcenter margin_top_half">
               <div class="col-md-6 text-left">
                  <div class="text_block"><span>WILD BEAUTY</span>
                     <h3>A MOUNTAIN WITH SEA VIEW</h3>
                     <p>A wide range of remarkable unique tastes and feelings. Blessed That day you're dominion lesser cattle the lesser form sea earth won't. Morning made. Can't she'd days sixth beast spirit likeness. Also face Kind fowl so in seas. Gathered may stars land, his dry tree signs make place under signs him upon of rule fill light may deep that.</p>
                     <a href="{{ route('location') }}" class="btn btn-link">OUR LOCATION</a>
                  </div>
               </div>
               <div class="col-md-6 margin_bottom_half small_screen_margin_top">
                  <img src="{{ asset('assets/images/vacation-package-1.jpg') }}" alt="Image">
               </div>
            </div>
            <div class="row vcenter">
               <div class="col-md-6 margin_bottom_half">
                  <img src="{{ asset('assets/images/vacation-package-2.jpg') }}" alt="Image">
               </div>
               <div class="col-md-6 text-left">
                  <div class="text_block"><span>PEOPLE GROUP</span>
                     <h3>WE TRAVEL AS A GROUP</h3>
                     <p>You can always enjoy your dinner privately. Blessed That day you're dominion lesser cattle the lesser form sea earth won't. Morning made. Can't she'd days sixth beast spirit likeness. Also face Kind fowl so in seas. Gathered may stars land, his dry tree signs make place under signs him upon of rule fill light may honestly amazing.</p>
                     <a href="{{ route('location') }}" class="btn btn-link">OUR LOCATION</a>
                  </div>
               </div>
            </div>
         </div>
      </section>
   </div>
   @endsection
