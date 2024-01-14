@extends('layouts.main2')
@section('main-container')

<!-- END======================== HEADER ==========================-->
</div>
<div class="main">
    <section id="home" style="background-image: {{ asset('assets/images/page-head-6.jpg') }}" class="text-center double_padding transparent_film">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="caption caption_elegant">
                        <div class="inner">
                            <div class="t3 uppercase">404</div>
                            <div class="t1">WE FOUND NOTHING!</div>
                            <a href="{{ url('index.html') }}" class="margin_top_half btn btn-primary">HOME</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="light_section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="section_header overlay"><span>ROOMS</span>
                        <h1>XENIA RESORT ROOMS</h1>
                        <p>LUXURY ROOMS AND SUITES</p>
                        <img src="{{ asset('assets/images/decoration-1.png') }}" alt="Image">
                    </div>
                </div>
                <div class="col-md-6 small_screen_margin_top_half">
                    <div class="col-md-12">
                        <div class="row"><a href="{{ url('room-single.html') }}"><img src="{{ asset('assets/images/room-4.jpg') }}" alt="Room Image"></a></div>
                    </div>
                    <div class="col-md-12 room_bg_light compact_width_room">
                        <div class="text_block"><a href="{{ url('room-single.html') }}">
                            <h2>Single Room <small><a href="{{ url('room-single.html') }}">- 3 Reviews</a></small></h2></a>
                            <div><i class="icon icon-TV"></i><i class="icon icon-Signal"></i><i class="icon icon-Espresso"></i></div>
                            <p class="text-justify">Over, dominion own it above gathering their, don't won't waters bring male bearing form may rule doesn't him fish appear spirit let earth may life you'll to great Tree moveth midst a there so Blessed saw fly don't multiply, dry.le doesn't him fish appear spirit let earth may life you'll to great.</p><a href="{{ url('room-single.html') }}" class="btn btn-primary">READ MORE</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 small_screen_margin_top_half">
                    <div class="col-md-12">
                        <div class "row"><a href="{{ url('room-single.html') }}"><img src="{{ asset('assets/images/room-1.jpg') }}" alt="Room Image"></a></div>
                    </div>
                    <div class="col-md-12 room_bg_light compact_width_room">
                        <div class="text_block"><a href="{{ url('room-single.html') }}">
                            <h2>Double Room <small><a href="{{ url('room-single.html') }}">- 5 Reviews</a></small></h2></a>
                            <div><i class="icon icon-Signal"></i><i class="icon icon-TV"></i><i class="icon icon-Espresso"></i></div>
                            <p class="text-justify">Over, dominion own it above gathering their, don't won't waters bring male bearing form may rule doesn't him fish appear spirit let earth may life you'll to great Tree moveth midst a there so Blessed saw fly don't multiply, dry.le doesn't him fish appear spirit let earth may life you'll to great.</p><a href="{{ url('room-single.html') }}" class="btn btn-primary">READ MORE</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 margin_top_half">
                    <div class="col-md-12">
                        <div class="row"><a href="{{ url('room-single.html') }}"><img src="{{ asset('assets/images/room-3.jpg') }}" alt="Room Image"></a></div>
                    </div>
                    <div class="col-md-12 room_bg_light compact_width_room">
                        <div class="text_block"><a href="{{ url('room-single.html') }}">
                            <h2>Suite with view <small><a href="{{ url('room-single.html') }}">- 2 Reviews</a></small></h2></a>
                            <div><i class="icon icon-TV"></i><i class="icon icon-Espresso"></i><i class="icon icon-Signal"></i></div>
                            <p class="text-justify">Over, dominion own it above gathering their, don't won't waters bring male bearing form may rule doesn't him fish appear spirit let earth may life you'll to great Tree moveth midst a there so Blessed saw fly don't multiply, dry.le doesn't him fish appear spirit let earth may life you'll to great.</p><a href="{{ url('room-single.html') }}" class="btn btn-primary">READ MORE</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 margin_top_half">
                    <div class="col-md-12">
                        <div class="row"><a href="{{ url('room-single.html') }}"><img src="{{ asset('assets/images/room-2.jpg') }}" alt="Room Image"></a></div>
                    </div>
                    <div class="col-md-12 room_bg_light compact_width_room">
                        <div class="text_block"><a href="{{ url('room-single.html') }}">
                            <h2>Deluxe King suite<small><a href="{{ url('room-single.html') }}">- 5 Reviews</a></small></h2></a>
                            <div><i class="icon icon-Signal"></i><i class="icon icon-Espresso"></i><i class="icon icon-TV"></i></div>
                            <p class="text-justify">Over, dominion own it above gathering their, don't won't waters bring male bearing form may rule doesn't him fish appear spirit let earth may life you'll to great Tree moveth midst a there so Blessed saw fly don't multiply, dry.le doesn't him fish appear spirit let earth may life you'll to great.</p><a href="{{ url('room-single.html') }}" class="btn btn-primary">READ MORE</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- ============================ FOOTER ============================-->
@endsection
