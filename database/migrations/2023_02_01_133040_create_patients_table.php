<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('registration_code')->unique();
            $table->string('name');
            $table->date('birthdate');
            $table->string('gender');
            $table->bigInteger('polyclinic_id')->unsigned()->index();
            $table->foreign('polyclinic_id')->references('id')->on('polyclinics')->onDelete('cascade');
            $table->bigInteger('doctor_id')->unsigned()->index();
            $table->foreign('doctor_id')->references('id')->on('doctors')->onDelete('cascade');
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
        Schema::dropIfExists('patients');
    }
}
