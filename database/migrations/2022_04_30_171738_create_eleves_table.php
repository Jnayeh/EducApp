<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateElevesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eleves', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('telephone')->nullable();
            $table->string('email')->nullable();
            $table->string('password');
            $table->timestamps();

            $table->UnsignedBigInteger('parent_id')->nullable();
            $table->foreign('parent_id')->references('id')->on('parents')
                ->onDelete('cascade');

            $table->UnsignedBigInteger('classe_id')->nullable();
            $table->foreign('classe_id')->references('id')->on('classes')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('eleves');
    }
}
