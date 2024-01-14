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
                        <h4>Add New Admin User</h4>
                        {{-- <p>Airtport Hotels The Right Way To Start A Short Break Holiday</p> --}}
                    </div>
                    <div class="tab-inn">
                        <form class="text-center" method="post" action="{{url('add-user')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">

                                <div class="input-field col s12">
                                    <input id="first_name" type="text" class="validate" name="name" required>
                                    <label for="first_name">Full Name</label>
                                </div>
                                {{-- <div class="input-field col s6">
                                    <input id="last_name" type="text" class="validate" name="last_name">
                                    <label for="last_name">Last Name</label>
                                </div> --}}
                            </div>
                            <div class="row">
                                <div class="input-field col s6">
                                    <select id="type" type="text" name="type" class="validate" required>
                                        <option>Select...</option>
                                    <option value="managing_director">Managing Director</option>
                                    <option value="manager"> Manager</option>

                                    <option value="faculty">Faculty</option>
                                </select>
                                    <label for="type">Admin Type</label>
                                </div>
                                <div class="input-field col s6">
                                    <input id="cphone" type="text" name="number"  class="validate" pattern="[1-9]{1}[0-9]{9}" maxlength="10" required>
                                    <label for="cphone">Phone</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="email" type="email" name="email" class="validate" required>
                                    <label for="email">Email</label>
                                </div>

                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <div class="file-field">
                                        <div class="btn">
                                            <span>File</span>
                                            <input type="file" name="image" accept="image/png, image/gif, image/jpeg">
                                        </div>
                                        <div class="file-path-wrapper">
                                            <input class="file-path validate" type="text" placeholder="Upload user Image">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <button type="submit" class="waves-effect waves-light btn-large">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
