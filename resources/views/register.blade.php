<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Add your meta tags, title, and other dependencies as needed -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css">

    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- jQuery and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"></script>

    <!-- Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>

    <!-- Your custom styles or other libraries -->
    <style>
        /* Style for modal close button */
        .modal-close-button {
            font-size: 40px; /* Increased the font size for the close button */
        }

        /* Style for form container */
        .form-container {
            padding: 20px;
        }

        /* Style for form fields */
        .form-control {
            border-radius: 20px;
            padding: 10px;
            font-size: 14px;
            margin-bottom: 15px;
        }

        /* Style for the Google and Facebook buttons */
        .social-signup {
            display: flex;
            justify-content: center;
            margin-top: 20px; /* Added margin */
        }

        .social-signup .btn {
            margin-right: 10px;
        }

        /* Style for tabs */
        .nav-link {
            cursor: pointer;
        }

        /* Style for the file input button */
        .custom-file-input {
            color: transparent;
        }

        .custom-file-input::-webkit-file-upload-button {
            visibility: hidden;
        }

        .custom-file-input::before {
            content: 'Upload File';
            display: inline-block;
            background: #007bff; /* Button color */
            color: #fff;
            border: 1px solid transparent;
            border-radius: 20px;
            padding: 6px 12px;
            cursor: pointer;
        }

        /* Override Bootstrap file input styles */
        .custom-file-label {
            overflow: hidden;
        }
    </style>
<script>
    $(document).ready(function () {
        $('#registration-form').on('submit', function (e) {
            e.preventDefault();
            var formData = new FormData(this);

            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    // Handle success response if needed
                    console.log(response);
                    // Display success message in a pop-up
                    alert('Registration successful!');
                    // Refresh the page after showing the alert
                    location.reload();
                },
                error: function (xhr) {
                    var errors = xhr.responseJSON.errors;
                    // Clear previous errors
                    $('.text-danger').html('');
                    // Display errors under respective form fields
                    $.each(errors, function(field, message) {
                        $('#' + 'error_' + field).html(message[0]);
                    });
                }
            });
        });
    });
</script>



    <script>
        $(document).ready(function(){
            $('#registration-tab').on('click', function () {
                $('#login-form').hide();
                $('#registration-form').show();
            });
            $('#login-tab').on('click', function () {
                $('#registration-form').hide();
                $('#login-form').show();
            });
        });
    </script>
</head>
<body>
    <!-- Your HTML content -->

    <!-- Registration Modal -->
    <div class="modal fade" id="registrationModal" tabindex="-1" role="dialog" aria-labelledby="registrationModalLabel" aria-hidden="true">
        <div class="modal-dialog d-flex align-items-center justify-content-center mt-auto" style="height: 100vh;">
            <div class="modal-content">
                <div class="modal-header">

                    <h5 class="modal-title" id="registrationModalLabel">Register or Login</h5>

                    <button type="button" class="close modal-close-button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body form-container">
                    <ul class="nav nav-tabs" id="authTabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="registration-tab" data-toggle="tab" href="#registration-content" role="tab" aria-controls="registration" aria-selected="true">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="login-tab" data-toggle="tab" href="#login-content" role="tab" aria-controls="login" aria-selected="false">Login</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="authTabContent">
                        <!-- Registration Tab -->
                        <div class="tab-pane fade show active" id="registration-content" role="tabpanel" aria-labelledby="registration-tab">
                            <form method="POST" action="{{ route('add_user') }}" id="registration-form" enctype="multipart/form-data">
                                @csrf
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <input type="text" name="name" class="form-control" placeholder="Name" required>
                                        <span class="text-danger" id="error_name"></span>

                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="id_proof" class="form-control" placeholder="ID Proof" required>
                                        <span class="text-danger" id="error_id_proof"></span>

                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <input type="email" name="email" class="form-control" placeholder="Email" required>
                                        <span class="text-danger" id="error_email"></span>

                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="mobile" class="form-control" placeholder="Mobile" required>
                                        <span class="text-danger" id="error_mobile"></span>

                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input @error('profile_picture') is-invalid @enderror" name="profile_picture" id="profile_picture">
                                            @error('profile_picture')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <label class="custom-file-label" for="profile_picture">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">Register</button>
                            </form>

                            <!-- Google and Facebook Signup Icons -->
                            <div class="social-signup">
                                <a href="{{route('google_login')}}" class="btn btn-danger">
                                    <i class="fab fa-google"></i> Sign up with Google
                                </a>
                                <a href="" class="btn btn-primary">
                                    <i class="fab fa-facebook"></i> Sign up with Facebook
                                </a>
                            </div>
                        </div>

                        <!-- Login Tab (You can create a separate login form here) -->
                        <div class="tab-pane fade" id="login-content" role="tabpanel" aria-labelledby="login-tab">
                            <form method="POST" action="{{ route('login') }}" id="login-form">
                                @csrf
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                                </div>
                                <div class="form-group">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#passwordResetModal">
                                    Forgot Password
                                </button>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">Login</button>
                            </form>
                        </div>
                        <!-- Trigger the modal -->


<!-- The Modal -->
<div class="modal fade" id="passwordResetModal" tabindex="-1" role="dialog" aria-labelledby="passwordResetModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title" id="passwordResetModalLabel">Forgot Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- Modal Body -->
            <div class="modal-body">
                <!-- Form for password reset -->
                <form id="passwordResetForm">
                    <div class="form-group">
                        <label for="resetEmail">Email address</label>
                        <input type="email" class="form-control" id="resetEmail" name="email" required>
                    </div>
                    <button type="button" class="btn btn-primary" id="sendOtpBtn">Send OTP</button>
                    <div id="otpSection" style="display: none;">
                        <div class="form-group mt-3">
                            <label for="otp">OTP</label>
                            <input type="number" class="form-control" id="otp" name="otp" required>
                        </div>
                        <div class="form-group">
                            <label for="newPassword">New Password</label>
                            <input type="password" class="form-control" id="newPassword" name="password" required>
                        </div>
                        <button type="button" class="btn btn-primary" id="resetPasswordBtn">Reset Password</button>
                    </div>
                    <div id="resetResponse"></div>
                </form>
            </div>
        </div>
    </div>
</div>

                    </div>
                </div>
            </div>
        </div>
    </div>

<script>
    $(document).ready(function () {
    var otpSent = false;

    // Send OTP button click
    $('#sendOtpBtn').click(function () {
        var email = $('#resetEmail').val();
        $.ajax({
            url: '{{ route("forgot.password") }}',
            method: 'POST',
            data: {
                '_token': '{{ csrf_token() }}',
                'email': email
            },
            success: function (response) {
                if (response.success) {
                    $('#otpSection').show();
                    otpSent = true; // Set a flag to indicate OTP is sent
                } else {
                    $('#resetResponse').html('<div class="alert alert-danger">' + response.error + '</div>');
                }
            }
        });
    });

    // Reset Password button click
    $('#resetPasswordBtn').click(function () {
        var email = $('#resetEmail').val();
        var otp = $('#otp').val();
        var password = $('#newPassword').val();

        if (!otpSent) {
            // If OTP is not sent yet, send it first
            $.ajax({
                url: '{{ route("forgot.password") }}',
                method: 'POST',
                data: {
                    '_token': '{{ csrf_token() }}',
                    'email': email
                },
                success: function (response) {
                    if (response.success) {
                        $('#otpSection').show();
                        otpSent = true; // Set a flag to indicate OTP is sent
                    } else {
                        $('#resetResponse').html('<div class="alert alert-danger">' + response.error + '</div>');
                    }
                }
            });
        } else {
            // Verify OTP and reset password
            $.ajax({
                url: '{{ route("verify.otp") }}', // Change this to the route for OTP verification and password reset
                method: 'POST',
                data: {
                    '_token': '{{ csrf_token() }}',
                    'email': email,
                    'otp': otp,
                    'password': password
                },
                success: function (response) {
                    if (response.success) {
                        $('#resetResponse').html('<div class="alert alert-success">' + response.message + '</div>');
                        $('#passwordResetModal').modal('hide');
                    } else {
                        $('#resetResponse').html('<div class="alert alert-danger">' + response.error + '</div>');
                    }
                }
            });
        }
    });
});

</script>

</body>
</html>
