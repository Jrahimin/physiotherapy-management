<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterPatientTherapiesFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('patient_therapy', function (Blueprint $table) {
           $table->dropColumn('amount');
            $table->integer('payment_id')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('patient_therapy', function (Blueprint $table) {
            $table->double('amount');
            $table->dropColumn('payment_id');
        });
    }
}
