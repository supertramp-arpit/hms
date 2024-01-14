<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from andrewch.eu/XENIA/gallery.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 26 Oct 2023 07:38:24 GMT -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>XENIA - Luxury hotel</title>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="HandheldFriendly" content="true">
    <meta name="apple-touch-fullscreen" content="yes">
    <!-- FAVICON -->
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('assets/favicon/apple-touch-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('assets/favicon/apple-touch-icon-60x60.png') }}">
    <!-- ... (repeat for other favicon sizes) ... -->
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="msapplication-TileImage" content="{{ asset('assets/favicon/mstile-144x144.png') }}">
    <meta name="msapplication-config" content="{{ asset('assets/favicon/browserconfig.xml') }}">
    <meta name="theme-color" content="#ffffff">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400italic,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,400,700" rel="stylesheet" type="text/css">
    <!-- LIGHTBOX -->
    <link rel="stylesheet" href="{{ asset('assets/css/libs/imagelightbox.min.css') }}" type="text/css" media="all">
    <!-- OWLSLIDER -->
    <link rel="stylesheet" href="{{ asset('assets/js/libs/owl.carousel.2.0.0-beta.2.4/css/owl.carousel.css') }}" type="text/css" media="all" data-module="owlslider">
    <link rel="stylesheet" href="{{ asset('assets/js/libs/owl.carousel.2.0.0-beta.2.4/css/owl.theme.default.css') }}" type="text/css" media="all" data-module="owlslider">
    <!-- ANIMATE.CSS LIBRARY -->
    <link rel="stylesheet" href="{{ asset('assets/css/libs/animate.min.css') }}" type="text/css" media="all">
    <!-- ICON WEB FONTS -->
    <!-- HEADER SCRIPTS -->
    <script type="text/javascript" src="{{ asset('assets/js/libs/modernizr.custom.48287.js') }}"></script>
    <!-- MAIN STYLESHEETS -->
    <link rel="stylesheet" href="{{ asset('assets/css/theme_custom_bootstrap.min.css') }}" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" type="text/css" media="all">
</head>  <body style="">
    <div id="page_wrapper">
      <div class="header click_menu transparent">
        <!-- =========================== HEADER ==========================-->
        <div class="mainbar">
          <div class="container-fluid">
            <div class="logo"><a href="index.html" class="brand"><img src="{{ asset('assets/images/logo.png') }}" alt="logo"></a></div>
            <div class="nav_and_tools nav_centered uppercase transparent">
              <nav class="primary_nav">
                <ul class="nav">
                    <li><a href="{{ url('/user') }}">Home</a></li>
                    <li><a href="{{ url('/room-list') }}">Rooms</a></li>
                    <li><a href="{{ url('/location') }}">Location</a></li>
                    <li><a href="{{ url('/index-activities') }}">Activities</a></li>
                    <li><a href="{{ url('/index-restaurant') }}">Restaurant</a></li>
                    <li><a href="{{ url('/gallery') }}">Gallery</a></li>
                    <li><a href="{{ url('/blog') }}">Blog</a></li>
                    <li><a href="{{ url('/contact') }}">Contact</a></li></ul>
              </nav>
            </div>
          </div><a class="menu-toggler"><span class="title"></span><span class="lines"></span></a>
        </div>
        <!-- END======================== HEADER ==========================-->
      </div>
      <div class="main">
        <section class="white_section no_padding text-center">
          <div class="portfolio_grid">
            <div id="cont_medicus" class="masonry isotope isotope_portfolio_container">
              <div class="col-md-4 images">
                <div class="row">
                  <div class="portfolio_item"><a href="{{ asset('assets/images/gallery-1.jpg') }}" class="lightbox_gallery"><img src="{{ asset('assets/images/gallery-1.jpg') }}" alt="Image"></a></div>
                </div>
              </div>
              <div class="col-md-4 images">
                <div class="row">
                  <div class="portfolio_item"><a href="{{ asset('assets/images/gallery-4.jpg') }}" class="lightbox_gallery"><img src="{{ asset('assets/images/gallery-4.jpg') }}" alt="Image"></a></div>
                </div>
              </div>
              <div class="col-md-4 images">
                <div class ="row">
                  <div class="portfolio_item"><a href="{{ asset('assets/images/gallery-6.jpg') }}" class="lightbox_gallery"><img src="{{ asset('assets/images/gallery-6.jpg') }}" alt="Image"></a></div>
                </div>
              </div>
              <div class="col-md-4 images">
                <div class="row">
                  <div class="portfolio_item"><a href="{{ asset('assets/images/gallery-3.jpg') }}" class="lightbox_gallery"><img src="{{ asset('assets/images/gallery-3.jpg') }}" alt="Image"></a></div>
                </div>
              </div>
              <div class="col-md-4 images">
                <div class="row">
                  <div class="portfolio_item"><a href="{{ asset('assets/images/gallery-7.jpg') }}" class="lightbox_gallery"><img src="{{ asset('assets/images/gallery-7.jpg') }}" alt="Image"></a></div>
                </div>
              </div>
              <div class="col-md-4 images">
                <div class="row">
                  <div class="portfolio_item"><a href="{{ asset('assets/images/gallery-2.jpg') }}" class="lightbox_gallery"><img src="{{ asset('assets/images/gallery-2.jpg') }}" alt="Image"></a></div>
                </div>
              </div>
              <div class="col-md-12 images">
                <div class="row">
                  <div class="portfolio_item"><a href="{{ asset('assets/images/gallery-5.jpg') }}" class="lightbox_gallery"><img src="{{ asset('assets/images/gallery-5.jpg') }}" alt="Image"></a></div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
      <footer class="footer undefined">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 padding_top padding_bottom text-center">
                    <a href="{{ url('index') }}"><img src="{{ asset('assets/images/logo.png') }}" alt="logo" width="100"></a>
                    <div class="text_block"></div>
                    <div class="text_block margin_top">
                        <div class="footer_block"><i class="icon icon-Phone margin_left_custom_1"></i>255 - 5546 989</div>
                        <div class="footer_block"><i class="icon icon-Flag margin_left_custom_1"></i>Mercury Hills 40, Atlanta</div>
                        <div class="footer_block"><i class="icon icon-Keyboard margin_left_custom_1"></i>support@xenia.com</div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 copyright_content vcenter">
                    <div class="col-md-4">
                        <div class="copyright small_screen_text_center">
                            <p>COPYRIGHT © 2015 ALL RIGHTS RESERVED XENIA HOTEL</p>
                        </div>
                    </div>
                    <div class="col-md-4 award">
                        <img src="{{ asset('assets/images/award.png') }}" width="120" alt="Image" class="center-block">
                    </div>
                    <div class="col-md-4 text-right small_screen_text_center">
                        <div class="widget_footer_menu"><a href="{{ url('index') }}">ABOUT</a><a href="{{ url('room-list') }}">ROOMS</a><a href="{{ url('contact') }}">CONTACT</a></div>
                        <div class="social"><a href="#" title="circletwitterbird" class="symbol"></a><a href="#" title="circleinstagram" class="symbol"></a><a href="#" title="circlefacebook" class="symbol"></a><a href="#" title="circleskype" class="symbol"></a></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <div class="secondary_nav_widgetized_area">
        <nav>
            <ul>
                <li><a href="{{ url('index-gym') }}">Gym</a></li>
                <li><a href="{{ url('index-spa') }}">Spa</a></li>
                <li><a href="{{ url('index-package-offer') }}">Package</a></li>
                <li><a href="{{ url('room-single') }}">Room Single</a></li>
                <li><a href="{{ url('blog-boxed') }}">Blog Masonry</a></li>
                <li><a href="{{ url('room-list-compact') }}">Room List Grid</a></li>
                <li><a href="{{ url('single') }}">Post Single</a></li>
                <li><a href="{{ url('booking') }}">Booking</a></li>
                <li><a href="{{ url('404') }}">404</a></li>
            </ul>
        </nav>
        <aside class="widget widget_text">
            <h4>ABOUT XENIA</h4>
            <div class="textwidget text-justify">
                Either you look for a luxurious experience or a remarkable on the go experience, Xenia Resort is the place to visit and spend the time at. We offer quality services.
            </div>
            <div class="text_block">
                <div><i class="icon icon-Phone"></i>255 - 5546 989</div>
                <div><i class="icon icon-Flag"></i>Mercury Hills 40, Atlanta</div>
                <div><i class="icon icon-Keyboard"></i>support@xenia.com</div>
            </div>
        </aside>
        <div class="col-md-12">
            <div class="secondary_widgetized_area_copyright small_screen_text_center">
                <p>COPYRIGHT © 2015 ALL RIGHTS RESERVED</p>
            </div>
        </div>
    </div>
    </div>
    <script src="{{ asset('assets/js/config.js') }}" data-module="main-configuration"></script>
<!-- ==================== SCRIPTS | GLOBAL ====================-->
<script src="{{ asset('assets/js/libs/jquery-2.1.4.js') }}"></script>
<script src="{{ asset('assets/js/libs/bootstrap.js') }}"></script>
<script src="{{ asset('assets/js/libs/wow.js') }}" data-module="wow-animation-lib"></script>
<script src="{{ asset('assets/js/libs/conformity/dist/conformity.js') }}" data-module="equal-column-height"></script>
<!-- END====================== SCRIPTS ========================-->
<!-- =================== SCRIPTS | SECTIONS ===================-->
<script src="{{ asset('assets/js/libs/jquery.isotope.js') }}" data-module=""></script>
<script src="{{ asset('assets/js/libs/imagelightbox.js') }}" data-module=""></script>
<script src="{{ asset('assets/js/libs/owl.carousel.2.0.0-beta.2.4/owl.carousel.js') }}" data-module="owlslider"></script>
<script src="{{ asset('assets/js/owlslider-init.js') }}" data-module="owlslider"></script>
<!-- END================ SCRIPTS | SECTIONS ===================-->
<script src="{{ asset('assets/js/libs/moment.js') }}"></script>
<script src="{{ asset('assets/js/libs/bootstrap-datetimepicker.js') }}"></script>
<!-- ==================== SCRIPTS | INIT ======================-->
<script src="{{ asset('assets/js/theme.js') }}" data-module="main-theme-js"></script>

    </body>
    </html>

