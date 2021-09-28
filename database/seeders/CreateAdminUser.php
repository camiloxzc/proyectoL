<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Models\Modulo;
use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CreateAdminUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Modulo::create(['module_name' => 'rol']);
        Modulo::create(['module_name' => 'usuario']);
        Modulo::create(['module_name' => 'calendario']);
        Modulo::create(['module_name' => 'productos']);
        Modulo::create(['module_name' => 'proveedor']);
        Modulo::create(['module_name' => 'compras']);
        Modulo::create(['module_name' => 'solicitud']);
        Modulo::create(['module_name' => 'ventas']);
        Modulo::create(['module_name' => 'servicios']);

        Permission::create(['description' => 'visualizar roles','module_id' => '1']);
        Permission::create(['description' => 'crear rol','module_id' => '1']);
        Permission::create(['description' => 'editar rol','module_id' => '1']);
        Permission::create(['description' => 'eliminar rol','module_id' => '1']);

        Permission::create(['description' => 'visualizar usuarios','module_id' => '2']);
        Permission::create(['description' => 'crear usuario','module_id' => '2']);
        Permission::create(['description' => 'editar usuario','module_id' => '2']);
        Permission::create(['description' => 'eliminar usuario','module_id' => '2']);

        Permission::create(['description' => 'visualizar calendario','module_id' => '3']);
        Permission::create(['description' => 'crear calendario','module_id' => '3']);
        Permission::create(['description' => 'editar calendario','module_id' => '3']);
        Permission::create(['description' => 'eliminar calendario','module_id' => '3']);

        Permission::create(['description' => 'visualizar productos','module_id' => '4']);
        Permission::create(['description' => 'crear producto','module_id' => '4']);
        Permission::create(['description' => 'editar producto','module_id' => '4']);
        Permission::create(['description' => 'eliminar producto','module_id' => '4']);

        Permission::create(['description' => 'visualizar proveedores','module_id' => '5']);
        Permission::create(['description' => 'crear proveedor','module_id' => '5']);
        Permission::create(['description' => 'editar proveedor','module_id' => '5']);
        Permission::create(['description' => 'eliminar proveedor','module_id' => '5']);

        Permission::create(['description' => 'visualizar compras','module_id' => '6']);
        Permission::create(['description' => 'crear compra','module_id' => '6']);
        Permission::create(['description' => 'editar compra','module_id' => '6']);
        Permission::create(['description' => 'eliminar compra','module_id' => '6']);

        Permission::create(['description' => 'visualizar solicitudes','module_id' => '7']);
        Permission::create(['description' => 'crear solicitud','module_id' => '7']);
        Permission::create(['description' => 'editar solicitud','module_id' => '7']);
        Permission::create(['description' => 'eliminar solicitud','module_id' => '7']);

        Permission::create(['description' => 'visualizar ventas','module_id' => '8']);
        Permission::create(['description' => 'crear venta','module_id' => '8']);
        Permission::create(['description' => 'editar venta','module_id' => '8']);
        Permission::create(['description' => 'eliminar venta','module_id' => '8']);

        Permission::create(['description' => 'visualizar servicios','module_id' => '9']);
        Permission::create(['description' => 'crear servicio','module_id' => '9']);
        Permission::create(['description' => 'editar servicio','module_id' => '9']);
        Permission::create(['description' => 'eliminar servicio','module_id' => '9']);



        $role = Role::create(['name' => 'super-admin',
        'status' => '1',
        ]);
        // $role->givePermissionTo(Permission::all());


        User::create([
            'name' => 'Admin Istrator',
            'phone' => '3013454331',
            'email' => 'admin@admin.com',
            'password' => Hash::make('Admin12*'),
        ])->roles()->attach($role);

        Role::create(['name' => 'admin']);
        Role::create(['name' => 'professional']);
        Role::create(['name' => 'customer']);


    }
}
