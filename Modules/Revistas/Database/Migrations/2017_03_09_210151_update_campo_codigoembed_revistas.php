<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateCampoCodigoembedRevistas extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('revistas__revistas', function(Blueprint $table)
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
        Schema::table('revistas__revistas', function(Blueprint $table)
        {
            $table->string('codigoembed');
        });
    }

}
