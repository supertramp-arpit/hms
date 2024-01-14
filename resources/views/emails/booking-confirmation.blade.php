<!DOCTYPE html>
<html>
<head>
    <title>Booking Confirmation</title>
</head>
<body>
    <p>Dear {{ $client->name }},</p>

    <p>Thank you for booking with us. Your booking details are as follows:</p>

    <ul>
        <li><strong>Name:</strong> {{ $client->name }}</li>
        <li><strong>Email:</strong> {{ $client->email }}</li>
        <li><strong>Adults:</strong> {{ $client->adults }}</li>
        <li><strong>ID Proof:</strong> {{ $client->id_proof }}</li>
        <li><strong>Phone Number:</strong> {{ $client->mobile }}</li>
        <li><strong>Check in date:</strong> {{ $client->check_in_date }}</li>
        <li><strong>End Date:</strong> {{ $client->check_out_date }}</li>
        <li><strong>Room Type:</strong> {{ $client->room_type }}</li>
    </ul>

    <p>Thank you for choosing our services. If you have any questions or need further assistance, please don't hesitate to contact us.</p>

    <p>Best regards,</p>
    <p>Your Booking Team</p>
</body>
</html>
