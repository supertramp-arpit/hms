@extends('layouts.main2')

@section('main-container')
   <!-- END======================== HEADER ==========================-->
   </div>
   <div class="main">
      <div class="head_panel">
         <div style="background-image: url('{{ asset('assets/images/home-spa.jpg') }}')" class="bg-primary py-4 d-flex justify-content-center align-items-center">

            <div class="container">
               <div class="row">
                  <div class="col-md-8 col-md-offset-2 text-center">
                     <div class="caption caption_elegant">
                        <div class="inner">
                           <div class="t3 uppercase"> XENIA'S SPA</div>
                           <div class="t1">RELAX &amp; REJUVENATE</div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <section class="light_section">
         <div class="container">
            <div class="col-md-12 text-center">
                <div class="section_header overlay"><span>TREATMENTS</span>
                  <h1>SPA CENTER PACKAGES</h1>
                  <p>CAREFULLY CRAFTED SETS OF RELAXATION </p><img src="{{ asset('assets/images/decoration-1.png') }}" alt="Image">
               </div>
            </div>
            <div class="col-md-6">
               <figure><a href="{{ route('spa-treatment-details') }}" class="linkify"><img src="{{ asset('assets/images/spa-service-1.jpg') }}" alt="Image"></a></figure>
               <div class="text_block"><span>$70</span><a href="{{ route('spa-treatment-details') }}" class="linkify">
                  <h3>Aromatherapy</h3></a>
                  <p>Seas wherein wherein deep, very don't. Which also creeping. Light. Can't he made likeness. Together itself you rule is face appear, dry good. Years divide him female blessed light.</p>
                  <div class="inline_block"><i class="icon icon-Timer"></i>
                     <p>40 minutes</p>
                  </div>
               </div>
            </div>
            <div class="col-md-6">
               <figure><a href="{{ route('spa-treatment-details') }}" class="linkify"><img src="{{ asset('assets/images/spa-service-2.jpg') }}" alt="Image"></a></figure>
               <div class="text_block"><span>$80</span><a href="{{ route('spa-treatment-details') }}" class="linkify">
                  <h3>Rejuvenating Facial</h3></a>
                  <p>Seas wherein wherein deep, very don't. Which also creeping. Light. Can't he made likeness. Together itself you rule is face appear, dry good. Years divide him female blessed light.</p>
                  <div class="inline_block"><i class="icon icon-Timer"></i>
                     <p>30 minutes</p>
                  </div>
               </div>
            </div>
            <div class="col-md-6">
               <figure><a href="{{ route('spa-treatment-details') }}" class="linkify"><img src="{{ asset('assets/images/spa-service-3.jpg') }}" alt="Image"></a></figure>
               <div class="text_block"><span>$50</span><a href="{{ route('spa-treatment-details') }}" class="linkify">
                  <h3>Radicals Treatment</h3></a>
                  <p>Seas wherein wherein deep, very don't. Which also creeping. Light. Can't he made likeness. Together itself you rule is face appear, dry good. Years divide him female blessed light.</p>
                  <div class="inline_block"><i class="icon icon-Timer"></i>
                     <p>25 minutes</p>
                  </div>
               </div>
            </div>
            <div class="col-md-6">
               <figure><a href="{{ route('spa-treatment-details') }}" class="linkify"><img src="{{ asset('assets/images/spa-service-4.jpg') }}" alt="Image"></a></figure>
               <div class="text_block"><span>$100</span><a href="{{ route('spa-treatment-details') }}" class="linkify">
                  <h3>Puffiness Treatment</h3></a>
                  <p>Seas wherein wherein deep, very don't. Which also creeping. Light. Can't he made likeness. Together itself you rule is face appear, dry good. Years divide him female blessed light.</p>
                  <div class="inline_block"><i class="icon icon-Timer"></i>
                     <p>50 minutes</p>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section style="background-image: url('{{ asset('assets/images/spa-banner-1.jpg') }}');" class="dark_section text-center background_cover bg_vbottom transparent_film">
         <div class="container">
            <div class="col-md-8 col-md-offset-2 margin_top_half">
               <div class="text_block">
                  <h2>YOU'R GREAT ESCAPE</h2>
                  <p>We believe that in order to experience the full experience of relaxed vacation, it is essential to let yourself completely stress-free and feel another level of relaxation. Xenia's resort Spa is a place which you can easily accomplish that.</p>
                  <a href="{{ route('booking') }}" class="btn btn-white">BOOK NOW</a>
               </div>
            </div>
         </div>
      </section>
      <section class="light_section">
         <div class="container">
            <div class="col-md-12 text-center">
               <div class="section_header elegant">
                  <h1>LATEST POSTS</h1><img src="{{ asset('assets/images/decoration-1.png') }}" alt="Image">
               </div>
            </div>
            <div class="col-md-4">
               <article class="post">
                  <figure><a href="#" title="Post"><img alt="Post" src="{{ asset('assets/images/spa-post-1.jpg') }}"></a></figure>
                  <span class="post_date">October 24, 2015</span>
                  <h2 class="post_title"><a href="#">Relaxing is essential</a></h2>
                  <div class="post_figure_and_info">
                     <div class="post_sub"><a href="#"><span class="post_info post_author">Henrik Pleth</span></a><a href="#22"><span class="post_info post_categories">News</span></a></div>
                  </div>
                  <a href="#" class="btn btn-primary">Read More</a>
               </article>
            </div>
            <div class="col-md-4 small_screen_margin_top_half">
               <article class="post">
                  <figure><a href="#" title="Post"><img alt="Post" src="{{ asset('assets/images/spa-post-2.jpg') }}"></a></figure>
                  <span class="post_date">October 22, 2015</span>
                  <h2 class="post_title"><a href="#">A warming interior spa</a></h2>
                  <div class="post_figure_and_info">
                     <div class="post_sub"><a href="#"><span class="post_info post_author">Bailey Wonger</span></a><a href="#22"><span class="post_info post_categories">Accommodation</span></a></div>
                  </div>
                  <a href="#" class="btn btn-primary">Read More</a>
               </article>
            </div>
            <div class="col-md-4 small_screen_margin_top_half">
               <article class="post">
                  <figure><a href="#" title="Post"><img alt="Post" src="{{ asset('assets/images/spa-post-3.jpg') }}"></a></figure>
                  <span class="post_date">October 19, 2015</span>
                  <h2 class="post_title"><a href="#">Brand new jacuzzi room</a></h2>
                  <div class="post_figure_and_info">
                     <div class="post_sub"><a href="#"><span class="post_info post_author">Henrik Pleth</span></a><a href="#22"><span class="post_info post_categories">Stories</span></a></div>
                  </div>
                  <a href="#" class="btn btn-primary">Read More</a>
               </article>
            </div>
         </div>
      </section>
   </div>
   <!-- ============================ FOOTER ============================-->
   @endsection
   <script type="text/javascript" src="assets/js/libs/jquery.isotope.js" data-module=""></script>


   <script type="text/javascript" src="assets/js/libs/parallax.js" data-module="parallax"></script>
