<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Vérifier si un utilisateur admin existe déjà
        if (User::where('email', 'admin@company.com')->exists()) {
            $this->command->info('Un utilisateur admin existe déjà. Aucune action requise.');
            return;
        }

        // Créer l'utilisateur admin par défaut
        User::create([
            'firstname' => 'Admin',
            'lastname' => 'Système',
            'pseudo' => 'admin',
            'email' => 'admin@company.com',
            'password' => Hash::make('admin123456'), // Hash explicite du mot de passe
        ]);

        $this->command->info('Utilisateur admin créé avec succès !');
        $this->command->info('Email: admin@company.com');
        $this->command->info('Mot de passe: admin123456');
        $this->command->warn('N\'oubliez pas de changer ces identifiants en production !');
    }
}