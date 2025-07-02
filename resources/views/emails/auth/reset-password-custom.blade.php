<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset - Bikes By Fazenda</title>
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
            background: linear-gradient(135deg, #9935dc 0%, #7b2ab0 100%);
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
        .button-container {
            text-align: center;
            margin: 30px 0;
        }
        .reset-button {
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
        .reset-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(153, 53, 220, 0.4);
        }
        .info-section {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            margin: 20px 0;
        }
        .info-section h3 {
            color: #333;
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
            color: #555;
            position: relative;
            padding-left: 20px;
        }
        .info-list li:before {
            content: "•";
            color: #9935dc;
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
        .help-section {
            background-color: #fff3cd;
            border-left: 4px solid #ffc107;
            padding: 20px;
            margin: 20px 0;
        }
        .help-section h3 {
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
            <h1>🔐 Password Reset Request</h1>
        </div>
        
        <div class="content">
            <div class="greeting">
                Hello {{ $userName }}! 👋
            </div>
            
            <div class="message">
                We received a request to reset your password for your <strong>Bikes By Fazenda</strong> account.
                <br><br>
                If you made this request, please click the button below to create a new secure password:
            </div>
            
            <div class="button-container">
                <a href="{{ $url }}" class="reset-button">
                    🔄 Reset My Password
                </a>
            </div>
            
            <div class="info-section">
                <h3>⏰ Important Information</h3>
                <ul class="info-list">
                    <li><strong>Expiration:</strong> This link will expire in <strong>{{ $expire }} minutes</strong></li>
                    <li><strong>Security:</strong> This link can only be used <strong>once</strong></li>
                    <li><strong>Safety:</strong> If you didn't request this, please ignore this email</li>
                </ul>
            </div>
            
            <div class="security-tips">
                <h3>🔒 Security Tips</h3>
                <p>When creating your new password, make sure to:</p>
                <ul class="info-list">
                    <li>Use at least 8 characters</li>
                    <li>Include uppercase and lowercase letters</li>
                    <li>Add numbers and special characters</li>
                    <li>Avoid using personal information</li>
                </ul>
            </div>
            
            <div class="help-section">
                <h3>🆘 Need Help?</h3>
                <p>If you're having trouble with the password reset:</p>
                <ul class="info-list">
                    <li>Check that the link hasn't expired</li>
                    <li>Make sure you're using the same email address as your account</li>
                    <li>Contact our support team if you continue to have issues</li>
                </ul>
            </div>
            
            <div class="signature">
                <p><strong>Best regards,</strong></p>
                <p>The Bikes By Fazenda Team 🏍️</p>
            </div>
        </div>
        
        <div class="footer">
            <p>This email was sent to you because a password reset was requested for your Bikes By Fazenda account.</p>
            <p>If you didn't request this, please ignore this email and your password will remain unchanged.</p>
        </div>
    </div>
</body>
</html> 