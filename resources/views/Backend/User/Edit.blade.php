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
                        <h4>Edit User Details</h4>

                    </div>
                    <div class="tab-inn">
                        <form class="text-center" method="post" action="{{url('update-user')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <input type="hidden" name="id" value="{{$value->id ?? ''}}">
                                <div class="input-field col s12">
                                    <input id="first_name" type="text"  value="{{$value->name ?? ''}}" class="validate" name="first_name">
                                    <label for="first_name">Full Name</label>
                                </div>

                            </div>
                            <div class="row">
                                <div class="input-field col s6">
                                    <select id="phone" type="text" name="type" class="validate">

                                    <option value="managing_director" @if($value->type == 'managing_director') selected @endif>Managing Director</option>
                                    <option value="manager" @if($value->type == 'manager') selected @endif> Manager</option>

                                    <option value="faculty" @if($value->type == 'faculty') selected @endif>Faculty</option>
                                </select>
                                    <label for="phone">Admin Type</label>
                                </div>
                                <div class="input-field col s6">
                                    <input id="cphone" type="text" name="number" value="{{$value->number ?? ''}}" class="validate">
                                    <label for="cphone">Phone</label>
                                </div>
                            </div>
                            {{-- <div class="row">
                                <div class="input-field col s6">
                                    <input id="city" type="text" value="Illunois" class="validate">
                                    <label for="city">City</label>
                                </div>
                                <div class="input-field col s6">
                                    <input id="country" type="text" value="United States" class="validate">
                                    <label for="country">Country</label>
                                </div>
                            </div> --}}

                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="email" type="email" name="email" value="{{$value->email ?? ''}}" class="validate">
                                    <label for="email">Email</label>
                                </div>

                            </div>

                            <div class="row">
                                <div class="input-field col s12">
                                    <div class="file-field">
                                        <div class="btn">
                                            <span>File</span>
                                            <input type="file" name="image">
                                        </div>
                                        <div class="file-path-wrapper">
                                            <input class="file-path validate" type="text" placeholder="Upload Blog Banner">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @if($value->image)
                            <div class="row">
                                <div class="input-field col s12">
                                    <div class="file-field">

                                        <img src="{{asset('Cms/Profile/'.$value->image)}}" alt="" width='111px' height='70' style="float: left;">
                                    </div>
                                </div>
                            </div>
                            @endif

                            <div class="row">
                                <div class="input-field col s12">
                                    <input type="submit" class="waves-effect waves-light btn-large">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<
@endsection
