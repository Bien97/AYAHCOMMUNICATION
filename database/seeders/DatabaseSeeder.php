<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Appeler le seeder pour créer l'utilisateur admin
        $this->call([
            AdminUserSeeder::class,
        ]);

        // Optionnel : Créer des utilisateurs de test supplémentaires
        // User::factory(10)->create();

        // Optionnel : Créer un utilisateur de test spécifique
        // User::factory()->create([
        //     'firstname' => 'Test',
        //     'lastname' => 'User',
        //     'pseudo' => 'testuser',
        //     'email' => 'test@example.com',
        // ]);
    }
}