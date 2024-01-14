@extends('Backend.Layouts.Main', ['admin' => $admin])
@section('content')
    <style>
        .box-co1 {
            background-color: #02b315;
            height: 28%;
        }

        .box-co2 {
            background-color: #dbc440;
            height: 28%;
        }

        .box-co3 {
            background-color: #e21717;
            height: 28%;
        }
    </style>
    <div class="sb2-2">
        <div class="sb2-2-2">
            <ul>

                <li class="page-back"><a href="{{ url('room-availability-overview') }}"><i class="fa fa-backward"
                            aria-hidden="true"></i> Back</a>
                </li>
            </ul>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert" style="color: #fff">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif
        @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert" style="color: #fff">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif
        <!--== breadcrumbs ==-->
        <h1>All Room Availability Overview</h1>
        <!--== DASHBOARD INFO ==-->
        {{-- <div class="ad-v2-hom-info">
        <div class="ad-v2-hom-info-inn">
            <ul>
                <li>
                    <div class="ad-hom-box-1">
                        <span class="ad-hom-col-com ad-hom-col-2"></span>
                       
                    </div>
                </li>
               
                <li>
                    <div class="ad-hom-box ad-hom-box-2">
                        <span class="ad-hom-col-com ad-hom-col-2"><i class="fa fa-usd"></i></span>
                        <div class="ad-hom-view-com">
                        <p><i class="fa  fa-arrow-up up"></i> Earnings</p>
                        <h3>22,520</h3>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="ad-hom-box ad-hom-box-3">
                        <span class="ad-hom-col-com ad-hom-col-3"><i class="fa fa-address-card-o"></i></span>
                        <div class="ad-hom-view-com">
                        <p><i class="fa  fa-arrow-up up"></i> Users</p>
                        <h3>22,520</h3>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="ad-hom-box ad-hom-box-4">
                        <span class="ad-hom-col-com ad-hom-col-4"><i class="fa fa-envelope-open-o"></i></span>
                        <div class="ad-hom-view-com">
                        <p><i class="fa  fa-arrow-up up"></i> Enquiry</p>
                        <h3>22,520</h3>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div> --}}

        <div class="row">

            <div class="col-md-3">
                <form action="{{ url('search-room-type') }}" method="GET">
                    <div class="input-field">
                        <select name="search" style="height:35px;width: 180px;" placeholder="Room Status Search">
                            <option value="" disabled selected>Search Room Type</option>
                            <option value="single">Single</option>
                            <option value="double">Double</option>
                            <option value="quad">Quad</option>
                            <option value="king">King</option>
                            <option value="appartments">Appartments</option>
                            <option value="villa">Villa</option>
                        </select>
                        <button class="btn btn-dark" type="submit" style="background: #7D6F6C;height:35px;">Filter</button>
                    </div>
                </form>
            </div>
            <div class="col-md-3">
                <form action="{{ url('search-room-status') }}" method="GET">
                    <div class="input-field">
                        <select name="search" style="height:35px;width: 180px;" placeholder="Room Status Search">
                            <option value="" disabled selected>Search Room Status</option>
                            <option value="1"> Occipied</option>
                            <option value="2"> Draft</option>
                            <option value="3"> Unoccipied</option>
                        </select>
                        <button class="btn btn-dark" type="submit" style="background: #7D6F6C;height:35px;">Filter</button>
                    </div>
                </form>
            </div>

            <div class="col-md-12">
                @foreach ($room as $item)
                    @if ($item->status == '1')
                        <div class="col-md-3">
                            <a href="{{ url('room-status') . '/' . $item->id ?? '' }}">
                                <div class="box-co1">
                                    <br>
                                    <h1 class="center" style="color: aliceblue">{{ $item->room_number ?? '' }}</h1>
                                    @if ($item->status == '1')
                                        <center><span style="color: aliceblue">Occipied</span></center>
                                    @elseif($item->status == '2')
                                        <center><span style="color: aliceblue">Draft</span></center>
                                    @elseif($item->status == '3')
                                        <center><span style="color: aliceblue">Unoccipied</span></center>
                                    @endif
                                </div>
                            </a>
                        </div>
                    @elseif($item->status == '2')
                        <div class="col-md-3">
                            <a href="{{ url('room-status') . '/' . $item->id ?? '' }}">
                                <div class="box-co2">
                                    <br>
                                    <h1 class="center" style="color: aliceblue">{{ $item->room_number ?? '' }}</h1>
                                    @if ($item->status == '1')
                                        <center><span style="color: aliceblue">Occipied</span></center>
                                    @elseif($item->status == '2')
                                        <center><span style="color: aliceblue">Draft</span></center>
                                    @elseif($item->status == '3')
                                        <center><span style="color: aliceblue">Unoccipied</span></center>
                                    @endif
                                </div>
                            </a>
                        </div>
                    @elseif($item->status == '3')
                        <div class="col-md-3">
                            <a href="{{ url('room-status') . '/' . $item->id ?? '' }}">
                                <div class="box-co3">
                                    <br>
                                    <h1 class="center" style="color: aliceblue">{{ $item->room_number ?? '' }}</h1>
                                    @if ($item->status == '1')
                                        <center><span style="color: aliceblue">Occipied</span></center>
                                    @elseif($item->status == '2')
                                        <center><span style="color: aliceblue">Draft</span></center>
                                    @elseif($item->status == '3')
                                        <center><span style="color: aliceblue">Unoccipied</span></center>
                                    @endif
                                </div>
                            </a>
                        </div>
                    @endif
                @endforeach

            </div>
        </div>
    </div>
@endsection
