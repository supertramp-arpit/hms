<div class="container">
    <div class="d-flex justify-content-center">
        <div class="mt-3">
            <form class="mt-2 p-1" method="POST" action="{{ route('login') }}">
                @csrf

                <h2 class="mt-2" style="font-weight:bold;color: white;">Log in</h2>

                <div class=" mt-3">
                    <label for="email" class="form-label" style="font-size:15px;color: white;">Email Address</label>
                    <input type="email" name="email" class="form-control shadow-none" id="email" aria-describedby="emailHelp">
                </div>

                <div class="mt-2">
                    <label for="password" class="form-label" style="font-size:15px;color: white;">Password</label>
                    <input type="password" name="password" id="password" class="form-control shadow-none" aria-describedby="passwordHelpBlock">
                </div>

                <div class="mt-2 d-flex" style="font-size:14px;">
                    <input type="checkbox" style="color: grey;">
                    <label for="remember" class="ms-2" style="font-size:16px;color: white;">Remember me</label>
                    <h6 class="ms-auto" style="color:#FF3500;font-weight:800;" data-bs-toggle="modal" data-bs-target="#exampleModal3" role="button">Forgot Password ?</h6>
                </div>

                <div>
                    <button type="submit" class="btn mt-4 w-100" style="background-color:#FE3400; color:white;font-weight:600;">Log In</button>
                </div>

                <div class="mt-2">
                    <p class="text-center " style="color: white;">or continue with</p>
                </div>

                <div class="row">
                    <div class="d-inline">
                        <div class="text-center p-2">
                            <img src="{{asset('user/img/icon/fi.jpeg')}}" style="border-radius:50%;">
                            <a href="{{ route('google_login') }}">
                                <img src="{{ asset('user/img/icon/in.jpeg') }}" style="border-radius: 50%;">
                            </a>

                        </div>
                    </div>

                    <p class="text-center mt-2" style="color:grey;font-weight: bolder;"> Do not have an account ? <span class="ms-1" style="color:#FE3400;;font-weight: bolder;" data-bs-toggle="modal" data-bs-target="#exampleModal2" role="button">Sign Up</span></p>
                </div>
            </form>
        </div>
    </div>
</div>
