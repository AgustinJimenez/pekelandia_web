<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpresaEmpresasTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('empresa__empresas', function(Blueprint $table) {
			$table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('nombre');
            $table->string('rubro');
            $table->string('direccion');
            $table->string('telefono');
            $table->string('web');
            $table->string('mapa',1000);
            $table->string('email');
            $table->integer('subcategoria_id')->unsigned();
            $table->foreign('subcategoria_id')->references('id')->on('categoria__subcategorias');
            $table->integer('subsubcategoria_id')->nullable()->unsigned();
            $table->foreign('subsubcategoria_id')->references('id')->on('categoria__subsubcategorias');
            $table->integer('pais_id')->unsigned();
            $table->foreign('pais_id')->references('id')->on('paises__pais');
            $table->integer('ciudad_id')->unsigned();
            $table->foreign('ciudad_id')->references('id')->on('paises__ciudads');
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
		Schema::drop('empresa__empresas');
	}
}
