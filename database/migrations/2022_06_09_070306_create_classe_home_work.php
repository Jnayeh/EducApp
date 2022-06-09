<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClasseHomeWork extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classe_home_work', function (Blueprint $table) {
            $table->id();
            $table->UnsignedBigInteger('classe_id');
            $table->foreign('classe_id')->references('id')->on('classes')
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
        Schema::dropIfExists('classe_home_work');
    }
}
