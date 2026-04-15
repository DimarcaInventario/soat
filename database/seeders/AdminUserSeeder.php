<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Usuario para acceder al panel (/login).
     *
     * Credenciales por defecto (cámbialas en producción):
     *   Correo: admin@seguro-soat.local
     *   Contraseña: password
     */
    public function run()
    {
        User::firstOrCreate(
            ['email' => 'admin@seguro-soat.local'],
            [
                'name' => 'Administrador SOAT',
                'password' => Hash::make('Soat@22'),
                'email_verified_at' => now(),
            ]
        );
    }
}
