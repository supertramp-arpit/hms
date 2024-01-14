@extends('layouts.main4')

@section('main-container')
<div class="sb2-2">
    <ul>
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block" style="background-color: rgb(37, 134, 7); color: white; float: right;">
                <button type="button" class="close" data-dismiss="alert" style="color: #fff"></button>
                <strong>{{ $message }}</strong>
            </div>
        @endif
        @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-block" style="background-color: red; color: white; float: right;">
                <button type="button" class="close" data-dismiss="alert" style="color: #fff">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif

<section class="container">
    <div class="conatiner-fluid mx-auto my-4">
     <h1 id="text-color" class="fs-2"><span class="" id="text-color2" >Contact Us</h1>
    </div>
    <div class="row">
       <div class="col-lg-6 col-md-6 col-sm-12">
         <div>
          <h3>We’d <span style="color:#FE3400;">love to hear</span> from you.Get in touch!</h3>
         </div>
         <div class="text-center mt-4">
            <img src="{{asset('user/img/pic/contact.png')}}" style="width:100%;height:100%;">
          </div>
         <div>
          <h4 class="mt-4">VISIT US</h4>
          <p style="font-size:20px;">Apollo Bandar, Colaba, Mumbai, Maharashtra 400001</p>
         </div>

         <div>
         </div>
         <div class="mt-3">
          <h5 class="mt-4">EMAIL</h5>
          <a href="mailto:sales@riveyrainfotech.com" style="text-decoration:none;color: black;"><p>hotel@hotelname.com</p></a>
         </div>
         <div>
          <h5 class="mt-4">PHONE NO.</h5>
          <p><a href="tel: 8299161522"  id="text-color" style="text-decoration:none;color: black;"><strong>Tell: +91-9919888269</strong></a></p>
         </div>
         <div>
          <h5  class="mt-4">FOLLOW US</h5>
          <p id="text-color " class="mt-2">
            <i class="fa fa-instagram fa-lg me-3"></i>
            <i class="fa fa-linkedin fa-lg mx-3"></i>
            <i class="fa fa-facebook fa-lg mx-3"></i>
            <i class="fa fa-twitter fa-lg mx-3"></i>
          </p>
         </div>
       </div>

        <div class="col-lg-6 col-md-6 col-sm-12">
          <div class="card shadow p-5 border-0 mb-5 bg-body rounded">
            <form action="/submit-form" method="POST">
                @csrf
                <div>
                    <h6>Full Name</h6>
                    <input type="text" name="full_name" class="form-control shadow-none mt-3" placeholder="" aria-label="Full name" style="width:100%;background: lightgrey;" required>
                </div>

                <div class="mt-3">
                    <h6>Email</h6>
                    <input type="email" name="email" class="form-control shadow-none mt-3" placeholder="" aria-label="Email" style="width:100%;background: lightgrey;" required>
                </div>

                <div class="mt-3">
                    <h6>Contact No.</h6>
                    <input type="tel" name="contact_number" class="form-control shadow-none mt-3" placeholder="" aria-label="Contact number" style="width:100%;background: lightgrey;" required>
                </div>

                <div class="mt-3">
                    <h6>What can we help you with</h6>
                    <div class="form-group">
                        <textarea name="message" class="form-control shadow-none" id="exampleFormControlTextarea1" rows="3" style="background: lightgrey;" required></textarea>
                    </div>
                </div>

                <div class="mt-3">
                    <button type="submit" class="btn w-100" style="background:#FE3400;color: white;font-size: 20px;font-weight: 500;">Submit</button>
                </div>
            </form>
          </div>
        </div>



    <div class="container mt-3">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15097.54287363368!2d72.81368655104383!3d18.914313666113415!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7d1c0d1209473%3A0xbeee8e0814d211fe!2sTaj%20Mahal%20Tower%2C%20Mumbai!5e0!3m2!1sen!2sin!4v1702460483903!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

        </div>
   </section>
 @endsection
