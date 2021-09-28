<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modulos', function (Blueprint $table) {
            $table->id();
            $table->string('module_name');
            $table->string('url')->nullable();
            $table->string('icono')->nullable();
            $table->string('padre')->nullable();
            $table->boolean('status')->nullable()->default(1);
            $table->timestamps();
        });
        DB::table('modulos')->insert([
            ['module_name'=>'Roles','url'=>'/admin/role/index','icono'=>'i','padre'=> 'NO'],
            ['module_name'=>'Usuarios','url'=>'/admin/user/index','icono'=>'i','padre'=> 'NO'],
            ['module_name'=>'Proveedores','url'=>'/admin/provider/index','icono'=>'i','padre'=> 'NO'],
            ['module_name'=>'Calendario','url'=>'/admin/calendar/index','icono'=>'i','padre'=> 'NO'],
            ['module_name'=>'Productos','url'=>'/admin/product/index','icono'=>'i','padre'=> 'NO'],
            ['module_name'=>'Servicios','url'=>'/admin/service/index','icono'=>'i','padre'=> 'NO'],
            ['module_name'=>'Compras','url'=>'/admin/shopping/index','icono'=>'i','padre'=> 'NO'],
            ['module_name'=>'Solicitudes','url'=>'/admin/application/index','icono'=>'i','padre'=> 'NO'],
            ['module_name'=>'Ventas','url'=>'/admin/sale/index','icono'=>'i','padre'=> 'NO']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('modulos');
    }
}
