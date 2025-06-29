<?php

namespace App\Notifications;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Config;

class CustomVerifyEmail extends VerifyEmail
{
    /**
     * Build the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $verificationUrl = $this->verificationUrl($notifiable);
        $expire = config('auth.verification.expire', 60);

        return (new MailMessage)
            ->subject('Confirm Your Email Address - Bikes By Fazenda')
            ->markdown('emails.verify-email', [
                'user' => $notifiable,
                'verificationUrl' => $verificationUrl,
                'expireMinutes' => $expire,
            ]);
    }
} 