@extends('layouts.main2')
@section('main-container')
   <!-- END======================== HEADER ==========================-->
   </div>
   <div class="main">
      <div class="head_panel">
         <div style="background-image: url('{{ asset('assets/images/home-restaurant-2.jpg') }}')" class="full_width_photo vertical_center bg_vbottom padding_top_half transparent_film">
            <div class="container">
               <div class="row">
                  <div class="col-md-8 col-md-offset-2 text-center">
                     <div class="caption caption_elegant">
                        <div class="inner">
                           <div class="t3 uppercase"> XENIA'S RESTAURANT</div>
                           <div class="t1">EXOTIC FOOD TASTES</div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <section class="white_section">
         <div class="container">
            <div class="col-md-12 text-center">
               <div class="section_header overlay"><span>XENIA</span>
                  <h1>XENIA RESTAURANT</h1>
                  <p>ONE OF THE BEST PLACES TO TASTE.. EVERYTHING</p><img src="{{ asset('assets/images/decoration-1.png') }}" alt="Image">
               </div>
            </div>
            <div class="col-md-10 col-md-offset-1 text-center margin_bottom">
               <div class="text_block">
                  <h3>TASTEFUL EXPERIENCES SINCE '98.</h3>
                  <p>Our restaurant is exceptional. Us lesser doesn't them tree night, creature itself second gathered good moving Image saying which itself of she'd gathering thing. Creepeth. Subdue dominion open fruit signs lights the itself face tree spirit the creature whose air fifth creeping waters earth, life the two. Sixth they're bearing don't so called cattle, herb waters sea air us abundantly grass fowl for don't thing void man whales our days don't fowl firmament for great let may dominion own us which. Thing give fruitful Seas divided was make isn't You're. Shall green void shall. Fifth whales their life which.</p>
                  <p>Yours truly,<small>Steven.</small></p>
                  <div class="footer"><img src="{{ asset('assets/images/avatar-5.jpg') }}" width="70" alt="Image" class="img-circle"><span>STEVEN ALVARO<small>HEAD CHEF</small></span></div>
               </div>
            </div>
         </div>
      </section>
      <section class="light_section no_padding vcenter">
         <div class="container-fluid">
            <div class="row">
               <div class="col-md-6 col-lg-8">
                  <div class="row">
                     <div style="background-image: url('{{ asset('assets/images/banner-2.jpg') }}')" class="stretchy_wrapper ratio_16-9"></div>
                  </div>
               </div>
               <div class="col-md-6 col-lg-4 col-lg-pull-1">
                  <div class="row">
                     <div class="banner text_block"><span>FAMOUS WINES</span>
                        <h2>WINE TASTING</h2>
                        <p>They're seas gathering behold the years saying make and divide fill given whales fill female moved, blessed. Midst one from divide whales seasons cattle male own saying to night fruit own creeping second earth be lesser without deep beast female.</p><a href="{{ route('index-restaurant') }}" class="btn btn-black">OUR MENU</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section class="white_section text-center">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="section_header elegant">
                     <h1>FINEST FOOD HOUSE</h1>
                     <p>ORIGINAL AND TRANDITIONAL ITALIAN FOOD</p><img src="{{ asset('assets/images/decoration-1.png') }}" alt="Image">
                  </div>
               </div>
            </div>
            <div class="row vcenter margin_top_half">
               <div class="col-md-6 text-left">
                  <div class="text_block"><span>ITALIAN CUISINE</span>
                     <h3>PASTA AND VEGETABLES</h3>
                     <p>A wide range of remarkable unique tastes and feelings. Blessed That day you're dominion lesser cattle the lesser form sea earth won't. Morning made. Can't she'd days sixth beast spirit likeness. Also face Kind fowl so in seas. Gathered may stars land, his dry tree signs make place under signs him upon of rule fill light may deep that.</p><a href="{{ route('index-restaurant') }}" class="btn btn-link">OUR MENU</a>
                  </div>
               </div>
               <div class="col-md-6 margin_bottom_half"><img src="{{ asset('assets/images/restaurant-feature-1.jpg') }}" alt="Image" class="small_screen_margin_top_half"></div>
            </div>
            <div class="row vcenter">
               <div class="col-md-6 margin_bottom_half"><img src="{{ asset('assets/images/restaurant-feature-2.jpg') }}" alt="Image"></div>
               <div class="col-md-6 text-left">
                  <div class="text_block"><span>RESERVE A TABLE</span>
                     <h3>PRIVATE DINNING</h3>
                     <p>You can always enjoy your dinner privately. Blessed That day you're dominion lesser cattle the lesser form sea earth won't. Morning made. Can't she'd days sixth beast spirit likeness. Also face Kind fowl so in seas. Gathered may stars land, his dry tree signs make place under signs him upon of rule fill light may honestly amazing.</p><a href="{{ route('booking') }}" class="btn btn-link">BOOK NOW</a>
                  </div>
               </div>
            </div>
            <div class="row vcenter">
               <div class="col-md-6 text-left small_screen_margin_top_half">
                  <div class="text_block"><span>WE GUARANTEE</span>
                     <h3>A REMARKABLE EXPERIENCE</h3>
                     <p>Our experienced staff and our many years guarantee that you'll have a pleasant experience that you will never forget. Blessed That day you're dominion lesser cattle the lesser form sea earth won't. Morning made. Also face Kind fowl so in seas. Gathered may stars land, his dry tree signs make place under signs him upon of rule fill. To be cue or not to be cue is our main and only goal.</p><a href="{{ route('index-restaurant') }}" class="btn btn-link">OUR MENU</a>
                  </div>
               </div>
               <div class="col-md-6 margin_bottom_half"><img src="{{ asset('assets/images/restaurant-feature-3.jpg') }}" alt="Image" class="small_screen_margin_top_half"></div>
            </div>
         </div>
      </section>
      <section style="background-image: url('{{ asset('assets/images/restaurant-banner-1.jpg') }}');" class="dark_section text-center background_cover bg_vbottom">
         <div class="container">
            <div class="col-md-8 col-md-offset-2 margin_top_half">
               <div class="text_block">
                  <h2>HAVE A ROOM? HAVE A SEAT</h2>
                  <p>You can book your room online, and if your room supports it, automatically reserve a seat for dinner in our 5-star gourme restaurant. So do not wait, book your room now!</p><a href="{{ route('booking') }}" class="btn btn-white">BOOK NOW</a>
               </div>
            </div>
         </div>
      </section>
   </div>
   <!-- ============================ FOOTER ============================-->
   @endsection
