<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolevspermisosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_vs_permisos', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('idRol')->references('id')->on('roles')->onDelete('cascade');
            $table->foreignId('idPermiso')->references('id')->on('permissions')->onDelete('cascade');
            $table->timestamps();
        });

        DB::table('role_vs_permisos')->insert([
            ['idRol' => '1', 'idPermiso' => '1'],
            ['idRol' => '1', 'idPermiso' => '2'],
            ['idRol' => '1', 'idPermiso' => '3'],
            ['idRol' => '1', 'idPermiso' => '4'],
            ['idRol' => '1', 'idPermiso' => '5'],
            ['idRol' => '1', 'idPermiso' => '6'],
            ['idRol' => '1', 'idPermiso' => '7'],
            ['idRol' => '1', 'idPermiso' => '8'],
            ['idRol' => '1', 'idPermiso' => '9'],
            ['idRol' => '1', 'idPermiso' => '10'],
            ['idRol' => '1', 'idPermiso' => '11'],
            ['idRol' => '1', 'idPermiso' => '12'],
            ['idRol' => '1', 'idPermiso' => '13'],
            ['idRol' => '1', 'idPermiso' => '14'],
            ['idRol' => '1', 'idPermiso' => '15'],
            ['idRol' => '1', 'idPermiso' => '16'],
            ['idRol' => '1', 'idPermiso' => '17'],
            ['idRol' => '1', 'idPermiso' => '18'],
            ['idRol' => '1', 'idPermiso' => '19'],
            ['idRol' => '1', 'idPermiso' => '20'],
            ['idRol' => '1', 'idPermiso' => '21'],
            ['idRol' => '1', 'idPermiso' => '22'],
            ['idRol' => '1', 'idPermiso' => '23'],
            ['idRol' => '1', 'idPermiso' => '24'],
            ['idRol' => '1', 'idPermiso' => '25'],
            ['idRol' => '1', 'idPermiso' => '26'],
            ['idRol' => '1', 'idPermiso' => '27'],
            ['idRol' => '1', 'idPermiso' => '28'],
            ['idRol' => '1', 'idPermiso' => '29'],
            ['idRol' => '1', 'idPermiso' => '30'],
            ['idRol' => '1', 'idPermiso' => '31'],
            ['idRol' => '1', 'idPermiso' => '32'],
            ['idRol' => '1', 'idPermiso' => '33'],
            ['idRol' => '1', 'idPermiso' => '34'],
            ['idRol' => '1', 'idPermiso' => '35'],
            ['idRol' => '1', 'idPermiso' => '36'],
            ['idRol' => '1', 'idPermiso' => '37'],
            ['idRol' => '1', 'idPermiso' => '38'],
            ['idRol' => '1', 'idPermiso' => '39'],
            ['idRol' => '1', 'idPermiso' => '40'],
            ['idRol' => '1', 'idPermiso' => '41'],
            ['idRol' => '1', 'idPermiso' => '42'],
            ['idRol' => '1', 'idPermiso' => '43'],
            ['idRol' => '1', 'idPermiso' => '44'],
            ['idRol' => '1', 'idPermiso' => '45'],
            ['idRol' => '1', 'idPermiso' => '46'],
            ['idRol' => '1', 'idPermiso' => '47'],
            ['idRol' => '1', 'idPermiso' => '48'],
            ['idRol' => '1', 'idPermiso' => '49'],
            ['idRol' => '1', 'idPermiso' => '50'],
            ['idRol' => '1', 'idPermiso' => '51'],
            ['idRol' => '1', 'idPermiso' => '52'],
            ['idRol' => '1', 'idPermiso' => '53'],
            ['idRol' => '1', 'idPermiso' => '54'],
            ['idRol' => '1', 'idPermiso' => '55'],
            ['idRol' => '1', 'idPermiso' => '56'],
            ['idRol' => '1', 'idPermiso' => '57'],
            ['idRol' => '1', 'idPermiso' => '58'],
            ['idRol' => '1', 'idPermiso' => '59'],
            ['idRol' => '2', 'idPermiso' => '1'],
            ['idRol' => '2', 'idPermiso' => '2']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('role_vs_permisos');
    }
}
