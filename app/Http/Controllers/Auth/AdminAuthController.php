<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\SiteContact;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminAuthController extends Controller
{
    /**
     * Afficher la page de connexion admin
     */
    public function showLoginForm()
    {
        // Si déjà connecté, rediriger vers le dashboard
        if (Auth::check()) {
            return redirect()->route('admin.dashboard');
        }

        // Récupérer les settings pour le logo (si nécessaire)
        $settings = SiteContact::first(); // Ajustez selon votre modèle
        
        return view('admin.login', compact('settings'));
    }

    /**
     * Traiter la connexion
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ], [
            'email.required' => 'L\'adresse e-mail est obligatoire.',
            'email.email' => 'L\'adresse e-mail doit être valide.',
            'password.required' => 'Le mot de passe est obligatoire.',
            'password.min' => 'Le mot de passe doit contenir au moins 6 caractères.',
        ]);

        $credentials = $request->only('email', 'password');
        $remember = $request->boolean('remember');

        // Tentative de connexion
        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            
            return redirect()->intended(route('admin.dashboard'))
                           ->with('success', 'Connexion réussie ! Bienvenue dans l\'administration.');
        }

        return back()->withErrors([
            'email' => 'Ces identifiants ne correspondent pas à nos enregistrements.',
        ])->withInput($request->except('password'));
    }

    /**
     * Déconnexion
     */
    public function logout(Request $request)
    {
        Auth::logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('admin.login')
                       ->with('success', 'Vous avez été déconnecté avec succès.');
    }

    /**
     * Créer l'utilisateur admin par défaut (à exécuter une seule fois)
     */
    public function createDefaultAdmin()
    {
        // Vérifier si un admin existe déjà
        if (User::count() > 0) {
            return response()->json([
                'message' => 'Un utilisateur admin existe déjà.',
                'success' => false
            ]);
        }

        // Créer l'utilisateur admin par défaut
        $admin = User::create([
            'firstname' => 'Admin',
            'lastname' => 'Système',
            'pseudo' => 'admin',
            'email' => 'admin@company.com',
            'password' => 'admin123456', // Sera automatiquement haché grâce au cast
        ]);

        return response()->json([
            'message' => 'Utilisateur admin créé avec succès.',
            'success' => true,
            'credentials' => [
                'email' => 'admin@company.com',
                'password' => 'admin123456'
            ]
        ]);
    }
}