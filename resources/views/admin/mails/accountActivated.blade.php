<!-- resources/views/admin/mails/accountActivated.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Account Has Been Activated</title>
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
            background-color: #2563eb; /* Blue from accountApprovedWelcome */
            color: #ffffff;
            text-align: center;
            padding: 25px 15px;
        }
        .email-header h1 {
            margin: 0;
            font-size: 24px;
        }
        .email-body {
            padding: 30px;
        }
        .email-body h2 {
            color: #2563eb;
            margin-bottom: 10px;
        }
        .email-body p {
            line-height: 1.6;
            margin-bottom: 15px;
        }
        .btn {
            display: inline-block;
            background-color: #2563eb;
            color: #ffffff !important;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 6px;
            margin-top: 20px;
            font-weight: bold;
        }
        .btn:hover {
            background-color: #1d4ed8;
        }
        .email-footer {
            text-align: center;
            color: #888;
            font-size: 12px;
            padding: 15px 20px;
            border-top: 1px solid #eee;
        }
        .highlight {
            color: #16a34a;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="email-wrapper">
        <div class="email-content">
            <!-- Header -->
            <div class="email-header">
                <h1>Your Account Has Been Activated 🎉</h1>
            </div>

            <!-- Body -->
            <div class="email-body">
                <h2>Hello, {{ $data->username ?? 'User' }}!</h2>

                <p>We’re pleased to let you know that your <strong>Mixhub Services</strong> account has been 
                    <span class="highlight">successfully activated</span> by the administrator.</p>

                <p>You can now log in and enjoy full access to our platform and its features.</p>

                <a href="{{ url('/system-dashboard') }}" class="btn">Log In to Your Account</a>

                <p>If you have any questions or need assistance, please contact the administrator or our support team.</p>

                <p style="margin-top: 25px;">We’re glad to have you back — enjoy your experience with Mixhub Services!</p>
            </div>

            <!-- Footer -->
            <div class="email-footer">
                <p>&copy; {{ date('Y') }} Mixhub Services. All rights reserved.</p>
            </div>
        </div>
    </div>
</body>
</html>
