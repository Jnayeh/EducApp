<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReclamationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reclamations', function (Blueprint $table) {
            $table->id();
            $table->text('titre');
            $table->text('details');
            $table->UnsignedBigInteger('eleve_id');
            $table->foreign('eleve_id')->references('id')->on('eleves')
                ->onDelete('cascade');

            $table->UnsignedBigInteger('professeur_id');
            $table->foreign('professeur_id')->references('id')->on('professeurs')
                ->onDelete('cascade');

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
        Schema::dropIfExists('reclamations');
    }
}
