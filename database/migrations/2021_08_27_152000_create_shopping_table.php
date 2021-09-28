<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShoppingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shoppings', function (Blueprint $table) {
            $table->id('idcompra');
            $table->date('fecha')->nullable();
            $table->decimal('preciototal')->nullable();
            $table->float('iva')->nullable();
            $table->string('numerofactura')->nullable();
            $table->unsignedBigInteger('proveedor_id')->nullable();

            $table->foreign('proveedor_id')
                ->references('idproveedor')
                ->on('providers')
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
        Schema::dropIfExists('shoppings');
    }
}
