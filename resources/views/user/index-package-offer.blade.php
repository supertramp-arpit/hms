@extends('layouts.main2')
@section('main-container')
   <!-- END======================== HEADER ==========================-->
   </div>
   <div class="main">
      <div class="head_panel">
         <div style="background-image: url('{{ asset('assets/images/home-offer.jpg') }}')" class="full_width_photo vertical_center bg_vtop padding_top_half transparent_film">
            <div class="container">
               <div class="row">
                  <div class="col-md-8 col-md-offset-2 text_center">
                     <div class="caption caption_elegant">
                        <div class="inner">
                           <div class="t3 uppercase"> XENIA'S MONTHLY OFFER</div>
                           <div class="t1">THREE DAYS PACKAGE</div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <section class="white_section">
         <div class="container">
            <div class="col-md-6 col-md-offset-3 text_center margin_bottom_half">
               <div class="text_block">
                  <ul class="offer">
                     <li>
                        <div class="checkmark"> </div>Double room
                     </li>
                     <li>
                        <div class="checkmark"> </div>1 Aromatherapy
                     </li>
                     <li>
                        <div class="checkmark"> </div>Free Gym Access
                     </li>
                     <li>
                        <div class="checkmark"> </div>1 Luxury Dinner
                     </li>
                  </ul>
                  <ul class="offer">
                     <li>
                        <div class="checkmark"> </div>Access to Pool
                     </li>
                     <li>
                        <div class="checkmark"> </div>Parking
                     </li>
                     <li>
                        <div class="checkmark"> </div>Sports activities
                     </li>
                     <li>
                        <div class="checkmark"> </div>20% Online discount
                     </li>
                  </ul>
               </div>
               <hr class="margin_bottom_half">
            </div>
            <div class="col-md-12 text_center margin_bottom padding_bottom">
               <div class="text_block">
                  <p class="lead">All these, come together with an amazing price of -</p>
                  <h2>$ 799.99</h2><span>* PRICE EXCLUDING VAT</span><a href="{{ route('booking') }}" class="btn btn-primary filled margin_top_half">BOOK NOW</a>
               </div>
            </div>
            <div class="row vcenter margin_top_half">
               <div class="col-md-6 text_left">
                  <div class="text_block"><span>5-STAR QUALITY ROOM</span>
                     <h3>DOUBLE ROOM</h3>
                     <p>A wide range of remarkable unique tastes and feelings. Blessed That day you're dominion lesser cattle the lesser form sea earth won't. Morning made. Can't she'd days sixth beast spirit likeness. Also face Kind fowl so in seas. Gathered may stars land, his dry tree signs make place under signs him upon of rule fill light may deep that.</p><a href="{{ route('room-single') }}" class="btn btn-link">THE ROOM</a>
                  </div>
               </div>
               <div class="col-md-6 margin_bottom_half"><img src="{{ asset('assets/images/offer-image-1.jpg') }}" alt="Image" class="small_screen_margin_top_half"></div>
            </div>
            <div class="row vcenter">
               <div class="col-md-6 margin_bottom_half"><img src="{{ asset('assets/images/offer-image-2.jpg') }}" alt="Image"></div>
               <div class="col-md-6 text_left">
                  <div class="text_block"><span>RE-GAIN YOUR BATTERIES</span>
                     <h3>CALM &AMP; RELAXING SPA</h3>
                     <p>You can always enjoy your dinner privately. Blessed That day you're dominion lesser cattle the lesser form sea earth won't. Morning made. Can't she'd days sixth beast spirit likeness. Also face Kind fowl so in seas. Gathered may stars land, his dry tree signs make place under signs him upon of rule fill light may honestly amazing.</p><a href="{{ route('index-spa') }}" class="btn btn-link">SPA CENTER</a>
                  </div>
               </div>
            </div>
            <div class="row vcenter margin_top_half">
               <div class="col-md-6 text_left">
                  <div class="text_block"><span>REMARKABLE EXPERIENCE</span>
                     <h3>LUXURY DINNER</h3>
                     <p>Our experienced staff and our many years guarantee that you'll have a pleasant experience that you will never forget. Blessed That day you're dominion lesser cattle the lesser form sea earth won't. Morning made. Also face Kind fowl so in seas. Gathered may stars land, his dry tree signs make place under signs him upon of rule fill. To be cue or not to be cue is our main and only goal.</p><a href="{{ route('index-restaurant') }}" class="btn btn-link">OUR RESTAURANT</a>
                  </div>
               </div>
               <div class="col-md-6 margin_bottom_half"><img src="{{ asset('assets/images/restaurant-feature-3.jpg') }}" alt="Image" class="small_screen_margin_top_half"></div>
            </div>
         </div>
      </section>
      <section style="background-image: url('{{ asset('assets/images/offer-banner-1.jpg') }}');" class="dark_section text-center background_cover bg_vtop transparent_film">
         <div class="container">
            <div class="col-md-8 col-md-offset-2 margin_top_half">
               <div class="text_block">
                  <h2>ARE YOU EXCITED YET?</h2>
                  <p>Save money, with a special 20% discount which applies only if you book your room online.</p>
                  <img src="{{ asset('assets/images/decoration-1-inverted.png') }}" width="160" alt="Image" class="block">
                  <a href="{{ route('booking') }}" class="btn btn-white">BOOK NOW</a>
               </div>
            </div>
         </div>
      </section>
   </div>
   <!-- ============================ FOOTER ============================-->
   @endsection
