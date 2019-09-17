<?php

use App\Models\Admin\Permiso;
use Illuminate\Database\Seeder;

class TablaPermisoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //factory(Permiso::class, 50)->create();

        Permiso::create([
            'nombre' => 'Prestar Libros',
            'slug' => 'prestar-libros'
        ]);

        Permiso::create([
            'nombre' => 'Crear Libros',
            'slug' => 'crear-libros'
        ]);

        Permiso::create([
            'nombre' => 'Editar Libros',
            'slug' => 'editar-libros'
        ]);

        Permiso::create([
            'nombre' => 'Listar Libros',
            'slug' => 'listar-libros'
        ]);
        
    }
}
