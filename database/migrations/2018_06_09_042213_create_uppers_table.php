<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUppersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uppers', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('target_id')->index();
            $table->unsignedInteger('unit_id')->index();
            $table->unique(['target_id', 'unit_id']);

            $table->foreign('unit_id')->references('id')->on('units')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('uppers');
    }
}
