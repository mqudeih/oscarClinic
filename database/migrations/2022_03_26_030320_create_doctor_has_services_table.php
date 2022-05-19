<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorHasServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor_has_services', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idDoctor')->nullable();
            $table->foreign('idDoctor')->references('id')->on('doctors');
            $table->unsignedBigInteger('services_id')->nullable();
            $table->foreign('services_id')->references('id')->on('services');
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
        Schema::dropIfExists('doctor_has_services');
    }
}
