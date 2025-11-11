<!-- resources/views/admin/mails/accountDeactivated.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Deactivation Notice</title>
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
            background-color: #FFB6C1;
            color: #333;
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
            color: #333;
            margin-bottom: 10px;
        }
        .email-body p {
            line-height: 1.6;
            margin-bottom: 15px;
        }
        .btn {
            display: inline-block;
            background-color: #FFB6C1;
            color: #fff !important;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 6px;
            margin-top: 20px;
            font-weight: bold;
            border: 1px solid #ddd;
        }
        .btn:hover {
            background-color: #e5e7eb;
        }
        .email-footer {
            text-align: center;
            color: #888;
            font-size: 12px;
            padding: 15px 20px;
            border-top: 1px solid #eee;
        }
        .highlight {
            color: #333;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="email-wrapper">
        <div class="email-content">
            <!-- Header -->
            <div class="email-header">
                <h1>Account Deactivation Notice</h1>
            </div>

            <!-- Body -->
            <div class="email-body">
                <h2>Hello, {{ $data->username ?? 'User' }}!</h2>

                <p>We would like to inform you that your <strong>Mixhub Services</strong> account has been <b>deactivated by an administrator</b>.</p>

                <p>This action was taken due to certain reasons or policy considerations related to your account activity.  
                If you believe this was done in error, you may contact our support team for further assistance.</p>

                <p style="margin-top: 25px;">Please contact the administrator for more information regarding your account status.</p>

                <a href="{{ url('support') }}" class="btn">Contact Administrator</a>
            </div>

            <!-- Footer -->
            <div class="email-footer">
                <p>&copy; {{ date('Y') }} Mixhub Services. All rights reserved.</p>
            </div>
        </div>
    </div>
</body>
</html>
