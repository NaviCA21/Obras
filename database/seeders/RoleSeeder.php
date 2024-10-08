<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Verifica si el rol 'admin' ya existe, si no, lo crea
        if (!Role::where('name', 'admin')->exists()) {
            Role::create(['name' => 'admin']);
        }

        // Verifica si el rol 'usuario' ya existe, si no, lo crea
        if (!Role::where('name', 'usuario')->exists()) {
            Role::create(['name' => 'usuario']);
        }
    }
}
