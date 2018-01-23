<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PrescriptionTherapy extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prescription_therapy', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('prescription_id');
            $table->integer('therapy_id');
            $table->string('therapy_time');
            $table->integer('therapy_amount');
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
        Schema::dropIfExists('prescription_therapy');
    }
}
