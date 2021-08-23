<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsomationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consomations', function (Blueprint $table) {
			$table->bigIncrements('id_Consomation');
			$table->double('Courrant_Consomation')->nullable();
			$table->double('Tension_Consomation')->nullable();
			$table->double('Energie_Consomation')->nullable();
			$table->double('Facteurpuissance_Consomation')->nullable();
			$table->double('Frequence_Consomation')->nullable();
			$table->double('PuissanceW_Consomation')->nullable();
			$table->BigInteger('Isactive_Consomation');
			$table->unsignedBigInteger('Id_Maison');
			$table->timestamps();
			 
			 
			$table->foreign('Id_Maison')->references('id_Maison')->on('maisons');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consomations');
    }
}
