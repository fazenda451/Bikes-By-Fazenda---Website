<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string'
        ]);

        try {
            Mail::to('bikesbyfazenda@gmail.com')->send(new ContactFormMail($validated));
            
            return redirect()->back()->with('success', 'Mensagem enviada com sucesso! Entraremos em contato em breve.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Ocorreu um erro ao enviar a mensagem. Por favor, tente novamente.');
        }
    }
} 