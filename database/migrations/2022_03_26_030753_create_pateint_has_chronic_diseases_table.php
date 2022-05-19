<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePateintHasChronicDiseasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pateint_has_chronic_diseases', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('Patient_idPateint')->nullable();
            $table->foreign('Patient_idPateint')->references('idPateints')->on('patients');
            $table->unsignedBigInteger('chronicDiseas_IDdiseases')->nullable();
            $table->foreign('chronicDiseas_IDdiseases')->references('IDdisease')->on('chronic_diseas');
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
        Schema::dropIfExists('pateint_has_chronic_diseases');
    }
}
