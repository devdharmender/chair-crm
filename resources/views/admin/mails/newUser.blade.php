<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to MixHub Services</title>
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
            padding: 15px;
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
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <h1>Welcome to MixHub Services!</h1>
        </div>
        <div class="content">
            <h2>Hello, {{ $data->username }}!</h2>
            <p>We are thrilled to welcome you to <strong>Delhi's best chair repair & services startup</strong>. At MixHub Services, we take pride in delivering top-quality repair services with care and dedication.</p>

            <p>Whether it’s fixing your favorite chair or giving it a brand-new look, our team is here to ensure comfort and style in every seat you own.</p>

            <p>Stay connected with us for the latest updates, tips, and special offers. We are excited to have you on this journey with us!</p>

        </div>
        <div class="footer">
            &copy; <?= date('Y') ?> MixHub Services. All rights reserved.<br>
            Follow us on social media to stay updated!
        </div>
    </div>
</body>
</html>
