<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Role Update Notification</title>
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
        .email-footer {
            text-align: center;
            color: #888;
            font-size: 12px;
            padding: 15px 20px;
            border-top: 1px solid #eee;
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
    </style>
</head>
<body>
    <div class="email-wrapper">
        <div class="email-content">
            <!-- Header -->
            <div class="email-header">
                <h1>Account Role Updated</h1>
            </div>

            <!-- Body -->
            <div class="email-body">
            
                <h2>Hello, {{ $data->username }}</h2>
                <p>We wanted to let you know that your account role has been updated.</p>

           @if($data->role_id == 1)
                <p><strong>New Role:</strong> Super Admin</p>
            @elseif($data->role_id == 2)
                <p><strong>New Role:</strong> Admin 
            @else
                    <p><strong>New Role:</strong> User
            @endif
                <p>If you were not expecting this change, please contact our support team immediately.</p>

                <a href="{{ url('/system-dashboard') }}" class="btn">Go to Dashboard</a>
            </div>

            <!-- Footer -->
            <div class="email-footer">
                <p>&copy; {{ date('Y') }} Mixhub. All rights reserved.</p>
            </div>
        </div>
    </div>
</body>
</html>
