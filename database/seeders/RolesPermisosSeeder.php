<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Models\Roles;
use App\Models\Permisos;
use App\Models\PermisosRoles;
use App\Models\User;
use App\Models\DatosExtra;



class RolesPermisosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Roles::create([
            'name' => 'admin'
        ]);
        Roles::create([
            'name' => 'colaborador'
        ]);



        Permisos::create([
            'name' => 'listar'
        ]);
        Permisos::create([
            'name' => 'registrar'
        ]);
        Permisos::create([
            'name' => 'editar'
        ]);
        Permisos::create([
            'name' => 'eliminar'
        ]);
        Permisos::create([
            'name' => 'datosExtra1'
        ]);
        Permisos::create([
            'name' => 'datosExtra2'
        ]);



        PermisosRoles::create([
            'permisos_id' => 1,
            'roles_id' => 1
        ]);
        PermisosRoles::create([
            'permisos_id' => 2,
            'roles_id' => 1
        ]);
        PermisosRoles::create([
            'permisos_id' => 3,
            'roles_id' => 1
        ]);
        PermisosRoles::create([
            'permisos_id' => 4,
            'roles_id' => 1
        ]);
        PermisosRoles::create([
            'permisos_id' => 5,
            'roles_id' => 2
        ]);
        PermisosRoles::create([
            'permisos_id' => 6,
            'roles_id' => 2
        ]);


        DatosExtra::create([
            'tipo_vacuna' => 'AstraZeneca',
            'fecha_vacunacion' => '2023-02-23',
            'numero_dosis' => 2,
        ]);


        User::create([
            'nombres' => 'ronny michael',
            'apellidos' => 'minda vera',
            'cedula' => '0912354687',
            'email' => 'min@gmail.com',
            'password' => 123456789,
            'roles_id' => 1,
            'fecha_nacimiento' => '2023-02-11',
            'direccion_domicilio' => 'Guayaquil',
            'telefono_movil' => '03593472',
            'estado_vacunacion' => 'Vacunado',
            'datos_extras_id' => 1,
        ]);
    }
}
