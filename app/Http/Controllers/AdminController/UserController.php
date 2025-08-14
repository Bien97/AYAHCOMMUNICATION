<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->get();
        return view('admin.users', compact('users'));
    }

    public function store(Request $request)
    {
        try {
            // Validation des données
            $data = $request->validate([
                'firstname' => 'required|string|max:255|regex:/^[A-Za-zÀ-ÖØ-öø-ÿ \'-]+$/',
                'lastname'  => 'required|string|max:255|regex:/^[A-Za-zÀ-ÖØ-öø-ÿ \'-]+$/',
                'email'     => 'required|email|unique:users,email|max:255',
                'password'  => 'required|string|min:6|confirmed',
            ], [
                'firstname.required' => 'Le prénom est obligatoire.',
                'firstname.regex' => 'Le prénom ne doit contenir que des lettres, espaces, apostrophes et tirets.',
                'lastname.required' => 'Le nom est obligatoire.',
                'lastname.regex'  => 'Le nom ne doit contenir que des lettres, espaces, apostrophes et tirets.',
                'email.required' => 'L\'email est obligatoire.',
                'email.email' => 'L\'email doit être une adresse valide.',
                'email.unique' => 'Cette adresse email est déjà utilisée.',
                'password.required' => 'Le mot de passe est obligatoire.',
                'password.min' => 'Le mot de passe doit contenir au moins 6 caractères.',
                'password.confirmed' => 'Les mots de passe ne correspondent pas.',
            ]);

            // Utiliser une transaction pour éviter les problèmes
            DB::beginTransaction();

            try {
                // Hash du mot de passe
                $data['password'] = Hash::make($data['password']);
                
                // Créer l'utilisateur avec un pseudo temporaire
                $userData = [
                    'firstname' => $data['firstname'],
                    'lastname' => $data['lastname'],
                    'email' => $data['email'],
                    'password' => $data['password'],
                    'pseudo' => 'temp_' . time(), // Pseudo temporaire unique
                ];

                $user = User::create($userData);

                // Générer le pseudo définitif après création pour avoir l'ID
                $user->pseudo = $user->firstname . ($user->id < 10 ? '0' . $user->id : $user->id);
                $user->save();

                DB::commit();

                return back()->with('success', 'Utilisateur ajouté avec succès.');

            } catch (\Exception $e) {
                DB::rollBack();
                Log::error('Erreur lors de la création utilisateur: ' . $e->getMessage());
                throw $e;
            }

        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()->withErrors($e->validator)->withInput();
        } catch (\Exception $e) {
            Log::error('Erreur inattendue lors de l\'ajout utilisateur: ' . $e->getMessage());
            return back()->with('error', 'Une erreur est survenue lors de l\'ajout. Détails: ' . $e->getMessage())->withInput();
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $user = User::findOrFail($id);

            $data = $request->validate([
                'firstname' => 'required|string|max:255|regex:/^[A-Za-zÀ-ÖØ-öø-ÿ \'-]+$/',
                'lastname'  => 'required|string|max:255|regex:/^[A-Za-zÀ-ÖØ-öø-ÿ \'-]+$/',
                'email'     => 'required|email|unique:users,email,' . $user->id . '|max:255',
                'password'  => 'nullable|string|min:6|confirmed',
            ], [
                'firstname.required' => 'Le prénom est obligatoire.',
                'firstname.regex' => 'Le prénom ne doit contenir que des lettres, espaces, apostrophes et tirets.',
                'lastname.required' => 'Le nom est obligatoire.',
                'lastname.regex'  => 'Le nom ne doit contenir que des lettres, espaces, apostrophes et tirets.',
                'email.required' => 'L\'email est obligatoire.',
                'email.email' => 'L\'email doit être une adresse valide.',
                'email.unique' => 'Cette adresse email est déjà utilisée.',
                'password.min' => 'Le mot de passe doit contenir au moins 6 caractères.',
                'password.confirmed' => 'Les mots de passe ne correspondent pas.',
            ]);

            DB::beginTransaction();

            try {
                // Si mot de passe fourni → hash
                if (!empty($data['password'])) {
                    $data['password'] = Hash::make($data['password']);
                } else {
                    unset($data['password']);
                }

                $user->update($data);

                // Mettre à jour le pseudo si firstname changé
                $user->pseudo = $user->firstname . ($user->id < 10 ? '0' . $user->id : $user->id);
                $user->save();

                DB::commit();

                return back()->with('success', 'Utilisateur modifié avec succès.');

            } catch (\Exception $e) {
                DB::rollBack();
                Log::error('Erreur lors de la modification utilisateur: ' . $e->getMessage());
                throw $e;
            }

        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()->withErrors($e->validator)->withInput();
        } catch (\Exception $e) {
            Log::error('Erreur inattendue lors de la modification utilisateur: ' . $e->getMessage());
            return back()->with('error', 'Une erreur est survenue lors de la mise à jour. Détails: ' . $e->getMessage())->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);
            
            DB::beginTransaction();
            
            try {
                $userName = $user->firstname . ' ' . $user->lastname;
                $user->delete();
                
                DB::commit();
                
                return back()->with('success', 'Utilisateur "' . $userName . '" supprimé avec succès.');
                
            } catch (\Exception $e) {
                DB::rollBack();
                Log::error('Erreur lors de la suppression utilisateur: ' . $e->getMessage());
                throw $e;
            }

        } catch (\Exception $e) {
            Log::error('Erreur inattendue lors de la suppression utilisateur: ' . $e->getMessage());
            return back()->with('error', 'Une erreur est survenue lors de la suppression.');
        }
    }
}