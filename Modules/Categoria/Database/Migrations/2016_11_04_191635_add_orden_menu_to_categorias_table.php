<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOrdenMenuToCategoriasTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('categoria__categorias', function(Blueprint $table)
        {
            $table->integer('orden');
            $table->boolean('menu');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('categoria__categorias', function(Blueprint $table)
        {
            $table->dropColumn('orden') ;
            $table->dropColumn('menu');
        });
    }

}
