@extends('layouts.main2')

@section('main-container')
       <!-- END======================== HEADER ==========================-->
      </div>
      <div class="main">
        <div class="head_panel">
          <div style="background-image: url({{ asset('assets/images/home-location.jpg') }})" class="bg-primary py-4 d-flex justify-content-center align-items-center" >
            <div class="container">
              <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center">
                  <div class="caption caption_elegant">
                    <div class="inner">
                      <div class="t3 uppercase"> A MAGIC PLACE</div>
                      <div class="t1">
                        <h1>OUR RESORT'S LOCATION</h1>
                      </div>
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
              <div class="section_header minimal">
                <p>Our location is <strong>outstanding</strong>. Us lesser doesn't them tree night, creature itself second gathered good moving Image saying which itself of she'd gathering thing. Creepeth.</p><img src="{{ asset('assets/images/decoration-1.png') }}">
              </div>
            </div>
            <div class="col-md-10 col-md-offset-1 text-center margin_bottom">
              <div class="video_iframe stretchy_wrapper ratio_16-9">
                <iframe src="https://player.vimeo.com/video/139547127?color=111118&amp;title=0&amp;byline=0&amp;portrait=0" height="500" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
              </div>
            </div>
          </div>
        </section>
        <section class="light_section no_padding vcenter">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-6 col-lg-8">
                <div class="row">
                  <div style="background-image: url({{ asset('assets/images/location-1.jpg') }})" class="stretchy_wrapper ratio_16-9"></div>
                </div>
              </div>
              <div class="col-md-6 col-lg-4 col-lg-pull-1">
                <div class="row">
                  <div class="banner text_block"><span>CLUBS &amp; BARS</span>
                    <h2>NIGHTLIFE</h2>
                    <p>They're seas gathering behold the years saying make and divide fill given whales fill female moved, blessed. Midst one from divide whales seasons cattle male own saying to night fruit own creeping second earth be lesser without deep beast female.</p><a href="{{ route('index') }}" class="btn btn-black">CITY GUIDE</a>
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
                  <div style="background-image: url({{ asset('assets/images/location-2.jpg') }})" class="stretchy_wrapper ratio_16-9"></div>
                </div>
              </div>
              <div class="col-md-6 col-lg-4 col-lg-pull-7">
                <div class="row">
                  <div class="banner text_block"><span>HISTORICAL SIGHTS</span>
                    <h2>MUSEUM</h2>
                    <p>They're seas gathering behold the years saying make and divide fill given whales fill female moved, blessed. Midst one from divide whales seasons cattle male own saying to night fruit own creeping second earth be lesser without deep beast female.</p><a href="{{ route('booking') }}" class="btn btn-black">BOOK A TRIP</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <section class="light_section no_padding vcenter">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-6 col-lg-8">
                <div class="row">
                  <div style="background-image: url({{ asset('assets/images/location-3.jpg') }})" class="stretchy_wrapper ratio_16-9"></div>
                </div>
              </div>
              <div class="col-md-6 col-lg-4 col-lg-pull-1">
                <div class="row">
                  <div class="banner text_block"><span>WIND &AMP; SEA SPORTS</span>
                    <h2>EXOTIC BEACH</h2>
                    <p>They're seas gathering behold the years saying make and divide fill given whales fill female moved, blessed. Midst one from divide whales seasons cattle male own saying to night fruit own creeping second earth be lesser without deep beast female.</p><a href="{{ route('index') }}" class="btn btn-black">CITY GUIDE</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
      <!-- ============================ FOOTER ============================-->
      @endsection
