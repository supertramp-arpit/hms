<!-- resources/views/emails/welcome_email.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome Email</title>
    <style>
        /* Add some basic styling */
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f5f5f5;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333333;
        }
        p {
            color: #555555;
        }
        .logo {
            max-width: 200px;
            margin-bottom: 20px;
        }
        .banner-img {
            width: 100%;
            max-height: 300px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        @include('components.header', ['logoPath' => public_path('assets/images/logo.png')])

        @include('components.banner', ['bannerImagePath' => public_path('assets/images/hotel.jpeg')])



        <!-- Content -->
        <h1>Welcome to Our Platform!</h1>
        <p>Dear {{ $guest->name }},</p>
        <p>Thank you for joining our platform. We are thrilled to have you with us.</p>
        <!-- Your welcome message content -->

        <!-- Add any other content or instructions here -->

        <!-- Footer -->        @include('components.footer')
            </div>
</body>
</html>
