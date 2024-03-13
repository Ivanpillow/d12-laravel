<?php

namespace Database\Seeders;

use App\Models\Estudiante;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstudianteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        DB::table('estudiantes')->insert([
            'nombre' => 'El Aivan',
            'correo' => 'aivan@gmail.com',
            'codigo' => '1234',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Estudiante::create([
            'nombre' => 'El alan',
            'correo' => 'alan@gmail.com',
            'codigo' => '2345',
        ]);

        Estudiante::factory(50)->create();
    }
}
