<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('serviceID')->nullable();
            $table->foreign('serviceID')->references('id')->on('services');
            $table->date('date')->nullable();
            $table->unsignedBigInteger('doctorID')->nullable();
            $table->foreign('doctorID')->references('id')->on('doctors');
            $table->time('time')->nullable();
            $table->longText('comment')->nullable();
            $table->tinyInteger('isBlock')->nullable();
            $table->integer('number')->nullable();
            $table->unsignedBigInteger('patientID')->nullable();
            $table->foreign('patientID')->references('idPateints')->on('patients');
            $table->string('status')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appointments');
    }
}
