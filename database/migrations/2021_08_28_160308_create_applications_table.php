<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id('idsolicitudservicio');
            $table->date('fechaservicio');
            $table->string('precio');
            $table->unsignedBigInteger('idestadoservicio')->nullable();
            $table->unsignedBigInteger('idusuario')->nullable(); //Se agregan atributos de foraneas


            $table->foreign('idestadoservicio')->references('idestadoservicio')    //Con estas tres lineas se hace la foranea
            ->on('servicestatus')                                     //foranea de id usuario
            ->onDelete('cascade');

            $table->foreign('idusuario')->references('id')    //Con estas tres lineas se hace la foranea
            ->on('users')                                     //foranea de id usuario
            ->onDelete('cascade');

            /*$table->foreign('precio_fk')->references('precio')   //Con estas tres lineas se hace la foranea
            ->on('inventories')                               //foranea de precio
            ->onDelete('cascade');*/

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
        Schema::dropIfExists('applications');
    }
}
