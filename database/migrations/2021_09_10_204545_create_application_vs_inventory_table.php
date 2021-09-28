<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationVsInventoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application_vs_inventory', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('idsolicitudservicio');
            $table->unsignedBigInteger('idservicioproducto');

            $table->foreign('idsolicitudservicio')->references('idsolicitudservicio')    //Con estas tres lineas se hace la foranea
            ->on('applications')                                     //foranea de id usuario
            ->onDelete('cascade');

            $table->foreign('idservicioproducto')->references('idservicioproducto')    //Con estas tres lineas se hace la foranea
            ->on('inventories')                                     //foranea de id usuario
            ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('application_vs_inventory');
    }
}
