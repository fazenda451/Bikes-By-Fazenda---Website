<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    /**
     * Redireciona o usuário para a página de autenticação do Google.
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtém as informações do utilizador do Google após o login.
     */
    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
            
            // Verifica se o utilizador já existe pelo google_id
            $user = User::where('google_id', $googleUser->id)->first();
            
            // Se não encontrou pelo google_id, verifica pelo email
            if (!$user) {
                $user = User::where('email', $googleUser->email)->first();
                
                // Se encontrou pelo email, atualiza o google_id
                if ($user) {
                    $user->update([
                        'google_id' => $googleUser->id,
                        'avatar' => $googleUser->avatar,
                    ]);
                } else {
                    // Cria um novo usuário
                    $user = User::create([
                        'name' => $googleUser->name,
                        'email' => $googleUser->email,
                        'google_id' => $googleUser->id,
                        'avatar' => $googleUser->avatar,
                        'email_verified_at' => now(), // Email já está verificado pelo Google
                    ]);
                }
            }
            
            // Autentica o usuário
            Auth::login($user);
            
            return redirect()->intended('dashboard');
            
        } catch (\Exception $e) {
            return redirect()->route('login')->with('error', 'Ocorreu um erro ao fazer login com o Google.');
        }
    }
}
