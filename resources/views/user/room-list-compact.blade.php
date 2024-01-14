@extends('layouts.main2')

@section('main-container')
    <!-- END======================== HEADER ==========================-->
</div>
<div class="main">
    <div class="head_panel">
        <div style="background-image: url('{{ asset('assets/images/page-head-2.jpg') }}" class="full_width_photo transparent_film">
            <div class="container">
                <div class="caption">
                    <h1>Rooms List</h1><span>View details for every room we have</span>
                </div>
            </div>
        </div>
    </div>
    <section class="light_section">
        <div class="container">
            <div class="col-md-12 text-left">
                <div class="row">
                    <ul class="breadcrumb">
                        <li><a href="{{ url('/user') }}">HOME</a></li>
                        <li><span>ROOMS LIST</span></li>
                    </ul>
                </div>
            </div>

            @foreach($rooms as $room)
                <div class="col-md-12 margin_top_half">
                    <div class="row">
                        <div class="col-md-6 room_bg_light full_width_room">
                            <div class="text_block">
                                <h2><a href="{{ route('room-single') }}">{{ $room->room_type }}</a><small><a href="{{ route('room-single') }}">- {{ $room->reviews }} Reviews</a></small></h2>
                                <div class="rooms_margin_custom_1">
                                    @if ($room->has_cable_tv)
                                        <i data-toggle="tooltip" data-placement="bottom" title="This room has Cable TV" class="icon icon-TV"></i>
                                    @endif
                                    @if ($room->has_wifi)
                                        <i data-toggle-tooltip data-placement="bottom" title="This room has WiFI" class="icon icon-Signal"></i>
                                    @endif
                                    @if ($room->has_cafe_bar)
                                        <i data-toggle="tooltip" data-placement="bottom" title="This room has Cafe Bar" class="icon icon-Espresso"></i>
                                    @endif
                                </div>
                                <p class="text-justify">{{ $room->description }}</p>
                                <p class="text-justify">Details: {{ $room->details }}</p>

                                <!-- Loop through room images -->
                                @foreach ($room->room_images as $image)
                                <img src="{{ asset('Cms/Roomimage/' . $image->images) }}" alt="Room Image">
                            @endforeach
                                <a href="{{ route('room-single') }}" class="btn btn-link">READ MORE</a>
                            </div>
                        </div>
                        <div class="col-md-6 small_screen_margin_top_half">
                            <div class="row"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <hr>
                    </div>
                </div>
            @endforeach

        </div>
    </section>
</div>
<!-- ============================ FOOTER ============================-->
@endsection
