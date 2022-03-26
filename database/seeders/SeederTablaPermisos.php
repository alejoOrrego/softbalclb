<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

//spatie

 use Spatie\Permission\Models\Permission;

class SeederTablaPermisos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permisos = [
            //tabla roles
            'ver-rol',
            'crear-rol',
            'editar-rol',
            'borrar-rol',
            //tabla usuarios
            'ver-usuarios',
            'crear-usuarios',
            'editar-usuarios',
            'borrar-usuarios',
            //tabla equipos
            'ver-equipo',
            'crear-equipo',
            'editar-equipo',
            'borrar-equipo',
            //tabla entrenamientos
            'ver-entrenamiento',
            'crear-entrenamiento',
            'editar-entrenamiento',
            'borrar-entrenamiento',
        ];
        foreach($permisos as $permiso){
            Permission::create(['name'=>$permiso]);
        }
    }
}
