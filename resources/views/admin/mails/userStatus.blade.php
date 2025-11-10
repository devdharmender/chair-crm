<!-- resources/views/admin/mails/userStatus.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Status Notification</title>
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
        .status-badge {
            display: inline-block;
            padding: 6px 12px;
            color: #ffffff;
            border-radius: 6px;
            font-weight: bold;
        }
        .status-active { color: #16a34a; } /* green */
        .status-inactive { color: #dc2626; } /* red */
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
                <h1>Account Status Update</h1>
            </div>

            <!-- Body -->
            <div class="email-body">
                <h2>Hello, {{ $data->username ?? $data->username ?? 'User' }}</h2>
                <p>We wanted to inform you that your account with <strong>Mixhub Services</strong> is now: 
                    <span class="status-badge  {{ $data->status === 'active' ? 'status-active' : 'status-inactive' }}"> {{ ucfirst($data->status) }}</span>
                </p>

                <p>Additional information:</p>
                <ul>
                    <li>Email: {{ $data->email }}</li>
                    <li>Role: {{ $data->role_id == 1 ? 'Super Admin' : ($data->role_id == 2 ? 'Admin' : 'User') }}</li>
                    <li>Updated on: {{ now()->timezone('Asia/Kolkata')->format('F j, Y, g:i a') }} (IST)</li>

                </ul>

                <p>If you did not expect this change, please contact our support team immediately.</p>

            </div>

            <!-- Footer -->
            <div class="email-footer">
                <p>&copy; {{ date('Y') }} Mixhub Services. All rights reserved.</p>
            </div>
        </div>
    </div>
</body>
</html>
