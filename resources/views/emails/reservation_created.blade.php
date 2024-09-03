<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Reservation Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 20px;
        }
        .container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: auto;
        }
        h1 {
            color: #2c3e50;
        }
        p {
            line-height: 1.6;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 20px;
            background-color: #3498db;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Reservation Confirmation</h1>
        <p>Dear {{ $reservation->customer->name }},</p>
        <p>Thank you for making a reservation with ABC Restaurant. Your reservation details are as follows:</p>
        <ul>
            <li><strong>Reservation ID:</strong> {{ $reservation->id }}</li>
            <li><strong>Date:</strong> {{ $reservation->reservation_date }}</li>
            <li><strong>Time:</strong> {{ $reservation->reservation_time }}</li>
            <li><strong>Number of Guests:</strong> {{ $reservation->guest_count }}</li>
        </ul>
        <p>If you have any questions or need to make changes to your reservation, please contact us at {{ $reservation->restaurant->contact_email }} or call us at {{ $reservation->restaurant->contact_phone }}.</p>
        <p>We look forward to serving you!</p>
        <p>Best regards,</p>
        <p><strong>ABC Restaurant Team</strong></p>
        <a href="{{ url('/') }}" class="button">Visit our website</a>
    </div>
</body>
</html>
