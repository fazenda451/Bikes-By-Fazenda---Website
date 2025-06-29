@component('mail::message')
<div style="background: linear-gradient(135deg, #9935dc 0%, #7b2ab0 100%); padding: 32px 0 16px 0; text-align: center; border-radius: 12px 12px 0 0;">
    <img src="{{ asset('images/BikesByFazenda.png') }}" alt="Bikes By Fazenda" style="max-width: 180px; margin-bottom: 10px;">
    <h1 style="color: #fff; font-size: 2rem; font-weight: 700; margin: 0; letter-spacing: 1px;">Welcome to Bikes By Fazenda!</h1>
    <p style="color: #f3eaff; font-size: 1.1rem; margin: 8px 0 0 0;">Your motorcycle adventure starts here</p>
</div>

<div style="background: #fff; padding: 32px 24px 24px 24px; border-radius: 0 0 12px 12px; box-shadow: 0 4px 24px rgba(153,53,220,0.07); margin-bottom: 16px;">
    <h2 style="color: #9935dc; font-size: 1.3rem; font-weight: 700; margin-bottom: 18px;">Hello {{ $user->name }}! 👋</h2>
    <p style="color: #333; font-size: 1.1rem; line-height: 1.6; margin-bottom: 18px;">
        Thank you for registering with <b>Bikes By Fazenda</b>! We're excited to have you join our community of motorcycle enthusiasts.<br>
        To complete your registration and start exploring our amazing collection of motorcycles, please confirm your email address by clicking the button below.
    </p>
    <div style="text-align: center; margin: 32px 0;">
        @component('mail::button', ['url' => $verificationUrl, 'color' => 'primary'])
            🏍️ Confirm Email Address
        @endcomponent
    </div>
    <div style="background: #f8f9fa; border-left: 4px solid #9935dc; padding: 18px 20px; border-radius: 8px; margin-bottom: 18px;">
        <b style="color: #9935dc;">Important:</b> This verification link will expire in <b>{{ $expireMinutes }} minutes</b>.<br>
        If you did not create an account with Bikes By Fazenda, please ignore this email.
    </div>
    <div style="margin: 24px 0 0 0;">
        <h3 style="color: #7b2ab0; font-size: 1.1rem; font-weight: 600; margin-bottom: 10px;">How to get started:</h3>
        <ol style="color: #333; font-size: 1rem; padding-left: 20px;">
            <li>Click the confirmation button above</li>
            <li>Explore our motorcycle collection</li>
            <li>Start your adventure!</li>
        </ol>
    </div>
    <p style="color: #888; font-size: 0.95rem; margin-top: 32px;">Best regards,<br><b>The Bikes By Fazenda Team</b></p>
</div>

@slot('subcopy')
<div style="background: #f8f9fa; padding: 16px; border-radius: 8px; text-align: center; font-size: 0.95rem; color: #666;">
    If you're having trouble clicking the "Confirm Email Address" button, copy and paste the URL below into your web browser:<br>
    <span style="color: #9935dc; word-break: break-all;">{{ $verificationUrl }}</span>
</div>
@endslot
@endcomponent 