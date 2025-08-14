<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User; // <--- IMPORTANT

class ProfileController extends Controller
{
    // Afficher le profil de l'utilisateur connecté
    public function index()
    {
        $user = Auth::user();
        return view('admin.profile', compact('user'));
    }

    // Mettre à jour le profil sans toucher au mot de passe
    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'pseudo' => 'required|string|max:255|unique:users,pseudo,' . $user->id,
        ]);

        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->pseudo = $request->pseudo;

        /** @var \App\Models\User $user */
        $user = Auth::user();
        $user->save();


        return redirect()->back()->with('success', 'Profil mis à jour avec succès !');
    }
}
