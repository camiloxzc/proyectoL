<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModuloVsRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modulo_vs_role', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idModulo')->references('id')->on('modulos')->onDelete('cascade');
            $table->foreignId('idRol')->references('id')->on('roles')->onDelete('cascade');

            $table->timestamps();
        });
        DB::table('modulo_vs_role')->insert([
            ['idRol' => '1', 'idModulo' => '1'],
            ['idRol' => '1', 'idModulo' => '2'],
            ['idRol' => '1', 'idModulo' => '3'],
            ['idRol' => '1', 'idModulo' => '4'],
            ['idRol' => '1', 'idModulo' => '5'],
            ['idRol' => '1', 'idModulo' => '6'],
            ['idRol' => '1', 'idModulo' => '7'],
            ['idRol' => '1', 'idModulo' => '8'],
            ['idRol' => '1', 'idModulo' => '9'],
            ['idRol' => '2', 'idModulo' => '1'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('modulo_vs_role');
    }
}
