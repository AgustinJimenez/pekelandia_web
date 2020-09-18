<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateCampoCodigoembedVideos extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('videos__videos', function(Blueprint $table)
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
        Schema::table('videos__videos', function(Blueprint $table)
        {
            $table->string('codigoembed');
        });
    }

}
