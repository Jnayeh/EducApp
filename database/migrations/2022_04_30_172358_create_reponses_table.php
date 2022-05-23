<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reponses', function (Blueprint $table) {
            $table->id();
            $table->text('photo');

            $table->UnsignedBigInteger('eleve_id');
            $table->foreign('eleve_id')->references('id')->on('eleves')
                ->onDelete('cascade');
            $table->UnsignedBigInteger('home_work_id');
            $table->foreign('home_work_id')->references('id')->on('home_works')
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
        Schema::dropIfExists('reponses');
    }
}
