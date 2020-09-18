<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRevistasRevistasTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('revistas__revistas', function(Blueprint $table) {
			$table->engine = 'InnoDB';
            $table->increments('id');
						$table->string('titulo');
            $table->integer('numero');
            $table->string('year');
            $table->boolean('mostrar');
            $table->string('codigoembed');
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
		Schema::drop('revistas__revistas');
	}
}
