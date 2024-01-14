@extends('layouts.main2')
@section('main-container')
   <!-- END======================== HEADER ==========================-->
   </div>
   <div class="main">
      <div class="head_panel">
         <div style="background-image: url('{{ asset('assets/images/home-gym.jpg') }}')" class="bg-primary py-4 d-flex justify-content-center align-items-center">
            <div class="container">
               <div class="row">
                  <div class="col-md-8 col-md-offset-2 text-center">
                     <div class="caption caption_elegant">
                        <div class="inner">
                           <div class="t3 uppercase"> XENIA'S GYM</div>
                           <div class="t1">PRIVATE WORKOUT</div>
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
               <div class="section_header elegant">
                  <h1>XENIA RESORT GYM</h1>
                  <p>A MAGICAL WORKOUT WORLD</p>
                  <img src="{{ asset('assets/images/decoration-1.png') }}" alt="Image">
               </div>
            </div>
            <div class="col-md-4 text-center margin_top_half">
               <div class="icon_block"><i class="icon icon-Shaker"></i>
                  <h4>Keep fit</h4>
                  <p>Even in your holidays, you can spend 20 minutes to keep fit, in our modern gym.</p>
               </div>
            </div>
            <div class="col-md-4 text-center margin_top_half">
               <div class="icon_block"><i class="icon icon-Bicycle"></i>
                  <h4>EXERCISE MACHINES</h4>
                  <p>Our resort's gym is equipped with all the potential equipment you'll probably need.</p>
               </div>
            </div>
            <div class="col-md-4 text-center margin_top_half">
               <div class="icon_block"><i class="icon icon-Time"></i>
                  <h4>OPENING HOURS</h4>
                  <p>
                     Monday-Saturday:  <br>
                     9PM - 9AM
                  </p>
               </div>
            </div>
         </div>
      </section>
      <section class="light_section no_padding vcenter">
         <div class="container-fluid">
            <div class="row">
               <div class="col-md-6 col-lg-8">
                  <div class="row">
                     <div style="background-image: url('{{ asset('assets/images/gym-1.jpg') }}')" class="stretchy_wrapper ratio_16-9"></div>
                  </div>
               </div>
               <div class="col-md-6 col-lg-4 col-lg-pull-1">
                  <div class="row">
                     <div class="banner text_block"><span>MODERN EQUIPMENT</span>
                        <h2>EVERYTHING YOU'LL NEED</h2>
                        <p>They're seas gathering behold the years saying make and divide fill given whales fill female moved, blessed. Midst one from divide whales seasons cattle male own saying to night fruit own creeping second earth be lesser without deep beast female.</p>
                        <a href="{{ route('index-gym') }}" class="btn btn-black">EQUIPMENT LIST</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section class="light_section no_padding vcenter">
         <div class="container-fluid">
            <div class="row">
               <div class="col-md-6 col-lg-8 col-lg-push-4">
                  <div class "row">
                     <div style="background-image: url('{{ asset('assets/images/gym-2.jpg') }}')" class="stretchy_wrapper ratio_16-9"></div>
                  </div>
               </div>
               <div class="col-md-6 col-lg-4 col-lg-pull-7">
                  <div class="row">
                     <div class="banner text_block"><span>PROFESSIONAL STAFF</span>
                        <h2>PERSONAL TRAINERS</h2>
                        <p>They're seas gathering behold the years saying make and divide fill given whales fill female moved, blessed. Midst one from divide whales seasons cattle male own saying to night fruit own creeping second earth be lesser without deep beast female.</p>
                        <a href="{{ route('contact') }}" class="btn btn-black">GET TO KNOW THEM</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section class="white_section">
         <div class="container">
            <div class="col-md-12 text-center">
               <div class="section_header elegant">
                  <h1>LATEST POSTS </h1>
                  <img src="{{ asset('assets/images/decoration-1.png') }}" alt="image">
               </div>
            </div>
            <div class="col-md-4">
               <article class="post">
                  <figure><a href="#" title="Post"><img alt="Post with Slider" src="{{ asset('assets/images/gym-post-1.jpg') }}"></a></figure>
                  <span class="post_date">October 24, 2015</span>
                  <h2 class="post_title"><a href="#">TIPS ON MODERN HEALTHY LIFE</a></h2>
                  <div class="post_figure_and_info">
                     <div class="post_sub"><a href="#"><span class="post_info post_author">Henrik Pleth</span></a>
                     <a href="#22"><span class="post_info post_categories">News</span></a></div>
                  </div>
                  <a href="#" class="btn btn-black">Read More</a>
               </article>
            </div>
            <div class="col-md-4 small_screen_margin_top_half">
               <article class="post">
                  <figure><a href="#" title="Post"><img alt="Post with Slider" src="{{ asset('assets/images/gym-post-2.jpg') }}"></a></figure>
                  <span class="post_date">October 22, 2015</span>
                  <h2 class="post_title"><a href="#">WORKOUT IS FOR EVERYONE</a></h2>
                  <div class="post_figure_and_info">
                     <div class="post_sub"><a href="#"><span class="post_info post_author">Bailey Wonger</span></a>
                     <a href="#22"><span class="post_info post_categories">Accommodation</span></a></div>
                  </div>
                  <a href="#" class="btn btn-black">Read More</a>
               </article>
            </div>
            <div class "col-md-4 small_screen_margin_top_half">
               <article class="post">
                  <figure><a href="#" title="Post"><img alt="Post with Slider" src="{{ asset('assets/images/gym-post-3.jpg') }}"></a></figure>
                  <span class="post_date">October 19, 2015</span>
                  <h2 class="post_title"><a href="#">THE IMPORTANCE OF EXERCISE</a></h2>
                  <div class="post_figure_and_info">
                     <div class="post_sub"><a href="#"><span class="post_info post_author">Henrik Pleth</span></a>
                     <a href="#22"><span class="post_info post_categories">Stories</span></a></div>
                  </div>
                  <a href="#" class="btn btn-black">Read More</a>
               </article>
            </div>
         </div>
      </section>
   </div>
   <!-- ============================ FOOTER ============================-->
   @endsection
