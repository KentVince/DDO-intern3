<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMineralsToForms extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('forms', function (Blueprint $table) {

       $table->unsignedInteger('mineral_id')->nullable();
       $table->dropColumn(['kind_mineral', 'specification']);
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
        Schema::table('forms', function (Blueprint $table) {
            $table->dropForeign(['mineral_id']);

        });
    }
}
