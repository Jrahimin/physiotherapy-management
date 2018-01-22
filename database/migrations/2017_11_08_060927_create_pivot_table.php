<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_therapy', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('patient_id');
            $table->integer('therapy_id');
            $table->string('time');
            $table->date('date');
            $table->double('amount');
            $table->integer('status');
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
        Schema::dropIfExists('patient_therapy');
    }
}
