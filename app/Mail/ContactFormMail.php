<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
{
    return $this->subject('Nova mensagem de contato - ' . $this->data['subject'])
                ->replyTo($this->data['email'], $this->data['name'])
                ->view('emails.contact-form');
}
} 