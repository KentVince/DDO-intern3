<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMineralsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('minerals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_of_minerals');
            $table->timestamps();
        });
        // Schema::create('specification', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->unsignedInteger('mineral_id');
        //     $table->string('specification_name');
        //     $table->timestamps();
        //     $table->foreign('mineral_id')->references('id')->on('minerals')->onDelete('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       
        
        Schema::dropIfExists('minerals');
    }
}
