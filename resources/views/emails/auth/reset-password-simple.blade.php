@component('mail::message')
# Password Reset Request

Hello {{ $userName }},

We received a request to reset your password for your Bikes By Fazenda account.

If you made this request, please click the button below to create a new password:

@component('mail::button', ['url' => $url])
Reset Password
@endcomponent

**Important Information:**
- This link will expire in {{ $expire }} minutes
- This link can only be used once
- If you didn't request this, please ignore this email

**Security Tips:**
- Use at least 8 characters
- Include uppercase and lowercase letters
- Add numbers and special characters
- Avoid using personal information

If you're having trouble, please contact our support team.

Best regards,  
The Bikes By Fazenda Team

@slot('subcopy')
This email was sent to you because a password reset was requested for your Bikes By Fazenda account. If you didn't request this, please ignore this email and your password will remain unchanged.
@endslot
@endcomponent 