<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailShoppingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_shoppings', function (Blueprint $table) {
            $table->id('iddetallecompra');
            $table->decimal('cantidad');
            $table->decimal('precio');
            
            $table->unsignedBigInteger('idcompra');
            $table->foreign('idcompra')->references('idcompra')->on('shoppings');

            $table->unsignedBigInteger('idservicioproducto');
            $table->foreign('idservicioproducto')->references('idservicioproducto')->on('inventories');
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
        Schema::dropIfExists('detail_shoppings');
    }
}
