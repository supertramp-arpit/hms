@extends('layouts.main4')

@section('main-container')
<div class="container mt-5">
    <h4>My Account</h4>
    <style>
        /* Success, Error, and Errors Messages Container */
    .mess-container {
        position: fixed;
        top: 100px;
        left: 950px;
        z-index: 9999;
        max-width: 300px;
    }

    /* Success Message */
    .alert-success-message {
        background-color: #4caf50;
        color: white;
        padding: 10px;
        border-radius: 5px;
        margin-bottom: 10px;
    }

    /* Error Message */
    .alert-error-message {
        background-color: #f44336;
        color: white;
        padding: 10px;
        border-radius: 5px;
        margin-bottom: 10px;
    }

    /* Errors Messages List */
    .alert-errors-list {
        background-color: #f44336;
        color: white;
        padding: 10px;
        border-radius: 5px;
        margin-bottom: 10px;
    }

    /* Close Button */
    .close-mess {
        cursor: pointer;
        float: right;
        font-weight: bold;
        color: white;
        border: none;
        background: transparent;
    }

    </style>

 </div>

<div class="container d-flex justify-content-center mt-2">
    <div class="row col-12 mx-auto">
        <div class="col-lg-4 col-md-4 col-sm-12">
            <ul class="mb-0 px-0 mt-2" id="ram1" style="width:50%;border-radius: 6px;">
                <a href="{{ route('profile.edit') }}" class="btn p-1 sm-12 border-0">My Profile</a>
            </ul>

            <ul class="mb-0 px-0 mt-2" id="ram2" style="width:50%;border-radius: 6px;">
                <a href="{{ route('booking.history') }}" class="btn p-1 sm-12 border-0">My Booking</a>
            </ul>

            <ul class="mb-0 px-0 mt-2" id="ram3" style="width:50%;border-radius: 6px;">
                <a href="#" class="btn p-1 sm-12 border-0">Manage Payment</a>
            </ul>

            <ul class="mb-0 px-0 mt-2" id="ram5" style="width:50%;border-radius: 6px;">
                <a href="{{ route('logout') }}"onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn p-1 sm-12 border-0"  role="button">Logout</a>
            </ul>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
                       </form>
        </div>

        <script>
            // Get the current page URL
            const currentUrl = window.location.href;

            // Get all the sidebar links
            const sidebarLinks = document.querySelectorAll('#ram1 a, #ram2 a, #ram3 a, #ram5 a');

            // Loop through the links and check if the href matches the current URL
            sidebarLinks.forEach(link => {
                if (link.getAttribute('href') === currentUrl) {
                    link.parentElement.classList.add('activate');
                }
            });
        </script>
                <div class="col-lg-8 col-md-8 col-sm-12 mx-auto mt-3">
            <!-- Content for Page 1 -->

                <div class="d-flex align-items-center">
                    <div>
                        @php
                            $profilePicture = Auth::user()->profile_picture;
                            $isGoogleProfile = strpos($profilePicture, 'lh3.googleusercontent.com') !== false;
                        @endphp

                        <div>
                            @if($isGoogleProfile)
                            <div class="rounded-square-img" style="width: 120px; height: 130px; overflow: hidden; border-radius: 12px;">
                                <img src="{{ $profilePicture }}" alt="Profile Picture" style="width: 100%; height: 100%; object-fit: cover;">
                                <div class="edit-icon" id="ico" data-bs-toggle="modal" data-bs-target="#uploadProfilePicModal">
                                    <i class="fa fa-pencil p-1 rounded-circle bg-light" aria-hidden="true" style="font-size:17px;"></i>
                                </div>

                            </div>
                        @else
                            <div class="rounded-square-img" style="width: 120px; height: 130px; overflow: hidden; border-radius: 12px;">
                                <img src="{{ asset('Cms/Roomimage/' . basename($profilePicture)) }}" alt="Profile Picture" style="width: 100%; height: 100%; object-fit: cover;">
                                <div class="edit-icon" id="ico" data-bs-toggle="modal" data-bs-target="#uploadProfilePicModal">
                                    <i class="fa fa-pencil p-1 rounded-circle bg-light" aria-hidden="true" style="font-size:17px;"></i>
                                </div>

                            </div>
                        @endif                        </div>
<!-- ... remaining code ... -->

                    </div>
                    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                    <div class="ms-4">
                        <h5>{{ old('name', Auth::user()->name) }}</h5>
                        <p>{{ old('email', Auth::user()->email) }}</p>
                    </div>
                </div>

                <div class="row col-12 border-top mt-4 ">
                    <div class="col-lg-10 col-md-10 col-sm-12 mt-2">
                        <h5>My Profile</h5>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-12 mt-2" id="editButton">
                        <h5 style="color:red;"><span><i class="fa fa-pencil" aria-hidden="true"></i></span> Edit</h5>
                    </div>

                </div>

                <div class="row col-12 mt-2">
                    <div class="col-lg-6 col-md-6 col-sm-2">
                        <div class="mb-3">
                            <h6>Name</h6>
                            <p class="editable-text">{{ old('name', Auth::user()->name) }}</p>
                            <input type="text" class="form-control shadow-none border-0-editable-text" name="name" value="{{ old('name', Auth::user()->name) }}" placeholder="Full Name" style="display: none;">
                        </div>

                        <div class="mb-3">
                            <h6>Mobile No</h6>
                            <p class="editable-text">{{ old('mobile', Auth::user()->mobile) }}</p>
                            <input type="mobile" class="form-control shadow-none border-0-editable-text" name="mobile" value="{{ old('mobile', Auth::user()->mobile) }}" placeholder="Mobile" style="display: none;">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 ">
                        <h6>Email</h6>
                        <div class="mb-3">
                            <p class="editable-text">{{ old('email', Auth::user()->email) }}</p>
                            <input type="email" class="form-control shadow-none border-0-editable-text" name="email" value="{{ old('email', Auth::user()->email) }}" placeholder="Email" style="display: none;">
                        </div>
                        <div class="row mt-3">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-block save-changes-button">Save Changes</button>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>

    <!-- PAGE 3 end -->
    <!-- PAGE 4 START -->
</div>

</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="modal fade" id="uploadProfilePicModal" tabindex="-1" aria-labelledby="uploadProfilePicModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="uploadProfilePicModalLabel">Upload Profile Picture</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Your form for profile picture upload goes here -->
                <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">

                    @csrf
                    @method('PUT')

                    <!-- Input field for uploading a new profile picture -->


                    <!-- Add hidden fields for other user data -->
                    <input type="hidden" name="name" value="{{ old('name', Auth::user()->name) }}">
                    <input type="hidden" name="mobile" value="{{ old('mobile', Auth::user()->mobile) }}">
                    <input type="hidden" name="email" value="{{ old('email', Auth::user()->email) }}">
                    <input type="file"  name="profile_picture" id="profile_picture"   accept="image/*">
                    <button type="submit" class="btn btn-primary">Upload</button>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- Modals --}}
{{-- <div class="modal fade" id="exampleModal1" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content ">
            <div class="modal-body m-0 p-5">
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content ">
            <div class="modal-body m-0 p-5">
            </div>
        </div>
    </div>
</div> --}}

<script type="text/javascript">
    function showPage(pageId) {
        var pages = document.querySelectorAll('.page-content');
        pages.forEach(function(page) {
            page.style.display = 'none';
        });

        var selectedPage = document.getElementById(pageId);
        if (selectedPage) {
            selectedPage.style.display = 'block';
        }
    }
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $("#btn1").click(function() {
            $("#btn1").addClass("activate");
            $("#btn2").removeClass("activate");
            $("#tab1").show();
            $("#tab2").hide();
        });
        $("#btn2").click(function() {
            $("#btn1").removeClass("activate");
            $("#btn2").addClass("activate");
            $("#tab2").show();
            $("#tab1").hide();
        });
    });
</script>

<div class="mess-container">
    @if(session('success'))
        <div class="alert-success-message">
            {{ session('success') }}
            <button class="close-mess" onclick="this.parentElement.style.display='none';">X</button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert-error-message">
            {{ session('error') }}
            <button class="close-mess" onclick="this.parentElement.style.display='none';">X</button>
        </div>
    @endif

    @if (session('errors'))
        <div class="alert-errors-list">
            <ul>
                @foreach (session('errors') as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button class="close-mess" onclick="this.parentElement.style.display='none';">X</button>
        </div>
    @endif
</div>
<!-- ... (your existing HTML code) ... -->

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const editButton = document.getElementById('editButton');
        const saveButton = document.querySelector('.save-changes-button');
        const inputFields = document.querySelectorAll('input[name="name"], input[name="email"], input[name="mobile"]');
        const textParagraphs = document.querySelectorAll('.editable-text');

        // Initially, hide the input fields and 'Save Changes' button
        inputFields.forEach(function(field) {
            field.style.display = 'none';
            field.disabled = true;
        });
        saveButton.style.display = 'none';

        editButton.addEventListener('click', function() {
            inputFields.forEach(function(field) {
                if (!field.disabled) {
                    field.style.display = (field.style.display === 'none') ? 'block' : 'none';
                    field.disabled = !field.disabled;
                } else {
                    field.style.display = 'block';
                    field.disabled = false;
                }
            });

            textParagraphs.forEach(function(paragraph) {
                paragraph.style.display = (paragraph.style.display === 'none') ? 'block' : 'none';
            });

            // Toggle visibility of the 'Save Changes' button
            saveButton.style.display = (saveButton.style.display === 'none' || saveButton.style.display === '') ? 'block' : 'none';
        });
    });
</script>

@endsection




















