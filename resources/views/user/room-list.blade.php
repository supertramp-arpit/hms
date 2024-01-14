@extends('layouts.main2')

@section('main-container')
    <!-- END======================== HEADER ==========================-->
    </div>
    <div class="main">
        <div class="head_panel">
            <div style="background-image: url('{{ asset('assets/images/page-head-2.jpg') }}')" class=" full_width_photo transparent_film">
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

                <div class="row">
                    <div class="col-md-9">
                        @foreach($rooms as $room)
                        <div class="row margin_top_half">
                            <div class="col-md-6 small_screen_margin_top_half">
                                <div class="row" style="max-height: 400px; overflow: hidden;">
                                    @if ($room->roomType->roomImages->isNotEmpty())
                                    <a href="{{ route('room', ['id' => $room->roomType->id]) }}">
                                        <div style="width: 100%; max-height: 300px; display: flex; align-items: center;">
                                                <img src="{{ asset('Cms/Roomimage/' . $room->roomType->roomImages->first()->images) }}" alt="Room Image" style="width: 100%; max-height: 100%; object-fit: cover;">
                                            </div>
                                        </a>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 room_bg_light full_width_room">
                                <div class="text_block">
                                    <h2><a href="{{ route('room', ['id' => $room->id]) }}">{{ $room->roomType->name }}</a><small><a href="{{ route('room', ['id' => $room->roomType->id]) }}">
                                        - {{ $room->reviews }} Reviews</a></small></h2>
                                    <div class="rooms_margin_custom_1">
                                        {{-- @if ($room->has_cable_tv) --}}
                                        <i data-toggle="tooltip" data-placement="bottom" title="This room has Cable TV" class="icon icon-TV"></i>
                                        {{-- @endif --}}
                                        {{-- @if ($room->has_wifi) --}}
                                            <i data-toggle-tooltip data-placement="bottom" title="This room has WiFI" class="icon icon-Signal"></i>
                                        {{-- @endif --}}
                                        {{-- @if ($room->has_cafe_bar) --}}
                                            <i data-toggle="tooltip" data-placement="bottom" title="This room has Cafe Bar" class="icon icon-Espresso"></i>
                                        {{-- @endif --}}
                                    </div>
                                    <p class="text-justify">Rent Per Night:<strong> {{ $room->roomType->rent_per_night }}</strong></p>
                                    <p class="text-justify">Hotel Name:<strong> {{ $room->roomType->hotel->name }}</strong></p>
                                    <p class="text-justify">Details: <strong>{{ $room->roomType->description }}</strong></p>
                                    <a href="{{ route('room', ['id' => $room->roomType->id]) }}"
                                        class="btn btn-link">VIEW DETAILS</a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <hr>
                        </div>
                    @endforeach
                </div>
                <!-- Create an empty space for ads on the left side -->
                <div class="col-md-3">
                    <!-- This space is for ads. You can add your ad code here. -->
                </div>
            </div>
        </div>
    </section>
</div>
<!-- ============================ FOOTER ============================-->
@endsection
