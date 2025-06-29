<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request): RedirectResponse
    {
        $user = $request->user();

        try {
            // Verificar se é uma alteração de password ou de informações pessoais
            $isPasswordChange = $request->has('password') && !empty($request->password);
            
            if ($isPasswordChange) {
                // Validação específica para alteração de password
                $validated = $request->validate([
                    'current_password' => ['required', 'current_password'],
                    'password' => ['required', 'string', 'min:8', 'confirmed'],
                ]);

                // Atualizar apenas a password
                $user->password = Hash::make($validated['password']);
                $user->save();

                return redirect()->route('profile')
                    ->with('success', 'Password changed successfully!')
                    ->with('notification_type', 'success')
                    ->with('notification_message', 'Your password has been changed successfully!');

            } else {
                // Validação para informações pessoais
                $validated = $request->validate([
                    'name' => ['required', 'string', 'max:255'],
                    'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
                    'phone' => ['nullable', 'string', 'max:20'],
                    'birth_date' => ['nullable', 'date'],
                    'address' => ['nullable', 'string', 'max:255'],
                    'city' => ['nullable', 'string', 'max:100'],
                    'zip_code' => ['nullable', 'string', 'max:20'],
                ]);

                $user->fill([
                    'name' => $validated['name'],
                    'email' => $validated['email'],
                    'phone' => $validated['phone'] ?? $user->phone,
                    'birth_date' => $validated['birth_date'] ?? $user->birth_date,
                    'address' => $validated['address'] ?? $user->address,
                    'city' => $validated['city'] ?? $user->city,
                    'zip_code' => $validated['zip_code'] ?? $user->zip_code,
                ]);

                $user->save();

                return redirect()->route('profile')
                    ->with('success', 'Profile updated successfully!')
                    ->with('notification_type', 'success')
                    ->with('notification_message', 'Your profile has been updated successfully!');
            }

        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()
                ->withErrors($e->validator)
                ->withInput()
                ->with('error', 'Please correct the errors below.')
                ->with('notification_type', 'error')
                ->with('notification_message', 'Please correct the errors below.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'An error occurred while updating your profile.')
                ->with('notification_type', 'error')
                ->with('notification_message', 'An error occurred while updating your profile.');
        }
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function show()
    {
        return view('home.profile', [
            'user' => Auth::user()
        ]);
    }
}
