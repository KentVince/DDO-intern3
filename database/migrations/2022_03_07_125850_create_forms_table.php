<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forms', function (Blueprint $table) {
            $table->id(); //id sa form(auto increment)
            $table->string('otp_number');
            $table->string('name_permitte');
            $table->string('province');
            $table->string('municipality');
            $table->string('barangay');
            $table->string('name_applicant');
            $table->string('applicant_mail');
            $table->string('kind_mineral');
            $table->string('tonnage');
            $table->double('estimated_value');
            $table->integer('num_vehicle');
            $table->string('specification');
            $table->double('processing_fee');
            $table->string('processing_or');
            $table->double('excise_tax');
            $table->string('excise_or');
            $table->double('extraction_fee');
            $table->string('extraction_or');
            $table->string('buyer');
            $table->string('buyer_mail');
            $table->string('total_print')->nullable();
            $table->timestamps();// created at and updated at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('forms');
    }
}
