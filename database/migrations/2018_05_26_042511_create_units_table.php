<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('units', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('rate_id')->index();
            $table->string('name', 50);
            $table->text('description')->nullable();
            $table->unsignedInteger('order')->index()->nullable();
            $table->string('image')->nullable();
            $table->boolean('etc')->default(false);
            $table->boolean('lowest')->default(false);
            $table->unsignedInteger('count')->default(0);
            $table->timestamps();

            $table->unique(['rate_id', 'name']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('units');
    }
}
