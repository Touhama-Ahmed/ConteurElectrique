<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVillesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('villes', function (Blueprint $table) {
			$table->bigIncrements('id_Ville');
			$table->string('Ville_Ville')->nullable();
			$table->unsignedBigInteger('Id_Region');
			$table->timestamps();
			 
			 
			$table->foreign('Id_Region')->references('id_Region')->on('regions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('villes');
    }
}
