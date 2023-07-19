<?php

namespace Database\Seeders;

use App\Models\Oficina;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OficinaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Oficina::create(['nombreOficina' => 'Alcaldia']);
        Oficina::create(['nombreOficina' => 'secretaria']);
        Oficina::create(['nombreOficina' => 'tesoreria']);
    }
}
