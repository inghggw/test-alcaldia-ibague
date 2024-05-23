<?php

namespace Database\Seeders;

use App\Models\Departamento;
use App\Models\TipoDocumento;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@mail.com',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'password' => Hash::make('12345678'),
        ]);

        TipoDocumento::create([
            'descripcion' => 'Cédula de Ciudadanía',
            'sigla' => 'CC',
        ]);

        TipoDocumento::create([
            'descripcion' => 'Tarjeta de Identidad',
            'sigla' => 'TI',
        ]);

        TipoDocumento::create([
            'descripcion' => 'Cédula de Extranjería',
            'sigla' => 'CE',
        ]);

        TipoDocumento::create([
            'descripcion' => 'Pasaporte',
            'sigla' => 'P',
        ]);

        Departamento::factory()->count(100)->create();
    }
}
