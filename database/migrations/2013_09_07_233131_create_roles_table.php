<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id('id');
            $table->string('name');
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
        DB::table('roles')->insert([
            ['name'=>'SuperAdministrador'],
            ['name'=>'Administrador'],
            ['name'=>'Profesional'],
            ['name'=>'Cliente'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
