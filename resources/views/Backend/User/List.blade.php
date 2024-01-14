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
                        <h4>User Details</h4>

                        <a class="dropdown-button drop-down-meta" href="#" data-activates="dr-users"><i class="material-icons">more_vert</i></a>
                        <ul id="dr-users" class="dropdown-content">
                            <li><a href="{{url('/add-user')}}">Add New</a>
                            </li>
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
                        <div class="table-responsive table-desi table-bordered" id="example">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Img</th>

                                        <th>Name</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Phone #</th>
                                        <th>Status</th>
                                        {{-- <th>Action</th> --}}
                                        <th>Edit</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($user as $item)
                                    <tr>
                                        @if($item->image)
                                        <td><span class="list-img"><img src="{{asset('Cms/Profile')}}/{{ $item->image ?? '' }}" alt=""></span>
                                            @else
                                            <td> <span class="list-img">N/A</span> </td>

                                            @endif
                                        </td>
                                        <td><a href="#"><span class="list-enq-name">{{ucwords($item->name ?? '')}}</span></a>
                                        </td>
                                        <td>{{$item->username ?? ''}}</td>
                                        <td>{{$item->email ?? ''}}</td>
                                        <td>{{$item->number ?? ''}}</td>

                                        @if($item->status == '1')
                                        <td><span class="label label-primary"><a href="{{url('user-active').'/'.$item->id ?? ''}}" style="color: white;">Active</a></span></td>
                                        @elseif ($item->status == '2')
                                        <td><span class="label label-danger"><a href="{{url('user-deactive').'/'.$item->id ?? ''}}" style="color: white;">Deactive</a></span></td>
                                        @endif



                                        {{-- <td>
                                            <a href="user-view.html"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                        </td> --}}
                                        <td>
                                            <a href="{{url('edit-user').'/'.$item->id ?? ''}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                        </td>
                                        {{-- <td>
                                            <a href="#"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                        </td> --}}
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            <div class="pagniation">
                                {!! $user->render() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
