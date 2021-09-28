<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('description');
            $table->string('url')->nullable();
            $table->string('metodo')->nullable();
            $table->boolean('identico')->nullable();
            $table->foreignId('idModulo')->references('id')->on('Modulos')->onUpdate('cascade');
            $table->boolean('status')->nullable()->default(true);

            $table->timestamps();
        });
        DB::table('permissions')->insert([
            ['description'=>'Vista pricipal del dashboard','url'=>'/admin/dashboard','metodo'=>'GET','identico'=> '1','idModulo' =>'1'],
            ['description'=>'Ver roles','url'=>'/admin/role/index','metodo'=>'GET','identico'=> '0','idModulo' =>'1'],
            ['description'=>'Ver formulario crear rol','url'=>'/admin/role/create','metodo'=>'GET','identico'=> '1','idModulo' =>'1'],
            ['description'=>'Crear rol','url'=>'/admin/role/store','metodo'=>'POST','identico'=> '1','idModulo' =>'1'],
            ['description'=>'Ver detalle de rol','url'=>'/admin/role/show/','metodo'=>'GET','identico'=> '0','idModulo' =>'1'],
            ['description'=>'Ver formulario editar rol','url'=>'/admin/role/edit/','metodo'=>'GET','identico'=> '0','idModulo' =>'1'],
            ['description'=>'Editar rol','url'=>'/admin/role/update/','metodo'=>'PUT','identico'=> '0','idModulo' =>'1'],
            ['description'=>'Eliminar rol','url'=>'/admin/role/destroy/','metodo'=>'delete','identico'=> '0','idModulo' =>'1'],
            ['description'=>'Cambiar estado de rol ','url'=>'/admin/role/changeStatus/','metodo'=>'GET','identico'=> '0','idModulo' =>'1'],
            ['description'=>'Ver usuarios','url'=>'/admin/user/index','metodo'=>'GET','identico'=> '0','idModulo' =>'2'],
            ['description'=>'Ver formulario crear usuario','url'=>'/admin/user/create','metodo'=>'GET','identico'=> '1','idModulo' =>'2'],
            ['description'=>'Crear usuario','url'=>'/admin/user/store','metodo'=>'POST','identico'=> '1','idModulo' =>'2'],
            ['description'=>'Ver detalle de usuario','url'=>'/admin/user/show/','metodo'=>'GET','identico'=> '0','idModulo' =>'2'],
            ['description'=>'Ver formulario editar usuario','url'=>'/admin/user/edit/','metodo'=>'GET','identico'=> '0','idModulo' =>'2'],
            ['description'=>'Editar usuario','url'=>'/admin/user/update/','metodo'=>'PUT','identico'=> '0','idModulo' =>'2'],
            ['description'=>'Eliminar usuario','url'=>'/admin/user/destroy/','metodo'=>'delete','identico'=> '0','idModulo' =>'2'],
            ['description'=>'Ver proveedores','url'=>'/admin/provider/index','metodo'=>'GET','identico'=> '0','idModulo' =>'3'],
            ['description'=>'Ver formulario crear proveedor','url'=>'/admin/provider/create','metodo'=>'GET','identico'=> '1','idModulo' =>'3'],
            ['description'=>'Crear proveedor','url'=>'/admin/provider/store','metodo'=>'POST','identico'=> '1','idModulo' =>'3'],
            ['description'=>'Ver detalle de proveedor','url'=>'/admin/provider/show/','metodo'=>'GET','identico'=> '0','idModulo' =>'3'],
            ['description'=>'Ver formulario editar proveedor','url'=>'/admin/provider/edit/','metodo'=>'GET','identico'=> '0','idModulo' =>'3'],
            ['description'=>'Editar proveedor','url'=>'/admin/provider/update/','metodo'=>'PUT','identico'=> '0','idModulo' =>'3'],
            ['description'=>'Eliminar proveedor','url'=>'/admin/provider/destroy/','metodo'=>'delete','identico'=> '0','idModulo' =>'3'],
            ['description'=>'Ver calendario','url'=>'/admin/calendar/index','metodo'=>'GET','identico'=> '0','idModulo' =>'4'],
            ['description'=>'Detalle calendario','url'=>'/admin/calendar/show','metodo'=>'POST','identico'=> '0','idModulo' =>'4'],
            ['description'=>'Reservacion en calendario','url'=>'/admin/calendar/create','metodo'=>'POST','identico'=> '0','idModulo' =>'4'],
            ['description'=>'Permitir display','url'=>'/admin/calendar/display','metodo'=>'POST','identico'=> '0','idModulo' =>'4'],
            ['description'=>'Eliminar reserva','url'=>'/admin/calendar/destroy','metodo'=>'POST','identico'=> '0','idModulo' =>'4'],
            ['description'=>'Ver productos','url'=>'/admin/product/index','metodo'=>'GET','identico'=> '0','idModulo' =>'5'],
            ['description'=>'Ver formulario crear producto','url'=>'/admin/product/create','metodo'=>'GET','identico'=> '1','idModulo' =>'5'],
            ['description'=>'Crear producto','url'=>'/admin/product/store','metodo'=>'POST','identico'=> '1','idModulo' =>'5'],
            ['description'=>'Ver detalle de producto','url'=>'/admin/product/show/','metodo'=>'GET','identico'=> '0','idModulo' =>'5'],
            ['description'=>'Ver formulario editar producto','url'=>'/admin/product/edit/','metodo'=>'GET','identico'=> '0','idModulo' =>'5'],
            ['description'=>'Editar producto','url'=>'/admin/product/update/','metodo'=>'PUT','identico'=> '0','idModulo' =>'5'],
            ['description'=>'Eliminar producto','url'=>'/admin/product/destroy/','metodo'=>'delete','identico'=> '0','idModulo' =>'5'],
            ['description'=>'Cambiar estado de producto ','url'=>'/admin/product/changeStatus/','metodo'=>'GET','identico'=> '0','idModulo' =>'5'],
            ['description'=>'Ver servicio','url'=>'/admin/service/index','metodo'=>'GET','identico'=> '0','idModulo' =>'6'],
            ['description'=>'Ver formulario peticion de servicio','url'=>'/admin/service/create','metodo'=>'GET','identico'=> '1','idModulo' =>'6'],
            ['description'=>'Crear peticion de servicio','url'=>'/admin/service/store','metodo'=>'POST','identico'=> '1','idModulo' =>'6'],
            ['description'=>'Ver detalle de servicio','url'=>'/admin/service/show/','metodo'=>'GET','identico'=> '0','idModulo' =>'6'],
            ['description'=>'Ver formulario editar servicio','url'=>'/admin/service/edit/','metodo'=>'GET','identico'=> '0','idModulo' =>'6'],
            ['description'=>'Editar servicio','url'=>'/admin/service/update/','metodo'=>'PUT','identico'=> '0','idModulo' =>'6'],
            ['description'=>'Eliminar servicio','url'=>'/admin/service/destroy/','metodo'=>'delete','identico'=> '0','idModulo' =>'6'],
            ['description'=>'Cambiar estado de servicio ','url'=>'/admin/service/changeStatus/','metodo'=>'GET','identico'=> '0','idModulo' =>'6'],
            ['description'=>'Ver compras','url'=>'/admin/shopping/index','metodo'=>'GET','identico'=> '0','idModulo' =>'7'],
            ['description'=>'Ver formulario crear compra','url'=>'/admin/shopping/create','metodo'=>'GET','identico'=> '1','idModulo' =>'7'],
            ['description'=>'Guardar compra','url'=>'/admin/shopping/store','metodo'=>'POST','identico'=> '1','idModulo' =>'7'],
            ['description'=>'Ver detalle de compra','url'=>'/admin/shopping/show/','metodo'=>'GET','identico'=> '0','idModulo' =>'7'],
            ['description'=>'Ver formulario editar compra','url'=>'/admin/shopping/edit/','metodo'=>'GET','identico'=> '0','idModulo' =>'7'],
            ['description'=>'Editar compra','url'=>'/admin/shopping/update/','metodo'=>'PUT','identico'=> '0','idModulo' =>'7'],
            ['description'=>'Eliminar compra','url'=>'/admin/shopping/destroy/','metodo'=>'delete','identico'=> '0','idModulo' =>'7'],
            ['description'=>'Ver solicitudes','url'=>'/admin/application/index','metodo'=>'GET','identico'=> '0','idModulo' =>'8'],
            ['description'=>'Ver formulario crear solicitud','url'=>'/admin/application/create','metodo'=>'GET','identico'=> '1','idModulo' =>'8'],
            ['description'=>'Guardar solicitud','url'=>'/admin/application/store','metodo'=>'POST','identico'=> '1','idModulo' =>'8'],
            ['description'=>'Ver detalle de solicitud','url'=>'/admin/application/show/','metodo'=>'GET','identico'=> '0','idModulo' =>'8'],
            ['description'=>'Ver formulario editar solicitud','url'=>'/admin/application/edit/','metodo'=>'GET','identico'=> '0','idModulo' =>'8'],
            ['description'=>'Editar solicitud','url'=>'/admin/application/update/','metodo'=>'PUT','identico'=> '0','idModulo' =>'8'],
            ['description'=>'Eliminar solicitud','url'=>'/admin/application/destroy/','metodo'=>'delete','identico'=> '0','idModulo' =>'8'],
            ['description' => 'Listar entradas', 'url' => '/compras/ver/', 'metodo' => 'GET', 'identico' => '0'],
            ['description' => 'Ver formulario crear compras', 'url' => '/compras/crear', 'metodo' => 'GET', 'identico' => '1'],
            ['description' => 'Guardar compra', 'url' => '/compras/guardar/compra', 'metodo' => 'POST', 'identico' => '1']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permissions');
    }
}
