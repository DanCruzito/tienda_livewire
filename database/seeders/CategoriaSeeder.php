<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         //Camaras
         Categoria::create([
            'nombre' => 'Camaras'
        ]);
        //Celulares
        Categoria::create([
            'nombre' => 'Celulares'
        ]);
        //Control de Acceso
        Categoria::create([
            'nombre' => 'Control de Acceso'
        ]);
        //Televisores
        Categoria::create([
            'nombre' => 'Televisores'
        ]);
    }
}
