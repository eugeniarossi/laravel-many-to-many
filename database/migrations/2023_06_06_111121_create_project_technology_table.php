<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_technology', function (Blueprint $table) {
            //$table->id();

            // creare campi  project_id e technology_id  - saranno due chiavi esterne
            
            // in constrained dovrei specificare che project_id si riferisce alla tabella projects ma non serve se usi convenzioni laravel 
            $table->foreignId('project_id')->constrained()->cascadeOnDelete(); // se viene eliminato un project elimina il project_id
            $table->foreignId('technology_id')->constrained()->cascadeOnDelete();

            $table->primary(['project_id', 'technology_id']); // creo una chiave primaria (indice), composta da project_id e technology_id
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
        Schema::dropIfExists('project_technology');
    }
};
