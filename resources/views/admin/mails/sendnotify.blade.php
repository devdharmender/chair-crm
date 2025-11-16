<!-- resources/views/admin/mails/verifyEmail.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification Required</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f7;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .email-wrapper {
            width: 100%;
            background-color: #f4f4f7;
            padding: 40px 0;
        }
        .email-content {
            max-width: 600px;
            background-color: #ffffff;
            margin: 0 auto;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0,0,0,0.08);
        }
        .email-header {
            background-color: #2563eb;
            color: #ffffff;
            text-align: center;
            padding: 20px;
        }
        .email-body {
            padding: 30px;
        }
        .email-body h2 {
            color: #2563eb;
            margin-bottom: 10px;
        }
        .btn {
            display: inline-block;
            background-color: #2563eb;
            color: #ffffff !important;
            text-decoration: none;
            padding: 12px 25px;
            border-radius: 6px;
            margin-top: 20px;
            font-weight: bold;
        }
        .email-footer {
            text-align: center;
            color: #888;
            font-size: 12px;
            padding: 15px 20px;
            border-top: 1px solid #eee;
        }
    </style>
</head>
<body>
<div class="email-wrapper">
    <div class="email-content">

        <!-- Header -->
        <div class="email-header">
            <h1>Verify Your Email</h1>
        </div>

        <!-- Body -->
        <div class="email-body">
            <h2>Hello, {{ $data->username ?? 'User' }}</h2>

            <p>
                Thank you for registering with <strong>Mixhub Services</strong>.<br>
                To complete your account setup and access all features, please verify your email address.
            </p>

            <center>
                <a href="{{ route('verify-email', $data->email) }}" class="btn">Verify Your Email</a>

            <p style="margin-top: 20px;">
                If you didn’t create an account with us, you can safely ignore this email.
            </p>

        </div>

        <!-- Footer -->
        <div class="email-footer">
            <p>&copy; {{ date('Y') }} Mixhub Services. All rights reserved.</p>
        </div>

    </div>
</div>
</body>
</html>
