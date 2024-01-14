<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta charset="utf-8">
    <title>XENIA - Luxury hotel</title>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="HandheldFriendly" content="true">
    <meta name="apple-touch-fullscreen" content="yes">
    <!-- FAVICON--><style>
    /* Style for the circular profile picture */
    <style>
    /* Style for the circular profile picture */
    .profile-picture {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        object-fit: cover;
    }

    /* Style for the dropdown menu items */
    .dropdown-menu li {
        padding: 0px 05px; /* Adjust the padding to make it smaller */
    }

    /* Style for the logout button in the dropdown */
    .dropdown-menu li a {
        font-size: 0px; /* Adjust the font size to make it smaller */
        color: #070101;
    }
/* Example styling for the cart count */
.cart-count {
    background-color: #ff4500; /* Background color */
    color: #fff; /* Text color */
    padding: 2px 6px; /* Adjust padding for size */
    border-radius: 50%; /* Make it circular */
    font-size: 0.8em; /* Font size */
    vertical-align: bottom; /* Align it with the top */
}

    /* Style for the registration button */
    .btn-link-white {
        font-size: 14px;
        color: #fff;
        text-decoration: none;
    }

</style>


    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('assets/favicon/apple-touch-icon-57x57.html') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('assets/favicon/apple-touch-icon-60x60.html') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('assets/favicon/apple-touch-icon-72x72.html') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/favicon/apple-touch-icon-76x76.html') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('assets/favicon/apple-touch-icon-114x114.html') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('assets/favicon/apple-touch-icon-120x120.html') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('assets/favicon/apple-touch-icon-144x144.html') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('assets/favicon/apple-touch-icon-152x152.html') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/favicon/apple-touch-icon-180x180.html') }}">
    <link rel="manifest" href="{{ asset('assets/favicon/manifest.html') }}">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="msapplication-TileImage" content="{{ asset('assets/favicon/mstile-144x144.html') }}">
    <meta name="msapplication-config" content="{{ asset('assets/favicon/browserconfig.xml') }}">
    <meta name="theme-color" content="#ffffff">
    <!-- Google Fonts-->
    <link href="http://fonts.googleapis.com/css?family=Playfair+Display:400,400italic,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,400,700" rel="stylesheet" type="text/css">
    <!-- OWLSLIDER-->
    <link rel="stylesheet" href="{{ asset('assets/js/libs/owl.carousel.2.0.0-beta.2.4/css/owl.carousel.css') }}" type="text/css" media="all" data-module="owlslider">
    <link rel="stylesheet" href="{{ asset('assets/js/libs/owl.carousel.2.0.0-beta.2.4/css/owl.theme.default.css') }}" type="text css" media="all" data-module="owlslider">
    <!-- ANIMATE.CSS LIBRARY-->
    <link rel="stylesheet" href="{{ asset('assets/css/libs/animate.min.css') }}" type="text/css" media="all">
    <!-- ICON WEB FONTS-->
    <!-- HEADER SCRIPTS	-->
    <script type="text/javascript" src="{{ asset('assets/js/libs/modernizr.custom.48287.js') }}"></script>
    <!-- MAIN STYLESHEETS-->
    <link rel="stylesheet" href="{{ asset('assets/css/theme_custom_bootstrap.min.css') }}" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" type="text/css" media="all">
    <link rel="stylesheet" href="{{asset('assets/css/libs/imagelightbox.min.css')}}" type="text/css" media="all">
    <!-- OWLSLIDER-->
    <link rel="stylesheet" href="{{asset('assets/js/libs/owl.carousel.2.0.0-beta.2.4/css/owl.carousel.css')}}" type="text/css" media="all" data-module="owlslider">
    <link rel="stylesheet" href="{{asset('assets/js/libs/owl.carousel.2.0.0-beta.2.4/css/owl.theme.default.css')}}" type="text/css" media="all" data-module="owlslider">
    <!-- ANIMATE.CSS LIBRARY-->
    <style>
        /* Style for the circular profile picture */
        .profile-picture {
            width: 50px; /* Set the desired width and height for a small picture */
            height: 50px;
            border-radius: 50%; /* Makes the image circular */
            object-fit: cover; /* Maintain the aspect ratio and cover the entire circle */
        }
    </style>

</head>

<body style="">
    <div id="page_wrapper">
        <div class="header click_menu transparent">
            <!-- =========================== HEADER ==========================-->
            <div class="mainbar">
                <div class="container-fluid">
                    <div class="logo">
                        <a href="{{ url('/user') }}" class="brand">
                            <img src="{{ asset('assets/images/logo.png') }}" alt="logo" style="width: 150px;">

                        </a>
                    </div>
                    <div class="nav_and_tools nav_centered uppercase transparent">
                        <nav class="primary_nav">
                            <ul class="nav">
                                <!-- Inside your Blade template -->
<!-- Inside your Blade template -->
<ul class="nav">
    <li><a href="{{ url('/user') }}">Home</a></li>
    <li><a href="{{ url('/room-list') }}">Rooms</a></li>
    <li><a href="{{ url('/hotel_view') }}">Hotel</a></li>
    <li><a href="{{ url('/location') }}">Location</a></li>
    <li><a href="{{ url('/index-activities') }}">Activities</a></li>
    {{-- <li><a href="{{ url('/index-restaurant') }}">Restaurant</a></li> --}}
    <li><a href="{{ url('/gallery') }}">Gallery</a></li>
    <li><a href="{{ url('/contact') }}">Contact</a></li>
    @auth
        <!-- Display the user's profile picture when logged in -->
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                @php
                $profilePicture = Auth::user()->profile_picture;
                $isGoogleProfile = strpos($profilePicture, 'lh3.googleusercontent.com') !== false;
            @endphp

            @if($isGoogleProfile)
                <img src="{{ $profilePicture }}" alt="{{ Auth::user()->name }}'s Profile Picture" class="profile-picture rounded-circle img-thumbnail">
            @else
                <img src="{{ asset('Cms/Roomimage/' . basename($profilePicture)) }}" alt="{{ Auth::user()->name }}'s Profile Picture" class="profile-picture rounded-circle img-thumbnail">
            @endif





                <span class="caret"></span>
            </a>
            <ul class="dropdown-menu" role="menu">
                <!-- Add a link to the profile update page -->
                <li><a href="{{ route('profile.edit') }}">Profile</a></li>
                <li><a href="{{ route('booking.history') }}"> My Bookings </a></li>
               <!-- Other parts of your header -->
               <li>
                <a href="{{ route('cart_view') }}">
                    Cart @if($cartCount > 0) <sup class="cart-count">{{ $cartCount }}</sup> @endif
                </a>
            </li>


            <!-- Other navigation items -->



                <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
            </ul>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
     @csrf
            </form>
        </li>
    @else
        <!-- Show the "Register" button for guests -->
        <li>
            <button type="button" class="btn btn-link-white btn-sm" data-toggle="modal" data-target="#registrationModal" style="border: none; background: none; cursor: pointer; padding: 0;">Sign UP</button>
        </li>
    @endauth
</ul>


<!-- Display the circular profile picture -->
{{-- <li><img src="{{ asset(Auth::user()->profile_pic) }}" alt="{{ Auth::user()->name }}'s Profile Picture" class="profile-picture"></li> --}}


                            </ul>
                        </nav>
                    </div>
                </div>
                <a class="menu-toggler"><span class="title"></span><span class="lines"></span></a>
            </div>
        </div>
    </div>
</body>
</html><!-- Button to trigger the modal -->
{{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#registrationModal">
    Register
</button> --}}

<!-- Registration Modal -->


        </div>
    </div>
</div>

@include('register')
