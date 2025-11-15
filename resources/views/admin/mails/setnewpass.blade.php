<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset - MixHub Services</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .email-container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
            border: 2px solid rgba(0,0,0,0.1);
        }
        .header {
            text-align: center;
            background-color: #007bff;
            color: white;
            padding: 20px;
            border-radius: 8px 8px 0 0;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .content {
            padding: 20px;
            line-height: 1.6;
            color: #333333;
        }
        .content h2 {
            color: #007bff;
        }
        .footer {
            text-align: center;
            border-top: 1px solid #e0e0e0;
            padding-top: 15px;
            font-size: 12px;
            color: #888888;
        }
        .button {
            display: inline-block;
            padding: 12px 20px;
            margin-top: 20px;
            background-color: #28a745;
            color: white !important;
            text-decoration: none;
            border-radius: 5px;
        }
        .button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    @php
        use Illuminate\Support\Facades\Crypt;
        $email = Crypt::encrypt($data->email);
    @endphp
    <div class="email-container">
        <div class="header">
            <h1>Reset Your Password</h1>
        </div>
        <div class="content">
            <h2>Hello, {{ $data->username }}!</h2>
            <p>We received a request to reset your password for your <strong>MixHub Services</strong> account.</p>
            <p>If you made this request, please click the button below to set a new password:</p>

            <p style="text-align: center;">
                <a href="{{ route('update-pass',$email) }}" class="button">Reset Password</a>
            </p>

            <p>If you did not request a password reset, you can safely ignore this email. Your password will remain unchanged.</p>
        </div>
        <div class="footer">
            <p>&copy; <?= date('Y') ?> MixHub Services. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
