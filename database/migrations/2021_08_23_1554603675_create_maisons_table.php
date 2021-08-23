<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaisonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maisons', function (Blueprint $table) {
			$table->bigIncrements('id_Maison');
			$table->string('Adresse_Maison')->nullable();
			$table->unsignedBigInteger('Id_Ville');
			$table->unsignedBigInteger('Id_User')->unique();
			$table->timestamps();
			 
			 
			$table->foreign('Id_Ville')->references('id_Ville')->on('villes');
			$table->foreign('Id_User')->references('id_User')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('maisons');
    }
}
