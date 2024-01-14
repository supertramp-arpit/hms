<!DOCTYPE html>
<html>
<head>
    <title>Password Reset Link</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Inline CSS */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            padding: 20px;
            max-width: 600px;
            margin: 0 auto;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #3498db;
            color: #ffffff;
            text-decoration: none;
            border-radius: 5px;
        }

        .btn:hover {
            background-color: #2980b9;
            color: #ffffff;
        }
    </style>
</head>
<body>
    <div class="container">
        <p>Hello,</p>
        <p>Please click the button below or copy-paste the link into your browser's address bar to reset your password:</p>
        <p>
            <a href="{{ $resetLink }}" class="btn">Reset Password</a>
        </p>
        <p>If you did not request a password reset, please ignore this email.</p>
        <p>Thank you!</p>
    </div>
</body>
</html>
