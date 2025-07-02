<x-mail::message>
# 🔐 Password Reset Request

Hello {{ $userName }}! 👋

We received a request to reset your password for your **Bikes By Fazenda** account.

If you made this request, please click the button below to create a new secure password:

<x-mail::button :url="$url" color="primary">
🔄 Reset My Password
</x-mail::button>

## ⏰ Important Information

- **Expiration**: This link will expire in **{{ $expire }} minutes**
- **Security**: This link can only be used **once**
- **Safety**: If you didn't request this, please ignore this email

## 🔒 Security Tips

When creating your new password, make sure to:
- Use at least 8 characters
- Include uppercase and lowercase letters
- Add numbers and special characters
- Avoid using personal information

## 🆘 Need Help?

If you're having trouble with the password reset:
- Check that the link hasn't expired
- Make sure you're using the same email address as your account
- Contact our support team if you continue to have issues

---

**Best regards,**  
The Bikes By Fazenda Team 🏍️

<x-slot:subcopy>
This email was sent to you because a password reset was requested for your Bikes By Fazenda account. If you didn't request this, please ignore this email and your password will remain unchanged.
</x-slot:subcopy>
</x-mail::message> 