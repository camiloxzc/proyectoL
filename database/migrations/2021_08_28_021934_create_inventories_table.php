<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->id('idservicioproducto');
            $table->string('nombre')->unique();
            $table->text('descripcion');
            $table->decimal('precio', 9, 0);
            $table->string('cantidad')->default(1);
            $table->boolean('estado')->default(1);
            $table->unsignedBigInteger('idcategoria');

            $table->foreign('idcategoria')
                ->references('idcategoria')
                ->on('categories')
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
        Schema::dropIfExists('inventories');
    }
}
