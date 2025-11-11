<!-- resources/views/admin/mails/accountRejected.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Application Update</title>
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
            background-color: #FFB6C1; /* your given color */
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
            color: #333; /* neutral heading */
            margin-bottom: 10px;
        }
        .email-body p {
            line-height: 1.6;
            margin-bottom: 15px;
        }
        .btn {
            display: inline-block;
            background-color: #FFB6C1; /* soft gray button */
            color: #ffff !important;
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
                <h1>Account Application Update</h1>
            </div>

            <!-- Body -->
            <div class="email-body">
                <h2>Hello, {{ $data->username ?? 'User' }}!</h2>

                <p>Thank you for your interest in joining <strong>Mixhub Services</strong>.</p>
                <p>After reviewing your application, we regret to inform you that your account has <b>not been approved</b> at this time.</p>

                <p>This may be due to incomplete details or verification requirements.  
                You can reach out to our support team for clarification or reapply in the future.</p>

                <p style="margin-top: 25px;">We appreciate your time and understanding.  
                Thank you for considering Mixhub Services — we hope to connect again soon.</p>
            </div>

            <!-- Footer -->
            <div class="email-footer">
                <p>&copy; {{ date('Y') }} Mixhub Services. All rights reserved.</p>
            </div>
        </div>
    </div>
</body>
</html>
