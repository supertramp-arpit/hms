<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .cart-count {
    background-color: #ff4500; /* Background color */
    color: #fff; /* Text color */
    padding: 2px 6px; /* Adjust padding for size */
    border-radius: 50%; /* Make it circular */
    font-size: 0.8em; /* Font size */
    vertical-align: center; /* Align it with the top */
}

    </style>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel</title>
    <link rel="stylesheet" href="{{ asset('user/css/custom.css') }}">
    <link rel="stylesheet" href="{{asset('user/css/ho.css')}}">
    <link rel="stylesheet" href="{{ asset('user/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="path/to/owl.carousel.min.css">
<link rel="stylesheet" href="path/to/owl.theme.default.min.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">




<!-- Owl Carousel JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

</head>
<body>

<header class="container-fluid px-0">
    <nav class="navbar navbar-expand-lg text-white" style="background-color: #0E234C;">
        <div class="container">
            <a class="navbar-brand text-white" href="#"><h1 style="font-size:38px;">LOGO  &nbsp;&nbsp;&nbsp;&nbsp;<span><img src="{{ asset('user/img/icon/MapPin.png') }}" style="width:19%;" id="logo"></span></h1></a>

            <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation" id="bi">
                <span class="navbar-toggler-icon"><i class="fa fa-navicon fa-lg" style="color:white; font-size:26px;float: right;"></i></span>
            </button>

            <select class="form-select text-white border-0 shadow-none fs-5" aria-label="Default select example" style="width:13%; background-color:transparent;" id="se">
                <option selected style="background-color:transparent; color:black;">Lucknow</option>
                <option value="1" style="background-color:transparent; color:black;">Kanpur</option>
                <option value="2" style="background-color:transparent; color:black;">Ayodhya</option>
                <option value="3" style="background-color:transparent; color:black;">Jhanshi</option>
            </select>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav ms-auto my-2 my-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active text-white" aria-current="page" href="/index">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/hotels">Hotels</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/about"> About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/contact"> Contact us</a>
                    </li>
                    <li class="nav-item ">
                        @if(auth()->check())
    <!-- If the user is authenticated -->
    <div class="dropdown">
        <a class="navbar-brand text-white dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                    @php
                            $profilePicture = Auth::user()->profile_picture;
                            $isGoogleProfile = strpos($profilePicture, 'lh3.googleusercontent.com') !== false;
                        @endphp

                        @if($isGoogleProfile)
                            <img src="{{ $profilePicture }}" alt="{{ Auth::user()->name }}'s Profile Picture" style="width: 33px; height: 33px;"  id="logo" class="rounded-circle">
                        @else
                            <img src="{{ asset('Cms/Roomimage/' . basename($profilePicture)) }}" alt="{{ Auth::user()->name }}'s Profile Picture" style="width: 33px; height: 33px;"  id="logo" class="rounded-circle">
                        @endif

            Hi, {{ auth()->user()->name }}
        </a>

        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a></li>
            <li><a class="dropdown-item" href="/cart_view">Wishlist @if($cartCount > 0) <sup class="cart-count">{{ $cartCount }}</sup> @endif</a></li>
            <li><a class="dropdown-item" href="{{ route('logout') }}"onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log Out</a></li>
        </ul>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
                   </form>
    </div>
@else
    <!-- If the user is not authenticated -->
    <a href="{{ url('##') }}">
        <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal1" role="button" style="background-color:#FE3400; color:white;">
            Login /Sign Up
        </button>
    </a>
@endif
                    </li>
                </ul>

            </div>
        </div>
    </nav>
</header>

<!-- Modal for Login -->
<div class="modal fade" id="exampleModal1" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
    <div class="modal-dialog  modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body m-0 p-0" style="opacity:0.9; background: url('{{ asset('user/img/pic/f1.png') }}'), #0E234C 0px -0.251px / 100% 229.305% no-repeat;">
                @include('newlo')
            </div>
        </div>
    </div>
</div>

<!-- Modal 2 -->
<div class="modal fade" id="exampleModal2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
    <div class="modal-dialog  modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body m-0 p-0" style="opacity:0.9; background: url('{{ asset('user/img/pic/f1.png') }}'), #0E234C 0px -0.251px / 100% 229.305% no-repeat;">
                @include('signin')
            </div>
        </div>
    </div>
</div>

<!-- Modal 3 -->
<div class="modal fade" id="exampleModal3" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body m-0 p-4" style="opacity:0.9; background: url('{{ asset('user/img/pic/f1.png') }}'), #0E234C 0px -0.251px / 100% 229.305% no-repeat;">
                @include('forget')
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
