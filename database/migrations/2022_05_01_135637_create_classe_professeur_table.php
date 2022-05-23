<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClasseProfesseurTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classe_professeur', function (Blueprint $table) {
            $table->UnsignedBigInteger('classe_id');
            $table->foreign('classe_id')->references('id')->on('classes')
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
        Schema::dropIfExists('classe_professeur');
    }
}
