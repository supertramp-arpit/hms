<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom CSS for additional styling */
        body {
            margin: 20px;
        }
        .custom-form {
            max-width: 400px;
            margin: 0 auto;
        }
        .custom-btn {
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="custom-form">
        @if ($message = Session::get('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ $message }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert" style="color: #fff">×</button>
            <strong>{{ $message }}</strong>
        </div>
        @endif

        <h2>Forgot Password</h2>
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <button type="submit" class="btn btn-primary custom-btn">Send Reset Link</button>
        </form>
    </div>

    <!-- Bootstrap JS for alert dismissal -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
