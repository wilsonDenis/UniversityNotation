<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Support\Facades\Log;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();  // Essayez de vous connecter avec les identifiants fournis
        $request->session()->regenerate();  // Régénérez la session pour éviter les attaques de fixation de session

        // Vérifiez si l'utilisateur connecté est un administrateur
        if (Auth::user()->role === 'admin') {
            return redirect('/admin/dashboard');  // Redirigez vers le tableau de bord administrateur
        }

        return redirect()->intended(RouteServiceProvider::HOME);  // Autrement, redirigez vers la page principale des utilisateurs
    }

    // public function store(LoginRequest $request): RedirectResponse
    // {
    //     try {
    //         $request->authenticate();
    //         $request->session()->regenerate();
    //         return redirect()->intended(RouteServiceProvider::HOME);
    //     } catch (\Throwable $e) {
    //         // Log l'erreur avec le message
    //         Log::error('Login error: ' . $e->getMessage());
    //         // Ajoutez des informations supplémentaires si nécessaire
    //         Log::error('Request details:', [
    //             'email' => $request->email,
    //             'intended' => RouteServiceProvider::HOME
    //         ]);

    //         // Redirigez avec un message d'erreur
    //         return back()->withErrors([
    //             'email' => 'The provided credentials do not match our records.',
    //         ])->withInput($request->only('email'));
    //     }
    // }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
