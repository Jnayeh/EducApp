<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBulletinNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bulletin_notes', function (Blueprint $table) {
            $table->id();
            $table->text('bulletin');

            $table->UnsignedBigInteger('eleve_id');
            $table->foreign('eleve_id')->references('id')->on('eleves')
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
        Schema::dropIfExists('bulletin_notes');
    }
}
