@extends('Backend.Layouts.Main')

@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<style>
    .info-box{
        height: 15vh;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        border-radius: 10px;
        margin-top: 3vh;
    }
    .info-box .container-fluid{
        background-color: #0e76a8;
        width: 100%;
        color: white;
        border-radius: 5px;
        margin-top: 1vh;
    }
</style>
<div class="sb2-2">

    <div class="panel" style="margin-top: 5vh; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
    <div class="w3-content w3-section" style="max-width: 100%">
        @foreach($data['roomType']['roomImages'] as $img)
        <img class="mySlides" src="{{asset('Cms/Roomimage')}}/{{ $img->images ?? '' }}" style="width:100%; height:80%;">
        @endforeach
      </div>
    </div>

    <div class="panel" style="margin-top: 5vh; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
        <div class="panel-body">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-3 info-box">
                        <div class="container-fluid text-center">Room Number</div>
                        <div class="text-center"><h4>{{$data->room_no ?? ''}}</h4></div>
                    </div>
                    <div class="col-md-3 info-box">
                        <div class="container-fluid text-center">Meal</div>
                        <div class="text-center"><h4>{{$data->meal ?? ''}}</h4></div>
                    </div>
                    <div class="col-md-3 info-box">
                        <div class="container-fluid text-center">AC/Non-AC</div>
                        <div class="text-center">
                            <h4>
                                @if($data->ac_non_ac == 1)
                                    Ac
                                @elseif($data->ac_non_ac == 0)
                                    Non Ac
                                @else
                                    N/A
                                @endif
                            </h4>
                        </div>
                    </div>
                    <div class="col-md-3 info-box">
                        <div class="container-fluid text-center">Room Telephone</div>
                        <div class="text-center"><h4>{{$data->telephone ?? ''}}</h4></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 info-box">
                        <div class="container-fluid text-center">Room Type</div>
                        <div class="text-center"><h4>{{$data['roomType']['name'] ?? ''}}</h4></div>
                    </div>
                    <div class="col-md-3 info-box">
                        <div class="container-fluid text-center">Bed Capacity</div>
                        <div class="text-center"><h4>{{$data['roomType']['capacity'] ?? ''}}</h4></div>
                    </div>
                    <div class="col-md-3 info-box">
                        <div class="container-fluid text-center">Rent Per Night</div>
                        <div class="text-center"><h4>{{$data['roomType']['rent_per_night'] ?? ''}}</h4></div>
                    </div>
                    {{-- <div class="col-md-3 info-box">
                        <div class="container-fluid text-center">Cancellation Charge</div>
                        <div class="text-center"><h4>{{$data['roomType']['cancellation_charge'] ?? ''}}</h4></div>
                    </div> --}}
                </div>
                <div class="row info-box" style="height:auto !important; padding: 10px;">
                    <div class="col-md-12 text-center" style="background-color: #0e76a8; margin-top: 1vh; color: white; border-radius: 5px;">Room Description</div>
                    <div class="col-md-12">
                        <p>
                            {{$data['roomType']['description'] ?? ''}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
