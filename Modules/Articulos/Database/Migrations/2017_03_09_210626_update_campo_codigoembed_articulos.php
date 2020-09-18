<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateCampoCodigoembedArticulos extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('articulos__articulos', function(Blueprint $table)
        {
            $table->string('codigoembed', 4096)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('articulos__articulos', function(Blueprint $table)
        {
            $table->string('codigoembed');
        });
    }

}
