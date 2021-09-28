<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CreateCategories extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'nombre' => 'Producto',
        ]);
        Category::create([
            'nombre' => 'Servicio',
        ]);
        User::create([
            'name' => 'Admin Istrator',
            'phone' => '3013454331',
            'email' => 'admin@admin.com',
            'password' => Hash::make('Admin12*'),
            'idRol' => '1'
        ]);
    }
}
