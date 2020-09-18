<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsletterEnviadosTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('newsletter__enviados', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('asunto', 500);
            $table->mediumText('mensaje');
            $table->integer('grupo_id')->nullable()->unsigned();
            $table->foreign('grupo_id')->references('id')->on('newsletter__grupos');
            $table->string('email');
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
        Schema::drop('newsletter__enviados');
    }

}
