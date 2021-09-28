<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id('idventa');
            $table->date('fechaservicio')->references('fechaservicio')->on('applications')->onUpdate('cascade');
            $table->foreignId('idestadoservicio')->references('idestadoservicio')->on('servicestatus')->onUpdate('cascade');
            // $table->foreignId('precio')->references('precio')->on('inventories')->onUpdate('cascade');
            $table->foreignId('idusuario')->references('id')->on('users')->onUpdate('cascade');
            $table->unsignedBigInteger('idservicioproducto')->nullable(); //Se agregan atributos de foraneas

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
        Schema::dropIfExists('sales');
    }
}
