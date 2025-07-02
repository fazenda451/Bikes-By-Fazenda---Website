<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset Success - Bikes By Fazenda</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f4;
            line-height: 1.6;
        }
        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        .header {
            background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
            padding: 30px 20px;
            text-align: center;
            color: white;
        }
        .logo {
            max-width: 200px;
            height: auto;
            margin-bottom: 10px;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
            font-weight: 600;
        }
        .content {
            padding: 40px 30px;
        }
        .greeting {
            font-size: 18px;
            color: #333;
            margin-bottom: 20px;
        }
        .message {
            color: #555;
            margin-bottom: 30px;
        }
        .success-icon {
            text-align: center;
            font-size: 48px;
            margin: 20px 0;
        }
        .button-container {
            text-align: center;
            margin: 30px 0;
        }
        .login-button {
            display: inline-block;
            background: linear-gradient(135deg, #9935dc 0%, #7b2ab0 100%);
            color: white;
            text-decoration: none;
            padding: 15px 30px;
            border-radius: 8px;
            font-weight: bold;
            font-size: 16px;
            box-shadow: 0 4px 15px rgba(153, 53, 220, 0.3);
            transition: all 0.3s ease;
        }
        .login-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(153, 53, 220, 0.4);
        }
        .info-section {
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
            padding: 20px;
            border-radius: 8px;
            margin: 20px 0;
        }
        .info-section h3 {
            color: #155724;
            margin-top: 0;
            font-size: 16px;
        }
        .info-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .info-list li {
            padding: 5px 0;
            color: #155724;
            position: relative;
            padding-left: 20px;
        }
        .info-list li:before {
            content: "✓";
            color: #28a745;
            font-weight: bold;
            position: absolute;
            left: 0;
        }
        .security-tips {
            background-color: #e8f4fd;
            border-left: 4px solid #9935dc;
            padding: 20px;
            margin: 20px 0;
        }
        .security-tips h3 {
            color: #333;
            margin-top: 0;
        }
        .footer {
            background-color: #f8f9fa;
            padding: 20px 30px;
            text-align: center;
            color: #666;
            font-size: 12px;
            border-top: 1px solid #e1e1e1;
        }
        .signature {
            margin: 30px 0;
            padding-top: 20px;
            border-top: 1px solid #e1e1e1;
            text-align: center;
        }
        .signature p {
            margin: 5px 0;
            color: #333;
        }
        .reset-time {
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 5px;
            text-align: center;
            margin: 20px 0;
            color: #666;
            font-size: 14px;
        }
        @media only screen and (max-width: 600px) {
            .email-container {
                margin: 10px;
                border-radius: 5px;
            }
            .content {
                padding: 20px 15px;
            }
            .header {
                padding: 20px 15px;
            }
            .header h1 {
                font-size: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <img src="{{ asset('images/BikesByFazenda.png') }}" alt="Bikes By Fazenda" class="logo">
            <h1>✅ Password Successfully Reset</h1>
        </div>
        
        <div class="content">
            <div class="success-icon">
                🎉
            </div>
            
            <div class="greeting">
                Hello {{ $userName }}! 👋
            </div>
            
            <div class="message">
                Great news! Your password has been <strong>successfully reset</strong> for your <strong>Bikes By Fazenda</strong> account.
                <br><br>
                You can now log in to your account using your new password.
            </div>
            
            <div class="button-container">
                <a href="{{ $loginUrl }}" class="login-button">
                    🚀 Login to Your Account
                </a>
            </div>
            
            <div class="reset-time">
                <strong>Password reset completed on:</strong><br>
                {{ $resetTime }}
            </div>
            
            <div class="info-section">
                <h3>✅ What happened?</h3>
                <ul class="info-list">
                    <li>Your password has been successfully updated</li>
                    <li>All your account data remains secure</li>
                    <li>You can now access your account normally</li>
                </ul>
            </div>
            
            <div class="security-tips">
                <h3>🔒 Security Reminders</h3>
                <p>To keep your account secure:</p>
                <ul class="info-list">
                    <li>Never share your password with anyone</li>
                    <li>Use a unique password for each account</li>
                    <li>Enable two-factor authentication if available</li>
                    <li>Log out when using shared devices</li>
                </ul>
            </div>
            
            <div class="signature">
                <p><strong>Best regards,</strong></p>
                <p>The Bikes By Fazenda Team 🏍️</p>
            </div>
        </div>
        
        <div class="footer">
            <p>This email confirms that your password was successfully reset for your Bikes By Fazenda account.</p>
            <p>If you didn't perform this action, please contact our support team immediately.</p>
        </div>
    </div>
</body>
</html> 