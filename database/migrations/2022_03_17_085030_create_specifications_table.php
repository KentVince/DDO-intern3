<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpecificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('specification', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('mineral_id');
            $table->string('specification_name');
            $table->timestamps();
            $table->foreign('mineral_id')->references('id')->on('minerals')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      
        Schema::dropIfExists('specification');
    }
}
