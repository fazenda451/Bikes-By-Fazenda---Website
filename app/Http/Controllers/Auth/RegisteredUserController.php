<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'regex:/^[a-zA-ZÀ-ÿ\s]+$/'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'password_confirmation' => ['required', 'string'],
            'phone' => ['required', 'string', 'regex:/^[0-9+\-\s()]+$/', 'max:20'],
            'address' => ['required', 'string', 'max:1000'],
            'terms' => ['required', 'accepted'],
        ]);

        try {
            $user = User::create([
                'name' => strip_tags(trim($request->name)),
                'email' => filter_var(trim($request->email), FILTER_SANITIZE_EMAIL),
                'phone' => $request->phone ? strip_tags(trim($request->phone)) : null,
                'address' => $request->address ? strip_tags(trim($request->address)) : null,
                'password' => Hash::make($request->password),
            ]);

            event(new Registered($user));

            Auth::login($user);

            return redirect(route('dashboard', absolute: false));
        } catch (\Exception $e) {
            Log::error('Erro no registo de utilizador: ' . $e->getMessage(), [
                'email' => $request->email,
                'name' => $request->name,
                'address_length' => $request->address ? strlen($request->address) : 0,
            ]);
            
            return back()->withErrors(['email' => 'Ocorreu um erro durante o registo. Tente novamente.'])->withInput();
        }
    }
}
