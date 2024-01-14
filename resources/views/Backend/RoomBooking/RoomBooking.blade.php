@extends('Backend.Layouts.Main')
@section('content')
<div class="sb2-2">
    
    <div class="sb2-2-2">
        <ul>
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
        </ul>
    </div>
    <div class="sb2-2-3">
        <div class="row">
            <div class="col-md-12">
                <div class="box-inn-sp">
                    <div class="inn-title">
                        <h4>Assign Room</h4>
                        {{-- <p>Airtport Hotels The Right Way To Start A Short Break Holiday</p> --}}
                        <a class="dropdown-button drop-down-meta" href="#" data-activates="dr-users"><i class="material-icons">more_vert</i></a>
                        <ul id="dr-users" class="dropdown-content">
                            <li id="JSON"><a href="#" >JSON</a>
                            </li>
                            <li id="PDF"><a href="#" >PDF</a>
                            </li>
                            <li><a href="#!">CSV</a>
                            </li>
                           
                        </ul>

                        <!-- Dropdown Structure -->

                    </div>
                    <div class="tab-inn">
                        <div class="table-responsive table-desi">
                            <table class="table table-hover table-bordered" id="example">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>UserName #</th>
                                        <th>Phone </th>
                                        <th>Room Type</th>
                                        <th>Assign Room</th>
                                        {{-- <th>Edit</th>
                                        <th>Delete</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                    <tr>
                                        {{-- @if($item->image)
                                        <td><span class="list-img"><img src="{{asset('Cms/Profile')}}/{{ $item->image ?? '' }}" alt=""></span>
                                            @else
                                            <td> <span class="list-img">N/A</span> </td>
                                        
                                            @endif
                                        </td> --}}
                                        <td><span class="list-enq-name">{{ucfirst($item->name ?? '')}}</span></span>
                                        </td>
                                        <td>{{$item->email ?? ''}}</td>
                                        <td>{{$item->username ?? ''}}</td>
                                        <td>{{$item->number ?? ''}}</td>
                                        <td>{{$item->room_type ?? ''}}</td>                              
                                        <td>
                                            @if($item->assign == '1')
                                            <form method="post" action="{{url('room-booking').'/'.$item->id ?? ''}}">
                                                @csrf
                                                <input type="hidden" name="name" value="{{$item->name ?? ''}}">
                                                <input type="hidden" name="username" value="{{$item->username ?? ''}}">
                                                <input type="hidden" name="email" value="{{$item->email ?? ''}}">
                                                <input type="hidden" name="room_type" value="{{$item->room_type ?? ''}}">
                                            <button type="submit" style="background-color: green;color: #f9f8f7;">Unassigned</button>
                                            </form>
                                            @else
                                            <button style="background-color: rgb(221, 75, 17);color: #f9f8f7;">Assigned</button>
                                            @endif
                                        </td>
                                        
                                    </tr>
                                    @endforeach
                                   
                                </tbody>
                            </table>
                            <div class="pagniation">
                                {!! $data->render() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection